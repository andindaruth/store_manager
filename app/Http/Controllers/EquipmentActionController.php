<?php

namespace App\Http\Controllers;
use App\Models\People;
use App\Models\Equipment;
use App\Models\EquipmentAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EquipmentActionController extends Controller
{

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
public function general_in()
{
    $user = Auth::user();
    $equipment = Equipment::all();
    return view('equipment.actions.general_in', compact('equipment', 'user'));
}

//general Out
public function general()
    {
        $user = Auth::user();
        $equipment = Equipment::all();
        return view('equipment.actions.general', compact('equipment', 'user'));
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
//add
public function add()
{
    $user = Auth::user();
    $equipment = Equipment::all();
    return view('equipment.actions.add', compact('equipment', 'user'));
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
