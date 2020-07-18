<?php

namespace App\Controllers\UserControllers;

use App\Controllers\BaseController;
use Exception;

class PresController extends BaseController
{
    public function index()
    {
        return view("public/doctors/prescription");
    }


    /**
     * store newly created prescriptions
     */
    public function store()
    {
        $data = [
            'unique_id' => $this->request->getVar('presc_id'),
            'appt_id' => $this->request->getVar('appt_id'),
            'doctor_id' => session()->get('id'),
            'complains' => $this->request->getVar('complains'),
            'test_notes' => $this->request->getVar('tests'),
            'notes' => $this->request->getVar('advise'),
            'created_at' => $this->request->getVar('date')

        ];
        $med = $this->request->getVar('med');
        $dose = $this->request->getVar('dose');
        $time = $this->request->getVar('time');
        $days = $this->request->getVar('day');
        $note = $this->request->getVar('note');

        try {
            $table = $this->db->table('prescriptions');
            $table->insert($data);
            $id = $this->db->insertID();

            for ($i = 0; $i < sizeof($med); $i++) {
                $items = [
                    'presc_id' => $id,
                    'drug' => $med[$i],
                    'dosage' => $dose[$i],
                    'instructions' => $time[$i],
                    'days' => $days[$i],
                    'suggestions' => $note[$i]
                ];

                $table = $this->db->table('presc_details');
                $table->insert($items);
            }

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


    /**
     * fetch appointment information
     */
    public function apptInfo($id)
    {
        $query = $this->db->query("SELECT * FROM appointment WHERE appt_id = '" . $id . "'");
        $data = $query->getRow();

        return json_encode($data);
    }


    /**
     * view prescriptions
     */
    public function prescList()
    {
        $id = session()->get('id');
        $data['prescriptions'] = $this->db->query("SELECT a.*, b.first_name FROM prescriptions a INNER JOIN doctor b ON b.user_id = a.doctor_id WHERE a.doctor_id = '" . $id . "' ORDER BY a.id DESC");
        return view("public/doctors/prescriptionList", $data);
    }


    /**
     * get Medicines
     */
    public function getMed()
    {
        $query = $this->db->query("SELECT * FROM medicine");
        $medicines = $query->getResult();

        return json_encode($medicines);
    }
}
