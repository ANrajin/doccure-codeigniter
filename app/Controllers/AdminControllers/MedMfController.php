<?php

namespace App\Controllers\AdminControllers;

use App\Controllers\BaseController;

class MedMfController extends BaseController
{
    /**
     * form validation
     */
    protected function validation(): bool
    {
        $rules = [
            'manufacturer' => 'required'
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
        $data['items'] = $this->db->query("SELECT * FROM `medicine_manufacturer`");
        echo view('admin/view_med_manufacturer', $data);
    }


    /**
     * Store newly created users
     */
    public function store()
    {
        if (!$this->validation()) {
            $this->index();
        } else {
            try {
                $this->db->query("INSERT INTO medicine_manufacturer (manufacturer) VALUES ('" . $this->request->getVar('manufacturer') . "')");
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
        $query = $this->db->query("SELECT * FROM medicine_manufacturer WHERE manufacturer_id = '" . $id . "'");
        $data['manufacturer'] = $query->getRow();
        $data['items'] = $this->db->query("SELECT * FROM medicine_manufacturer");
        return view('admin/view_med_manufacturer', $data);
    }


    /**
     * Update data
     */
    public function update()
    {
        $id = $this->request->getVar('manufacturer_id');
        $manufacturer = $this->request->getVar('manufacturer');

        try {
            $this->db->query("UPDATE medicine_manufacturer SET manufacturer = '" . $manufacturer . "' WHERE manufacturer_id = '" . $id . "'");
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
            return redirect()->to('/admin/medicine-manufacturer');
        }

        return redirect()->to('/admin/medicine-manufacturer');
    }


    /**
     * remove user
     */
    public function destroy($id)
    {
        try {
            $this->db->query("DELETE FROM medicine_manufacturer WHERE manufacturer_id = '" . $id . "'");
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
