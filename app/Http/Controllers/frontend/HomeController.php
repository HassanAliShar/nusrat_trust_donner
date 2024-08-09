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
            $unpaidDonorsCount = $unpaidDonors->count();
            $totalPaidDonors = $totalDonorsCount - $unpaidDonorsCount;


            // Get the IDs of donors who have made payments in the current month
            $mpaidDonorIds = Payment::where('payment_month', $currentMonth)
                ->where('type', 'mahana_kifalat')
                ->pluck('donor_id')
                ->toArray(); // Convert to array for easier comparison

            // Fetch all food help donors
            $mallDonors = FoodHelp::with('donor')->get();

            // Filter out donors who have paid for the current month
            $mfood_help_donners = $mallDonors->filter(function ($foodHelp) use ($mpaidDonorIds) {
                return !in_array($foodHelp->donor_id, $mpaidDonorIds);
            });

            // Filter unpaid donors
            $munpaidDonors = $mallDonors->filter(function ($foodHelp) use ($mpaidDonorIds) {
                return !in_array($foodHelp->donor_id, $mpaidDonorIds);
            });

            // Calculate totals
            $mtotalDonorsCount = $mallDonors->count();
            $munpaidDonorsCount = $munpaidDonors->count();
            $mtotalPaidDonors = $mtotalDonorsCount - $munpaidDonorsCount;

            // Pass variables to the view
            return view("frontend.index", compact('unpaidDonors', 'totalPaidDonors','unpaidDonorsCount','totalDonorsCount', 'allDonors'));
        } catch (\Exception $e) {
            // Log the exception for debugging
            return $e->getMessage();
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
