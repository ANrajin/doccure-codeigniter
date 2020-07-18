<?php

namespace App\Controllers\AdminControllers;

use App\Controllers\BaseController;

class DoctorPaymentController extends BaseController
{
    /**
     * form validation
     */
    protected function validation(): bool
    {
        $rules = [
            'doctor' => 'required',
            'payment' => 'required'
        ];

        if (!$this->validate($rules)) {
            return false;
        }

        return true;
    }


    public function index()
    {
        $data['doctors'] = $this->db->query("SELECT * FROM doctor");
        $data['payments'] = $this->db->query("SELECT a.*, b.first_name, b.last_name FROM payment a INNER JOIN doctor b ON b.user_id = a.doctor_id");
        return view('admin/view_DoctorPayment', $data);
    }


    public function store()
    {
        if (!$this->validation()) {
            $this->index();
        } else {
            try {
                $this->db->query("INSERT INTO payment (doctor_id, payment) VALUES ('" . $this->request->getVar('doctor') . "', '" . $this->request->getVar('payment') . "')");
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


    public function edit($id)
    {
        $query = $this->db->query("SELECT * FROM payment WHERE id = '" . $id . "'");
        $data['payment'] = $query->getRow();
        $data['doctors'] = $this->db->query("SELECT * FROM doctor");
        $data['payments'] = $this->db->query("SELECT a.*, b.first_name, b.last_name FROM payment a INNER JOIN doctor b ON b.user_id = a.doctor_id");
        return view('admin/view_DoctorPayment', $data);
    }


    public function update()
    {
        if (!$this->validation()) {
            $this->index();
        } else {

            $id = $this->request->getVar("payment_id");
            $doctor_id = $this->request->getVar("doctor");
            $payment = $this->request->getVar("payment");

            try {
                $this->db->query("UPDATE payment SET doctor_id = '" . $doctor_id . "', payment = '" . $payment . "' WHERE id = '" . $id . "'");
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
                return redirect()->to('/admin/doctors-payment');
            }

            return redirect()->to('/admin/doctors-payment');
        }
    }


    public function destroy($id)
    {
        try {
            $this->db->query("DELETE FROM payment WHERE id = '" . $id . "'");
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
