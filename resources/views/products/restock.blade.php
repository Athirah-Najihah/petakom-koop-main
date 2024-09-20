<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('crud.products.restock_title')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-partials.card>
                <x-slot name="title">
                    <a href="{{ route('products.index') }}" class="mr-4"><i class="mr-1 icon ion-md-arrow-back"></i></a>
                </x-slot>
                <x-form method="POST" action="{{ route('restock.update') }}" class="mt-4">
                    <div class="flex flex-wrap">
                        <x-inputs.group class="w-full">
                            <x-inputs.select name="product"  id="product" label="Product" required>
                                @php $selected = old('name') @endphp
                                <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Product</option>
                                @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </x-inputs.select>
                        </x-inputs.group>
                        <x-inputs.group class="w-full">
                            <x-inputs.number name="quantity" label="Quantity" max="255" placeholder="Quantity" required></x-inputs.number>
                        </x-inputs.group>
                    </div>
                    <div class="mt-10">
                        <a href="{{ route('products.index') }}" class="button">
                            <i class="
                                    mr-1
                                    icon
                                    ion-md-return-left
                                    text-primary
                                "></i>
                            @lang('crud.common.back')
                        </a>

                        <button type="submit" class="button button-primary float-right">
                            <i class="mr-1 icon ion-md-save"></i>
                            @lang('crud.common.restock')
                        </button>
                    </div>
                </x-form>
            </x-partials.card>
        </div>
    </div>


</x-app-layout>