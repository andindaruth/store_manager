<?php

namespace App\Http\Controllers;
use App\Models\People;
use App\Models\Equipment;
use App\Models\EquipmentAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EquipmentController extends Controller
{   
    public function index()
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

    //returned
    public function returned()
    {
        $user = Auth::user();
        $equipment = Equipment::all();
        return view('equipment.returned', compact('equipment', 'user'));
    }

    //taken_non_returnable
    public function taken_non_returnable()
    {
        $user = Auth::user();
        $equipment = Equipment::all();
        return view('equipment.taken_non_returnable', compact('equipment', 'user'));
    }

   //repaired
public function repaired()
{
    $user = Auth::user();
    $equipment = Equipment::all();
    return view('equipment.repaired', compact('equipment', 'user'));
} 

//disposed
public function disposed()
    {
        $user = Auth::user();
        $equipment = Equipment::all();
        return view('equipment.disposed', compact('equipment', 'user'));
    }

    //general in
public function general_in()
{
    $user = Auth::user();
    $equipment = Equipment::all();
    return view('equipment.general_in', compact('equipment', 'user'));
}

//general Out
public function general()
    {
        $user = Auth::user();
        $equipment = Equipment::all();
        return view('equipment.general', compact('equipment', 'user'));
    }

//pending return
public function pending_return()
{
    $user = Auth::user();
    $equipment = Equipment::all();
    return view('equipment.pending_return', compact('equipment', 'user'));
}

//pending repair
public function pending_repair()
{
    $user = Auth::user();
    $equipment = Equipment::all();
    return view('equipment.pending_repair', compact('equipment', 'user'));
}

//Actions Performed
public function actions_performed()
{
    $user = Auth::user();
    $equipment = Equipment::all();
    return view('equipment.actions_performed', compact('equipment', 'user'));
}

  //Functionalities that affect quantity in the database

  //Return
public function return()
{
    $user = Auth::user();
    $equipment = Equipment::all();
    return view('equipment.return', compact('equipment', 'user'));
}

  //Repair
  public function repair()
  {
      $user = Auth::user();
      $equipment = Equipment::all();
      return view('equipment.repair', compact('equipment', 'user'));
  }

//Reverse
public function reverse()
{
    $user = Auth::user();
    $equipment = Equipment::all();
    return view('equipment.reverse', compact('equipment', 'user'));
}

//Give out
public function give()
{
    $user = Auth::user();
    $equipment = Equipment::all();
    return view('equipment.give', compact('equipment', 'user'));
}
//add
public function add()
{
    $user = Auth::user();
    $equipment = Equipment::all();
    return view('equipment.add', compact('equipment', 'user'));
}
//Recommend for repair
public function recommend_for_repair()
{
    $user = Auth::user();
    $equipment = Equipment::all();
    return view('equipment.recommend_for_repair', compact('equipment', 'user'));
}
//Dispose
public function dispose()
{
    $user = Auth::user();
    $equipment = Equipment::all();
    return view('equipment.dispose', compact('equipment', 'user'));
}

}
