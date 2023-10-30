<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTableRequest;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tables = Table::all();
        return view('admin.tables.index',compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tables.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTableRequest $request)
    {
        $table = Table::create([
            'name' => $request->name,
            'guest_number' => $request->guest_number,
            'status' => $request->status,
            'location' => $request->location,
        ]);

        return to_route('admin.tables.index')->with('success','Table added successfully');
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
    public function edit(Table $table)
    {
        return view('admin.tables.edit',compact('table'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTableRequest $request, Table $table)
    {
        $table->update([
            'name' => $request->name,
            'guest_number' => $request->guest_number,
            'location' => $request->location,
            'status' => $request->status,
        ]);

        return to_route('admin.tables.index')->with('success','Table updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Table $table)
    {
        $table->reservations()->delete();
        $table->delete();
        return to_route('admin.tables.index')->with('danger','Table deleted successfully');
    }
}
