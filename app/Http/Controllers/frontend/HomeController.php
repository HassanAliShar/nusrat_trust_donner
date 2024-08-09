<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Donor;
use App\Models\FoodHelp;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
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
            $totalDonorsCount = $allDonors->count();
            $unpaidDonors = $unpaidDonors->count();
            $totalPaidDonors = $totalDonorsCount - $unpaidDonors;

            // Pass variables to the view
            return view("frontend.index", compact('unpaidDonors', 'totalPaidDonors','totalDonorsCount', 'totalDonors'));
        } catch (\Exception $e) {
            // Log the exception for debugging
            \Log::error('Error in HomeController@index: '.$e->getMessage());

            // Redirect with a user-friendly message
            return redirect()->back()->with('message', 'Something went wrong. Please try again later.');
        }
    }

    // Define the getUnpaidMonths method
    private function getUnpaidMonths($donorId)
    {
        $allMonths = range(1, 12); // Array of all months (1 to 12)
        $paidMonths = Payment::where('donor_id', $donorId)
                             ->pluck('payment_month')
                             ->toArray();

        // Find unpaid months by excluding paid months from all months
        return array_diff($allMonths, $paidMonths);
    }
}
