<?php

namespace App\Controllers\UserControllers;

use App\Controllers\BaseController;

class ScheduleController extends BaseController
{
    /**
     * form validation
     */
    protected function validation(): bool
    {
        $rules = [
            'days' => 'required'
        ];

        if (!$this->validate($rules)) {
            return false;
        }

        return true;
    }


    public function index()
    {
        $doctor_id = session()->get("id");
        $data['days'] = $this->db->query("SELECT * FROM days");
        $data['schedules'] = $this->db->query("
        SELECT a.*, b.day 
        FROM schedule a 
        INNER JOIN days b
        ON b.day_id =  a.day_id 
        WHERE a.doctor_id = '" . $doctor_id . "'");

        return view("public/doctors/schedule", $data);
    }


    public function store()
    {
        if (!$this->validation()) {
            return $this->index();
        } else {
            $doctor_id = session()->get('id');
            $days = $this->request->getVar('days');
            $start = $this->request->getVar('start');
            $end = $this->request->getVar('end');

            try {
                foreach ($days as $day) {
                    $this->db->query("INSERT INTO schedule (doctor_id, day_id, s_time, e_time) VALUES ('" . $doctor_id . "', '" . $day . "', '" . $start . "', '" . $end . "')");
                }

                return redirect()->back();
            } catch (\Exception $e) {
                return redirect()->back();
            }
        }
    }
}
