<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Receipt;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ReceiptStoreRequest;
use App\Http\Requests\ReceiptUpdateRequest;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Receipt::class);

        $search = $request->get('search', '');

        $receipts = Receipt::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('receipts.index', compact('receipts', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Receipt::class);

        $users = User::pluck('name', 'id');

        return view('receipts.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReceiptStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Receipt::class);

        $validated = $request->validated();

        $receipt = Receipt::create($validated);

        return redirect()
            ->route('receipts.edit', $receipt)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Receipt $receipt): View
    {
        $this->authorize('view', $receipt);

        return view('receipts.show', compact('receipt'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Receipt $receipt): View
    {
        $this->authorize('update', $receipt);

        $users = User::pluck('name', 'id');

        return view('receipts.edit', compact('receipt', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ReceiptUpdateRequest $request,
        Receipt $receipt
    ): RedirectResponse {
        $this->authorize('update', $receipt);

        $validated = $request->validated();

        $receipt->update($validated);

        return redirect()
            ->route('receipts.edit', $receipt)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Receipt $receipt
    ): RedirectResponse {
        $this->authorize('delete', $receipt);

        $receipt->delete();

        return redirect()
            ->route('receipts.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
