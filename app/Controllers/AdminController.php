<?php

namespace App\Controllers;

class AdminController extends BaseController
{
    /**
     * default admin login page
     */
    public function index()
    {
        return view('admin/login');
    }

    /**
     * Admin Authentication
     */
    public function auth()
    {
        $rules = [
            'email' => 'required|valid_email|adminemail',
            'password' => 'required|adminpassword'
        ];

        if (!$this->validate($rules)) {
            return view('admin/login');
            die();
        }

        return redirect()->to('admin/dashboard');
    }


    /**
     * Admin logout 
     */
    public function logout()
    {
        if (session()->get('isLoggedIn')) {
            $userdata = ['id', 'username', 'isLoggedIn'];
            session()->remove($userdata);
        }

        return redirect()->to('/');
    }
}
