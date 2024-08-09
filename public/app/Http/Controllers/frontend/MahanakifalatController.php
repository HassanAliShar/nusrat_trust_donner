<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Mahanakifalat;
use Illuminate\Http\Request;

class MahanakifalatController extends Controller
{
    public function index()
    {
        $mahana_kifalat = Mahanakifalat::with('donor')->get();
        $totalDonors = $mahana_kifalat->count(); // Count the total number of donors
        return view('frontend.mahana_kifalat', compact('mahana_kifalat', 'totalDonors'));
    }

    public function mahanastor(Request $request)
    {
        $data = new Mahanakifalat;
        $data->famliy = $request->input('famliy');
        $data->name = $request->input('name');
        $data->contact_no = $request->input('contact_no');
        $data->save();
        return redirect()->back()->with('message', 'Donor Added Successfully');
    }

    public function showMahanaKifalat()
    {
        $mahanaKifalats = Mahanakifalat::all(); // Retrieve all records
        $totalDonors = $mahanaKifalats->count(); // Count the total number of donors
        return view('frontend.mahana_kifalat', compact('mahanaKifalats', 'totalDonors'));
    }
}
