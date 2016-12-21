<?php namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class SiteController extends AdminController
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function getIndex()
    {
        return view('admin.index');
    }
}
