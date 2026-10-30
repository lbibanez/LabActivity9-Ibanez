@extends('layouts.app')

@section('title', $title)

@section('content')
    <h1 class="text-2xl font-bold mb-4">{{ $title }}</h1>

    {{-- alert banner --}}
    @if($alerts->count() > 0)
        <div class="bg-red-100 text-red-800 border border-red-300 rounded p-3 mb-6">
            {{ $alerts->count() }} overdue vaccination(s) need follow-up.
        </div>
    @elseif(count($outOfStock) > 0)
        <div class="bg-yellow-100 text-yellow-800 border border-yellow-300 rounded p-3 mb-6">
            Out of stock: {{ implode(', ', $outOfStock) }}
        </div>
    @else
        <div class="bg-green-100 text-green-800 border border-green-300 rounded p-3 mb-6">
            All clear
        </div>
    @endif

    {{-- stats --}}
    <div class="grid gap-4 md:grid-cols-4 mb-6">
        @foreach($stats as $stat)
            <x-stat-card :title="$stat['label']" :value="$stat['value']" />
        @endforeach
    </div>

    {{-- only show this when there are overdue patients --}}
    @unless($alerts->isEmpty())
        <x-panel title="Overdue patients">
            <ul class="list-disc ml-5">
                @foreach($alerts as $alert)
                    <li>{{ $alert->patient_name }} ({{ $alert->purok }}) - {{ $alert->vaccine }}</li>
                @endforeach
            </ul>
        </x-panel>
    @endunless

    <x-panel title="Vaccine Schedule">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-emerald-600 text-white">
                    <tr>
                        <th class="p-2">#</th>
                        <th class="p-2">Patient</th>
                        <th class="p-2">Purok</th>
                        <th class="p-2">Vaccine</th>
                        <th class="p-2">Dose</th>
                        <th class="p-2">Date</th>
                        <th class="p-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($schedules as $row)
                        <tr class="{{ $loop->odd ? 'bg-white' : 'bg-gray-100' }} {{ $loop->first ? 'font-semibold' : '' }}">
                            <td class="p-2">{{ $loop->iteration }}</td>
                            <td class="p-2">{{ $row->patient_name }}</td>
                            <td class="p-2">{{ $row->purok }}</td>
                            <td class="p-2">{{ $row->vaccine }}</td>
                            <td class="p-2">{{ $row->dose }}</td>
                            <td class="p-2">{{ $row->scheduled_at->format('M d, Y') }}</td>
                            <td class="p-2">
                                @if($row->status === 'Overdue')
                                    <span class="bg-red-500 text-white px-2 py-1 rounded text-xs">Overdue</span>
                                @elseif($row->status === 'Done')
                                    <span class="bg-green-500 text-white px-2 py-1 rounded text-xs">Done</span>
                                @else
                                    <span class="bg-blue-500 text-white px-2 py-1 rounded text-xs">{{ $row->status }}</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-4 text-center text-gray-500">No schedules yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-panel>
@endsection
