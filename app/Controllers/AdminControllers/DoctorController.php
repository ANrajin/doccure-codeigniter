<?php

namespace App\Controllers\AdminControllers;

use App\Controllers\BaseController;

class DoctorController extends BaseController
{
    public function index()
    {
        $data['doctors'] = $this->db->query("SELECT * FROM doctor");
        return view("admin/view_doctors", $data);
    }


    public function prescriptions()
    {
        $query = $this->db->query("SELECT a.*, b.first_name, b.last_name, c.patient_name FROM prescriptions a INNER JOIN doctor b ON b.user_id = a.doctor_id INNER JOIN appointment c ON c.appt_id = a.appt_id");
        $data['prescriptions'] = $query->getResult();
        return view("admin/view_prescriptions", $data);
    }
}
