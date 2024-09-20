<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Requests\ProductRestockRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $this->authorize('view-any', Product::class);

        $search = $request->get('search', '');

        $products = Product::search($search)
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('products.index', compact('products', 'search'));
    }

    public function checkLowStock()
    {
        $lowStockProducts = Product::where('stock', '<', 10)->get();

        $lowStockProductsArray = $lowStockProducts->toArray();

        $alertMessage = $lowStockProducts->isEmpty() ? 'No low stock products found.' : 'Low stock products found.';

        return [
            'products' => $lowStockProductsArray,
            'message' => $alertMessage,
        ];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $this->authorize('create', Product::class);

        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request): RedirectResponse
    {
        $this->authorize('create', Product::class);

        $validated = $request->validated();

        $product = Product::create($validated);

        return redirect()
            ->route('products.index', $product)
            ->withSuccess(__('crud.common.created'));
    }


    /**
     * Display the specified resource.
     */
    public function show(Request $request, Product $product): View
    {
        $this->authorize('view', $product);

        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Product $product): View
    {
        $this->authorize('update', $product);

        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        ProductUpdateRequest $request,
        Product $product
    ): RedirectResponse {
        $this->authorize('update', $product);

        $validated = $request->validated();


        $product->update($validated);


        return redirect()
            ->route('products.index', $product)
            ->withSuccess(__('crud.common.saved'));
    }


    public function restock(Request $request): View
    {

        $this->authorize('view-any', Product::class);

        $search = $request->get('search', '');

        $products = Product::search($search)
            ->latest()
            ->paginate()
            ->withQueryString();

        return view('products.restock', compact('products', 'search'));
        // Logic for displaying the restock index page
    }

    public function updateRestock(Request $request): RedirectResponse
    {
        //validate entry
        $validatedData = $request->validate([
            'product' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        //search product
        $product = Product::findOrFail($validatedData['product']);

        // Add the quantity to the product's stock
        $product->quantity += $validatedData['quantity'];
        $product->save();

        //return with success
        return redirect()
            ->route('products.index', $product)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        Request $request,
        Product $product
    ): RedirectResponse {
        $this->authorize('delete', $product);

        $product->delete();

        return redirect()
            ->route('products.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
