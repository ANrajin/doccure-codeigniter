<?php

namespace App\Controllers\AdminControllers;

use App\Controllers\BaseController;

class RolesController extends BaseController
{
    /**
     * form validation
     */
    protected function validation(): bool
    {
        $rules = [
            'role' => 'required'
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
        $data['roles'] = $this->db->query("SELECT * FROM roles");
        echo view('admin/role_management', $data);
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
                $this->db->query("INSERT INTO roles (role) VALUES ('" . $this->request->getVar('role') . "')");
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
        $query = $this->db->query("SELECT * FROM roles WHERE role_id = '" . $id . "'");
        $data['role'] = $query->getRow();
        $data['roles'] = $this->db->query("SELECT * FROM roles");
        return view('admin/role_management', $data);
    }


    /**
     * Update data
     */
    public function update()
    {
        $id = $this->request->getVar('role_id');
        $role = $this->request->getVar('role');

        try {
            $this->db->query("UPDATE roles SET role = '" . $role . "' WHERE role_id = '" . $id . "'");
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
            return redirect()->to('/admin/user-roles');
        }

        return redirect()->to('/admin/user-roles');
    }


    /**
     * remove user
     */
    public function destroy($id)
    {
        try {
            $this->db->query("DELETE FROM roles WHERE role_id = '" . $id . "'");
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
