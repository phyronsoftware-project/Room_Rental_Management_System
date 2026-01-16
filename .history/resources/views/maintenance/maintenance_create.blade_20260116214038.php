{{-- resources/views/dashboard.blade.php --}}
@extends('layouts.app')

@section('title', 'Dashboard')

@php
    // ✅ Sidebar highlight (UI only)
    $active_page = 'dashboard';

    // ✅ Fake admin name for UI
    $admin_name = 'Daniel';

    // ✅ Fake rooms (UI only)
    $fake_rooms = [
        ['room_id' => 1, 'room_number' => '101', 'floor' => 'Floor 1'],
        ['room_id' => 2, 'room_number' => '102', 'floor' => 'Floor 1'],
        ['room_id' => 3, 'room_number' => '201', 'floor' => 'Floor 2'],
        ['room_id' => 4, 'room_number' => '305', 'floor' => 'Floor 3'],
    ];
@endphp

@section('content')
    <main class="flex-1 overflow-y-auto bg-base">
        <div class="p-10 max-w-4xl mx-auto">

            {{-- Header --}}
            <div class="flex items-center gap-4 mb-6">
                <a href="{{ route('maintenance.index') }}" class="text-text-mid hover:text-primary transition-colors"
                    aria-label="Back">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                    </svg>
                </a>

                <div>
                    <h1 class="text-3xl font-bold text-primary-dark">Add New Maintenance Request</h1>
                </div>
            </div>

            {{-- ✅ Fake Alert (UI only) --}}
            <div class="mb-6 px-4 py-3 rounded-lg text-sm bg-success-light border border-success-dark text-emerald-700">
                ✅ Demo: Request saved successfully (UI only)
            </div>

            {{-- Form Card --}}
            <div class="bg-light rounded-lg shadow-md border border-gray-200 p-8">
                {{-- UI only: no action, no backend --}}
                <form action="javascript:void(0)" method="POST" class="space-y-6" onsubmit="return false;">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Room --}}
                        <div>
                            <label for="room_id" class="block text-sm font-medium text-text-mid mb-2">
                                Room <span class="text-danger-dark">*</span>
                            </label>

                            <select id="room_id" name="room_id"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary/50"
                                required>
                                <option value="">Select a room</option>

                                {{-- ✅ Fake rooms (Blade only, no backend) --}}
                                @foreach ($fake_rooms as $room)
                                    <option value="{{ $room['room_id'] }}">
                                        Room {{ $room['room_number'] }} ({{ $room['floor'] }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Date Reported --}}
                        <div>
                            <label for="date_reported" class="block text-sm font-medium text-text-mid mb-2">
                                Date Reported <span class="text-danger-dark">*</span>
                            </label>
                            <input type="date" id="date_reported" name="date_reported"
                                value="{{ now()->toDateString() }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary/50"
                                required />
                        </div>
                    </div>

                    {{-- Issue --}}
                    <div>
                        <label for="issue_reported" class="block text-sm font-medium text-text-mid mb-2">
                            Issue Reported <span class="text-danger-dark">*</span>
                        </label>
                        <textarea id="issue_reported" name="issue_reported" rows="3"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary/50"
                            placeholder="e.g., Leaky faucet in bathroom" required>Air conditioner not cooling properly.</textarea>

                        <div class="mt-2 text-xs text-text-mid">
                            Tip: Describe the issue clearly so technician can fix faster.
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Assigned To --}}
                        <div>
                            <label for="assigned_to" class="block text-sm font-medium text-text-mid mb-2">
                                Assigned To (Optional)
                            </label>
                            <input type="text" id="assigned_to" name="assigned_to" value="Mr. Handy"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary/50"
                                placeholder="e.g., Mr. Handy" />
                        </div>

                        {{-- Status --}}
                        <div>
                            <label for="status" class="block text-sm font-medium text-text-mid mb-2">
                                Status <span class="text-danger-dark">*</span>
                            </label>
                            <select id="status" name="status"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary/50"
                                required>
                                <option value="Pending" selected>Pending</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Completed">Completed</option>
                            </select>
                        </div>
                    </div>

                    {{-- Actions --}}
                    <div class="flex justify-end gap-4 pt-4 border-t border-gray-200">
                        <a href="#"
                            class="px-6 py-2.5 border border-gray-300 text-text-mid font-semibold rounded-lg hover:bg-gray-50 transition-colors">
                            Cancel
                        </a>

                        {{-- UI only button --}}
                        <button type="button" onclick="fakeSave()"
                            class="px-6 py-2.5 bg-primary text-white font-semibold rounded-lg shadow-md hover:bg-primary-dark transition-colors">
                            Save Request
                        </button>
                    </div>
                </form>
            </div>

            {{-- ✅ UI only toast --}}
            <div id="fakeToast"
                class="hidden fixed bottom-6 right-6 bg-light border border-gray-200 shadow-lg rounded-xl px-4 py-3 text-sm">
                ✅ Saved (UI only)
            </div>

        </div>
    </main>

    {{-- UI only JS --}}
    <script>
        function fakeSave() {
            const t = document.getElementById('fakeToast');
            t.classList.remove('hidden');
            setTimeout(() => t.classList.add('hidden'), 1800);
        }
    </script>
@endsection
