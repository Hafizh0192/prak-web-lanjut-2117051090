<?php

namespace App\Controllers;

class Home extends BaseController
{
    #nampilin profile atau index berdasarkan controller yg di routes
    public function index(): string
    {
        return view('welcome_message');
    }

    public function profile($nama = "", $kelas = "", $npm = ""): string
    {
        
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm
        ];

        return view('profile', $data);
    }

}
