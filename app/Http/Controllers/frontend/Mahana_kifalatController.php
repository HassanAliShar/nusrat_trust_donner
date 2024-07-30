<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Mahana_kifalatController extends Controller
{
    public function index()
    {
    return view("frontend.mahana_kifalat");
    }
}
