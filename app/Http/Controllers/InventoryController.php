<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\InventoryCategory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $inventories = Inventory::all();
        return view('pages.inventory.index', compact('inventories'));
    }

    public function create()
    {
        $categories = InventoryCategory::all();
        return view('pages.inventory.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'inventory_category_id' => 'required|exists:inventory_categories,id',
            'inventoryName' => 'required|string|max:255',
            'instock' => 'required|integer',
            'good' => 'nullable|integer',
            'fair' => 'nullable|integer',
            'bad' => 'nullable|integer',
            'total' => 'nullable|integer',
            'remark' => 'nullable|string',
        ]);

        Inventory::create($request->only([
            'inventory_category_id',
            'inventoryName',
            'instock',
            'good',
            'fair',
            'bad',
            'total',
            'remark',
        ]));

        return redirect()->route('inventory.index')->with('success', 'Inventory created successfully.');
    }

    public function edit($id)
    {
        $categories = InventoryCategory::all();
        $inventory = Inventory::findOrFail($id);
        return view('pages.inventory.edit', compact('inventory', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'inventory_category_id' => 'required|exists:inventory_categories,id',
            'inventoryName' => 'required|string|max:255',
            'instock' => 'required|integer',
            'good' => 'nullable|integer',
            'fair' => 'nullable|integer',
            'bad' => 'nullable|integer',
            'total' => 'nullable|integer',
            'remark' => 'nullable|string',
        ]);

        $inventory = Inventory::findOrFail($id);
        $inventory->update($request->only([
            'inventory_category_id',
            'inventoryName',
            'instock',
            'good',
            'fair',
            'bad',
            'total',
            'remark',
        ]));

        return redirect()->route('inventory.index')->with('success', 'Inventory updated successfully.');
    }

    public function destroy($id)
    {
        $inventory = Inventory::findOrFail($id);
        $inventory->delete();

        return redirect()->route('inventory.index')->with('success', 'Inventory deleted successfully.');
    }
}
