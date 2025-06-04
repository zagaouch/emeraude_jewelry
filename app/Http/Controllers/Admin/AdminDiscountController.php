<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount; // Using your 'remises' table
use Illuminate\Http\Request;

class AdminDiscountController extends Controller
{
    /**
     * Display a listing of discounts.
     */
    public function index()
    {
        $discounts = Discount::latest()->paginate(10);
        return view('admin.discounts.index', compact('discounts'));
    }

    /**
     * Show the form for creating a new discount.
     */
    public function create()
    {
        return view('admin.discounts.create');
    }

    /**
     * Store a newly created discount.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:255|unique:remises,code',
            'montant_remise' => 'required|numeric|min:0',
            'type' => 'required|in:percentage,fixed',
            'date_expiration' => 'nullable|date',
            'max_uses' => 'nullable|integer|min:1'
        ]);

        Discount::create($validated);

        return redirect()->route('admin.discounts.index')
                         ->with('success', 'Remise créée avec succès');
    }

    /**
     * Show the form for editing the specified discount.
     */
    public function edit(Discount $discount)
    {
        return view('admin.discounts.edit', compact('discount'));
    }
    /**
     * Update the specified discount.
     */
    public function update(Request $request, Discount $discount)
    {
        $validated = $request->validate([
            'code' => 'required|string|max:255|unique:remises,code,'.$discount->remise_id.',remise_id',
            'montant_remise' => 'required|numeric|min:0',
            'type' => 'required|in:percentage,fixed',
            'date_expiration' => 'nullable|date',
            'max_uses' => 'nullable|integer|min:1'
        ]);

        $discount->update($validated);

        return redirect()->route('admin.discounts.index')
                         ->with('success', 'Remise mise à jour avec succès');
    }

    /**
     * Remove the specified discount.
     */
    public function destroy(Discount $discount)
    {
        $discount->delete();

        return redirect()->route('admin.discounts.index')
                         ->with('success', 'Remise supprimée avec succès');
    }
}