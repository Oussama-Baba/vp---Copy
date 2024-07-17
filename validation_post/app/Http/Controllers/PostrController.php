<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostrController extends Controller
{
    public function index(){

        return view('admincontent.table.post');
    }
}
