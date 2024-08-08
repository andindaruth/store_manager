<?php

namespace App\Http\Controllers;
use App\Models\People;
use App\Models\Equipment;
use App\Models\EquipmentAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EquipmentController extends Controller
{   
    public function Index()
    {      
        //dd($equipment);
        $equipment = Equipment::all();
        $user = Auth::user();
        return view('equipment.actions', compact('equipment', 'user'));
    }

    //create form
    public function create()
    {
        $user = Auth::user();
        return view('equipment.create', compact('user'));
    }

    // Store a new equipment in the database
    public function store(Request $request)
    {
        // Validate the input data from
        $validatedData = $request->validate([ 
            'name' => 'required|string|max:255',
            'image' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'category1' => 'required|string',
            'category2' => 'required|string',
            'category3' => 'required|string',
            'quantity_in_stock' => 'required|integer',
        ]);

        // Create a new Equipment
        $equipment = new Equipment();
        $equipment->fill($validatedData);
        $equipment->save();
        return redirect()->route('equipment.actions')->with('success', 'Equipment created successfully.');
    }

    //Edit an Equipment
    public function edit(Equipement $equipment)
    {
        $user = Auth::user();
        return view('equipment.edit', compact('user', 'equipment'));
    }
//update the equipment
    public function update(Request $request, Equipment $equipment)
    {
        // Validate the input data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'category1' => 'required|string',
            'category2' => 'required|string',
            'category3' => 'required|string',
            'quantity_in_stock' => 'required|integer',
        ]);

        // Update the equipment with the validated data
        $equipment->update($validatedData);

        return redirect()->route('equipment.actions')->with('success', 'equipment Updated successfully.');
        }

    // Display all equipment
    public function item()
    {
        $user = Auth::user();
        $equipment = Equipment::all(); 
        return view('equipment.item', compact('equipment', 'user'));
    }

    public function tool()
    {
        $user = Auth::user();
        $equipment = Equipment::all();
        return view('equipment.tool', compact('equipment', 'user'));
    }

    public function spare_part()
    {
        $user = Auth::user();
        $equipment = Equipment::all();
        return view('equipment.spare_part', compact('equipment', 'user'));
    }

    public function farm()
    {
        $user = Auth::user();
        $equipment = Equipment::all();
        return view('equipment.farm', compact('equipment', 'user'));
    }
    
    public function workshop()
    {
        $user = Auth::user();
        $equipment = Equipment::all();
        return view('equipment.workshop', compact('equipment', 'user'));
    }

}
