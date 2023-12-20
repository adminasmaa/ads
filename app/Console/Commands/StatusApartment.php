<?php

namespace App\Console\Commands;

use App\Models\Apartment\Apartment;
use App\Models\booking\Booking;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class StatusApartment extends Command
{
 
    protected $signature = 'status:apartment';

    protected $description = 'Command description';


    public function handle()
    {
        ////////////////////////make apartment available 
        Apartment::whereNot('status','maintain')->whereNot('status','clean')->update([
            'status'=>'available'
        ]);
        ///////////make apartment busy if has booking in this day
            $busyBokking=Booking::where('from', '<=', now()->format('Y-m-d'))->where('to', '>', now()->format('Y-m-d'))->pluck('apart_id');
            Apartment::whereIn('id',$busyBokking)->update([
                'status'=>'busy'
            ]);
        ///////////////make apartment leave_today if leave booking in this day
           $leaveBokking=Booking::where('to',now()->format('Y-m-d'))->pluck('apart_id');
              Apartment::whereIn('id',$leaveBokking)->update([
                'status'=>'leave_today'
            ]);
     

    }
}
