{{-- resources/views/dashboard.blade.php --}}
@extends('layouts.app')

@section('title', 'Rooms')

@php
    // ✅ set active page for sidebar highlight
    $active_page = 'dashboard';
    $admin_name = $admin_name ?? 'Daniel';
@endphp

@section('content')
    <main class="flex-1 overflow-y-auto bg-base">
        <div class="p-10 max-w-4xl mx-auto">
            <div class="flex items-center gap-4 mb-6">
                <a href="rooms.php" class="text-text-mid hover:text-primary transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                    </svg>
                </a>
                <h1 class="text-3xl font-bold text-primary-dark">Add New Room</h1>
            </div>

            <?php if (!empty($form_msg)): ?>
            <div class="mb-6 px-4 py-3 rounded-lg text-sm <?php echo $form_msg_type == 'success' ? 'bg-success-light border border-success-dark text-emerald-700' : 'bg-danger-light border border-danger-dark text-danger-dark'; ?>">
                <?php echo htmlspecialchars($form_msg); ?>
            </div>
            <?php endif; ?>

            <div class="bg-light rounded-lg shadow-md border border-gray-200 p-8">
                <form action="room-add.php" method="POST" class="space-y-6">
                    <input type="hidden" name="action" value="add_room">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Room Number -->
                        <div>
                            <label for="room_number" class="block text-sm font-medium text-text-mid mb-2">Room No <span
                                    class="text-danger-dark">*</span></label>
                            <input type="text" id="room_number" name="room_number"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary/50"
                                placeholder="e.g., 01" required />
                        </div>

                        <!-- Floor -->
                        <div>
                            <label for="floor" class="block text-sm font-medium text-text-mid mb-2">Floor <span
                                    class="text-danger-dark">*</span></label>
                            <input type="text" id="floor" name="floor"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary/50"
                                placeholder="e.g., F-1" required />
                        </div>

                        <!-- Price -->
                        <div>
                            <label for="price" class="block text-sm font-medium text-text-mid mb-2">Price <span
                                    class="text-danger-dark">*</span></label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-500">$</span>
                                <input type="number" id="price" name="price" step="0.01"
                                    class="w-full border border-gray-300 rounded-lg pl-8 pr-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary/50"
                                    placeholder="0.00" required />
                            </div>
                        </div>

                        <!-- Status -->
                        <div>
                            <label for="status" class="block text-sm font-medium text-text-mid mb-2">Availability <span
                                    class="text-danger-dark">*</span></label>
                            <select id="status" name="status"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary/50">
                                <option value="Available">Available</option>
                                <option value="Occupied">Occupied</option>
                                <option value="Maintenance">Under Maintenance</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex justify-end gap-4 pt-4 border-t border-gray-200">
                        <a href="rooms.php"
                            class="px-6 py-2.5 border border-gray-300 text-text-mid font-semibold rounded-lg hover:bg-gray-50 transition-colors">Cancel</a>
                        <button type="submit"
                            class="px-6 py-2.5 bg-primary text-white font-semibold rounded-lg shadow-md hover:bg-primary-dark transition-colors">Save
                            Room</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
