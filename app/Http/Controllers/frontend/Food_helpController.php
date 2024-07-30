<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Donor;
use App\Models\Payment;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class Food_helpController extends Controller
{
    public function index()
    {
        try{
            // show month number without 0 in front
            $currentMonth = Carbon::now()->format('m');
            // convert currentMonth in date to string
            $currentMonth = Carbon::createFromFormat('m', $currentMonth)->toDateString();
            $donors = Donor::leftJoin('payments', function($join) use ($currentMonth) {
                $join->on('donors.id', '=', 'payments.donor_id')
                     ->where('payments.payment_month', '!=', $currentMonth);
            })
            ->whereNull('payments.id') // Ensure no payment for the current month
            ->select('donors.*')
            ->get();
            return view("frontend.food_help",compact('donors'));
        }catch (Exception $e){
            return $e;
            return redirect()->back()->with('message', 'Something went wrong');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'contact_no' => 'required',
            'children' => 'required',
        ]);
        // check validation here
        if(Donor::create($request->all())){
            return redirect()->back()->with('message', 'Donor Added Successfully');
        }
        else{
            return redirect()->back()->with('message', 'Something went wrong');
        }
    }


    public function store_payments(Request $request)
    {
        $request->validate([
            'recept_no' => 'required',
            'months' => 'required|array',
            'payment_date' => 'required',
        ]);
        try {
            // check validation here
            foreach ($request->months as $key => $value) {
                Payment::create([
                    'recept_no' => $request->recept_no,
                    'payment_month' => $value,
                    'payment_date' => $request->payment_date,
                    'donor_id' => $request->donor_id
                ]);
            }
            return redirect()->back()->with('message', 'Payment Added Successfully');
        } catch (Exception $th) {
            return $th;
            // return redirect()->back()->with('message', 'Something went wrong');
        }
    }
}
