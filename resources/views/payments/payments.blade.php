{{-- resources/views/dashboard.blade.php
@extends('layouts.app')

@section('title', 'Dashboard')

@php
    // ✅ set active page for sidebar highlight
    $active_page = 'dashboard';
    $admin_name  = $admin_name ?? 'Daniel';
@endphp

@section('content')

@endsection --}}


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
            <h1 class="text-3xl font-bold text-primary-dark">PAYMENTS</h1>

            <!-- Filter Section -->
            <!-- ENHANCEMENT: Removed hover effects -->
            <div class="bg-light p-6 rounded-lg shadow-md border border-gray-200">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-x-6 gap-y-4 items-end">
                    <!-- Row 1 -->
                    <div class="space-y-1">
                        <label class="text-xs font-semibold text-text-mid uppercase">FROM DATE</label>
                        <div class="relative">
                            <input type="date"
                                class="form-input w-full border border-gray-300 rounded-lg p-2.5 text-sm text-text-dark focus:outline-none focus:ring-2 focus:ring-primary/50"
                                placeholder="To date" />
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.75 3a.75.75 0 01.75.75v.25H10V3a.75.75 0 011.5 0v1h.75a.75.75 0 010 1.5H10v.25a.75.75 0 01-1.5 0V5H7.5a.75.75 0 010-1.5H9V3.75A.75.75 0 019.75 3h.5a.75.75 0 01.75.75v.25h.75a.75.75 0 01.75.75v.25h1.5a.75.75 0 010 1.5h-1.5v.25a.75.75 0 01-1.5 0v-.25H10a.75.75 0 01-.75-.75V6H7.5a.75.75 0 01-.75-.75V5H5.75a.75.75 0 01-.75-.75v-.25A.75.75 0 015.75 3zM4 9a.75.75 0 01.75.75v.25H6V9a.75.75 0 011.5 0v1h.75a.75.75 0 010 1.5H6v.25a.75.75 0 01-1.5 0V10H3.75a.75.75 0 010-1.5H5V9.75A.75.75 0 014 9zm11.25.75a.75.75 0 00-1.5 0v.25h-1.5a.75.75 0 000 1.5h1.5v.25a.75.75 0 001.5 0v-.25h.75a.75.75 0 000-1.5h-.75V9.75zM9 13a.75.75 0 01.75.75v.25h.75a.75.75 0 010 1.5h-.75v.25a.75.75 0 01-1.5 0v-.25H7.5a.75.75 0 010-1.5h.75v-.25A.75.75 0 019 13z"
                                        clip-rule="evenodd" />
                                    <path
                                        d="M2.5 5.5A2.5 2.5 0 015 3h10a2.5 2.5 0 012.5 2.5v10a2.5 2.5 0 01-2.5 2.5H5a2.5 2.5 0 01-2.5-2.5V5.5zM5 4.5a1 1 0 00-1 1v10a1 1 0 001 1h10a1 1 0 001-1V5.5a1 1 0 00-1-1H5z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-1">
                        <label class="text-xs font-semibold text-text-mid uppercase">TO DATE</label>
                        <div class="relative">
                            <input type="date"
                                class="form-input w-full border border-gray-300 rounded-lg p-2.5 text-sm text-text-dark focus:outline-none focus:ring-2 focus:ring-primary/50"
                                placeholder="To date" />
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.75 3a.75.75 0 01.75.75v.25H10V3a.75.75 0 011.5 0v1h.75a.75.75 0 010 1.5H10v.25a.75.75 0 01-1.5 0V5H7.5a.75.75 0 010-1.5H9V3.75A.75.75 0 019.75 3h.5a.75.75 0 01.75.75v.25h.75a.75.75 0 01.75.75v.25h1.5a.75.75 0 010 1.5h-1.5v.25a.75.75 0 01-1.5 0v-.25H10a.75.75 0 01-.75-.75V6H7.5a.75.75 0 01-.75-.75V5H5.75a.75.75 0 01-.75-.75v-.25A.75.75 0 015.75 3zM4 9a.75.75 0 01.75.75v.25H6V9a.75.75 0 011.5 0v1h.75a.75.75 0 010 1.5H6v.25a.75.75 0 01-1.5 0V10H3.75a.75.75 0 010-1.5H5V9.75A.75.75 0 014 9zm11.25.75a.75.75 0 00-1.5 0v.25h-1.5a.75.75 0 000 1.5h1.5v.25a.75.75 0 001.5 0v-.25h.75a.75.75 0 000-1.5h-.75V9.75zM9 13a.75.75 0 01.75.75v.25h.75a.75.75 0 010 1.5h-.75v.25a.75.75 0 01-1.5 0v-.25H7.5a.75.75 0 010-1.5h.75v-.25A.75.75 0 019 13z"
                                        clip-rule="evenodd" />
                                    <path
                                        d="M2.5 5.5A2.5 2.5 0 015 3h10a2.5 2.5 0 012.5 2.5v10a2.5 2.5 0 01-2.5 2.5H5a2.5 2.5 0 01-2.5-2.5V5.5zM5 4.5a1 1 0 00-1 1v10a1 1 0 001 1h10a1 1 0 001-1V5.5a1 1 0 00-1-1H5z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-1">
                        <label class="text-xs font-semibold text-text-mid uppercase">SEARCH</label>
                        <div class="relative">
                            <input type="text"
                                class="form-input w-full border border-gray-300 rounded-lg p-2.5 text-sm text-text-dark focus:outline-none focus:ring-2 focus:ring-primary/50"
                                placeholder="Enter tenant/room" />
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Row 2 -->
                    <div class="space-y-1">
                        <label class="text-xs font-semibold text-text-mid uppercase">TENANT NAME</label>
                        <input type="text"
                            class="form-input w-full border border-gray-300 rounded-lg p-2.5 text-sm text-text-dark focus:outline-none focus:ring-2 focus:ring-primary/50"
                            placeholder="Enter name" />
                    </div>
                    <div class="space-y-1">
                        <label class="text-xs font-semibold text-text-mid uppercase">TO DATE</label>
                        <div class="relative">
                            <input type="date"
                                class="form-input w-full border border-gray-300 rounded-lg p-2.5 text-sm text-text-dark focus:outline-none focus:ring-2 focus:ring-primary/50"
                                placeholder="To date" />
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.75 3a.75.75 0 01.75.75v.25H10V3a.75.75 0 011.5 0v1h.75a.75.75 0 010 1.5H10v.25a.75.75 0 01-1.5 0V5H7.5a.75.75 0 010-1.5H9V3.75A.75.75 0 019.75 3h.5a.75.75 0 01.75.75v.25h.75a.75.75 0 01.75.75v.25h1.5a.75.75 0 010 1.5h-1.5v.25a.75.75 0 01-1.5 0v-.25H10a.75.75 0 01-.75-.75V6H7.5a.75.75 0 01-.75-.75V5H5.75a.75.75 0 01-.75-.75v-.25A.75.75 0 015.75 3zM4 9a.75.75 0 01.75.75v.25H6V9a.75.75 0 011.5 0v1h.75a.75.75 0 010 1.5H6v.25a.75.75 0 01-1.5 0V10H3.75a.75.75 0 010-1.5H5V9.75A.75.75 0 014 9zm11.25.75a.75.75 0 00-1.5 0v.25h-1.5a.75.75 0 000 1.5h1.5v.25a.75.75 0 001.5 0v-.25h.75a.75.75 0 000-1.5h-.75V9.75zM9 13a.75.75 0 01.75.75v.25h.75a.75.75 0 010 1.5h-.75v.25a.75.75 0 01-1.5 0v-.25H7.5a.75.75 0 010-1.5h.75v-.25A.75.75 0 019 13z"
                                        clip-rule="evenodd" />
                                    <path
                                        d="M2.5 5.5A2.5 2.5 0 015 3h10a2.5 2.5 0 012.5 2.5v10a2.5 2.5 0 01-2.5 2.5H5a2.5 2.5 0 01-2.5-2.5V5.5zM5 4.5a1 1 0 00-1 1v10a1 1 0 001 1h10a1 1 0 001-1V5.5a1 1 0 00-1-1H5z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="space-y-1">
                        <label class="text-xs font-semibold text-text-mid uppercase">SEARCH</label>
                        <div class="relative">
                            <input type="text"
                                class="form-input w-full border border-gray-300 rounded-lg p-2.5 text-sm text-text-dark focus:outline-none focus:ring-2 focus:ring-primary/50"
                                placeholder="Enter landlord/room" />
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Page Title -->
            <div class="space-y-1 pt-4">
                <h2 class="text-sm font-semibold text-text-dark uppercase">
                    PAYMENTS DETAILS
                </h2>
            </div>

            <!-- All Payments Table -->
            <!-- ENHANCEMENT: Removed card hover -->
            <div class="bg-light rounded-lg shadow-md border border-gray-200">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-text-mid">
                        <thead class="text-xs text-text-dark uppercase bg-gray-50 font-semibold">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-center">Action</th>
                                <th scope="col" class="px-6 py-3">Room number/floor</th>
                                <th scope="col" class="px-6 py-3">Tenant Name</th>
                                <th scope="col" class="px-6 py-3">Phone Number</th>
                                <th scope="col" class="px-6 py-3">Electricity</th>
                                <th scope="col" class="px-6 py-3">Water Bills</th>
                                <th scope="col" class="px-6 py-3">Total</th>
                                <th scope="col" class="px-6 py-3">Payment Method</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Table Row 1 -->
                            <!-- ENHANCEMENT: Added row hover, dropdown, and data -->
                            <tr class="bg-light border-b hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4 text-center">
                                    <div class="relative inline-block">
                                        <button class="text-text-mid p-1 rounded-full hover:bg-gray-200"
                                            data-action="toggle-dropdown">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path
                                                    d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z" />
                                            </svg>
                                        </button>
                                        <!-- Dropdown Menu -->
                                        <div
                                            class="action-dropdown absolute left-0 mt-2 w-40 bg-light rounded-md shadow-lg border border-gray-200 z-10 hidden">
                                            <a href="payment_detail.php"
                                                class="block px-4 py-2 text-sm text-text-dark hover:bg-gray-100">View
                                                Detail</a>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-medium text-text-dark">
                                    101/1st Floor
                                </td>
                                <td class="px-6 py-4 font-semibold text-text-dark">
                                    Alisha
                                </td>
                                <td class="px-6 py-4">012 345 678</td>
                                <td class="px-6 py-4">112KWh</td>
                                <td class="px-6 py-4">50KL</td>
                                <td class="px-6 py-4 font-medium text-text-dark">
                                    $150
                                </td>
                                <td class="px-6 py-4 font-medium text-text-dark">
                                    ABA Bank
                                </td>
                            </tr>
                            <!-- Table Row 2 -->
                            <tr class="bg-light border-b hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4 text-center">
                                    <div class="relative inline-block">
                                        <button class="text-text-mid p-1 rounded-full hover:bg-gray-200"
                                            data-action="toggle-dropdown">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path
                                                    d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z" />
                                            </svg>
                                        </button>
                                        <!-- Dropdown Menu -->
                                        <div
                                            class="action-dropdown absolute left-0 mt-2 w-40 bg-light rounded-md shadow-lg border border-gray-200 z-10 hidden">
                                            <a href="payment-detail.php"
                                                class="block px-4 py-2 text-sm text-text-dark hover:bg-gray-100">View
                                                Detail</a>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-medium text-text-dark">F-1</td>
                                <td class="px-6 py-4 font-semibold text-text-dark">
                                    Alisha
                                </td>
                                <td class="px-6 py-4">012 345 678</td>
                                <td class="px-6 py-4">112KWh</td>
                                <td class="px-6 py-4">50KL</td>
                                <td class="px-6 py-4 font-medium text-text-dark">
                                    $150
                                </td>
                                <td class="px-6 py-4 font-medium text-text-dark">Cash</td>
                            </tr>
                            <!-- Table Row 3 -->
                            <tr class="bg-light border-b hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4 text-center">
                                    <div class="relative inline-block">
                                        <button class="text-text-mid p-1 rounded-full hover:bg-gray-200"
                                            data-action="toggle-dropdown">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path
                                                    d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z" />
                                            </svg>
                                        </button>
                                        <!-- Dropdown Menu -->
                                        <div
                                            class="action-dropdown absolute left-0 mt-2 w-40 bg-light rounded-md shadow-lg border border-gray-200 z-10 hidden">
                                            <a href="payment-detail.php"
                                                class="block px-4 py-2 text-sm text-text-dark hover:bg-gray-100">View
                                                Detail</a>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-medium text-text-dark">F-1</td>
                                <td class="px-6 py-4 font-semibold text-text-dark">
                                    Alisha
                                </td>
                                <td class="px-6 py-4">012 345 678</td>
                                <td class="px-6 py-4">112KWh</td>
                                <td class="px-6 py-4">50KL</td>
                                <td class="px-6 py-4 font-medium text-text-dark">
                                    $150
                                </td>
                                <td class="px-6 py-4 font-medium text-text-dark">
                                    Wing Bank
                                </td>
                            </tr>
                            <!-- Table Row 4 -->
                            <tr class="bg-light border-b hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4 text-center">
                                    <div class="relative inline-block">
                                        <button class="text-text-mid p-1 rounded-full hover:bg-gray-200"
                                            data-action="toggle-dropdown">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path
                                                    d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z" />
                                            </svg>
                                        </button>
                                        <!-- Dropdown Menu -->
                                        <div
                                            class="action-dropdown absolute left-0 mt-2 w-40 bg-light rounded-md shadow-lg border border-gray-200 z-10 hidden">
                                            <a href="payment_detail.php"
                                                class="block px-4 py-2 text-sm text-text-dark hover:bg-gray-100">View
                                                Detail</a>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-medium text-text-dark">F-1</td>
                                <td class="px-6 py-4 font-semibold text-text-dark">
                                    Alisha
                                </td>
                                <td class="px-6 py-4">012 345 678</td>
                                <td class="px-6 py-4">112KWh</td>
                                <td class="px-6 py-4">50KL</td>
                                <td class="px-6 py-4 font-medium text-text-dark">
                                    $150
                                </td>
                                <td class="px-6 py-4 font-medium text-text-dark">
                                    ABA Bank
                                </td>
                            </tr>
                            <!-- Table Row 5 -->
                            <tr class="bg-light border-b hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4 text-center">
                                    <div class="relative inline-block">
                                        <button class="text-text-mid p-1 rounded-full hover:bg-gray-200"
                                            data-action="toggle-dropdown">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path
                                                    d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z" />
                                            </svg>
                                        </button>
                                        <!-- Dropdown Menu -->
                                        <div
                                            class="action-dropdown absolute left-0 mt-2 w-40 bg-light rounded-md shadow-lg border border-gray-200 z-10 hidden">
                                            <a href="payment-detail.php"
                                                class="block px-4 py-2 text-sm text-text-dark hover:bg-gray-100">View
                                                Detail</a>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-medium text-text-dark">F-1</td>
                                <td class="px-6 py-4 font-semibold text-text-dark">
                                    Alisha
                                </td>
                                <td class="px-6 py-4">012 345 678</td>
                                <td class="px-6 py-4">112KWh</td>
                                <td class="px-6 py-4">50KL</td>
                                <td class="px-6 py-4 font-medium text-text-dark">
                                    $150
                                </td>
                                <td class="px-6 py-4 font-medium text-text-dark">Cash</td>
                            </tr>
                            <!-- Table Row 6 -->
                            <tr class="bg-light border-b hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4 text-center">
                                    <div class="relative inline-block">
                                        <button class="text-text-mid p-1 rounded-full hover:bg-gray-200"
                                            data-action="toggle-dropdown">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path
                                                    d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z" />
                                            </svg>
                                        </button>
                                        <!-- Dropdown Menu -->
                                        <div
                                            class="action-dropdown absolute left-0 mt-2 w-40 bg-light rounded-md shadow-lg border border-gray-200 z-10 hidden">
                                            <a href="payment-detail.php"
                                                class="block px-4 py-2 text-sm text-text-dark hover:bg-gray-100">View
                                                Detail</a>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-medium text-text-dark">F-1</td>
                                <td class="px-6 py-4 font-semibold text-text-dark">
                                    Alisha
                                </td>
                                <td class="px-6 py-4">012 345 678</td>
                                <td class="px-6 py-4">112KWh</td>
                                <td class="px-6 py-4">50KL</td>
                                <td class="px-6 py-4 font-medium text-text-dark">
                                    $150
                                </td>
                                <td class="px-6 py-4 font-medium text-text-dark">
                                    ABA Bank
                                </td>
                            </tr>
                            <!-- Table Row 7 -->
                            <tr class="bg-light border-b hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4 text-center">
                                    <div class="relative inline-block">
                                        <button class="text-text-mid p-1 rounded-full hover:bg-gray-200"
                                            data-action="toggle-dropdown">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path
                                                    d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z" />
                                            </svg>
                                        </button>
                                        <!-- Dropdown Menu -->
                                        <div
                                            class="action-dropdown absolute left-0 mt-2 w-40 bg-light rounded-md shadow-lg border border-gray-200 z-10 hidden">
                                            <a href="payment-detail.php"
                                                class="block px-4 py-2 text-sm text-text-dark hover:bg-gray-100">View
                                                Detail</a>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-medium text-text-dark">F-1</td>
                                <td class="px-6 py-4 font-semibold text-text-dark">
                                    Alisha
                                </td>
                                <td class="px-6 py-4">012 345 678</td>
                                <td class="px-6 py-4">112KWh</td>
                                <td class="px-6 py-4">50KL</td>
                                <td class="px-6 py-4 font-medium text-text-dark">
                                    $150
                                </td>
                                <td class="px-6 py-4 font-medium text-text-dark">
                                    ABA Bank
                                </td>
                            </tr>
                            <!-- Table Row 8 -->
                            <tr class="bg-light border-b hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4 text-center">
                                    <div class="relative inline-block">
                                        <button class="text-text-mid p-1 rounded-full hover:bg-gray-200"
                                            data-action="toggle-dropdown">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path
                                                    d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z" />
                                            </svg>
                                        </button>
                                        <!-- Dropdown Menu -->
                                        <div
                                            class="action-dropdown absolute left-0 mt-2 w-40 bg-light rounded-md shadow-lg border border-gray-200 z-10 hidden">
                                            <a href="payment-detail.php"
                                                class="block px-4 py-2 text-sm text-text-dark hover:bg-gray-100">View
                                                Detail</a>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-medium text-text-dark">F-1</td>
                                <td class="px-6 py-4 font-semibold text-text-dark">
                                    Alisha
                                </td>
                                <td class="px-6 py-4">012 345 678</td>
                                <td class="px-6 py-4">112KWh</td>
                                <td class="px-6 py-4">50KL</td>
                                <td class="px-6 py-4 font-medium text-text-dark">
                                    $150
                                </td>
                                <td class="px-6 py-4 font-medium text-text-dark">Cash</td>
                            </tr>
                            <!-- Table Row 9 -->
                            <tr class="bg-light border-b hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4 text-center">
                                    <div class="relative inline-block">
                                        <button class="text-text-mid p-1 rounded-full hover:bg-gray-200"
                                            data-action="toggle-dropdown">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path
                                                    d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z" />
                                            </svg>
                                        </button>
                                        <!-- Dropdown Menu -->
                                        <div
                                            class="action-dropdown absolute left-0 mt-2 w-40 bg-light rounded-md shadow-lg border border-gray-200 z-10 hidden">
                                            <a href="payment-detail.php"
                                                class="block px-4 py-2 text-sm text-text-dark hover:bg-gray-100">View
                                                Detail</a>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-medium text-text-dark">F-1</td>
                                <td class="px-6 py-4 font-semibold text-text-dark">
                                    Alisha
                                </td>
                                <td class="px-6 py-4">012 345 678</td>
                                <td class_... <td class="px-6 py-4">50KL</td>
                                <td class="px-6 py-4 font-medium text-text-dark">
                                    $150
                                </td>
                                <td class="px-6 py-4 font-medium text-text-dark">
                                    ABA Bank
                                </td>
                            </tr>
                            <!-- Table Row 10 -->
                            <tr class="bg-light hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4 text-center">
                                    <div class="relative inline-block">
                                        <button class="text-text-mid p-1 rounded-full hover:bg-gray-200"
                                            data-action="toggle-dropdown">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path
                                                    d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z" />
                                            </svg>
                                        </button>
                                        <!-- Dropdown Menu -->
                                        <div
                                            class="action-dropdown absolute left-0 mt-2 w-40 bg-light rounded-md shadow-lg border border-gray-200 z-10 hidden">
                                            <a href="payment-detail.php"
                                                class="block px-4 py-2 text-sm text-text-dark hover:bg-gray-100">View
                                                Detail</a>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-medium text-text-dark">F-1</td>
                                <td class="px-6 py-4 font-semibold text-text-dark">
                                    Alisha
                                </td>
                                <td class="px-6 py-4">012 345 678</td>
                                <td class="px-6 py-4">112KWh</td>
                                <td class="px-6 py-4">50KL</td>
                                <td class="px-6 py-4 font-medium text-text-dark">
                                    $150
                                </td>
                                <td class="px-6 py-4 font-medium text-text-dark">
                                    Wing Bank
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
                            <select
                                class="border border-gray-300 rounded-md p-1.5 text-xs focus:outline-none focus:ring-2 focus:ring-primary/50">
                                <option value="10">10 per page</option>
                                <option value="25">25 per page</option>
                                <option value="50">50 per page</option>
                            </select>
                        </div>
                        <div class="flex items-center gap-2">
                            <button
                                class="border border-gray-300 text-gray-400 w-7 h-7 rounded-md font-bold text-xs flex items-center justify-center">
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            <button class="bg-warning-dark text-white w-7 h-7 rounded-md font-bold text-xs">
                                1
                            </button>
                            <button
                                class="border border-gray-300 text-text-dark w-7 h-7 rounded-md font-bold text-xs hover:bg-gray-100">
                                2
                            </button>
                            <button
                                class="border border-gray-300 text-text-dark w-7 h-7 rounded-md font-bold text-xs hover:bg-gray-100">
                                3
                            </button>
                            <button
                                class="border border-gray-300 text-text-dark w-7 h-7 rounded-md font-bold text-xs hover:bg-gray-100">
                                4
                            </button>
                            <span class="text-text-dark">...</span>
                            <button
                                class="border border-gray-300 text-text-dark w-7 h-7 rounded-md font-bold text-xs hover:bg-gray-100">
                                50
                            </button>
                            <button
                                class="border border-gray-300 text-text-dark w-7 h-7 rounded-md font-bold text-xs flex items-center justify-center hover:bg-gray-100">
                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
