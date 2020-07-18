<?php

namespace App\Controllers;

use App\Models\Admin\User;

class Home extends BaseController
{
	protected $user;

	function __construct()
	{
		$this->user = new User();
	}

	/**
	 * Defult view
	 */
	public function index()
	{
		if (!session()->get('isLoggedIn')) {
			return view('public/home');
		}
		return redirect()->back();
	}


	/**
	 * sign in page view
	 */
	public function login()
	{
		return view("public/login");
	}


	/**
	 * Sign up page
	 */
	public function register()
	{
		return view("public/register");
	}

	protected function authentication(): bool
	{
		$rules = [
			'email' => 'required|valid_email|useremail',
			'password' => 'required|userpassword'
		];

		if (!$this->validate($rules)) {
			return false;
		}

		return true;
	}


	protected function registerauth(): bool
	{
		$rules = [
			'name' => 'required',
			'email' => 'required|valid_email|emailexist',
			'mobile' => 'required',
			'password' => 'required|min_length[6]',
			'confirm' => 'required|matches[password]'
		];

		if (!$this->validate($rules)) {
			return false;
		}

		return true;
	}


	/**
	 * Authentication checking
	 */
	public function auth()
	{
		if (!$this->authentication()) {
			return view('public/login');
			die();
		}

		if (session()->get('userrole') === 'Doctor') {
			return redirect()->to("/doctor");
		} elseif (session()->get('userrole') === 'Patient') {
			return redirect()->to("/patient");
		}
	}


	/**
	 * register user
	 */
	public function authregister()
	{
		if (!$this->registerauth()) {
			$data['division'] = $this->db->query("SELECT * FROM division");
			return view('public/register', $data);
			die();
		}

		$data = [
			'role_id' => '7',
			'user_name' => $this->request->getVar('name'),
			'email' => $this->request->getVar('email'),
			'mobile' => $this->request->getVar('mobile'),
			'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
		];

		$this->user->insert($data);
		$id = $this->db->insertID();

		$query = $this->db->query("SELECT a.*, b.role FROM users a INNER JOIN roles b ON b.role_id = a.role_id WHERE user_id = '" . $id . "'");
		$role = $query->getRow();

		$userdata = [
			'id' => $id,
			'username' => $role->user_name,
			'userrole' => $role->role,
			'isLoggedIn' => TRUE
		];

		$this->session->set($userdata);
		return redirect()->to("/patient");
	}


	/**
	 * user logout 
	 */
	public function logout()
	{
		if (session()->get('isLoggedIn')) {
			$userdata = ['id', 'username', 'userrole', 'isLoggedIn'];
			session()->remove($userdata);
		}

		return redirect()->to('login');
	}


	/**
	 * Division
	 */
	public function division($id)
	{
		$query = $this->db->query("SELECT * FROM district WHERE division_id = '" . $id . "'");
		$district = $query->getResult();
		return json_encode($district);
	}
}
