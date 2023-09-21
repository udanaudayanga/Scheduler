<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slot;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Loads admin home page
     *
     * @return void
     */
    public function scheduler()
    {
        return view('admin.scheduler');
    }

    /**
     * check slot availability for date
     *
     * @param Request $request
     * @return void
     */
    public function check(Request $request)
    {   
        $date = $request->date;
        $slots = $this->getSlots($date);

        $view = view('admin.createslots', compact('slots','date'))->render();

        return response()->json(['view'=> $view]);
    }

    /**
     * get slots for date
     *
     * @param [type] $date
     * @return void
     */
    private function getSlots($date)
    {  
        $exists = Slot::whereDate('date','=', $date)->pluck('time')->toArray();

        $times = config('scheduler.slots');   

        $slots = [];
        foreach($times as $time)
        {
            if(in_array($time.':00', $exists))
            {
                $slots[$time] = 1;
            }
            else
            {
                $slots[$time] = 0;
            }
        }

        return $slots;
    }
   
    /**
     * create available slots
     *
     * @param Request $request
     * @return void
     */
    public function create(Request $request)
    {
        $times = config('scheduler.slots');   
        $date = $request->date;
        $slots = $request->slots;

        foreach($times as $time)
        {
            if(in_array($time, $slots))
            {
                $slot = Slot::where('date',$date)->where('time',$time.':00')->first();
                
                if(!$slot)
                {
                    Slot::create(['date'=>$date, 'time'=>$time.':00']);
                }
            }
            else
            {
                Slot::where('date',$date)->where('time',$time.':00')->delete();
            }
        }

        return response()->json(['status'=> 'success']);
    }
}
