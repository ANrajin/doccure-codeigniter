<?php

namespace App\Controllers\UserControllers;

use App\Controllers\BaseController;
use App\Models\Doctor;

class DashboardController extends BaseController
{
    protected $doctor;

    function __construct()
    {
        $this->doctor = new Doctor();
    }


    public function index()
    {
        return view('public/doctors/dashboard');
    }


    //verification
    public function verify($id)
    {
        $code = base64_decode($id);
        $ciphering = "AES-128-CTR";
        $key = "akternashidrajin";
        $options = 0;
        $decryption_iv = '1234567891011121';
        $decryption = openssl_decrypt(
            $code,
            $ciphering,
            $key,
            $options,
            $decryption_iv
        );

        $this->db->query("UPDATE users SET status = 'verified' WHERE verification_code = '" . $decryption . "'");

        if (session()->get('isLoggedIn') && session()->get('userrole') == 'Doctor') {

            $this->session->set('status', 'verified');
            $notification = [
                'message' => 'Successfully verified your account',
                'alert-type' => 'success'
            ];
            session()->setFlashdata($notification);
            return redirect()->to("/doctor");
        } else {
            $notification = [
                'message' => 'Successfully verified. You can now login to your account',
                'alert-type' => 'success'
            ];
            session()->setFlashdata($notification);
            return redirect()->to("/login");
        }
    }


    /**
     * doctor Profile
     */
    public function profile()
    {
        $id = session()->get('id');
        $query = $this->db->query("SELECT a.*, b.* FROM users a INNER JOIN doctor b ON b.user_id = a.user_id WHERE a.user_id = '" . $id . "'");
        $data['profile'] = $query->getRow();
        $data['specializations'] = $this->db->query("SELECT * FROM speciality");
        $data['division'] = $this->db->query("SELECT * FROM division");
        return view("public/doctors/profile", $data);
    }


    protected function auth(): bool
    {
        $rules = [
            'fname' => 'required',
            'lname' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'pcode' => 'required',
            'division' => 'required',
            'district' => 'required',
        ];

        if (!$this->validate($rules)) {
            return false;
        }

        return true;
    }


    /**
     * Save Doctor Informations
     */
    public function store()
    {
        if (!$this->auth()) {
            return $this->profile();
            die();
        } else {
            $file = $this->request->getFile('image');
            $specializations = $this->request->getVar('speciality');

            $data = [
                'user_id' => session()->get('id'),
                'first_name' => $this->request->getVar('fname'),
                'last_name' => $this->request->getVar('lname'),
                'phone' => $this->request->getVar('phone'),
                'gender' => $this->request->getVar('gender'),
                'address' => $this->request->getVar('address'),
                'postal_code' => $this->request->getVar('pcode'),
                'division_id' => $this->request->getVar('division'),
                'district_id' => $this->request->getVar('district'),
                'image' => $file->getClientName()
            ];

            try {
                $this->doctor->insert($data);
                $id = $this->db->insertID();

                foreach ($specializations as $speciality) {
                    $this->db->query("INSERT INTO doctor_speciality (doctor_id, speciality_id) VALUES ('" . $id . "', '" . $speciality . "')");
                }

                //move file to images folder
                $file->move(ROOTPATH . 'public/images/', $file->getClientName());

                $notification = [
                    'message' => 'Data successfully inserted',
                    'alert-type' => 'success'
                ];
                session()->setFlashdata($notification);

                return redirect()->back();
            } catch (\Exception $e) {
                $notification = [
                    'message' => $e->getMessage(),
                    'alert-type' => 'error'
                ];
                session()->setFlashdata($notification);
                return redirect()->back();
            }
        }
    }
}
