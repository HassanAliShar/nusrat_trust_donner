<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Donor; // Import the Donor model
use Carbon\Carbon; // Import Carbon
class PaidController extends Controller
{
    public function index(Request $request)
    {
        
        // Get the current month in YYYY-MM format
        $currentMonth = Carbon::now()->format('m');

        // Fetch the total count of donors who made payments for the current month
        $totalPaidDonors = Donor::join('payments', function($join) use ($currentMonth) {
            $join->on('donors.id', '=', 'payments.donor_id')
                 ->where('payments.payment_month', '=', $currentMonth);
        })
        ->distinct()
        ->count('donors.id');

        // Fetch the details of donors for the current month
        $paid_food = Donor::join('payments', function($join) use ($currentMonth) {
            $join->on('donors.id', '=', 'payments.donor_id')
                 ->where('payments.payment_month', '=', $currentMonth);
        })
        ->select('donors.name', 'donors.contact_no', 'donors.children', 'payments.payment_date', 'payments.recept_no', 'payments.amount')
        ->get();
        
        // Pass the result to the view
        return view("frontend.paid_food", compact('paid_food'));
    }
}