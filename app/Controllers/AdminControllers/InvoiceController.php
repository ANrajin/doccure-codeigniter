<?php

namespace App\Controllers\AdminControllers;

use App\Controllers\BaseController;

class InvoiceController extends BaseController
{
    public function index()
    {
        $data['doctors'] = $this->db->query("SELECT * FROM doctor");
        return view("admin/view_invoice", $data);
    }


    public function getInfo($id)
    {
        $query = $this->db->query("SELECT a.*, b.first_name, b.last_name, c.payment FROM appointment a INNER JOIN doctor b ON b.user_id = a.doctor_id INNER JOIN payment c ON c.doctor_id = a.doctor_id WHERE a.appt_id = '" . $id . "'");
        $data = $query->getRow();

        if ($data) {
            return json_encode($data);
        } else {
            $return = array(
                'status' => 403,
                'message' => "No data found"
            );
            http_response_code(403);

            return json_encode($return);
        }
    }


    public function print($id)
    {
        $query = $this->db->query("SELECT a.*, b.patient_name, b.email, b.mobile, b.address, c.first_name, c.last_name, c.phone FROM prescriptions a INNER JOIN appointment b ON b.appt_id = a.appt_id INNER JOIN doctor c ON c.user_id = a.doctor_id WHERE a.id = '" . $id . "'");
        $data['data'] = $query->getRow();
        $data['medicines'] = $this->db->query("SELECT * FROM presc_details WHERE presc_id = '" . $id . "'");
        return view("admin/view_print_invoice", $data);
    }


    public function store()
    {
        $appt_id = $this->request->getVar("appt_id");
        $invoice_id = $this->request->getVar("inv_id");
        $doctor_id = $this->request->getVar("doctor");
        $payed_amount = $this->request->getVar("payed");
        $created_at = $this->request->getVar("inv_date");

        try {
            $this->db->query("INSERT INTO invoice (appt_id, invoice_id, doctor_id, payed_amount, created_at) VALUES ('$appt_id', '$invoice_id', '$doctor_id', '$payed_amount', '$created_at')");
            $id = $this->db->insertID();
            $sql = $this->db->query("SELECT a.*, b.patient_name, b.email, b.mobile, b.address, c.first_name, c.last_name, c.phone FROM invoice a INNER JOIN appointment b ON b.appt_id = a.appt_id INNER JOIN doctor c ON c.user_id = a.doctor_id WHERE a.id = '" . $id . "'");
            $data['invoice'] = $sql->getRow();
            return view("admin/print_invoice", $data);
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
