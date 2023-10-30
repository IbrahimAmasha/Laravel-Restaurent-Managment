<?php

namespace App\Http\Controllers;

use App\Enums\TableStatus;
use App\Http\Requests\StoreReservationRequest;
use App\Models\Table;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.reservations.index',compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tables = Table::where('status',TableStatus::Available)->get();
        return view('admin.reservations.create',compact('tables'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservationRequest $request)
    {
        $table = Table::find($request->table_id);
        if ($request->guest_number > $table->guest_number) 
        {
            return redirect()->back()->with('warning','Choose A table with at least '. $request->guest_number. ' guests' );
        }
        
        $request_date = Carbon::parse($request->res_date);
        foreach ($table->reservations as $res) {
            if ((Carbon::parse($res->res_date))->format('Y-m-d') == $request_date->format('Y-m-d')) {
                return back()->with('warning', 'This table is reserved for this date.');
            }
        }

         return to_route('admin.reservations.index')->with('success','Reservation added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        $tables = Table::all();
        return view('admin.reservations.edit',compact('reservation','tables'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreReservationRequest $request,Reservation $reservation )
    {
        $reservation->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'tel_number' => $request->tel_number,
            'guest_number' => $request->guest_number,
            'res_date' => $request->res_date,
            'table_id' => $request->table_id,
        ]);
        return to_route('admin.reservations.index')->with('success','Reservation Updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return to_route('admin.reservations.index')->with('danger','Reservation deleted successfully');

    }
}
