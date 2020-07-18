<?php

namespace App\Controllers\AdminControllers;

use App\Controllers\BaseController;

class PatientController extends BaseController
{
    public function index()
    {
        return view("admin/view_patients");
    }
}
