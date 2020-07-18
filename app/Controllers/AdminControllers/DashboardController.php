<?php

namespace App\Controllers\AdminControllers;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        return view('admin/dashboard');
    }
}
