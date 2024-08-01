<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index($id)
    {
        $payments = Payment::where('donor_id',$id)->get();
        return view("frontend.view_details",compact('payments'));
    }
}
