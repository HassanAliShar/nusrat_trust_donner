<?php

namespace App\Http\Controllers;

use App\Models\FoodHelp;
use App\Models\Mahanakifalat;
use Illuminate\Http\Request;

class DonorController extends Controller
{
    public function index()
    {
        return view("frontend.donors");
    }

    public function donor_category(Request $request){
        // dd($request->all());
        if($request->category == "kefalat")
        {
            $kefalat = new Mahanakifalat();
            $kefalat->families = $request->category_type;
            $kefalat->donor_id = $request->donor_id;
            $kefalat->save();
        }
        else{
            $food = new FoodHelp();
            $food->children = $request->category_type;
            $food->donor_id = $request->donor_id;
            $food->save();
        }
        return redirect()->back()->with('message', 'Donor Category Added Successfully');
    }
}
