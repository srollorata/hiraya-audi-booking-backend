<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        $admins = Admin::all();
        return view('admins.index', compact('admins'));
    }

    public function store(Request $request)
    {
        $admin = Admin::create($request->all());
        return redirect()->route('admins.index');
    }
}
