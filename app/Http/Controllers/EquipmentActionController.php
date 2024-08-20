<?php

namespace App\Http\Controllers;

use App\Models\People;
use App\Models\Equipment;
use Illuminate\Http\Request;
use App\Models\EquipmentAction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EquipmentActionController extends Controller
{

    //add quantity action 
    // Show the add quantity form
    public function showAddForm($id)
    {
        $equipment = Equipment::findOrFail($id);
        $user = Auth::user();
        $operators = People::where('role', 'Operator')->get();
       
        return view('equipment.actions.add', compact('equipment', 'user', 'operators'));
    }

    // Handle the addition of quantity
    public function addQuantity(Request $request)
    {
        // Validate the input data
        $validatedData = $request->validate([
            'type' => 'required|max:255',
            'date' => 'required|date',
            'quantity' => 'required|numeric|min:0',
            'user_id' => 'required|exists:users,id',
            'equipment_id' => 'required|exists:equipment,id',
            'person_id' => 'required|exists:people,id',
            'remarks' => 'nullable|max:255',
        ]);
        try {
            // Start a database transaction
            DB::beginTransaction();
            // Create a new transaction
            $action = new EquipmentAction();
            $action->fill($validatedData);
            $action->save();
            $equipment = Equipment::findOrFail($request->equipment_id);
            $equipment->quantity_in_stock += $request->quantity;
            $equipment->save();
            // Commit the database transaction
            DB::commit();

            return redirect()->route('equipment.actions')->with('success', 'Action Added successfully.');
        } catch (\Exception $e) {
            // If an exception occurs, rollback the database transaction
            DB::rollback();
            return back()->withInput()->with('error', 'Failed to register the action. Please try again.');
        }
    }


    //Actions Performed add qty
    public function actions_performed()
    {
        $user = Auth::user();
        $actions = EquipmentAction::where('type', 'add')
            ->orderBy('date', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(50);
        return view('equipment.actions.actions_performed', compact('actions', 'user'));
    }

    //reverse add qty
    public function reverse_add(Request $request)
    {

        try {
            // Start a database transaction
            DB::beginTransaction();

            // Find the action to reverse
            $action = EquipmentAction::findOrFail($request->action_id);

            // Ensure the action is not already reversed
            if ($action->is_reversed) {
                return back()->with('error', 'action is already reversed.');
            }

            // Check if there is enough lub in store
            $equipment = Equipment::find($request->equipment_id);
            if ($equipment->quantity_in_stock < $action->quantity) {
                DB::rollback();
                return back()->withInput()->with('error', 'Insufficient equipment in the workshop to cover this action!.');
            }

            // Create a new reverse action
            $reverseAction = new EquipmentAction();
            $reverseAction->fill([
                'type' => $action->type,
                'date' => $action->date,
                'equipment_id' => $action->equipment_id,
                'quantity' => $action->quantity,
                'remarks' => $action->remarks,
                'user_id' => $action->user_id,
                'person_id' => $action->person_id,
                'reverses' => $action->id,
                'is_reversed' => true,
            ]);
            // dd($reverseAction);
            $reverseAction->save();

            // Reverse the action and mark it as reversed
            $action->reversed_by = $reverseAction->id;
            $action->is_reversed = true;
            $action->reversal_reason = $request->reversal_reason;
            $action->save();


            $equipment = equipment::find($action->equipment_id);
            $equipment->quantity_in_stock -= $action->quantity;
            $equipment->save();

            // Commit the database transaction
            DB::commit();

            return redirect()->route('equipment.actions.actions_performed')->with('success', 'Action Reversed successfully.');
        } catch (\Exception $e) {
            // If an exception occurs, rollback the database transaction
            DB::rollback();

            return back()->withInput()->with('error', 'Failed to register the Action. Please try again.');
        }
    }

    //general in report
    public function report_in(Request $request)
    {
        $user = Auth::user();
        $equipments = Equipment::all();
        $query = EquipmentAction::query();

        if ($request->filled('equipment_id')) {
            $query->where('equipment_id', $request->input('equipment_id'));
        }

        if ($request->filled('from_date')) {
            $query->where('date', '>=', $request->input('from_date'));
        }

        if ($request->filled('to_date')) {
            $query->where('date', '<=', $request->input('to_date'));
        }

        $actions = $query->where('type', 'add')
            ->where('is_reversed', false)
            ->orderBy('date', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(50);

        return view('equipment.actions.report_in', compact('equipments', 'user', 'actions'));
    }

    // Method to show the dispose form
    public function showDisposeForm($id)
    {
        $equipment = Equipment::findOrFail($id);
        $user = Auth::user();
        return view('equipment.actions.dispose', compact('equipment', 'user'));
    }

    // Method to handle the disposal logic
    public function disposeEquipment(Request $request)
    {
         // Validate the input data
         $validatedData = $request->validate([
            'type' => 'required|max:255',
            'date' => 'required|date',
            'quantity' => 'required|numeric|min:0',
            'user_id' => 'required|exists:users,id',
            'equipment_id' => 'required|exists:equipment,id',
            'remarks' => 'nullable|max:255',
        ]);
        try {
            // Start a database transaction
            DB::beginTransaction();
            // Create a new transaction
            $action = new EquipmentAction();
            $action->fill($validatedData);
            $action->save();
            $equipment = Equipment::findOrFail($request->equipment_id);
            $equipment->quantity_in_stock -= $request->quantity;
            $equipment->save();
            // Commit the database transaction
            DB::commit();

            return redirect()->route('equipment.actions')->with('success', 'Equipment disposed successfully.');
        } catch (\Exception $e) {
            // If an exception occurs, rollback the database transaction
            DB::rollback();
            return back()->withInput()->with('error', 'Failed to register the action. Please try again.');
        }
    }

     //Actions Performed dispose
     public function actions_performed_dispose()
     {
         $user = Auth::user();
         $actions = EquipmentAction::where('type', 'dispose')
             ->orderBy('date', 'desc')
             ->orderBy('created_at', 'desc')
             ->paginate(50);
         return view('equipment.actions.actions_performed_dispose', compact('actions', 'user'));
     }

      //reverse dispose
    public function reverse_dispose(Request $request)
    {

        try {
            // Start a database transaction
            DB::beginTransaction();

            // Find the action to reverse
            $action = EquipmentAction::findOrFail($request->action_id);

            // Ensure the action is not already reversed
            if ($action->is_reversed) {
                return back()->with('error', 'action is already reversed.');
            }

            // Check if there is enough lub in store
            $equipment = Equipment::find($request->equipment_id);
           
            // Create a new reverse action
            $reverseAction = new EquipmentAction();
            $reverseAction->fill([
                'type' => $action->type,
                'date' => $action->date,
                'equipment_id' => $action->equipment_id,
                'quantity' => $action->quantity,
                'remarks' => $action->remarks,
                'user_id' => $action->user_id,
                'reverses' => $action->id,
                'is_reversed' => true,
            ]);
            // dd($reverseAction);
            $reverseAction->save();

            // Reverse the action and mark it as reversed
            $action->reversed_by = $reverseAction->id;
            $action->is_reversed = true;
            $action->reversal_reason = $request->reversal_reason;
            $action->save();


            $equipment = equipment::find($action->equipment_id);
            $equipment->quantity_in_stock += $action->quantity;
            $equipment->save();

            // Commit the database transaction
            DB::commit();

            return redirect()->route('equipment.actions.actions_performed_dispose')->with('success', 'Action Reversed successfully.');
        } catch (\Exception $e) {
            // If an exception occurs, rollback the database transaction
            DB::rollback();

            return back()->withInput()->with('error', 'Failed to register the Action. Please try again.');
        }
    }

       //general in report
    public function disposed(Request $request)
    {
        $user = Auth::user();
        $equipments = Equipment::all();
        $query = EquipmentAction::query();

        if ($request->filled('equipment_id')) {
            $query->where('equipment_id', $request->input('equipment_id'));
        }

        if ($request->filled('from_date')) {
            $query->where('date', '>=', $request->input('from_date'));
        }

        if ($request->filled('to_date')) {
            $query->where('date', '<=', $request->input('to_date'));
        }

        $actions = $query->where('type', 'dispose')
            ->where('is_reversed', false)
            ->orderBy('date', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(50);

        return view('equipment.actions.disposed', compact('equipments', 'user', 'actions'));
    }

    //Give out form
    public function give($id)
    {
        $user = Auth::user();
        $equipment = Equipment::findOrFail($id);
        $operators = People::where('role', 'Operator')->get();
        return view('equipment.actions.give', compact('equipment', 'user', 'operators'));
    }
    
       // Handle the give out
       public function give_out(Request $request)
       {
           // Validate the input data
           $validatedData = $request->validate([
               'type' => 'required|max:255',
               'date' => 'required|date',
               'quantity' => 'required|numeric|min:0',
               'user_id' => 'required|exists:users,id',
               'equipment_id' => 'required|exists:equipment,id',
               'person_id' => 'required|exists:people,id',
               'remarks' => 'required|max:255',
           ]);
           try {
               // Start a database transaction
               DB::beginTransaction();
               // Create a new transaction
               $action = new EquipmentAction();
               $action->fill($validatedData);
               $action->save();
               $equipment = Equipment::findOrFail($request->equipment_id);
               $equipment->quantity_in_stock -= $request->quantity;
               $equipment->save();
               // Commit the database transaction
               DB::commit();
   
               return redirect()->route('equipment.actions')->with('success', 'Equipment given out successfully.');
           } catch (\Exception $e) {
               // If an exception occurs, rollback the database transaction
               DB::rollback();
               return back()->withInput()->with('error', 'Failed to register the action. Please try again.');
           }
       }

         //Actions Performed give
     public function actions_performed_give()
     {
         $user = Auth::user();
         $actions = EquipmentAction::where('type', 'give')
             ->orderBy('date', 'desc')
             ->orderBy('created_at', 'desc')
             ->paginate(50);
         return view('equipment.actions.actions_performed_give', compact('actions', 'user'));
     }

        //reverse give
    public function reverse_give(Request $request)
    {

        try {
            // Start a database transaction
            DB::beginTransaction();

            // Find the action to reverse
            $action = EquipmentAction::findOrFail($request->action_id);

            // Ensure the action is not already reversed
            if ($action->is_reversed) {
                return back()->with('error', 'action is already reversed.');
            }

            // Check if there is enough lub in store
            $equipment = Equipment::find($request->equipment_id);
           
            // Create a new reverse action
            $reverseAction = new EquipmentAction();
            $reverseAction->fill([
                'type' => $action->type,
                'date' => $action->date,
                'equipment_id' => $action->equipment_id,
                'quantity' => $action->quantity,
                'remarks' => $action->remarks,
                'user_id' => $action->user_id,
                'person_id' => $action->person_id,
                'reverses' => $action->id,
                'is_reversed' => true,
            ]);
            // dd($reverseAction);
            $reverseAction->save();

            // Reverse the action and mark it as reversed
            $action->reversed_by = $reverseAction->id;
            $action->is_reversed = true;
            $action->reversal_reason = $request->reversal_reason;
            $action->save();


            $equipment = equipment::find($action->equipment_id);
            $equipment->quantity_in_stock += $action->quantity;
            $equipment->save();

            // Commit the database transaction
            DB::commit();

            return redirect()->route('equipment.actions.actions_performed_give')->with('success', 'Action Reversed successfully.');
        } catch (\Exception $e) {
            // If an exception occurs, rollback the database transaction
            DB::rollback();

            return back()->withInput()->with('error', 'Failed to register the Action. Please try again.');
        }
    }

    //pending return
    public function pending_return(Request $request)
    {
       
        $user = Auth::user();
        $equipments = Equipment::all();
        $query = EquipmentAction::query();

        if ($request->filled('equipment_id')) {
            $query->where('equipment_id', $request->input('equipment_id'));
        }

        if ($request->filled('from_date')) {
            $query->where('date', '>=', $request->input('from_date'));
        }

        if ($request->filled('to_date')) {
            $query->where('date', '<=', $request->input('to_date'));
        }

        $actions = $query->where('type', 'give')
            ->where('is_reversed', false)
            ->orderBy('date', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(50);

        return view('equipment.actions.pending_return', compact('equipments', 'user', 'actions'));
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

   
    //general Out
    public function report_out()
    {
        $user = Auth::user();
        $equipment = Equipment::all();
        return view('equipment.actions.report_out', compact('equipment', 'user'));
    }

    
    //pending repair
    public function pending_repair()
    {
        $user = Auth::user();
        $equipment = Equipment::all();
        return view('equipment.actions.pending_repair', compact('equipment', 'user'));
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
