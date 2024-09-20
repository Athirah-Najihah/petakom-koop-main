<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('Duty Roster')
        </h2>
    </x-slot>

    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #000000;
            text-align: left;
            padding: 8px;
        }

        thead, tr:nth-child(even) {
            background-color: #C7E4EE;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-partials.card>
                <div class="mb-5 mt-4 flex justify-end">
                    <div>
                        @can('create', App\Models\Roster::class)
                        <a
                            href="{{ route('rosters.create') }}"
                            class="button button-primary"
                        >
                            <i class="mr-1 icon ion-md-add"></i>
                            Select Shift Slot
                        </a>
                        @endcan
                    </div>
                </div><br>
                <div class="mt-4 px-4">
                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'] as $day)
                                    <th>{{ $day }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                        @foreach (['9:00 am - 11:00 am', '11:00 am - 1:00 pm', '1:00 pm - 3:00 pm', '3:00 pm - 5:00 pm'] as $time)
                            <tr>
                                <td>{{ $time }}</td>
                                @foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'] as $day)
                                    <td>
                                        @php
                                            $roster = $rosters->get($day)->first(function ($item) use ($time) {
                                                return $item->time === $time;
                                            });
                                        @endphp
                                        @if ($roster)
                                            {{ $roster->user->name }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><br>

                <div class="mt-10">
                    <a href="{{ route('rosters.index') }}" class="button">
                        <i class="mr-1 icon ion-md-return-left"></i>
                        @lang('crud.common.back')
                    </a>
                </div>
            </x-partials.card>
        </div>
    </div>
</x-app-layout>
