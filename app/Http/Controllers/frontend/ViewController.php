<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index($type, $id)
    {
        if($type == 'food_help'){
            $payments = Payment::where('donor_id',$id)->where('type','food_help')->get();
        }
        else{
            $payments = Payment::where('donor_id',$id)->where('type','mahana_kifalat')->get();
        }
        return view("frontend.view_details",compact('payments'));
    }
}
