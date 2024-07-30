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
            $currentMonths = Carbon::createFromFormat('m', $currentMonth)->toDateString();
            $donors = Donor::leftJoin('payments', function($join) use ($currentMonths) {
                $join->on('donors.id', '=', 'payments.donor_id')
                     ->where('payments.payment_month', '!=', $currentMonths);
            })
            ->whereNull('payments.id') // Ensure no payment for the current month
            ->select('donors.*')
            ->get();

            $paid_donner = Donor::join('payments', function($join) use ($currentMonth) {
                $join->on('donors.id', '=', 'payments.donor_id')
                     ->where('payments.payment_month', '=', $currentMonth);
            })
            ->distinct()
            ->count('donors.id');

            $unpaidDonorCount = Donor::leftJoin('payments', function($join) use ($currentMonth) {
                $join->on('donors.id', '=', 'payments.donor_id')
                     ->where('payments.payment_month', '=', $currentMonth);
            })
            ->whereNull('payments.donor_id') // Exclude donors who have made a payment in the current month
            ->distinct()
            ->count('donors.id');
            $unpaid_donner = $unpaidDonorCount;

            $total_donner = Donor::count();

            // dd($paid_donner);
            return view("frontend.food_help",compact('donors','paid_donner','unpaid_donner','total_donner'));
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
