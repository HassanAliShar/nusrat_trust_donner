<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Donor;
use App\Models\FoodHelp;
use App\Models\Mahanakifalat;
use App\Models\Payment;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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

    public function custom_sms_donors(Request $request)
    {
        $donors = Donor::all();
        foreach ($donors as $donor) {
            if($donor->contact_no != null){
                $phone =  substr($donor->contact_no ?? '03062882501', 1);
                $phone = '+92'.$phone;
                $message = "\nHello ".$donor->name." ".$request->message;
                $this->send_sms($phone, $donor, $message);
            }
        }
        return redirect()->back()->with('message', 'SMS Sent Successfully');
    }

    public function send_sms_to_food_help_donors(){
        $donors = FoodHelp::with('donor')->get();
        foreach ($donors as $donor) {
            if($donor->donor->contact_no != null){
                $phone =  substr($donor->donor->contact_no ?? '03062882501', 1);
                $phone = '+92'.$phone;
                $message = "Assalam Alaikum ".$donor->donor->name." This is message from nusrat Truest you are supporting ".$donor->children ." children . donation for food help this is start of month please donate now. Thank you";
                $this->send_sms($phone, $donor, $message);
            }
        }
        return redirect()->back()->with('message', 'SMS Sent Successfully');
    }

    public function send_sms_to_mahana_kifalat_donors(){
        $donors = Mahanakifalat::with('donor')->get();
        foreach ($donors as $donor) {
            if($donor->donor->contact_no != null){
                $phone =  substr($donor->donor->contact_no ?? '03062882501', 1);
                $phone = '+92'.$phone;
                $message = "Assalam Alaikum ".$donor->donor->name." This is message from nusrat Truest you are supporting ".$donor->families ." families. donation for mahana kifalat this is start of month please donate now Thank you";
                $this->send_sms($phone, $donor, $message);
            }
        }
        return redirect()->back()->with('message', 'SMS Sent Successfully');
    }

    public function send_sms($phone, $donor, $message)
    {
        $text_message = $message;
        $response = Http::withHeaders([''
        ])->post('https://api.veevotech.com/v3/sendsms', [
            "hash" => "dc848e0df14865701af756e424bed084",
            "receivernum" => $phone,
            "medium" => 1,
            "sendernum" => "Default",
            "header" => '',
            "textmessage" => $text_message
        ]);
    }
}
