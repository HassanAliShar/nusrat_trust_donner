<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Donor;
use Illuminate\Http\Request;

class Fhs_viewController extends Controller
{
    public function index()
    {
        $donors = Donor::all();
        return view("frontend.fhs_view",compact('donors'));
    }
}
