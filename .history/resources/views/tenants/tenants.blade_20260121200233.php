@extends('layouts.app')

@section('title', 'Dashboard')

@php
    // ✅ set active page for sidebar highlight
    $active_page = 'dashboard';
    $admin_name = $admin_name ?? 'Daniel';
@endphp

@section('content')
    {{-- <link rel="stylesheet" href="{{ asset('admin.css') }}"> --}}

    <main class="flex-1 overflow-y-auto bg-base">
        <div class="p-10 space-y-6">
            <!-- Page Header -->
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-primary-dark">TENANTS</h1>
                <!-- ENHANCEMENT: Added icon and hover effect -->
                <a href="{{ route('tanants.createblade') }}"
                    class="bg-blue-900 text-white px-5 py-2.5 rounded-lg font-semibold text-sm shadow-md hover:bg-blue-800 transition-all flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                        <path
                            d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                    </svg>
                    ADD NEW
                </a>
            </div>

            <!-- Filter/Search Section -->
            <!-- ENHANCEMENT: Removed card hover effects -->
            <div class="bg-light p-5 rounded-lg shadow-md border border-gray-200 space-y-4">
               <form method="GET" action="{{ route('tanants.index') }}" class="space-y-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
            <label class="block text-xs font-medium text-text-mid uppercase">From Date</label>
            <div class="relative mt-1">
                <input type="date" name="from_date" value="{{ request('from_date') }}"
                    class="w-full pl-3 pr-10 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary" />
            </div>
        </div>

        <div>
            <label class="block text-xs font-medium text-text-mid uppercase">To Date</label>
            <div class="relative mt-1">
                <input type="date" name="to_date" value="{{ request('to_date') }}"
                    class="w-full pl-3 pr-10 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary" />
            </div>
        </div>

        <div>
            <label class="block text-xs font-medium text-text-mid uppercase">Search</label>
            <div class="relative mt-1">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Enter search text here"
                    class="w-full pl-3 pr-10 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary" />
            </div>
        </div>
    </div>

    <div class="flex items-center gap-2 pt-2">
        <button class="bg-primary text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-primary/90">
            FILTER
        </button>

        <a href="{{ route('tanants.index') }}"
            class="bg-gray-200 text-text-mid px-4 py-2 rounded-md text-sm font-medium hover:bg-gray-300">
            CLEAR
        </a>

        <div class="ml-auto flex items-center gap-2">
            <span class="text-sm text-text-mid">Records per page</span>
            <select name="per_page" onchange="this.form.submit()"
                class="border border-gray-300 rounded-md p-1.5 text-xs focus:outline-none focus:ring-2 focus:ring-primary/50">
                @foreach([10,25,50] as $n)
                    <option value="{{ $n }}" @selected((int)request('per_page',10)===$n)>{{ $n }}</option>
                @endforeach
            </select>
        </div>
    </div>
</form>

            </div>

            <!-- All Tenants Table -->
            <!-- ENHANCEMENT: Removed card hover effects -->
            <div class="bg-light rounded-lg shadow-md border border-gray-200">
                <div class="p-5 border-b border-gray-200">
                    <h2 class="text-xl font-semibold text-primary-dark">
                        ALL TENANTS
                    </h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-text-mid">
                        <!-- ENHANCEMENT: Bolder headers -->
                        <thead class="text-xs text-text-dark uppercase bg-gray-50 font-semibold">
                            <tr>
                                <th scope="col" class="px-6 py-3">Tenant</th>
                                <th scope="col" class="px-6 py-3">Room No</th>
                                <th scope="col" class="px-6 py-3">Room Floor</th>
                                <th scope="col" class="px-6 py-3">Phone Number</th>
                                <th scope="col" class="px-6 py-3">Age</th>
                                <th scope="col" class="px-6 py-3">Start Date</th>
                                <th scope="col" class="px-6 py-3">End Date</th>
                                <th scope="col" class="px-6 py-3">Payment Term</th>
                                <th scope="col" class="px-6 py-3 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Table Row 1 -->
                            <!-- ENHANCEMENT: Added row hover, avatar, and bolder text -->
                            <tr class="bg-light border-b hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <img class="w-8 h-8 rounded-full" src="https://placehold.co/40x40/EA4335/FFF?text=A"
                                            alt="Alisha" />
                                        <span class="font-semibold text-text-dark">Alisha</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-medium text-text-dark">F-1</td>
                                <td class="px-6 py-4">F-1</td>
                                <td class="px-6 py-4">012 345 678</td>
                                <td class="px-6 py-4">21 years old</td>
                                <td class="px-6 py-4">01 September 2025</td>
                                <td class="px-6 py-4">01 September 2026</td>
                                <td class="px-6 py-4 font-medium text-text-dark">
                                    Monthly
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="relative inline-block">
                                        <button class="text-text-mid p-1 rounded-full hover:bg-gray-200"
                                            data-action="toggle-dropdown">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                            </svg>
                                        </button>
                                        <!-- Dropdown Menu -->
                                        <div
                                            class="action-dropdown absolute right-0 mt-2 w-40 bg-light rounded-md shadow-lg border border-gray-200 z-10 hidden">
                                            <a href="tenant_detail.php"
                                                class="block px-4 py-2 text-sm text-text-dark hover:bg-gray-100">View
                                                Detail</a>
                                        </div>
                                    </div>
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
                            <button class="bg-warning-dark text-white w-7 h-7 rounded-md font-bold text-xs">
                                1
                            </button>
                            <button
                                class="bg-gray-200 text-text-dark w-7 h-7 rounded-md font-bold text-xs hover:bg-gray-300">
                                2
                            </button>
                            <button
                                class="bg-gray-200 text-text-dark w-7 h-7 rounded-md font-bold text-xs hover:bg-gray-300">
                                3
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
