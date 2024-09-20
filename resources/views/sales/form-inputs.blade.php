@php $editing = isset($sale) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.select name="user_id" label="User" required>
            @php $selected = old('user_id', ($editing ? $sale->user_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="total_price"
            label="Total Price"
            :value="old('total_price', ($editing ? $sale->total_price : ''))"
            max="255"
            step="0.01"
            placeholder="Total Price"
            required
        ></x-inputs.number>
    </x-inputs.group>
</div>
