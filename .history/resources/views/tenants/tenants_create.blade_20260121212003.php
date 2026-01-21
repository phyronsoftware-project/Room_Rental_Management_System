{{-- resources/views/tenant-add.blade.php --}}
@extends('layouts.app')

@section('title', 'Add New Tenant')

@php
    $active_page = 'tenants'; // UI only
@endphp

@section('content')
    <main class="flex-1 overflow-y-auto bg-base">
        <div class="flex items-center gap-4 mb-6 pt-10">
            <a href="{{ route('tanants.index') }}" class="text-text-mid hover:text-primary transition-colors"
                aria-label="Back to tenants">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
            </a>
            <h1 class="text-3xl font-bold text-primary-dark">Add New Tenant</h1>
        </div>
        <div class="max-w-4xl mx-auto">


            <div class="bg-light rounded-lg shadow-md border border-gray-200 p-8">
                <form action="{{ route('tanants.store') }}" method="POST" class="space-y-6">
                    @csrf

                    @if ($errors->any())
                        <div class="bg-red-50 border border-red-200 text-red-700 rounded-lg p-4">
                            <ul class="list-disc pl-5 text-sm space-y-1">
                                @foreach ($errors->all() as $err)
                                    <li>{{ $err }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div>
                            <label class="block text-sm font-medium text-text-mid mb-2">
                                Full Name <span class="text-danger-dark">*</span>
                            </label>
                            <input type="text" name="full_name" value="{{ old('full_name') }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary/50"
                                placeholder="e.g., John Doe" required />
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-text-mid mb-2">
                                Phone Number <span class="text-danger-dark">*</span>
                            </label>
                            <input type="text" name="phone_number" value="{{ old('phone_number') }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary/50"
                                placeholder="e.g., 012 345 678" required />
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-text-mid mb-2">Age</label>
                            <input type="number" name="age" value="{{ old('age') }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary/50"
                                placeholder="e.g., 25" />
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-text-mid mb-2">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary/50"
                                placeholder="e.g., name@gmail.com" />
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-text-mid mb-2">Password (Optional)</label>
                            <input type="password" name="password"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary/50"
                                placeholder="••••••" />
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-text-mid mb-2">
                                Assign Room <span class="text-danger-dark">*</span>
                            </label>
                            <select name="room_id"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary/50"
                                required>
                                <option value="">Select an available room</option>
                                @foreach ($rooms as $r)
                                    {{-- TODO: កែ field room_no / floor តាម DB --}}
                                    <option value="{{ $r->id }}" @selected(old('room_id') == $r->id)>
                                        {{ $r->room_no ?? 'Room #' . $r->id }} (Floor {{ $r->floor ?? '-' }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-text-mid mb-2">
                                Start Date <span class="text-danger-dark">*</span>
                            </label>
                            <input type="date" name="start_date" value="{{ old('start_date', now()->toDateString()) }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary/50"
                                required />
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-text-mid mb-2">
                                End Date (Optional)
                            </label>
                            <input type="date" name="end_date" value="{{ old('end_date') }}"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary/50" />
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-text-mid mb-2">
                            Payment Term <span class="text-danger-dark">*</span>
                        </label>
                        <select name="payment_term"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary/50"
                            required>
                            @foreach (['Monthly', 'Quarterly', 'Yearly'] as $term)
                                <option value="{{ $term }}" @selected(old('payment_term', 'Monthly') == $term)>{{ $term }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex justify-end gap-4 pt-4 border-t border-gray-200">
                        <a href="{{ route('tanants.index') }}"
                            class="px-6 py-2.5 border border-gray-300 text-text-mid font-semibold rounded-lg hover:bg-gray-50">
                            Cancel
                        </a>

                        <button type="submit"
                            class="px-6 py-2.5 bg-primary text-white font-semibold rounded-lg shadow-md hover:bg-primary-dark">
                            Save Tenant
                        </button>
                    </div>
                </form>

            </div>

            {{-- Toast (UI only) --}}
            <div id="toast"
                class="hidden fixed bottom-6 right-6 bg-light border border-gray-200 shadow-lg rounded-xl px-4 py-3 text-sm text-text-dark">
                ✅ Saved (UI only)
            </div>

        </div>
    </main>

    <script>
        function fakeSaveTenant() {
            const form = document.getElementById('tenantForm');
            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }
            const t = document.getElementById('toast');
            t.textContent = '✅ Tenant saved (UI only)';
            t.classList.remove('hidden');
            clearTimeout(window.__toastTimer);
            window.__toastTimer = setTimeout(() => t.classList.add('hidden'), 1600);
        }
    </script>
@endsection
