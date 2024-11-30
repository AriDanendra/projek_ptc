<?php

namespace App\Controllers\Dosen;

use App\Controllers\BaseController;
use App\Models\JadwalModel;
use App\Models\PenggunaModel;

class Home extends BaseController
{
    private $jadwalModel;
    private $penggunaModel;

    public function __construct()
    {
        $this->jadwalModel = new JadwalModel();
        $this->penggunaModel = new PenggunaModel();
    }

    public function index()
    {
        $session = session();
        $nama_dosen = $session->get('nama_dosen'); // Ambil nama dosen dari session

        if (!$nama_dosen) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Ambil filter dari request
        $hari = $this->request->getGet('hari');
        $pekan = $this->request->getGet('pekan');

        // Ambil jadwal dosen berdasarkan nama_dosen
        $jadwal = $this->jadwalModel->getJadwalByDosen($nama_dosen);

        // Filter tambahan berdasarkan hari dan pekan
        $filteredJadwal = array_filter($jadwal, function ($item) use ($hari, $pekan) {
            $matchHari = !$hari || $item['hari'] === $hari;
            $matchPekan = !$pekan || $item['pekan'] === $pekan;
            return $matchHari && $matchPekan;
        });

        // Sort jadwal berdasarkan hari dan waktu mulai
        usort($filteredJadwal, function ($a, $b) {
            return [$a['hari'], $a['waktu_mulai']] <=> [$b['hari'], $b['waktu_mulai']];
        });

        $data = [
            'title' => 'Jadwal Saya',
            'jadwal' => $filteredJadwal,
            'hari' => $hari,
            'pekan' => $pekan,
        ];

        return view('dosen/home', $data);
    }
    public function batalkan()
    {
        $id_jadwal = $this->request->getPost('id_jadwal');

        if (!$id_jadwal) {
            return redirect()->back()->with('error', 'ID jadwal tidak valid.');
        }

        $jadwal = $this->jadwalModel->find($id_jadwal);

        if (!$jadwal) {
            return redirect()->back()->with('error', 'Jadwal tidak ditemukan.');
        }

        if ($jadwal['status'] !== 'Dipesan') {
            return redirect()->back()->with('error', 'Jadwal belum dipesan.');
        }

        // Update status jadwal menjadi Tersedia
        $this->jadwalModel->update($id_jadwal, [
            'status' => 'Tersedia',
            'mata_kuliah' => null,
            'kelas' => null,
            'nama_dosen' => null
        ]);

        return redirect()->back()->with('success', 'Pesanan jadwal berhasil dibatalkan.');
    }
}
