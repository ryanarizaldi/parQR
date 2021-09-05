<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\M_user;

class Login extends BaseController
{
	public function index()
	{
		helper(['form']);
		return view('login/v_login');
	}

	public function loginAction()
	{
		$username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
		$session = session();
		$userModel = new M_user();

		$cekUser = $userModel->where('username', $username)->first();
		if ($cekUser) {
			$pass = $cekUser['password'];
            $verify_pass = password_verify($password, $pass);
			if ($verify_pass) {
				$ses_data = [
                    'id_user'       => $cekUser['id_user'],
                    'username'     => $cekUser['username'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->route('dashboard');
			} else {
				echo "password salah";
			}
		} else {
			echo 'user tidak ditemukan';
		}

	}


}
