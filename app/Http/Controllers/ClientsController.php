<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index(){
        $clients = User::latest()->paginate(5);
        return view('dashboard',compact('clients'));
    }
}
