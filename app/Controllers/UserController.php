<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\KelasModel;

class UserController extends BaseController
{
    public function index()
    {
        //
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


    public function create(){
            $kelas = [
                [
                    'id' => 1,
                    'nama_kelas' => 'A'
                ],
    
                [
                    'id' => 2,
                    'nama_kelas' => 'B'
                ],
    
                [
                    'id' => 3,
                    'nama_kelas' => 'C'
                ],

                [
                    'id' => 4,
                    'nama_kelas' => 'D'
                ],

            ];

            if (session('validation') != null) {
                $validation = session('validation');
            } else {
                $validation = \Config\Services::validation();
            }
    
             $data = [
                'kelas' => $kelas,
                'validation' => $validation,
            ];

        return view('create_user', $data);
    }

    public function store(){
        $data = [
            'nama' => $this->request->getVar('nama'),
            'kelas' => $this->request->getVar('kelas'),
            'npm' => $this->request->getVar('npm'),
        ];

            if(!$this->validate([
                'nama' => 'required',
                'npm' => 'required|is_unique[user.npm]',
           ])) {
               $validation = \Config\Services::validation();
               return redirect()->to('/user/create')->withInput()->with('validation', $validation);
           }

        $userModel = new UserModel();
        $kelasModel = new KelasModel();


        $nama = $this->request->getPost('nama');
        $npm = $this->request->getPost('npm');
        $kelas = $this->request->getPost('kelas');

        $data=[
            'nama' => $nama,
            'npm' => $npm,
            'id_kelas' => $kelas
        ];

        
        $userModel->saveUser($data);
        $data_new=[
            'nama' => $nama,
            'npm' => $npm,
            'id_kelas' => $kelasModel->find($kelas)['nama_kelas']
        ];

        return view('profile', $data_new);
    
        // $userModel = new UserModel();

        // $userModel->saveUser([
        //     'nama' => $this->request->getVar('nama'),
        //     'id_kelas' => $this->request->getVar('kelas'),
        //     'npm' => $this->request->getVar('npm'),
        // ]);

        // $data = [
        //     'nama' => $this->request->getVar('nama'),
        //     'kelas' => $this->request->getVar('kelas'),
        //     'npm' => $this->request->getVar('npm'),
        // ];
        // return view('profile', $data);
}
}