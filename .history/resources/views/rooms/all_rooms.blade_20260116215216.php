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
        <div class="p-10 space-y-6">
            <!-- Page Header -->
            <h1 class="text-3xl font-bold text-primary-dark">ROOMS</h1>

            <!-- Alert -->
            <div
                class="bg-danger-light border border-danger-dark/50 text-danger-dark px-4 py-3 rounded-lg relative flex items-center gap-3">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                </svg>
                <span class="block sm:inline font-medium">Room alert</span>
                <span class="block sm:inline">Please note that your subscription plan is limited to 50
                    rooms</span>
                <button class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="w-6 h-6 fill-current text-danger-dark/70" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <title>Close</title>
                        <path
                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 2.651a1.2 1.2 0 1 1-1.697-1.697L8.18 10l-2.651-2.651a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-2.651a1.2 1.2 0 1 1 1.697 1.697L11.819 10l2.651 2.651a1.2 1.2 0 0 1 0 1.698z" />
                    </svg>
                </button>
            </div>

            <!-- Tabs and Filters -->
            <div class="flex items-center gap-6 border-b border-gray-200">
                <a href="{{ route('rooms.index') }}" class="py-2 px-1 text-sm font-semibold text-primary border-b-2 border-primary">All
                    Rooms</a>
                <a href="{{ route('rooms.roomsavailable') }}"
                    class="py-2 px-1 text-sm font-medium text-text-mid hover:text-text-dark">Available Rooms</a>
                <a href="rooms_occupied_rooms.php"
                    class="py-2 px-1 text-sm font-medium text-text-mid hover:text-text-dark">Occupied</a>
            </div>
            <div class="flex justify-between items-center pt-2">
                <!-- Tabs -->

                <!-- Actions -->
                <div class="flex items-center gap-3">
                    <button
                        class="flex items-center gap-2 text-sm font-medium text-text-dark bg-light border border-gray-300 px-4 py-2.5 rounded-lg shadow-sm hover:bg-gray-50">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 3c2.755 0 5.455.232 7.973.65m-15.946 0A18.01 18.01 0 0112 3m0 0v5.828a5.88 5.88 0 01-1.51 3.96L8.027 15.66A9.03 9.03 0 0012 21c1.248 0 2.44-.25 3.535-.7" />
                        </svg>
                        <span>Filter</span>
                    </button>
                    <a href="{{ route('rooms.createblade') }}" id="add-room-btn"
                        class="bg-blue-900 text-white px-5 py-2.5 rounded-lg font-semibold text-sm shadow-md hover:bg-blue-800 transition-all flex items-center gap-2">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        <span>Add a new room</span>
                    </a>
                </div>
            </div>

            <!-- All Rooms Table -->
            <div class="bg-light rounded-lg shadow-md border border-gray-200">
                <div class="p-5 border-b border-gray-200 flex justify-between items-center">
                    <h2 class="text-xl font-semibold text-primary-dark">
                        ALL ROOMS
                    </h2>
                    <div class="relative w-72">
                        <input type="text" placeholder="Search rooms..."
                            class="w-full pl-10 pr-4 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary" />
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-text-mid">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-text-mid">
                        <thead class="text-xs text-text-dark uppercase bg-gray-50 font-semibold">
                            <tr>
                                <th scope="col" class="px-6 py-3">Room No</th>
                                <th scope="col" class="px-6 py-3">Room Floor</th>
                                <th scope="col" class="px-6 py-3">Tenants</th>
                                <th scope="col" class="px-6 py-3">Start Date</th>
                                <th scope="col" class="px-6 py-3">End Date</th>
                                <th scope="col" class.Accessory..-6 py-3">Availability</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Table Row 1 -->
                            <tr class="bg-light border-b hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-text-dark">01</td>
                                <td class="px-6 py-4">F-1</td>
                                <td class="px-6 py-4 flex items-center gap-1.5">
                                    <svg class="w-4 h-4 text-text-mid" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                    </svg>
                                    <span>4</span>
                                </td>
                                <td class="px-6 py-4">01 September 2025</td>
                                <td class="px-6 py-4">01 September 2026</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-2.5 py-1 text-xs font-medium rounded-full bg-primary-light text-primary">Occupied</span>
                                </td>
                            </tr>
                            <!-- Table Row 2 -->
                            <tr class="bg-light border-b hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-text-dark">02</td>
                                <td class="px-6 py-4">F-1</td>
                                <td class="px-6 py-4 flex items-center gap-1.5">
                                    <svg class="w-4 h-4 text-text-mid" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                    </svg>
                                    <span>4</span>
                                </td>
                                <td class="px-6 py-4">01 September 2025</td>
                                <td class="px-6 py-4">01 September 2026</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-2.5 py-1 text-xs font-medium rounded-full bg-primary-light text-primary">Occupied</span>
                                </td>
                            </tr>
                            <!-- Table Row 3 -->
                            <tr class="bg-light border-b hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-text-dark">03</td>
                                <td class="px-6 py-4">F-1</td>
                                <td class="px-6 py-4 flex items-center gap-1.5">
                                    <svg class="w-4 h-4 text-text-mid" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                    </svg>
                                    <span>4</span>
                                </td>
                                <td class="px-6 py-4">01 September 2025</td>
                                <td class="px-6 py-4">01 September 2026</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-2.5 py-1 text-xs font-medium rounded-full bg-primary-light text-primary">Occupied</span>
                                </td>
                            </tr>
                            <!-- Table Row 4 -->
                            <tr class="bg-light border-b hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-text-dark">04</td>
                                <td class="px-6 py-4">F-1</td>
                                <td class="px-6 py-4 flex items-center gap-1.5">
                                    <svg class="w-4 h-4 text-text-mid" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                    </svg>
                                    <span>4</span>
                                </td>
                                <td class="px-6 py-4">01 September 2025</td>
                                <td class="px-6 py-4">01 September 2026</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-2.5 py-1 text-xs font-medium rounded-full bg-primary-light text-primary">Occupied</span>
                                </td>
                            </tr>
                            <!-- Table Row 5 -->
                            <tr class="bg-light border-b hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-text-dark">05</td>
                                <td class="px-6 py-4">F-1</td>
                                <td class="px-6 py-4 flex items-center gap-1.5">
                                    <svg class="w-4 h-4 text-text-mid" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                    </svg>
                                    <span>4</span>
                                </td>
                                <td class="px-6 py-4">01 September 2025</td>
                                <td class="px-6 py-4">01 September 2026</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-2.5 py-1 text-xs font-medium rounded-full bg-primary-light text-primary">Occupied</span>
                                </td>
                            </tr>
                            <!-- Table Row 6 -->
                            <tr class="bg-light border-b hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-text-dark">06</td>
                                <td class="px-6 py-4">F-1</td>
                                <td class="px-6 py-4 flex items-center gap-1.5">
                                    <svg class="w-4 h-4 text-text-mid" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                    </svg>
                                    <span>4</span>
                                </td>
                                <td class="px-6 py-4">01 September 2025</td>
                                <td class="px-6 py-4">01 September 2026</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-2.5 py-1 text-xs font-medium rounded-full bg-primary-light text-primary">Occupied</span>
                                </td>
                            </tr>
                            <!-- Table Row 7 -->
                            <tr class="bg-light border-b hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-text-dark">07</td>
                                <td class="px-6 py-4">F-1</td>
                                <td class="px-6 py-4 flex items-center gap-1.5">
                                    <svg class="w-4 h-4 text-text-mid" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                    </svg>
                                    <span>4</span>
                                </td>
                                <td class="px-6 py-4">01 September 2025</td>
                                <td class="px-6 py-4">01 September 2026</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-2.5 py-1 text-xs font-medium rounded-full bg-primary-light text-primary">Occupied</span>
                                </td>
                            </tr>
                            <!-- Table Row 8 -->
                            <tr class="bg-light border-b hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-text-dark">08</td>
                                <td class="px-6 py-4">F-1</td>
                                <td class="px-6 py-4 flex items-center gap-1.5">
                                    <svg class="w-4 h-4 text-text-mid" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                    </svg>
                                    <span>4</span>
                                </td>
                                <td class="px-6 py-4">01 September 2025</td>
                                <td class="px-6 py-4">01 September 2026</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-2.5 py-1 text-xs font-medium rounded-full bg-primary-light text-primary">Occupied</span>
                                </td>
                            </tr>
                            <!-- Table Row 9 -->
                            <tr class="bg-light border-b hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-text-dark">09</td>
                                <td class="px-6 py-4">F-1</td>
                                <td class="px-6 py-4 flex items-center gap-1.5">
                                    <svg class="w-4 h-4 text-text-mid" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                    </svg>
                                    <span>4</span>
                                </td>
                                <td class="px-6 py-4">01 September 2025</td>
                                <td class="px-6 py-4">01 September 2026</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-2.5 py-1 text-xs font-medium rounded-full bg-primary-light text-primary">Occupied</span>
                                </td>
                            </tr>
                            <!-- Table Row 10 -->
                            <tr class="bg-light hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-text-dark">10</td>
                                <td class="px-6 py-4">F-1</td>
                                <td class="px-6 py-4 flex items-center gap-1.5">
                                    <svg class="w-4 h-4 text-text-mid" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                    </svg>
                                    <span>4</span>
                                </td>
                                <td class="px-6 py-4">01 September 2025</td>
                                <td class="px-6 py-4">01 September 2026</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-2.5 py-1 text-xs font-medium rounded-full bg-primary-light text-primary">Occupied</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Table Footer / Pagination -->
                <div class="p-5 flex justify-between items-center text-sm text-text-mid">
                    <div>
                        <span class="font-semibold text-text-dark">10 / 50</span>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="flex items-center gap-2">
                            <span>Records per page</span>
                            <select
                                class="border border-gray-300 rounded-md p-1.5 text-xs focus:outline-none focus:ring-2 focus:ring-primary/50">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                            </select>
                        </div>
                        <div class="flex items-center gap-2">
                            <button class="border border-gray-300 text-gray-400 w-7 h-7 rounded-md font-bold text-xs">
                                1
                            </button>
                            <button class="bg-warning-dark text-white w-7 h-7 rounded-md font-bold text-xs">
                                2
                            </button>
                            <button
                                class="border border-gray-300 text-text-dark w-7 h-7 rounded-md font-bold text-xs hover:bg-gray-100">
                                3
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div id="add-room-modal"
        class="fixed inset-0 bg-black/30 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-md border border-gray-200">
            <!-- Modal Header -->
            <div class="flex justify-between items-center p-5 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-primary-dark">
                    Add a New Room
                </h2>
                <button id="modal-close-btn" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <form class="p-6 space-y-4">
                <div>
                    <label for="room-no" class="block text-sm font-medium text-text-mid">Room No</label>
                    <input type="text" id="room-no"
                        class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary/50"
                        placeholder="e.g., 01" />
                </div>

                <div>
                    <label for="room-floor" class="block text-sm font-medium text-text-mid">Room Floor</label>
                    <input type="text" id="room-floor"
                        class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary/50"
                        placeholder="e.g., F-1" />
                </div>

                <div>
                    <label for="price" class="block text-sm font-medium text-text-mid">Price</label>
                    <div class="relative mt-1">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-sm text-gray-500">$</span>
                        <input type="number" id="price"
                            class="block w-full pl-7 pr-12 border border-gray-300 rounded-lg shadow-sm py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary/50"
                            placeholder="0.00" />
                        <span class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm text-gray-500">/month</span>
                    </div>
                </div>

                <div>
                    <label for="availability" class="block text-sm font-medium text-text-mid">Availability</label>
                    <select id="availability"
                        class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary/50">
                        <option value="available">Available</option>
                        <option value="occupied">Occupied</option>
                        <option value="maintenance">Under Maintenance</option>
                    </select>
                </div>
            </form>

            <!-- Modal Footer -->
            <div class="flex justify-end items-center gap-3 p-5 bg-gray-50 rounded-b-xl">
                <button id="modal-cancel-btn"
                    class="bg-white border border-gray-300 text-text-mid px-5 py-2.5 rounded-lg font-semibold text-sm hover:bg-gray-100 transition-all">
                    Cancel
                </button>
                <button
                    class="bg-primary text-white px-5 py-2.5 rounded-lg font-semibold text-sm shadow-md hover:bg-primary-dark transition-all">
                    Save Room
                </button>
            </div>
        </div>
    </div>
@endsection
