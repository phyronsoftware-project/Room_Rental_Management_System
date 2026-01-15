{{-- resources/views/dashboard.blade.php --}}
@extends('layouts.app')

@section('title', 'Dashboard')

@php
    // ✅ set active page for sidebar highlight
    /Applications/XAMPP/xamppfiles/htdocs/Room_Rental_Management/source/rooms_all_rooms.php 'dashboard';
    $admin_name  = $admin_name ?? 'Daniel';
@endphp

@section('content')
<div class="p-10">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Left Column --}}
        <div class="lg:col-span-2 space-y-6">

            {{-- Residence Image Card --}}
            <div class="bg-light rounded-lg shadow-md border border-gray-200 overflow-hidden transition-all duration-300 ease-in-out hover:shadow-xl hover:-translate-y-1">
                <img
                    src="https://source.unsplash.com/random/800x400/?apartment,modern"
                    onerror="this.onerror=null;this.src='https://placehold.co/800x400/dbeafe/172554?text=Anthony+Residence';"
                    alt="Anthony Residence"
                    class="w-full h-64 object-cover" />
                <div class="p-5 flex justify-between items-center">
                    <h2 class="text-xl font-bold text-primary-dark">ANTHONY RESIDENCE</h2>
                    <svg class="w-7 h-7 text-warning-dark" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h6.75M9 10.5h6.75M9 14.25h6.75M9 18h6.75" />
                    </svg>
                </div>
            </div>

            {{-- Stats Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-warning-light p-5 rounded-lg shadow-sm border border-warning-dark/20 transition-all duration-300 ease-in-out hover:shadow-lg hover:-translate-y-1">
                    <div class="flex items-center justify-between">
                        <h3 class="text-sm font-medium text-yellow-700 uppercase tracking-wide">Units</h3>
                        <svg class="w-5 h-5 text-yellow-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5" />
                        </svg>
                    </div>
                    <p class="text-4xl font-bold text-warning-dark mt-1">50</p>
                    <span class="text-xs text-yellow-700">Total units</span>
                </div>

                <div class="bg-primary-light p-5 rounded-lg shadow-sm border border-primary/20 transition-all duration-300 ease-in-out hover:shadow-lg hover:-translate-y-1">
                    <div class="flex items-center justify-between">
                        <h3 class="text-sm font-medium text-blue-700 uppercase tracking-wide">Occupied</h3>
                        <svg class="w-5 h-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                        </svg>
                    </div>
                    <p class="text-4xl font-bold text-primary mt-1">39</p>
                    <span class="text-xs text-blue-700">Currently occupied</span>
                </div>

                <div class="bg-success-light p-5 rounded-lg shadow-sm border border-success-dark/20 transition-all duration-300 ease-in-out hover:shadow-lg hover:-translate-y-1">
                    <div class="flex items-center justify-between">
                        <h3 class="text-sm font-medium text-green-700 uppercase tracking-wide">Available</h3>
                        <svg class="w-5 h-5 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5V6.75a4.5 4.5 0 11-9 0v3.75" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 10.5h10.5a2.25 2.25 0 012.25 2.25v6.75a2.25 2.25 0 01-2.25 2.25H6.75A2.25 2.25 0 014.5 19.5v-6.75a2.25 2.25 0 012.25-2.25z" />
                        </svg>
                    </div>
                    <p class="text-4xl font-bold text-success-dark mt-1">11</p>
                    <span class="text-xs text-green-700">Ready for tenants</span>
                </div>
            </div>

            {{-- Recent Rent Payments Table --}}
            <div class="bg-light rounded-lg shadow-md border border-gray-200 transition-all duration-300 ease-in-out hover:shadow-xl hover:-translate-y-1">
                <div class="p-5 border-b border-gray-200">
                    <h2 class="text-xl font-semibold text-primary-dark">Recent Rent Payments</h2>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-text-mid">
                        <thead class="text-xs text-text-dark uppercase bg-gray-50 font-semibold">
                        <tr>
                            <th class="px-6 py-3">Room No</th>
                            <th class="px-6 py-3">Room Floor</th>
                            <th class="px-6 py-3">Tenant</th>
                            <th class="px-6 py-3">Rent Due</th>
                            <th class="px-6 py-3">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $rows = [
                                [1,1,'Daniel',200,'Paid'],
                                [22,2,'Run',120,'Paid'],
                                [14,1,'Sokha',150,'Paid'],
                                [8,1,'Nita',200,'Paid'],
                                [42,4,'David',100,'Paid'],
                                [3,1,'Maria',200,'Paid'],
                                [27,2,'James',120,'Paid'],
                                [31,3,'Chen',150,'Paid'],
                                [19,2,'Lina',120,'Paid'],
                            ];
                        @endphp

                        @foreach($rows as $r)
                            <tr class="bg-light border-b hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4 font-medium text-text-dark">{{ $r[0] }}</td>
                                <td class="px-6 py-4">{{ $r[1] }}</td>
                                <td class="px-6 py-4 font-semibold text-text-dark">{{ $r[2] }}</td>
                                <td class="px-6 py-4">$ {{ $r[3] }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 text-xs font-medium rounded-full bg-success-light text-success-dark">{{ $r[4] }}</span>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        {{-- Right Column --}}
        <div class="lg:col-span-1 space-y-6">

            {{-- Payments Card --}}
            <div class="bg-light rounded-lg shadow-md border border-gray-200 transition-all duration-300 ease-in-out hover:shadow-xl hover:-translate-y-1">
                <div class="p-5 flex justify-between items-center border-b border-gray-200">
                    <h2 class="text-xl font-semibold text-primary-dark">Payments</h2>
                    <a href="#" class="text-sm font-medium text-primary bg-primary-light px-3 py-1 rounded-full hover:bg-blue-200 transition-colors">This Month</a>
                </div>

                <div class="p-6 space-y-5">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-10 h-10 flex items-center justify-center bg-primary-light rounded-lg">
                            <svg class="w-6 h-6 text-primary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6V5.25M3.75 4.5A.75.75 0 014.5 3.75h1.5a.75.75 0 01.75.75V5.25" />
                            </svg>
                        </div>
                        <div>
                            <span class="text-sm text-text-mid">Rent</span>
                            <p class="text-3xl font-bold text-text-dark">$12,300</p>
                        </div>
                    </div>

                    <hr class="border-dashed" />

                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-10 h-10 flex items-center justify-center bg-blue-100 rounded-lg">
                            <svg class="w-6 h-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l-.317-.317A4.5 4.5 0 019.5 10.5" />
                            </svg>
                        </div>
                        <div>
                            <span class="text-sm text-text-mid">Maintenance</span>
                            <p class="text-3xl font-bold text-text-dark">$1300</p>
                        </div>
                    </div>

                    <hr class="border-dashed" />

                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 w-10 h-10 flex items-center justify-center bg-danger-light rounded-lg">
                            <svg class="w-6 h-6 text-danger-dark" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                            </svg>
                        </div>
                        <div>
                            <span class="text-sm text-text-mid">Rent overdue</span>
                            <p class="text-3xl font-bold text-danger-dark">$6210</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- New Requests --}}
            <div class="bg-light rounded-lg shadow-md border border-gray-200 transition-all duration-300 ease-in-out hover:shadow-xl hover:-translate-y-1">
                <div class="p-5 border-b border-gray-200">
                    <h2 class="text-xl font-semibold text-primary-dark">New Requests</h2>
                </div>

                <div class="divide-y divide-gray-200">
                    @php
                        $req = [
                            ['Daniel Chin','Room 45','https://placehold.co/40x40/FFC107/FFF?text=DC','border-warning-light'],
                            ['Anthony','Room 10','https://placehold.co/40x40/03A9F4/FFF?text=A','border-blue-100'],
                            ['Phearun','Room 7','https://placehold.co/40x40/4CAF50/FFF?text=P','border-green-100'],
                        ];
                    @endphp

                    @foreach($req as $q)
                        <div class="flex items-center justify-between p-4 hover:bg-gray-50 transition-colors duration-200">
                            <div class="flex items-center gap-3">
                                <img class="w-10 h-10 rounded-full border-2 {{ $q[3] }}" src="{{ $q[2] }}" alt="{{ $q[0] }}" />
                                <div>
                                    <p class="font-semibold text-text-dark">{{ $q[0] }}</p>
                                    <span class="text-xs text-text-mid">{{ $q[1] }}</span>
                                </div>
                            </div>
                            <button class="p-2 rounded-full text-text-mid hover:bg-gray-100">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                </svg>
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Upcoming Units --}}
            <div class="bg-light rounded-lg shadow-md border border-gray-200 transition-all duration-300 ease-in-out hover:shadow-xl hover:-translate-y-1">
                <div class="p-5 flex justify-between items-center border-b border-gray-200">
                    <h2 class="text-xl font-semibold text-primary-dark">Upcoming Units</h2>
                    <a href="#" class="text-sm text-primary hover:underline">Next 7 days</a>
                </div>

                <div class="p-2 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                    @for($i=1;$i<=3;$i++)
                        <div class="border border-gray-200 rounded-lg overflow-hidden transition-all duration-300 ease-in-out hover:shadow-md hover:border-gray-300">
                            <img src="https://source.unsplash.com/random/200x150/?room,{{ $i }}"
                                 onerror="this.onerror=null;this.src='https://placehold.co/200x150/dbeafe/172554?text=Unit';"
                                 class="w-full h-24 object-cover" alt="Upcoming Unit" />
                            <div class="p-3">
                                <p class="font-semibold text-text-dark">ANTHONY RESIDENCE</p>
                                <span class="text-xs text-text-mid">Room {{ [15,21,11][$i-1] }}</span>
                                <p class="text-sm font-medium text-text-dark mt-1">Price $120/month</p>
                                <p class="text-xs text-success-dark mt-2">Coming soon</p>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
