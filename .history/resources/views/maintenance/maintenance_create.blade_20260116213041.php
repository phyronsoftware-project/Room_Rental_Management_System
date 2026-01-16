{{-- resources/views/dashboard.blade.php --}}
@extends('layouts.app')

@section('title', 'Dashboard')

@php
    // ✅ set active page for sidebar highlight
    $active_page = 'dashboard';
    $admin_name = $admin_name ?? 'Daniel';
@endphp

@section('content')
    <main class="flex-1 overflow-y-auto bg-base">
        <div class="p-10 max-w-4xl mx-auto">
            <div class="flex items-center gap-4 mb-6">
                <a href="maintenance.php" class="text-text-mid hover:text-primary transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                    </svg>
                </a>
                <h1 class="text-3xl font-bold text-primary-dark">Add New Maintenance Request</h1>
            </div>

            <?php if (!empty($form_msg)): ?>
            <div class="mb-6 px-4 py-3 rounded-lg text-sm <?php echo $form_msg_type == 'success' ? 'bg-success-light border border-success-dark text-emerald-700' : 'bg-danger-light border border-danger-dark text-danger-dark'; ?>">
                <?php echo htmlspecialchars($form_msg); ?>
            </div>
            <?php endif; ?>

            <div class="bg-light rounded-lg shadow-md border border-gray-200 p-8">
                <form action="maintenance-add.php" method="POST" class="space-y-6">
                    <input type="hidden" name="action" value="add_request">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="room_id" class="block text-sm font-medium text-text-mid mb-2">Room <span
                                    class="text-danger-dark">*</span></label>
                            <select id="room_id" name="room_id"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary/50"
                                required>
                                <option value="">Select a room</option>
                                <?php foreach ($all_rooms as $room): ?>
                                <option value="<?php echo $room['room_id']; ?>">
                                    Room <?php echo htmlspecialchars($room['room_number']); ?> (<?php echo htmlspecialchars($room['floor']); ?>)
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div>
                            <label for="date_reported" class="block text-sm font-medium text-text-mid mb-2">Date Reported
                                <span class="text-danger-dark">*</span></label>
                            <input type="date" id="date_reported" name="date_reported"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary/50"
                                required />
                        </div>
                    </div>

                    <div>
                        <label for="issue_reported" class="block text-sm font-medium text-text-mid mb-2">Issue Reported
                            <span class="text-danger-dark">*</span></label>
                        <textarea id="issue_reported" name="issue_reported" rows="3"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary/50"
                            placeholder="e.g., Leaky faucet in bathroom" required></textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="assigned_to" class="block text-sm font-medium text-text-mid mb-2">Assigned To
                                (Optional)</label>
                            <input type="text" id="assigned_to" name="assigned_to"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary/50"
                                placeholder="e.g., Mr. Handy" />
                        </div>

                        <div>
                            <label for="status" class="block text-sm font-medium text-text-mid mb-2">Status <span
                                    class="text-danger-dark">*</span></label>
                            <select id="status" name="status"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-primary/50"
                                required>
                                <option value="Pending">Pending</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Completed">Completed</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex justify-end gap-4 pt-4 border-t border-gray-200">
                        <a href="maintenance.php"
                            class="px-6 py-2.5 border border-gray-300 text-text-mid font-semibold rounded-lg hover:bg-gray-50 transition-colors">Cancel</a>
                        <button type="submit"
                            class="px-6 py-2.5 bg-primary text-white font-semibold rounded-lg shadow-md hover:bg-primary-dark transition-colors">Save
                            Request</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
