@extends('layouts.app')

@section('title', 'Schedule - Bakuna Tracker')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Full Vaccination Schedule</h1>

    <x-panel title="All schedules ({{ $schedules->count() }})">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm lg:text-base">
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
                        <tr class="{{ $loop->odd ? 'bg-white' : 'bg-gray-100' }}">
                            <td class="p-2">{{ $loop->iteration }}</td>
                            <td class="p-2">{{ $row->patient_name }}</td>
                            <td class="p-2">{{ $row->purok }}</td>
                            <td class="p-2">{{ $row->vaccine }}</td>
                            <td class="p-2">{{ $row->dose }}</td>
                            <td class="p-2">{{ $row->scheduled_at->format('M d, Y') }}</td>
                            <td class="p-2">{{ $row->status }}</td>
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

    <a href="/dashboard" class="text-emerald-700 underline">Back to dashboard</a>
@endsection
