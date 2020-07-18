<?php

namespace App\Controllers\AdminControllers;

use App\Controllers\BaseController;

class MedCatController extends BaseController
{
    /**
     * form validation
     */
    protected function validation(): bool
    {
        $rules = [
            'category' => 'required'
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
        $data['categorys'] = $this->db->query("SELECT * FROM medicine_category");
        echo view('admin/view_med_category', $data);
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
                $this->db->query("INSERT INTO medicine_category (name) VALUES ('" . $this->request->getVar('category') . "')");
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
        $query = $this->db->query("SELECT * FROM medicine_category WHERE category_id = '" . $id . "'");
        $data['category'] = $query->getRow();
        $data['categorys'] = $this->db->query("SELECT * FROM medicine_category");
        return view('admin/view_med_category', $data);
    }


    /**
     * Update data
     */
    public function update()
    {
        $id = $this->request->getVar('category_id');
        $category = $this->request->getVar('category');

        try {
            $this->db->query("UPDATE medicine_category SET name = '" . $category . "' WHERE category_id = '" . $id . "'");
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
            return redirect()->to('/admin/medicine-category');
        }

        return redirect()->to('/admin/medicine-category');
    }


    /**
     * remove user
     */
    public function destroy($id)
    {
        try {
            $this->db->query("DELETE FROM medicine_category WHERE category_id = '" . $id . "'");
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
