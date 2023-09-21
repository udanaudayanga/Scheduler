<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Slot;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Loads home page
     *
     * @return void
     */
    public function reserve()
    {
        return view('front.reserve');
    }

    /**
     * generates partial for reservations dynamically
     *
     * @param Request $request
     * @return void
     */
    public function getSlots(Request $request)
    {
        $date = $request->date;

        $slots = Slot::where('date','=',$date)->orderBy('time')->with('reservation')->get();

        $view = view('front.reserveslots', compact('slots'))->render();

        return response()->json(['view'=> $view]);
    }

    /**
     * Save reservations through ajax request
     *
     * @param Request $request
     * @return void
     */
    public function saveReservation(Request $request)
    {
        $user_id = config('scheduler.logged_in_user_id');
        $slot = Slot::find($request->id);

        if($request->status == 0)
        {
            $slot->reservation()->create([
                'user_id' => $user_id
            ]);
        }
        else
        {
            $slot->reservation()->delete();
        }

        return response()->json(['status'=> 'success']);
    }

    /**
     * loads saved reservations for my account page
     *
     * @return void
     */
    public function account()
    {
        $user_id = config('scheduler.logged_in_user_id');

        $reservations = Reservation::where('user_id',$user_id)->orderByDesc('created_at')->with('slot')->get();

        $reservs = [];

        foreach ($reservations as $reservation) 
        {
            $reservs[$reservation->slot->date][] = $reservation;
        }

        return view('front.account', compact('user_id', 'reservs'));
    }

    /**
     * My account delete reservations
     *
     * @param Request $request
     * @return void
     */
    public function delete(Request $request)
    {
        Reservation::destroy($request->id);

        return response()->json(['status' => 'success']);
    }    
}
