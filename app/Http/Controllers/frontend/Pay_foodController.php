<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Donor;
use App\Models\FoodHelp;
use App\Models\Payment;
use Carbon\Carbon;
use Exception;
class Pay_foodController extends Controller
{
    public function index(Request $request)
    {
        try {
            $currentMonth = Carbon::now()->format('Y-m'); // Format to 'YYYY-MM'

            // Get the IDs of donors who have made payments in the current month
            $paidDonorIds = Payment::where('payment_month', $currentMonth)
                ->where('type', 'food_help')
                ->pluck('donor_id')
                ->toArray(); // Convert to array for easier comparison

            // Fetch all food help donors
            $allDonors = FoodHelp::with('donor')->get();

            // Filter out donors who have paid for the current month
            $food_help_donners = $allDonors->filter(function ($foodHelp) use ($paidDonorIds) {
                return !in_array($foodHelp->donor_id, $paidDonorIds);
            });

            // Filter unpaid donors
            $unpaidDonors = $allDonors->filter(function ($foodHelp) use ($paidDonorIds) {
                return !in_array($foodHelp->donor_id, $paidDonorIds);
            });

            // Calculate totals
            $totalDonors = $allDonors->count();
            $totalUnpaidDonors = $unpaidDonors->count();
            $totalPaidDonors = $totalDonors - $totalUnpaidDonors;

            return view("frontend.pay_food", compact('food_help_donners', 'unpaidDonors', 'totalDonors', 'totalPaidDonors', 'totalUnpaidDonors'));
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
            'payment_date' => 'required|date',
            'amount' => 'required|numeric',
        ]);

        try {
            foreach ($request->months as $month) {
                // Check if a payment already exists for this donor for the same month
                $existingPayment = Payment::where('donor_id', $request->donor_id)
                    ->where('payment_month', $month)->where('type', $request->type ?? '')
                    ->first();

                if ($existingPayment) {
                    return redirect()->back()->with('message', 'Payment for this month already exists');
                }

                // Create new payment
                Payment::create([
                    'recept_no' => $request->recept_no,
                    'payment_month' => $month,
                    'payment_date' => $request->payment_date,
                    'amount' => $request->amount / count($request->months),
                    'type' => $request->type ?? '',
                    'donor_id' => $request->donor_id
                ]);
            }

            return redirect()->back()->with('message', 'Payment Added Successfully');
        } catch (Exception $th) {
            return redirect()->back()->with('message', 'Something went wrong');
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
