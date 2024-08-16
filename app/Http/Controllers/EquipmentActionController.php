<?php

namespace App\Http\Controllers;
use App\Models\People;
use App\Models\Equipment;
use App\Models\EquipmentAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EquipmentActionController extends Controller
{

    //add quantity action 
    // Show the add quantity form
        public function showAddForm($id)
        {
            $equipment = Equipment::findOrFail($id);
            $user = Auth::user();
            $currentDate = now()->toDateString(); // Default to today's date
            $operators = People::where('role', 'Operator')->get();

            return view('equipment.actions.add', compact('equipment', 'user', 'currentDate', 'operators'));
        }

    // Handle the addition of quantity
    public function addQuantity(Request $request, $id)
    {
        $equipment = Equipment::findOrFail($id);

        // Validate the input
        $validatedData = $request->validate([
            'date' => 'required|date',
            'quantity' => 'required|integer|min:1',
            'person' => 'nullable|string|max:255',
        ]);

        // Increase the quantity in stock
        $equipment->quantity_in_stock += $validatedData['quantity'];
        $equipment->save();

        // Save the transaction to report_in.blade.php view (this would be in a model, which needs to be defined)
        // Example: EquipmentTransaction::create([...]);

        return redirect()->route('equipment.actions.report_in')->with('success', 'Quantity added successfully.');
    }
    public function store(Request $request, $id)
    {
        // Validation
        $request->validate([
            'quantity' => 'required|integer|min:1',
            'person_id' => 'required|integer|exists:people,id',
        ]);
    
        // Find the equipment
        $equipment = Equipment::findOrFail($id);
    
        // Update quantity
        $equipment->quantity_in_stock += $request->input('quantity');
        $equipment->save();
    
        // Save the action (equipment brought in)
        EquipmentAction::create([
            'equipment_id' => $equipment->id,
            'person_id' => $request->input('person_id'),
            'user_id' => Auth::id(),
            'quantity_brought' => $request->input('quantity'),
            'date' => now()->toDateString(),
        ]);
    
        return redirect()->route('equipment.report_in')->with('success', 'Quantity added successfully');
    }

    // dispose action
    // Method to show the dispose form
public function showDisposeForm($id)
{
    $equipment = Equipment::findOrFail($id);
            $user = Auth::user();
            $currentDate = now()->toDateString(); // Default to today's date
    return view('equipment.actions.dispose', compact('equipment', 'currentDate'));
}

// Method to handle the disposal logic
public function disposeEquipment(Request $request, $id)
{
    $request->validate([
        'quantity' => 'required|integer|min:1|max:' . $request->input('quantity_in_stock'),
        'user_id' => 'required|exists:user,id',
    ]);

    $equipment = Equipment::findOrFail($id);
    $equipment->quantity_in_stock -= $request->input('quantity');
    $equipment->save();

    // Log the disposal action or store it in another table as needed

    return redirect()->route('equipment.disposed')->with('success', 'Equipment disposed successfully');
}
//returned
    public function returned()
    {
        $user = Auth::user();
        $equipment = Equipment::all();
        return view('equipment.actions.returned', compact('equipment', 'user'));
    }

    //taken_non_returnable
    public function taken_non_returnable()
    {
        $user = Auth::user();
        $equipment = Equipment::all();
        return view('equipment.actions.taken_non_returnable', compact('equipment', 'user'));
    }

   //repaired
public function repaired()
{
    $user = Auth::user();
    $equipment = Equipment::all();
    return view('equipment.actions.repaired', compact('equipment', 'user'));
} 

//disposed
public function disposed()
    {
        $user = Auth::user();
        $equipment = Equipment::all();
        return view('equipment.actions.disposed', compact('equipment', 'user'));
    }

    //general in
public function report_in()
{
    $user = Auth::user();
    $equipment = Equipment::all();
    return view('equipment.actions.report_in', compact('equipment', 'user'));
}

//general Out
public function report_out()
    {
        $user = Auth::user();
        $equipment = Equipment::all();
        return view('equipment.actions.report_out', compact('equipment', 'user'));
    }

//pending return
public function pending_return()
{
    $user = Auth::user();
    $equipment = Equipment::all();
    return view('equipment.actions.pending_return', compact('equipment', 'user'));
}

//pending repair
public function pending_repair()
{
    $user = Auth::user();
    $equipment = Equipment::all();
    return view('equipment.actions.pending_repair', compact('equipment', 'user'));
}

//Actions Performed
public function actions_performed()
{
    $user = Auth::user();
    $equipment = Equipment::all();
    return view('equipment.actions.actions_performed', compact('equipment', 'user'));
}

  //Functionalities that affect quantity in the database

  //Return
public function return()
{
    $user = Auth::user();
    $equipment = Equipment::all();
    return view('equipment.actions.return', compact('equipment', 'user'));
}

  //Repair
  public function repair()
  {
      $user = Auth::user();
      $equipment = Equipment::all();
      return view('equipment.actions.repair', compact('equipment', 'user'));
  }

//Reverse
public function reverse()
{
    $user = Auth::user();
    $equipment = Equipment::all();
    return view('equipment.actions.reverse', compact('equipment', 'user'));
}

//Give out
public function give()
{
    $user = Auth::user();
    $equipment = Equipment::all();
    return view('equipment.actions.give', compact('equipment', 'user'));
}

//Recommend for repair
public function recommend_for_repair()
{
    $user = Auth::user();
    $equipment = Equipment::all();
    return view('equipment.actions.recommend_for_repair', compact('equipment', 'user'));
}
//Dispose
public function dispose()
{
    $user = Auth::user();
    $equipment = Equipment::all();
    return view('equipment.actions.dispose', compact('equipment', 'user'));
}

}
