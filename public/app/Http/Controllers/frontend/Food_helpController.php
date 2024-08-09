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
    public function index(Request $request)
    {
        try {
            // Get the selected month or default to the current month
            $selectedMonth = $request->input('month', Carbon::now()->format('m'));

            // Retrieve donors who haven't made a payment in the selected month
            $donors = Donor::leftJoin('payments', function($join) use ($selectedMonth) {
                $join->on('donors.id', '=', 'payments.donor_id')
                     ->where('payments.payment_month', '=', $selectedMonth);
            })
            ->whereNull('payments.id') // Ensure no payment for the selected month
            ->select('donors.*')
            ->get();

            // Count the number of donors who have made a payment in the selected month
            $paid_donner = Donor::join('payments', function($join) use ($selectedMonth) {
                $join->on('donors.id', '=', 'payments.donor_id')
                     ->where('payments.payment_month', '=', $selectedMonth);
            })
            ->distinct()
            ->count('donors.id');

            // Count the number of donors who haven't made a payment in the selected month
            $unpaidDonorCount = Donor::leftJoin('payments', function($join) use ($selectedMonth) {
                $join->on('donors.id', '=', 'payments.donor_id')
                     ->where('payments.payment_month', '=', $selectedMonth);
            })
            ->whereNull('payments.donor_id') // Exclude donors who have made a payment in the selected month
            ->distinct()
            ->count('donors.id');

            $unpaid_donner = $unpaidDonorCount;
            $total_donner = Donor::count();

            return view("frontend.food_help", compact('donors', 'paid_donner', 'unpaid_donner', 'total_donner', 'selectedMonth'));
        } catch (Exception $e) {
            return redirect()->back()->with('message', 'Something went wrong');
        }
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
            'name' => 'required',
            'contact_no' => 'required'

        ]
    );
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
            'amount' => 'required',
        ]);
        try {
            // check validation here
            foreach ($request->months as $key => $value) {
                Payment::create([
                    'recept_no' => $request->recept_no,
                    'payment_month' => $value,
                    'payment_date' => $request->payment_date,
                    'amount'    => $request->amount,
                    'donor_id' => $request->donor_id
                ]);
            }
            return redirect()->back()->with('message', 'Payment Added Successfully');
        } catch (Exception $th) {
            return $th;
            // return redirect()->back()->with('message', 'Something went wrong');
        }
    }

    public function payments($id){
        $payments = Payment::where('donor_id',$id)->get();
        dd($payments);
    }
    public function update(Request $request){
        $donors = Donor::find($request->id);
        $donors->name = $request->name;
        $donors->contact_no= $request->contact_no;
        $donors->update();
        return redirect()->back()->with('message', 'Update  Successfully');
        }
}
