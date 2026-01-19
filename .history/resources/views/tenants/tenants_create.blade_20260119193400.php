{{-- resources/views/tenant-add.blade.php --}}
@extends('layouts.app')

@section('title', 'Add New Tenant')

@php
    $active_page = 'tenants'; // UI only
@endphp

@section('content')
    <main class="flex-1 overflow-y-auto bg-base">
        <div class="flex items-center gap-4 mb-6 ">
            <a href="#" class="text-text-mid hover:text-primary transition-colors" aria-label="Back to tenants">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
            </a>
            <h1 class="text-3xl font-bold text-primary-dark">Add New Tenant</h1>
        </div>
        <div class="p-10 max-w-4xl mx-auto">


            <div class="bg-light rounded-lg shadow-md border border-gray-200 p-8">
                {{-- UI only: no backend submit --}}
                <form action="javascript:void(0)" method="POST" class="space-y-6" onsubmit="return false;" id="tenantForm">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        {{-- Full Name --}}
                        <div>
                            <label for="full_name" class="block text-sm font-medium text-text-mid mb-2">
                                Full Name <span class="text-danger-dark">*</span>
                            </label>
                            <input type="text" id="full_name" name="full_name"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary/50"
                                placeholder="e.g., John Doe" value="John Doe" required />
                        </div>

                        {{-- Phone Number --}}
                        <div>
                            <label for="phone_number" class="block text-sm font-medium text-text-mid mb-2">
                                Phone Number <span class="text-danger-dark">*</span>
                            </label>
                            <input type="tel" id="phone_number" name="phone_number"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary/50"
                                placeholder="e.g., 012 345 678" value="012 345 678" required />
                        </div>

                        {{-- Age --}}
                        <div>
                            <label for="age" class="block text-sm font-medium text-text-mid mb-2">Age</label>
                            <input type="number" id="age" name="age"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary/50"
                                placeholder="e.g., 25" value="25" />
                        </div>

                        {{-- Room Selection (static fake rooms) --}}
                        <div>
                            <label for="room_id" class="block text-sm font-medium text-text-mid mb-2">
                                Assign Room <span class="text-danger-dark">*</span>
                            </label>
                            <select id="room_id" name="room_id"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary/50"
                                required>
                                <option value="">Select an available room</option>
                                <option value="1" selected>Room 101 (Floor 1)</option>
                                <option value="2">Room 102 (Floor 1)</option>
                                <option value="3">Room 201 (Floor 2)</option>
                                <option value="4">Room 305 (Floor 3)</option>
                            </select>
                        </div>

                        {{-- Start Date --}}
                        <div>
                            <label for="start_date" class="block text-sm font-medium text-text-mid mb-2">
                                Start Date <span class="text-danger-dark">*</span>
                            </label>
                            <input type="date" id="start_date" name="start_date"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary/50"
                                value="{{ now()->toDateString() }}" required />
                        </div>

                        {{-- End Date --}}
                        <div>
                            <label for="end_date" class="block text-sm font-medium text-text-mid mb-2">
                                End Date (Optional)
                            </label>
                            <input type="date" id="end_date" name="end_date"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary/50" />
                        </div>

                    </div>

                    {{-- Payment Term --}}
                    <div>
                        <label for="payment_term" class="block text-sm font-medium text-text-mid mb-2">
                            Payment Term <span class="text-danger-dark">*</span>
                        </label>
                        <select id="payment_term" name="payment_term"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary/50"
                            required>
                            <option value="Monthly" selected>Monthly</option>
                            <option value="Quarterly">Quarterly</option>
                            <option value="Yearly">Yearly</option>
                        </select>
                    </div>

                    {{-- Actions --}}
                    <div class="flex justify-end gap-4 pt-4 border-t border-gray-200">
                        <a href="#"
                            class="px-6 py-2.5 border border-gray-300 text-text-mid font-semibold rounded-lg hover:bg-gray-50 transition-colors">
                            Cancel
                        </a>

                        <button type="button" onclick="fakeSaveTenant()"
                            class="px-6 py-2.5 bg-primary text-white font-semibold rounded-lg shadow-md hover:bg-primary-dark transition-colors">
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
