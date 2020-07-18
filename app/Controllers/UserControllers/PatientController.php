<?php

namespace App\Controllers\UserControllers;

use App\Controllers\BaseController;

class PatientController extends BaseController
{
    public function index()
    {
        return view('public/patients/dashboard');
    }

    public function appointment()
    {
        $data['doctors'] = $this->db->query("SELECT * FROM doctor");
        $data['specialities'] = $this->db->query("SELECT a.*, b.speciality FROM doctor_speciality a INNER JOIN speciality b ON b.speciality_id = a.speciality_id");
        $data['schedules'] = $this->db->query("SELECT a.*, b.day FROM schedule a INNER JOIN days b ON b.day_id = a.day_id");
        return view("public/patients/appointment", $data);
    }
}
