<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Mahana_kifalatController extends Controller
class WaqafqurbaniController extends Controller
{
    public function index()
    {
    return view("frontend.mahana_kifalat");
        return view('frontend.waqaf_qurbani'); // Ensure this view exists
    }
}