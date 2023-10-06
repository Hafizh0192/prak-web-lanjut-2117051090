<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\KelasModel;

class UserController extends BaseController
{
     public   $userModel ;
    public   $kelasModel ;
 
     public function __construct(){
    $this->userModel = new UserModel();
    $this->kelasModel = new KelasModel();


     }
    public function index()
    {
        $data = [
            'title' => 'List User',
            'users' => $this->userModel->getUser(),
        ];
        return view('list_user', $data);
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
            // $kelas = [
            //     [
            //         'id' => 1,
            //         'nama_kelas' => 'A'
            //     ],
           
        $kelasModel = new KelasModel();
        $kelas = $this->kelasModel->getKelas();

    //    // $data =[
    //         'kelas' => $kelas,
    //     ];
    //     return view('create_user', $data);

            if (session('validation') != null) {
                $validation = session('validation');
            } else {
                $validation = \Config\Services::validation();
            }
    
             $data = [
                'kelas' => $kelas,
                'validation' => $validation,
                'title' => 'Create User',
                
            ];

        return view('create_user', $data);
    }

    public function store(){
        // $data = [
        //     'nama' => $this->request->getVar('nama'),
        //     'kelas' => $this->request->getVar('kelas'),
        //     'npm' => $this->request->getVar('npm'),
        // ];

            if(!$this->validate([
                'nama' => 'required',
                'npm' => 'required|is_unique[user.npm]',
           ])) {
               $validation = \Config\Services::validation();
               return redirect()->to('/user/create')->withInput()->with('validation', $validation);
           }


        // $nama = $this->request->getPost('nama');
        // $npm = $this->request->getPost('npm');
        // $kelas = $this->request->getPost('kelas');

        // $data=[
        //     'nama' => $nama,
        //     'npm' => $npm,
        //     'id_kelas' => $kelas
        // ];

        $this->userModel->saveUser([
            'nama' => $this->request->getVar('nama'),
            'npm' => $this->request->getVar('npm'),
            'id_kelas' =>$this->request->getVar('kelas'),
        ]);
    return redirect()->to('/user');
        // $data_new=[
        //     'nama' => $nama,
        //     'npm' => $npm,
        //     'id_kelas' => $kelasModel->find($kelas)['nama_kelas']
        // ];

        // return view('profile', $data_new);
    
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