<?php

namespace App\Controllers\AdminControllers;

use App\Controllers\BaseController;
use App\Helpers\Random;
use App\Helpers\VerificationEmail;
use App\Models\Admin\User;

class UserController extends BaseController
{
    protected $user;

    function __construct()
    {
        $this->user = new User();
    }


    /**
     * form validation
     */
    protected function validation(): bool
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|valid_email',
            'mobile' => 'required|numeric',
            'password' => 'required',
            'confirm_password' => 'required|matches[password]',
            'role' => 'required'
        ];

        if (!$this->validate($rules)) {
            return false;
        }

        return true;
    }


    /**
     * Default function
     */
    public function index()
    {
        $data['users'] = $this->db->query("SELECT users.*, roles.role FROM users INNER JOIN roles ON roles.role_id = users.role_id");
        $data['roles'] = $this->db->query("SELECT * FROM roles");
        echo view('admin/user_management', $data);
    }


    /**
     * Store newly created users
     */
    public function store()
    {
        if (!$this->validation()) {
            $this->index();
        } else {
            $code = Random::Alphabets(16);

            $data = [
                'role_id' => $this->request->getVar('role'),
                'user_name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'mobile' => $this->request->getVar('mobile'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'verification_code' => $code
            ];

            try {
                $this->user->insert($data);

                // Store the cipher method 
                $ciphering = "AES-128-CTR";

                $options = 0;

                // Non-NULL Initialization Vector for encryption 
                $encryption_iv = '1234567891011121';

                // Store the encryption key 
                $encryption_key = "akternashidrajin";

                // Use openssl_encrypt() function to encrypt the data 
                $encryption = openssl_encrypt(
                    $code,
                    $ciphering,
                    $encryption_key,
                    $options,
                    $encryption_iv
                );

                (new VerificationEmail)->mail($this->request->getVar('email'), base64_encode($encryption));

                $notification = [
                    'message' => 'Data successfully inserted',
                    'alert-type' => 'success'
                ];
                session()->setFlashdata($notification);
            } catch (\Exception $e) {
                $notification = [
                    'message' => $e->getMessage(),
                    'alert-type' => 'error'
                ];
                session()->setFlashdata($notification);
                return redirect()->back();
            }


            return redirect()->back();
        }
    }


    /**
     * Fetch data to edit
     */
    public function edit($id)
    {
        $data['user'] = $this->user->find($id);
        $data['users'] = $this->db->query("SELECT users.*, roles.role FROM users INNER JOIN roles ON roles.role_id = users.role_id");
        $data['roles'] = $this->db->query("SELECT * FROM roles");
        return view('admin/user_management', $data);
    }


    /**
     * Update data
     */
    public function update()
    {
        $id = $this->request->getVar('user_id');
        $data = [
            'role_id' => $this->request->getVar('role'),
            'user_name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'mobile' => $this->request->getVar('mobile'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
        ];

        try {
            $this->user->update($id, $data);
            $notification = [
                'message' => 'Data successfully updated',
                'alert-type' => 'success'
            ];
            session()->setFlashdata($notification);
        } catch (\Exception $e) {
            $notification = [
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            ];
            session()->setFlashdata($notification);
            return redirect()->to('/admin/manage-users');
        }

        return redirect()->to('/admin/manage-users');
    }


    /**
     * remove user
     */
    public function destroy($id)
    {
        try {
            $this->user->delete($id);
            $notification = [
                'message' => 'Data successfully deleted',
                'alert-type' => 'warning'
            ];
            session()->setFlashdata($notification);
        } catch (\Exception $e) {
            $notification = [
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            ];
            session()->setFlashdata($notification);
            return redirect()->back();
        }

        return redirect()->back();
    }
}
