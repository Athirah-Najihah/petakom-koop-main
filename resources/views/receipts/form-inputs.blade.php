@php $editing = isset($receipt) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.select name="user_id" label="User" required>
            @php $selected = old('user_id', ($editing ? $receipt->user_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="total_payment"
            label="Total Payment"
            :value="old('total_payment', ($editing ? $receipt->total_payment : ''))"
            max="255"
            step="0.01"
            placeholder="Total Payment"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="total_price"
            label="Total Price"
            :value="old('total_price', ($editing ? $receipt->total_price : ''))"
            max="255"
            step="0.01"
            placeholder="Total Price"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.number
            name="total_change"
            label="Total Change"
            :value="old('total_change', ($editing ? $receipt->total_change : ''))"
            max="255"
            step="0.01"
            placeholder="Total Change"
            required
        ></x-inputs.number>
    </x-inputs.group>
</div>
