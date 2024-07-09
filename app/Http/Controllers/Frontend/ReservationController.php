<?php

namespace App\Http\Controllers\frontend;

use Carbon\Carbon;
use App\Models\Table;
use App\Enums\TableStatus;
use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class ReservationController extends Controller
{
    public function reservations()
    {
        $reservations = auth()->user()->reservations()->orderBy('created_at', 'desc')->get();
        return view('reservations.reservations', compact('reservations'));
    }

    public function cancel(Reservation $reservation)
    {
        // Implement cancellation logic here, such as soft delete or status change
        $reservation->delete(); // Example: Soft delete (if using SoftDeletes)

        return redirect()->back()->with('success', 'Reservation canceled successfully.');
    }

    public function stepOne(Request $request)
    {
        if (!auth()->check()) 
        {
            return Redirect::guest('login')->with('error', 'You have to log in first!');

        }
        $reservation = $request->session()->get('reservation');
        $min_date = Carbon::now();
        $max_date = Carbon::now()->addWeek();
        return view('reservations.step_one',compact('reservation','min_date','max_date'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function storeStepOne(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'res_date' => ['required', 'date', new DateBetween, new TimeBetween],
            'tel_number' => ['required'],
            'guest_number' => ['required'],
        ]);

        if (empty($request->session()->get('reservation'))) {
            $reservation = new Reservation();
            $reservation->fill($validated);
            $request->session()->put('reservation', $reservation);
        } else {
            $reservation = $request->session()->get('reservation');
            $reservation->fill($validated);
            $request->session()->put('reservation', $reservation);
        }

        return to_route('reservations.step.two');
    }


    public function stepTwo(Request $request)
    {
        $reservation = $request->session()->get('reservation');
        $res_table_ids = Reservation::orderBy('res_date')->get()->filter(function ($value) use ($reservation) {
            return $value->res_date == $reservation->res_date;
        })->pluck('table_id');
        $tables = Table::where('status', TableStatus::Available)
            ->where('guest_number', '>=', $reservation->guest_number)
            ->whereNotIn('id', $res_table_ids)->get();
        return view('reservations.step_two', compact('reservation', 'tables'));
    }

    public function storeStepTwo(Request $request)
    {
        $validated = $request->validate([
            'table_id' => ['required']
        ]);
        $reservation = $request->session()->get('reservation');
        $reservation->fill($validated);

        $reservation->user_id = auth()->user()->id;
        $reservation->save();
        $request->session()->forget('reservation');

        return to_route('thankYou');
    }

    // public function reservations()
    // {
    //     return view('reservations.reservations');
    // }
}
