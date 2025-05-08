<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InventoryCategory;
use Illuminate\Support\Facades\Auth;

class InventoryCatController extends Controller
{
    public function index()
    {
        $inventoryCategory = InventoryCategory::orderBy('id', 'desc')->get();
        return view('pages.inventoryCat.index', compact('inventoryCategory'));
    }

    public function create()
    {
        return view('pages.inventoryCat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'inventoryCatName' => 'required|string|max:255',
            'inventoryCatRemark' => 'nullable|string',
        ]);

        InventoryCategory::create($request->only('inventoryCatName', 'inventoryCatRemark'));

         //notification
         $userName = Auth::user()->name;
         $message = "A new Inventory Category has been created by '{$userName}'.";
         $url = route('inventoryCat.index');
 
         // Using the NotificationController to send notification
         NotificationController::sendNotificationToOfficer($message, $url);

        return redirect()->route('inventoryCat.index')->with('success', 'Inventory Category created successfully.');
    }

    public function edit($id)
    {
        $inventoryCategory = InventoryCategory::findOrFail($id);
        return view('pages.inventoryCat.edit', compact('inventoryCategory'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'inventoryCatName' => 'required|string|max:255',
            'inventoryCatRemark' => 'nullable|string',
        ]);

        $category = InventoryCategory::findOrFail($id);
        $category->update($request->only('inventoryCatName', 'inventoryCatRemark'));

        return redirect()->route('inventoryCat.index')->with('success', 'Inventory Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = InventoryCategory::findOrFail($id);
        $category->delete();

        return redirect()->back()->with('success', 'Inventory Category deleted successfully.');
    }

}
