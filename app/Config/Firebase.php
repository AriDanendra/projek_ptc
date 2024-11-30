<?php

namespace Config;

use Kreait\Firebase\Factory;

class Firebase
{
    private $database;

    public function __construct()
    {
        // Konfigurasi dengan URL database eksplisit
        $firebase = (new Factory)
            ->withServiceAccount(WRITEPATH . 'serviceKey.json')
            ->withDatabaseUri('https://project-ptc-default-rtdb.asia-southeast1.firebasedatabase.app/');
        $this->database = $firebase->createDatabase();
    }

    public function getDatabase()
    {
        return $this->database;
    }

    
}
