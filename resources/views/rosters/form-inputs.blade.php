@php $editing = isset($roster) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.select name="user_id" label="User" required>
            @php $selected = old('user_id', ($editing ? $roster->user_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.date
            name="day"
            label="Day"
            value="{{ old('day', ($editing ? optional($roster->day)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.select name="time" label="Time" required>
            @php $selected = old('time', ($editing ? $roster->time : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Duty Slot</option>    
            <option value="9:00 am - 11:00 am">9:00 am - 11:00 am</option>
            <option value="11:00 am - 1:00 pm">11:00 am - 1:00 pm</option>
            <option value="1:00 pm - 3:00 pm">1:00 pm - 3:00 pm</option>
            <option value="3:00 pm - 5:00 pm">3:00 pm - 5:00 pm</option>
        </x-inputs.select>
    </x-inputs.group>
</div>


