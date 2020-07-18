<?php

namespace App\Controllers\AdminControllers;

use App\Controllers\BaseController;

class MedicineController extends BaseController
{
    /**
     * form validation
     */
    protected function validation(): bool
    {
        $rules = [
            'name' => 'required'
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
        $data['medicines'] = $this->db->query("
        SELECT a.*, b.name, c.manufacturer 
        FROM medicine a
        INNER JOIN medicine_category b ON b.category_id = a.category_id 
        INNER JOIN medicine_manufacturer c ON c.manufacturer_id = a.company_id 
        ");
        $data['categories'] = $this->db->query("SELECT * FROM medicine_category");
        $data['manufacturers'] = $this->db->query("SELECT * FROM medicine_manufacturer");
        echo view('admin/view_medicines', $data);
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
                $this->db->query("INSERT INTO medicine (medicine, category_id, company_id) 
                VALUES ('" . $this->request->getVar('name') . "', '" . $this->request->getVar('category') . "', '" . $this->request->getVar('manufacturer') . "')");
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
        $query = $this->db->query("SELECT * FROM medicine WHERE med_id = '" . $id . "'");
        $data['medicine'] = $query->getRow();
        $data['medicines'] = $this->db->query("
        SELECT a.*, b.name, c.manufacturer 
        FROM medicine a
        INNER JOIN medicine_category b ON b.category_id = a.category_id 
        INNER JOIN medicine_manufacturer c ON c.manufacturer_id = a.company_id 
        ");
        $data['categories'] = $this->db->query("SELECT * FROM medicine_category");
        $data['manufacturers'] = $this->db->query("SELECT * FROM medicine_manufacturer");
        return view('admin/view_medicines', $data);
    }


    /**
     * Update data
     */
    public function update()
    {
        $id = $this->request->getVar('medicine_id');
        $name = $this->request->getVar('name');
        $category = $this->request->getVar('category');
        $manufacturer = $this->request->getVar('manufacturer');

        try {
            $this->db->query("UPDATE medicine SET medicine = '" . $name . "', category_id = '" . $category . "', company_id = '" . $manufacturer . "' WHERE med_id = '" . $id . "'");
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
            return redirect()->to('/admin/medicines');
        }

        return redirect()->to('/admin/medicines');
    }


    /**
     * remove user
     */
    public function destroy($id)
    {
        try {
            $this->db->query("DELETE FROM medicine WHERE med_id = '" . $id . "'");
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
