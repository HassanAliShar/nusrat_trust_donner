<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\FoodHelp;
use App\Models\Mahanakifalat;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MahanakifalatController extends Controller
{
    public function index()
    {
        $currentMonth = Carbon::now()->format('Y-m'); // Format to 'YYYY-MM'
        // dd($currentMonth);
            // Get the IDs of donors who have made payments in the current month
            $paidDonorIds = Payment::where('payment_month', $currentMonth)
                ->where('type', 'mahana_kifalat')
                ->pluck('donor_id')
                ->toArray(); // Convert to array for easier comparison

            // Fetch all food help donors
            $allDonors = FoodHelp::with('donor')->get();

            // Filter out donors who have paid for the current month
            $mahana_kifalat_donners = $allDonors->filter(function ($foodHelp) use ($paidDonorIds) {
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

            return view('frontend.mahana_kifalat', compact('mahana_kifalat_donners', 'unpaidDonors', 'totalDonors', 'totalPaidDonors', 'totalUnpaidDonors'));
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
