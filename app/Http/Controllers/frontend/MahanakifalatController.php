<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Mahanakifalat;
use Illuminate\Http\Request;

class MahanakifalatController extends Controller
{
    public function index(){
        $mahana_kifalat = Mahanakifalat::with('donor')->get();
        // dd($mahana_kifalat);
        return view('frontend.mahana_kifalat',compact('mahana_kifalat'));
    }
    public function mahanastor(Request $request){


        $data = new Mahanakifalat;
        $data->famliy = $request->input('famliy');
        $data->name = $request->input('name');
        $data->contact_no = $request->input('contact_no');
        $data->name = $request->input('name');
        $data->save();
        return redirect()->back()->with('message', 'Donor Added Successfully');

    }
    public function showMahanaKifalat()
{
    $mahanaKifalats = MahanaKifalat::all(); // Retrieve all records

    return view('frontend.mahana_kifalat', compact('mahanaKifalats'));
}
}
