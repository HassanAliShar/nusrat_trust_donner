<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Donor;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        try {
            // Get selected month or default to current month
            $selectedMonth = $request->input('month', Carbon::now()->format('m'));

            // Get donors who have not made a payment in the selected month
            $unpaidDonors = Donor::leftJoin('payments', function ($join) use ($selectedMonth) {
                $join->on('donors.id', '=', 'payments.donor_id')
                     ->where('payments.payment_month', '=', $selectedMonth);
            })
            ->whereNull('payments.donor_id')
            ->select('donors.*')
            ->get()
            ->map(function ($donor) {
                // Fetch unpaid months for each donor
                $donor->unpaidMonths = $this->getUnpaidMonths($donor->id);
                return $donor;
            });

            // Count donors who have made a payment in the selected month
            $paidDonorCount = Donor::join('payments', function ($join) use ($selectedMonth) {
                $join->on('donors.id', '=', 'payments.donor_id')
                     ->where('payments.payment_month', '=', $selectedMonth);
            })
            ->distinct()
            ->count('donors.id');

            // Count donors who have not made a payment in the selected month
            $unpaidDonorCount = Donor::leftJoin('payments', function ($join) use ($selectedMonth) {
                $join->on('donors.id', '=', 'payments.donor_id')
                     ->where('payments.payment_month', '=', $selectedMonth);
            })
            ->whereNull('payments.donor_id')
            ->distinct()
            ->count('donors.id');

            // Total number of donors
            $totalDonors = Donor::count();

            // Pass variables to the view
            return view("frontend.index", compact('unpaidDonors', 'paidDonorCount', 'unpaidDonorCount', 'totalDonors', 'selectedMonth'));
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
