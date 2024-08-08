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

            $food_help_donners = FoodHelp::with('donor')->get();
            // dd($food_help_donners);

            return view("frontend.pay_food", compact('food_help_donners'));
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
