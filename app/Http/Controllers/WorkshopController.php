<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkshopController extends Controller
{
    
    public function Index()
    {
       
        //dd($items);
        $items = Item::all();
        $user = Auth::user();
        return view('workshop.actions', compact('items', 'user'));
    }

    //actions
    public function actions()
    {
        $user = Auth::user();
        $items = Item::all(); // Retrieve all items

        return view('workshop.actions', compact('items', 'user'));
    }

    //create form
    public function create()
    {
        $user = Auth::user();
        return view('workshop.create', compact('user'));
    }

    // Store a new item in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'quantity' => 'required|integer',
        ]);

        Item::create($request->all());

        return redirect()->route('items.index')
                         ->with('success', 'Item created successfully.');
    }

    // Display all items
    public function item()
    {
        $user = Auth::user();
        $items = Item::all(); 
        return view('workshop.item', compact('items', 'user'));
    }

    public function tool()
    {
        $user = Auth::user();
        $items = Item::all();
        return view('workshop.tool', compact('items', 'user'));
    }

    public function spare_part()
    {
        $user = Auth::user();
        $items = Item::all();
        return view('workshop.spare_part', compact('items', 'user'));
    }

    public function farm()
    {
        $user = Auth::user();
        $items = Item::all();
        return view('workshop.farm', compact('items', 'user'));
    }
    
    public function workshop()
    {
        $user = Auth::user();
        $items = Item::all();
        return view('workshop.workshop', compact('items', 'user'));
    }

    // Edit an item
    public function edit($id)
    {
        $item = Item::findOrFail($id);
        return view('workshop.edit', compact('item, user'));
    }

    // Update an item in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'quantity' => 'required|integer',
        ]);

        $item = Item::findOrFail($id);
        $item->update($request->all());

        return redirect()->route('items.index')
                         ->with('success', 'Item updated successfully.');
    }

    // Specific functionalities

//returned
    public function returned()
    {
        $user = Auth::user();
        $items = Item::all();
        return view('workshop.returned', compact('items', 'user'));
    }

    //taken_non_returnable
    public function taken_non_returnable()
    {
        $user = Auth::user();
        $items = Item::all();
        return view('workshop.taken_non_returnable', compact('items', 'user'));
    }

   //repaired
public function repaired()
{
    $user = Auth::user();
    $items = Item::all();
    return view('workshop.repaired', compact('items', 'user'));
} 

//disposed
public function disposed()
    {
        $user = Auth::user();
        $items = Item::all();
        return view('workshop.disposed', compact('items', 'user'));
    }

    //general in
public function general_in()
{
    $user = Auth::user();
    $items = Item::all();
    return view('workshop.general_in', compact('items', 'user'));
}

//general Out
public function general()
    {
        $user = Auth::user();
        $items = Item::all();
        return view('workshop.general', compact('items', 'user'));
    }

//pending return
public function pending_return()
{
    $user = Auth::user();
    $items = Item::all();
    return view('workshop.pending_return', compact('items', 'user'));
}

//pending repair
public function pending_repair()
{
    $user = Auth::user();
    $items = Item::all();
    return view('workshop.pending_repair', compact('items', 'user'));
}

//Actions Performed
public function actions_performed()
{
    $user = Auth::user();
    $items = Item::all();
    return view('workshop.actions_performed', compact('items', 'user'));
}

  //Functionalities that affect quantity in the database

  //Return
public function return()
{
    $user = Auth::user();
    $items = Item::all();
    return view('workshop.return', compact('items', 'user'));
}

  //Repair
  public function repair()
  {
      $user = Auth::user();
      $items = Item::all();
      return view('workshop.repair', compact('items', 'user'));
  }

//Reverse
public function reverse()
{
    $user = Auth::user();
    $items = Item::all();
    return view('workshop.reverse', compact('items', 'user'));
}

//Give out
public function give()
{
    $user = Auth::user();
    $items = Item::all();
    return view('workshop.give', compact('items', 'user'));
}
//add
public function add()
{
    $user = Auth::user();
    $items = Item::all();
    return view('workshop.add', compact('items', 'user'));
}
//Recommend for repair
public function recommend_for_repair()
{
    $user = Auth::user();
    $items = Item::all();
    return view('workshop.recommend_for_repair', compact('items', 'user'));
}
//Dispose
public function dispose()
{
    $user = Auth::user();
    $items = Item::all();
    return view('workshop.dispose', compact('items', 'user'));
}

}
