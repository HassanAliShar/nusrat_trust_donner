<?php

namespace App\Console\Commands;

use App\Http\Controllers\frontend\Food_helpController;
use App\Models\FoodHelp;
use Illuminate\Console\Command;

class SendMonthlySms extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms:send-monthly-food-help';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sms monthly food help command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $food_help_controller = new Food_helpController();
        $food_help_controller->send_sms_to_food_help_donors();
        $food_help_controller->send_sms_to_mahana_kifalat_donors();
    }
}
