<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Distributor;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    public function index()
    {
        $distributors = Distributor::withCount('products')->get();
        return view('admin.distributors.index', compact('distributors'));
    }

    public function create()
    {
        return view('admin.distributors.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:distributors,email',
            'address' => 'required|string',
            'phone_number' => 'required|string|max:15',
        ]);

        Distributor::create($validated);

        return redirect()
            ->route('admin.distributors.index')
            ->with('success', 'Distributor berhasil ditambahkan');
    }

    public function edit(Distributor $distributor)
    {
        return view('admin.distributors.form', compact('distributor'));
    }

    public function update(Request $request, Distributor $distributor)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:distributors,email,' . $distributor->id,
            'address' => 'required|string',
            'phone_number' => 'required|string|max:15',
        ]);

        $distributor->update($validated);

        return redirect()
            ->route('admin.distributors.index')
            ->with('success', 'Distributor berhasil diperbarui');
    }

    public function destroy(Distributor $distributor)
    {
        $distributor->delete();

        return redirect()
            ->route('admin.distributors.index')
            ->with('success', 'Distributor berhasil dihapus');
    }
}