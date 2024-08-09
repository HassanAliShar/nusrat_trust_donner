<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Donor;

use App\Models\FoodHelp;
use Illuminate\Http\Request;

class Fhs_viewController extends Controller
{
    public function index()
    {
        $food_help_donners = FoodHelp::with('donor')->get();
        return view("frontend.fhs_view",compact('food_help_donners'));
    }
}
