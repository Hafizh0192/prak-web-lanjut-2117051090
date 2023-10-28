<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\KelasModel;
use LDAP\Result;

class UserController extends BaseController
{
    public $userModel;
    public $kelasModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new KelasModel();
    }
    protected $helpers=['Form'];
    public function index(){
        $data = [
            'title' => "List User",
            'users' => $this->userModel->getUser(),
        ];
    return view('list_user', $data);
    }
    public function profile($nama = "", $kelas = "", $npm = ""){
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm,
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
            $path = 'assets/uploads/img/';
            $foto = $this->request->getFile('foto');
            $name = $foto->getRandomName();

            if($foto->move($path, $name)){
                $foto = base_url($path . $name);
            }

        $this->userModel->saveUser([
            'nama' => $this->request->getVar('nama'),
            'npm' => $this->request->getVar('npm'),
            'id_kelas' =>$this->request->getVar('kelas'),
            'foto' => $foto
        
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

	/**
	 * @return mixed
	 */
	public function getHelpers() {
		return $this->helpers;
	}
	
	/**
	 * @param mixed $helpers 
	 * @return self
	 */
	public function setHelpers($helpers): self {
		$this->helpers = $helpers;
		return $this;
	}

    public function show($id){
        $user = $this->userModel->getUser($id);
        $data = [
            'title' => 'Profile',
            'user'  => $user,
        ];
        return view('profile', $data);
    }

    public function edit($id){
        $user = $this->userModel->getUser($id);
        $kelas = $this->kelasModel->getKelas();
        $data = [
            'title' => 'Edit User',
            'user'  => $user,
            'kelas' => $kelas,
        ];
        return view('edit_user', $data);
    }
    public function update($id)
    {
        // Retrieve the existing user data
        $existingUser = $this->userModel->getUser($id);
    
        if (empty($existingUser)) {
            // Handle the case where the user doesn't exist
            return redirect()->back()->with('error', 'User not found.');
        }
    
        $path = 'assets/upload/img/';
        $foto = $this->request->getFile('foto');
    
        if ($foto) { // Check if a file was uploaded
            $name = $foto->getRandomName();
    
            if ($foto->move($path, $name)) {
                $foto = base_url($path . $name);
    
                // Update the user's data
                $this->userModel->updateUser($id, [
                    'nama' => $this->request->getVar('nama'),
                    'id_kelas' => $this->request->getVar('kelas'),
                    'npm' => $this->request->getVar('npm'),
                    'foto' => $foto
                ]);
    
                $data = [
                    'nama' => $this->request->getVar('nama'),
                    'kelas' => $this->request->getVar('kelas'),
                    'npm' => $this->request->getVar('npm'),
                ];
    
                return redirect()->to('/user')->with('success', 'User data updated successfully.');
            } else {
                // Log the error message to the console
                echo '<script>console.error("File upload failed.")</script>';
                return redirect()->back()->with('error', 'File upload failed.');
            }
        } else {
            // Handle the case where no file was uploaded.
            return redirect()->back()->with('error', 'No file uploaded.');
        }
    }
    
    

public function destroy($id)
{
    $result = $this->userModel->deleteUser($id);
    
    if (!$result) {
        return redirect()->back()->with('error', 'Failed to delete data');
    }
    
    return redirect()->to(base_url('/user'))->with('success', 'Data successfully deleted');
}
public function delete($id)
{
    $user = $this->userModel->getUser($id); // Retrieve the user data
    if (empty($user)) {
        return redirect()->to(base_url('/user'))->with('error', 'User not found.');
    }

    $result = $this->userModel->deleteUser($id);

    if ($result) {
        return redirect()->to(base_url('/user'))->with('success', 'User data deleted successfully.');
    } else {
        return redirect()->to(base_url('/user'))->with('error', 'Failed to delete user.');
    }
}

public function deleteUser($id)
{
    return $this->delete($id);
}

    public function getKelas($id_kelas){
        $user = $this->userModel->getUserKelas($id_kelas);
        $data = [
            'title' => 'Profile',
            'user'  => $user,
        ];
        return view('list_kelas', $data);
    }


}