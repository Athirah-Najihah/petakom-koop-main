<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\SaleStoreRequest;
use App\Http\Requests\SaleUpdateRequest;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Sale::class);

        $search = $request->get('search', '');

        $sales = Sale::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('sales.index', compact('sales', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Sale::class);

        $users = User::pluck('name', 'id');

        return view('sales.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaleStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Sale::class);

        $validated = $request->validated();

        $sale = Sale::create($validated);

        return redirect()
            ->route('sales.edit', $sale)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Sale $sale): View
    {
        $this->authorize('view', $sale);

        return view('sales.show', compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Sale $sale): View
    {
        $this->authorize('update', $sale);

        $users = User::pluck('name', 'id');

        return view('sales.edit', compact('sale', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        SaleUpdateRequest $request,
        Sale $sale
    ): RedirectResponse {
        $this->authorize('update', $sale);

        $validated = $request->validated();

        $sale->update($validated);

        return redirect()
            ->route('sales.edit', $sale)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Sale $sale): RedirectResponse
    {
        $this->authorize('delete', $sale);

        $sale->delete();

        return redirect()
            ->route('sales.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
