<?php


namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'user' => 'Admin'
        ];
        return view('admin/dashboard/index', $data);
    }
}
