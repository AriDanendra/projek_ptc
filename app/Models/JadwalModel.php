<?php

namespace App\Models;

use CodeIgniter\Model; 
use Config\Firebase;

class JadwalModel
{
    private $database;

    public function __construct()
    {
        
        $firebase = new Firebase();
        $this->database = $firebase->getDatabase();
    }

    public function findAll()
    {
        $reference = $this->database->getReference('jadwal');
        $firebaseData = $reference->getValue() ?: [];

        $ruangan = $this->getAllRuangan(); // Ambil semua data ruangan

        $result = [];
        foreach ($firebaseData as $key => $value) {
            $value['id_jadwal'] = $key;
            $value['nama_ruangan'] = $ruangan[$value['id_ruangan']]['nama_ruangan'] ?? 'N/A';
            $result[] = $value;
        }

        return $result;
    }


    public function find($id)
    {
        $reference = $this->database->getReference('jadwal/' . $id);
        $jadwal = $reference->getValue();

        if ($jadwal) {
            $jadwal['id_jadwal'] = $id;

            // Gabungkan dengan data ruangan
            $ruangan = $this->getAllRuangan();
            $jadwal['nama_ruangan'] = $ruangan[$jadwal['id_ruangan']]['nama_ruangan'] ?? 'N/A';
        }

        return $jadwal;
    }



    public function insert($data)
    {
        $newKey = $this->database->getReference('jadwal')->push()->getKey();
        $this->database->getReference('jadwal/' . $newKey)->set($data);
        return $newKey;
    }

    public function update($id, $data)
    {
        $this->database->getReference('jadwal/' . $id)->update($data);
    }

    public function delete($id)
    {
        $this->database->getReference('jadwal/' . $id)->remove();
    }

    public function getAllRuangan()
    {
        $reference = $this->database->getReference('ruangan');
        $firebaseData = $reference->getValue() ?: [];

        $result = [];
        foreach ($firebaseData as $key => $value) {
            $value['id_ruangan'] = $key;
            $result[$key] = $value; // Simpan dalam format dengan kunci `id_ruangan`
        }

        return $result;
    }


    public function getJadwalByHariAndPekan($hari = null, $pekan = null)
    {
        $jadwal = $this->findAll();
        $ruangan = $this->getAllRuangan();

        // Gabungkan data `jadwal` dengan `ruangan`
        foreach ($jadwal as &$item) {
            $item['nama_ruangan'] = $ruangan[$item['id_ruangan']]['nama_ruangan'] ?? 'N/A';
        }

        // Filter berdasarkan hari dan pekan
        return array_filter($jadwal, function ($item) use ($hari, $pekan) {
            $matchHari = !$hari || $item['hari'] === $hari;
            $matchPekan = !$pekan || $item['pekan'] === $pekan;
            return $matchHari && $matchPekan;
        });
    }
    public function getJadwalByDosen($nama_dosen)
    {
        $jadwal = $this->findAll();

        // Filter jadwal berdasarkan nama_dosen
        return array_filter($jadwal, function ($item) use ($nama_dosen) {
            return isset($item['nama_dosen']) && $item['nama_dosen'] === $nama_dosen && $item['status'] === 'Dipesan';
        });
    }
}
