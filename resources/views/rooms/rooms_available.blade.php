{{-- resources/views/dashboard.blade.php --}}
@extends('layouts.app')

@section('title', 'Rooms Available')

@php
    // ✅ set active page for sidebar highlight (UI only)
    $active_page = 'dashboard';
@endphp

@section('content')
    <main class="flex-1 overflow-y-auto bg-base">
        <div class="p-10 space-y-6">

            {{-- Page Header --}}
            <h1 class="text-3xl font-bold text-primary-dark">AVAILABLE ROOMS</h1>

            {{-- ✅ Static success alert (UI only) --}}
            <div class="px-4 py-3 rounded-lg text-sm bg-success-light border border-success-dark text-emerald-700">
                ✅ Demo: Rooms loaded successfully (UI only)
            </div>

            {{-- Room alert (static) --}}
            <div id="roomAlert"
                class="bg-danger-light border border-danger-dark/50 text-danger-dark px-4 py-3 rounded-lg relative flex items-center gap-3">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                </svg>
                <span class="block sm:inline font-medium">Room alert</span>
                <span class="block sm:inline">Please note that your subscription plan is limited to 50 rooms</span>

                <button type="button" onclick="closeAlert()" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="w-6 h-6 fill-current text-danger-dark/70" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <title>Close</title>
                        <path
                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 2.651a1.2 1.2 0 1 1-1.697-1.697L8.18 10l-2.651-2.651a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-2.651a1.2 1.2 0 1 1 1.697 1.697L11.819 10l2.651 2.651a1.2 1.2 0 0 1 0 1.698z" />
                    </svg>
                </button>
            </div>

            {{-- Tabs & Actions --}}
            <div class="flex justify-between items-center pt-2">
                {{-- Tabs --}}
                <div class="flex items-center gap-6 border-b border-gray-200">
                    <a href="{{ route('rooms.index') }}"
                        class="py-2 px-1 text-sm font-medium text-text-mid hover:text-text-dark">All Rooms</a>
                    <a href="{{ route('rooms.roomsavailable') }}"
                        class="py-2 px-1 text-sm font-semibold text-primary border-b-2 border-primary">Available Rooms</a>
                    <a href="{{ route('rooms.rooms_occupied') }}"
                        class="py-2 px-1 text-sm font-medium text-text-mid hover:text-text-dark">Occupied</a>
                </div>

                {{-- Actions --}}
                <div class="flex items-center gap-3">
                    <button type="button"
                        class="flex items-center gap-2 text-sm font-medium text-text-dark bg-light border border-gray-300 px-4 py-2.5 rounded-lg shadow-sm hover:bg-gray-50">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 3c2.755 0 5.455.232 7.973.65m-15.946 0A18.01 18.01 0 0112 3m0 0v5.828a5.88 5.88 0 01-1.51 3.96L8.027 15.66A9.03 9.03 0 0012 21c1.248 0 2.44-.25 3.535-.7" />
                        </svg>
                        <span>Filter</span>
                    </button>

                    <a href="#"
                        class="bg-blue-900 text-white px-5 py-2.5 rounded-lg font-semibold text-sm shadow-md hover:bg-blue-800 transition-all flex items-center gap-2">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        <span>Add a new room</span>
                    </a>
                </div>
            </div>

            {{-- Table Card --}}
            <div class="bg-light rounded-lg shadow-md border border-gray-200">
                <div class="p-5 border-b border-gray-200 flex justify-between items-center">
                    <h2 class="text-xl font-semibold text-primary-dark">AVAILABLE ROOMS</h2>

                    {{-- Search (frontend only) --}}
                    <div class="relative w-72">
                        <input id="roomSearch" type="text" placeholder="Search rooms..."
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
                                <th class="px-6 py-3">Room No</th>
                                <th class="px-6 py-3">Room Floor</th>
                                <th class="px-6 py-3">Tenants</th>
                                <th class="px-6 py-3">Price</th>
                                <th class="px-6 py-3">Availability</th>
                                <th class="px-6 py-3 text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody id="roomsTbody">
                            {{-- ✅ Static fake rows --}}
                            <tr class="bg-light border-b hover:bg-gray-50 room-row" data-room="101 floor 1 120">
                                <td class="px-6 py-4 font-medium text-text-dark">101</td>
                                <td class="px-6 py-4">Floor 1</td>
                                <td class="px-6 py-4 flex items-center gap-1.5">
                                    <svg class="w-4 h-4 text-text-mid" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                    </svg>
                                    <span>N/A</span>
                                </td>
                                <td class="px-6 py-4">$120.00/month</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-2.5 py-1 text-xs font-medium rounded-full bg-success-light text-success-dark">Available</span>
                                </td>
                                <td class="px-6 py-4 text-center relative">
                                    <button type="button"
                                        class="actionBtn text-text-mid hover:text-text-dark focus:outline-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                        </svg>
                                    </button>

                                    <div
                                        class="actionMenu hidden absolute right-10 -top-2 w-auto bg-white border border-gray-200 rounded-lg shadow-xl z-50 p-1 flex gap-1 items-center">
                                        <a href="#"
                                            class="bg-blue-50 hover:bg-blue-100 text-blue-600 p-2 rounded-lg transition-colors"
                                            title="View Details">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </a>
                                        <a href="#"
                                            class="bg-green-50 hover:bg-green-100 text-green-600 p-2 rounded-lg transition-colors"
                                            title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.604a4.5 4.5 0 01-1.697 1.11l-2.662.813a.75.75 0 01-.96-.96l.813-2.662a4.5 4.5 0 011.11-1.697L16.862 4.487z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                            </svg>
                                        </a>
                                        <button type="button"
                                            class="bg-red-50 hover:bg-red-100 text-red-600 p-2 rounded-lg transition-colors"
                                            title="Delete" onclick="fakeDelete(this)">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <tr class="bg-light border-b hover:bg-gray-50 room-row" data-room="102 floor 1 150">
                                <td class="px-6 py-4 font-medium text-text-dark">102</td>
                                <td class="px-6 py-4">Floor 1</td>
                                <td class="px-6 py-4 flex items-center gap-1.5">
                                    <svg class="w-4 h-4 text-text-mid" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                    </svg>
                                    <span>N/A</span>
                                </td>
                                <td class="px-6 py-4">$150.00/month</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-2.5 py-1 text-xs font-medium rounded-full bg-success-light text-success-dark">Available</span>
                                </td>
                                <td class="px-6 py-4 text-center relative">
                                    <button type="button"
                                        class="actionBtn text-text-mid hover:text-text-dark focus:outline-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                        </svg>
                                    </button>
                                    <div
                                        class="actionMenu hidden absolute right-10 -top-2 w-auto bg-white border border-gray-200 rounded-lg shadow-xl z-50 p-1 flex gap-1 items-center">
                                        <a href="#"
                                            class="bg-blue-50 hover:bg-blue-100 text-blue-600 p-2 rounded-lg"
                                            title="View Details">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </a>
                                        <a href="#"
                                            class="bg-green-50 hover:bg-green-100 text-green-600 p-2 rounded-lg"
                                            title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.604a4.5 4.5 0 01-1.697 1.11l-2.662.813a.75.75 0 01-.96-.96l.813-2.662a4.5 4.5 0 011.11-1.697L16.862 4.487z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                            </svg>
                                        </a>
                                        <button type="button"
                                            class="bg-red-50 hover:bg-red-100 text-red-600 p-2 rounded-lg" title="Delete"
                                            onclick="fakeDelete(this)">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <tr class="bg-light border-b hover:bg-gray-50 room-row" data-room="201 floor 2 180">
                                <td class="px-6 py-4 font-medium text-text-dark">201</td>
                                <td class="px-6 py-4">Floor 2</td>
                                <td class="px-6 py-4 flex items-center gap-1.5">
                                    <svg class="w-4 h-4 text-text-mid" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                    </svg>
                                    <span>N/A</span>
                                </td>
                                <td class="px-6 py-4">$180.00/month</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-2.5 py-1 text-xs font-medium rounded-full bg-success-light text-success-dark">Available</span>
                                </td>
                                <td class="px-6 py-4 text-center relative">
                                    <button type="button"
                                        class="actionBtn text-text-mid hover:text-text-dark focus:outline-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                        </svg>
                                    </button>
                                    <div
                                        class="actionMenu hidden absolute right-10 -top-2 w-auto bg-white border border-gray-200 rounded-lg shadow-xl z-50 p-1 flex gap-1 items-center">
                                        <a href="#"
                                            class="bg-blue-50 hover:bg-blue-100 text-blue-600 p-2 rounded-lg"
                                            title="View Details">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </a>
                                        <a href="#"
                                            class="bg-green-50 hover:bg-green-100 text-green-600 p-2 rounded-lg"
                                            title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.604a4.5 4.5 0 01-1.697 1.11l-2.662.813a.75.75 0 01-.96-.96l.813-2.662a4.5 4.5 0 011.11-1.697L16.862 4.487z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                            </svg>
                                        </a>
                                        <button type="button"
                                            class="bg-red-50 hover:bg-red-100 text-red-600 p-2 rounded-lg" title="Delete"
                                            onclick="fakeDelete(this)">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <tr class="bg-light border-b hover:bg-gray-50 room-row" data-room="305 floor 3 220">
                                <td class="px-6 py-4 font-medium text-text-dark">305</td>
                                <td class="px-6 py-4">Floor 3</td>
                                <td class="px-6 py-4 flex items-center gap-1.5">
                                    <svg class="w-4 h-4 text-text-mid" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                    </svg>
                                    <span>N/A</span>
                                </td>
                                <td class="px-6 py-4">$220.00/month</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-2.5 py-1 text-xs font-medium rounded-full bg-success-light text-success-dark">Available</span>
                                </td>
                                <td class="px-6 py-4 text-center relative">
                                    <button type="button"
                                        class="actionBtn text-text-mid hover:text-text-dark focus:outline-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                        </svg>
                                    </button>
                                    <div
                                        class="actionMenu hidden absolute right-10 -top-2 w-auto bg-white border border-gray-200 rounded-lg shadow-xl z-50 p-1 flex gap-1 items-center">
                                        <a href="#"
                                            class="bg-blue-50 hover:bg-blue-100 text-blue-600 p-2 rounded-lg"
                                            title="View Details">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </a>
                                        <a href="#"
                                            class="bg-green-50 hover:bg-green-100 text-green-600 p-2 rounded-lg"
                                            title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.604a4.5 4.5 0 01-1.697 1.11l-2.662.813a.75.75 0 01-.96-.96l.813-2.662a4.5 4.5 0 011.11-1.697L16.862 4.487z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                            </svg>
                                        </a>
                                        <button type="button"
                                            class="bg-red-50 hover:bg-red-100 text-red-600 p-2 rounded-lg" title="Delete"
                                            onclick="fakeDelete(this)">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            {{-- empty state (hidden by default, shows when search no match) --}}
                            <tr id="noRoomsRow" class="hidden bg-light border-b">
                                <td colspan="6" class="px-6 py-4 text-center text-text-mid">No available rooms found.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                {{-- Pagination footer (static) --}}
                <div class="p-5 flex justify-between items-center text-sm text-text-mid">
                    <div>
                        <span class="font-semibold text-text-dark">1 - 4</span> of
                        <span class="font-semibold text-text-dark">24</span> rooms
                    </div>

                    <div class="flex items-center gap-2">
                        <a href="#"
                            class="border border-gray-300 text-gray-600 px-2.5 py-1 rounded-md font-medium text-xs hover:bg-gray-100 opacity-50 pointer-events-none">Previous</a>

                        <a href="#"
                            class="w-7 h-7 rounded-md font-bold text-xs flex items-center justify-center bg-warning-dark text-white">1</a>
                        <a href="#"
                            class="w-7 h-7 rounded-md font-bold text-xs flex items-center justify-center border border-gray-300 text-text-dark hover:bg-gray-100">2</a>
                        <a href="#"
                            class="w-7 h-7 rounded-md font-bold text-xs flex items-center justify-center border border-gray-300 text-text-dark hover:bg-gray-100">3</a>

                        <a href="#"
                            class="border border-gray-300 text-text-dark px-2.5 py-1 rounded-md font-medium text-xs hover:bg-gray-100">Next</a>
                    </div>
                </div>
            </div>

        </div>
    </main>

    {{-- ✅ Frontend-only JS (toggle menu, click outside, search filter, close alert) --}}
    <script>
        function closeAlert() {
            const el = document.getElementById('roomAlert');
            if (el) el.classList.add('hidden');
        }

        // Toggle action menu for a row
        function closeAllMenus() {
            document.querySelectorAll('.actionMenu').forEach(m => m.classList.add('hidden'));
        }

        document.addEventListener('click', function(e) {
            const isBtn = e.target.closest('.actionBtn');
            const isMenu = e.target.closest('.actionMenu');

            // click on action button
            if (isBtn) {
                const row = isBtn.closest('td');
                const menu = row.querySelector('.actionMenu');
                const willOpen = menu.classList.contains('hidden');

                closeAllMenus();
                if (willOpen) menu.classList.remove('hidden');
                return;
            }

            // click outside menus
            if (!isMenu) closeAllMenus();
        });

        // Fake delete (UI only)
        function fakeDelete(btn) {
            if (!confirm('UI only: delete this room row?')) return;
            const tr = btn.closest('tr');
            if (tr) tr.remove();
            closeAllMenus();
            runSearchFilter(); // update empty state
        }

        // Search filter (frontend only)
        const searchInput = document.getElementById('roomSearch');
        if (searchInput) {
            searchInput.addEventListener('input', runSearchFilter);
        }

        function runSearchFilter() {
            const q = (searchInput?.value || '').toLowerCase().trim();
            const rows = document.querySelectorAll('#roomsTbody .room-row');
            let shown = 0;

            rows.forEach(r => {
                const text = (r.getAttribute('data-room') || '').toLowerCase();
                const ok = !q || text.includes(q);
                r.classList.toggle('hidden', !ok);
                if (ok) shown++;
            });

            const emptyRow = document.getElementById('noRoomsRow');
            if (emptyRow) emptyRow.classList.toggle('hidden', shown !== 0);
        }
    </script>
@endsection
