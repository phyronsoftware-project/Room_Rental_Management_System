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
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-primary-dark">REPORTS</h1>
            </div>

            <!-- Report Generation Section -->
            <div class="bg-light p-6 rounded-lg shadow-md border border-gray-200">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-x-6 gap-y-4 items-end">
                    <div class="space-y-1">
                        <label class="text-xs font-semibold text-text-mid">REPORT TYPE</label>
                        <select
                            class="form-select w-full border border-gray-300 rounded-lg p-2.5 text-sm text-text-dark focus:outline-none focus:ring-2 focus:ring-primary/50">
                            <option>Payment Summary</option>
                            <option>Tenant List</option>
                            <option>Maintenance Log</option>
                            <option>Room Occupancy</option>
                        </select>
                    </div>
                    <div class="space-y-1">
                        <label class="text-xs font-semibold text-text-mid">FROM DATE</label>
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
                        <label class="text-xs font-semibold text-text-mid">TO DATE</label>
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
                    <button
                        class="bg-blue-900 text-white px-5 py-2.5 rounded-lg font-semibold text-sm shadow-md hover:bg-blue-800 transition-all flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path
                                d="M10.75 2.75a.75.75 0 00-1.5 0v8.614L6.295 8.235a.75.75 0 10-1.09 1.03l4.25 4.5a.75.75 0 001.09 0l4.25-4.5a.75.75 0 00-1.09-1.03l-2.955 3.129V2.75z" />
                            <path
                                d="M3.5 12.75a.75.75 0 00-1.5 0v2.5A2.75 2.75 0 004.75 18h10.5A2.75 2.75 0 0018 15.25v-2.5a.75.75 0 00-1.5 0v2.5a1.25 1.25 0 01-1.25 1.25H4.75A1.25 1.25 0 013.5 15.25v-2.5z" />
                        </svg>
                        <span>Generate Report</span>
                    </button>
                </div>
            </div>

            <!-- Report Results -->
            <div class="bg-light rounded-lg shadow-md border border-gray-200">
                <!-- Report Header -->
                <div class="p-5 border-b border-gray-200 flex justify-between items-center">
                    <div>
                        <h2 class="text-xl font-semibold text-primary-dark">
                            Payment Summary
                        </h2>
                        <p class="text-sm text-text-mid">
                            November 1, 2025 - November 30, 2025
                        </p>
                    </div>
                    <button
                        class="flex items-center gap-2 text-sm font-medium text-text-dark bg-light border border-gray-300 px-4 py-2.5 rounded-lg shadow-sm hover:bg-gray-50">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5 2.75C5 1.784 5.784 1 6.75 1h6.5c.966 0 1.75.784 1.75 1.75v3.5a.75.75 0 01-1.5 0V3.75a.25.25 0 00-.25-.25h-6.5a.25.25 0 00-.25.25v3.5a.75.75 0 01-1.5 0v-3.5z"
                                clip-rule="evenodd" />
                            <path
                                d="M3.5 8A1.5 1.5 0 002 9.5v6A1.5 1.5 0 003.5 17h13a1.5 1.5 0 001.5-1.5v-6A1.5 1.5 0 0016.5 8h-13zM15 9.5a.5.5 0 000-1H5a.5.5 0 000 1h10z" />
                        </svg>
                        <span>Print Report</span>
                    </button>
                </div>

                <!-- Report Summary Cards -->
                <div class="p-5 grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-primary-light p-4 rounded-lg">
                        <h3 class="text-sm font-medium text-primary">Total Income</h3>
                        <p class="text-2xl font-bold text-primary-dark">$12,300.00</p>
                    </div>
                    <div class="bg-warning-light p-4 rounded-lg">
                        <h3 class="text-sm font-medium text-warning-dark">
                            Total Overdue
                        </h3>
                        <p class="text-2xl font-bold text-yellow-900">$621.00</p>
                    </div>
                    <div class="bg-success-light p-4 rounded-lg">
                        <h3 class="text-sm font-medium text-success-dark">
                            Total Maintenance Costs
                        </h3>
                        <p class="text-2xl font-bold text-green-900">$1,300.00</p>
                    </div>
                </div>

                <!-- Report Details Table -->
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-text-mid">
                        <thead class="text-xs text-text-dark uppercase bg-gray-50 font-semibold">
                            <tr>
                                <th scope="col" class="px-6 py-3">Room No</th>
                                <th scope="col" class="px-6 py-3">Tenant</th>
                                <th scope="col" class="px-6 py-3">Amount Paid</th>
                                <th scope="col" class="px-6 py-3">Date Paid</th>
                                <th scope="col" class="px-6 py-3">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Table Row 1 -->
                            <tr class="bg-light border-b hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-text-dark">F-1</td>
                                <td class="px-6 py-4 font-semibold text-text-dark">Alisha</td>
                                <td class="px-6 py-4">$400.00</td>
                                <td class="px-6 py-4">01 November 2025</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-2.5 py-1 text-xs font-medium rounded-full bg-success-light text-success-dark">Paid</span>
                                </td>
                            </tr>
                            <!-- Table Row 2 -->
                            <tr class="bg-light border-b hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-text-dark">F-2</td>
                                <td class="px-6 py-4 font-semibold text-text-dark">John Doe</td>
                                <td class="px-6 py-4">$400.00</td>
                                <td class="px-6 py-4">02 November 2025</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-2.5 py-1 text-xs font-medium rounded-full bg-success-light text-success-dark">Paid</span>
                                </td>
                            </tr>
                            <!-- Table Row 3 -->
                            <tr class="bg-light border-b hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-text-dark">F-3</td>
                                <td class="px-6 py-4 font-semibold text-text-dark">Jane Smith</td>
                                <td class="px-6 py-4">$400.00</td>
                                <td class="px-6 py-4">-</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-2.5 py-1 text-xs font-medium rounded-full bg-danger-light text-danger-dark">Overdue</span>
                                </td>
                            </tr>
                            <!-- Table Row 4 -->
                            <tr class="bg-light border-b hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-text-dark">F-4</td>
                                <td class="px-6 py-4 font-semibold text-text-dark">Mikey</td>
                                <td class="px-6 py-4">$400.00</td>
                                <td class="px-6 py-4">04 November 2025</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="px-2.5 py-1 text-xs font-medium rounded-full bg-success-light text-success-dark">Paid</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
