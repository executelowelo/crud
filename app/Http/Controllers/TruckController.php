<?php

namespace App\Http\Controllers;

use App\Models\Truck;
use App\Models\TruckSubunit;
use Illuminate\Http\Request;

class TruckController extends Controller
{
    public function index()
    {
        $trucks = Truck::all();
        return view('trucks.index', compact('trucks'));
    }

    public function create()
    {
        return view('trucks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'unit_number' => 'required|unique:trucks',
            'year' => 'nullable|integer|min:1900|max:' . (date('Y') + 5),
            'notes' => 'nullable|string',
        ]);

        $truck = Truck::create([
            'unit_number' => $request->input('unit_number'),
            'year' => $request->input('year'),
            'notes' => $request->input('notes'),
        ]);

        return redirect()->route('trucks.index')->with('success', 'Truck created successfully');
    }

    public function show(Truck $truck)
    {
        $subunits = $truck->mainTruckSubunits;
        $trucks = Truck::where('id', '!=', $truck->id)->get();
    
        return view('trucks.show', compact('truck', 'subunits', 'trucks'));
    }
    
    public function edit(Truck $truck)
    {
        return view('trucks.edit', compact('truck'));
    }

    public function update(Request $request, Truck $truck)
    {
        $request->validate([
            'unit_number' => 'required|unique:trucks,unit_number,' . $truck->id,
            'year' => 'nullable|integer|min:1900|max:' . (date('Y') + 5),
            'notes' => 'nullable|string',
        ]);

        $truck->update([
            'unit_number' => $request->input('unit_number'),
            'year' => $request->input('year'),
            'notes' => $request->input('notes'),
        ]);

        return redirect()->route('trucks.index')->with('success', 'Truck updated successfully');
    }

    public function destroy(Truck $truck)
    {
        $truck->delete();

        return redirect()->route('trucks.index')->with('success', 'Truck deleted successfully');
    }

    public function subunits(Truck $truck)
    {
        $subunits = $truck->mainTruckSubunits;
        return view('trucks.subunits', compact('truck', 'subunits'));
    }

    public function addSubunit(Truck $truck)
    {
        $trucks = Truck::where('id', '!=', $truck->id)->get();
        return view('trucks.add_subunit', compact('truck', 'trucks'));
    }

    public function storeSubunit(Request $request, Truck $truck)
    {
        $request->validate([
            'subunit_id' => 'required|different:main_truck_id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $subunit = $truck->mainTruckSubunits()->create([
            'subunit_id' => $request->input('subunit_id'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
        ]);

        return redirect()->route('trucks.subunits', $truck->id)->with('success', 'Subunit added successfully');
    }
}
