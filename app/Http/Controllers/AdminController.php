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

    /**
     * Retrieves and returns an instance of the Admin model
     * based on the given ID.
     *
     * @param string $id The ID of the Admin to retrieve
     * 
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If no Admin is found with the given ID
     * 
     * @return \App\Models\Admin The retrieved Admin instance
     */
    public function show(string $id){

        $admin = Admin::findOrFail($id);
        return $admin;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request The HTTP request object.
     * @return Admin The newly created admin object.
     */
    public function store(Request $request)
    {
        $admin = Admin::create($request->all());
        return $admin;
    }
}
