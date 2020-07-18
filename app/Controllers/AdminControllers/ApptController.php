<?php

namespace App\Controllers\AdminControllers;

use App\Controllers\BaseController;

class ApptController extends BaseController
{
    public function __construct()
    {
    }

    public function index()
    {
        $data['doctors'] = $this->db->query("SELECT * FROM doctor");
        return view("admin/view_appointment", $data);
    }

    public function getSchedule($id)
    {
        $data = $this->db->query("SELECT a.*, b.* From schedule a INNER JOIN days b ON b.day_id = a.day_id WHERE doctor_id = '" . $id . "'");
        $schedule = $data->getResult();

        return json_encode($schedule);
    }

    public function store()
    {
        $data = [
            'appt_id' => $this->request->getVar('appt_id'),
            'doctor_id' => $this->request->getVar('doctor'),
            'patient_name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'mobile' => $this->request->getVar('mobile'),
            'address' => $this->request->getVar('address'),
            'appointment_date' => $this->request->getVar('appt_date'),
            'schedule' => $this->request->getVar('schedule'),
            'status' => $this->request->getVar('patient')
        ];

        try {
            $table = $this->db->table('appointment');
            $table->insert($data);

            $notification = [
                'message' => 'Data successfully added',
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


    /**
     * All appointments
     */
    public function apptList()
    {
        $data['apptLists'] = $this->db->query("
        SELECT a.*, b.first_name, b.last_name, c.*, d.*
        FROM appointment a 
        INNER JOIN doctor b 
        ON b.user_id = a.doctor_id 
        INNER JOIN schedule c
        ON c.schedule_id = a.schedule 
        INNER JOIN days d
        ON d.day_id = c.day_id
        ");
        return view("admin/view_apptLists", $data);
    }


    /**
     * remove appointment
     */
    public function destroyAppt($id)
    {
        $this->db->query("DELETE FROM appointment WHERE id = '" . $id . "'");

        $notification = [
            'message' => 'Data successfully deleted',
            'alert-type' => 'success'
        ];
        session()->setFlashdata($notification);
        return redirect()->back();
    }
}
