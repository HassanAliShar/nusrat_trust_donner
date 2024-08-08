<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WaqafqurbaniController extends Controller
{
    public function index()
    {
        return view('frontend.waqaf_qurbani'); // Ensure this view exists
    }
}
