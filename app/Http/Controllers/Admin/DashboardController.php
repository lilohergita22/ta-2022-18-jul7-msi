<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //
    public function users()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function viewuser($id)
    // this time we'll be passing a id ($id) over here
    {
        $users = User::find($id);
        return view('admin.users.view', compact('users'));
    }
}
