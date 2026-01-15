    {{-- <link rel="stylesheet" href="{{ asset('admin.css') }}"> --}}

    <main class="flex-1 overflow-y-auto bg-base">
        <div class="p-10 space-y-6">
            <!-- Page Header -->
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-primary-dark">TENANTS</h1>
                <!-- ENHANCEMENT: Added icon and hover effect -->
                <button
                    class="bg-blue-900 text-white px-5 py-2.5 rounded-lg font-semibold text-sm shadow-md hover:bg-blue-800 transition-all flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                        <path
                            d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                    </svg>
                    ADD NEW
                </button>
            </div>

            <!-- Filter/Search Section -->
            <!-- ENHANCEMENT: Removed card hover effects -->
            <div class="bg-light p-5 rounded-lg shadow-md border border-gray-200 space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- From Date -->
                    <div>
                        <label for="from_date" class="block text-xs font-medium text-text-mid uppercase">From
                            Date</label>
                        <div class="relative mt-1">
                            <input type="text" id="from_date" name="from_date" placeholder="From date"
                                class="w-full pl-3 pr-10 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary" />
                            <span
                                class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-text-mid">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <!-- To Date -->
                    <div>
                        <label for="to_date" class="block text-xs font-medium text-text-mid uppercase">To Date</label>
                        <div class="relative mt-1">
                            <input type="text" id="to_date" name="to_date" placeholder="To date"
                                class="w-full pl-3 pr-10 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary" />
                            <span
                                class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-text-mid">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <!-- Search -->
                    <div>
                        <label for="search" class="block text-xs font-medium text-text-mid uppercase">Search</label>
                        <div class="relative mt-1">
                            <input type="text" id="search" name="search" placeholder="Enter search text here"
                                class="w-full pl-3 pr-10 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary" />
                            <span
                                class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-text-mid">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-2 pt-2">
                    <button
                        class="bg-primary text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-primary/90 transition-colors">
                        FILTER
                    </button>
                    <button
                        class="bg-gray-200 text-text-mid px-4 py-2 rounded-md text-sm font-medium hover:bg-gray-300 transition-colors">
                        CLEAR
                    </button>
                    <button
                        class="bg-primary-light text-primary px-4 py-2 rounded-md text-sm font-medium hover:bg-blue-200 transition-colors">
                        IMPORT
                    </button>
                    <button
                        class="bg-success-dark text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-success-dark/90 transition-colors">
                        EXPORT
                    </button>
                </div>
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
                                        <img class="w-8 h-8 rounded-full"
                                            src="https://placehold.co/40x40/EA4335/FFF?text=A" alt="Alisha" />
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
                            <!-- Table Row 2 -->
                            <tr class="bg-light border-b hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <img class="w-8 h-8 rounded-full"
                                            src="https://placehold.co/40x40/3B82F6/FFF?text=B" alt="Bob" />
                                        <span class="font-semibold text-text-dark">Bob</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-medium text-text-dark">F-1</td>
                                <td class="px-6 py-4">F-1</td>
                                <td class="px-6 py-4">012 345 678</td>
                                <td class="px-6 py-4">21 years old</td>
                                <td class="px-6 py-4">01 September 2025</td>
                                <td class="px-6 py-4">01 September 2026</td>
                                <td class="px-6 py-4 font-medium text-text-dark">
                                    Yearly
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
                                            <a href="tenant-detail.php"
                                                class="block px-4 py-2 text-sm text-text-dark hover:bg-gray-100">View
                                                Detail</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <!-- Table Row 3 -->
                            <tr class="bg-light border-b hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <img class="w-8 h-8 rounded-full"
                                            src="https://placehold.co/40x40/10B981/FFF?text=C" alt="Charlie" />
                                        <span class="font-semibold text-text-dark">Charlie</span>
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
                                            <a href="tenant-detail.php"
                                                class="block px-4 py-2 text-sm text-text-dark hover:bg-gray-100">View
                                                Detail</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <!-- Table Row 4 -->
                            <tr class="bg-light border-b hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <img class="w-8 h-8 rounded-full"
                                            src="https://placehold.co/40x40/F59E0B/FFF?text=D" alt="David" />
                                        <span class="font-semibold text-text-dark">David</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-medium text-text-dark">F-1</td>
                                <td class="px-6 py-4">F-1</td>
                                <td class="px-6 py-4">012 345 678</td>
                                <td class="px-6 py-4">21 years old</td>
                                <td class="px-6 py-4">01 September 2025</td>
                                <td class="px-6 py-4">01 September 2026</td>
                                <td class="px-6 py-4 font-medium text-text-dark">
                                    Yearly
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
                                            <a href="tenant-detail.php"
                                                class="block px-4 py-2 text-sm text-text-dark hover:bg-gray-100">View
                                                Detail</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <!-- Table Row 5 -->
                            <tr class="bg-light border-b hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <img class="w-8 h-8 rounded-full"
                                            src="https://placehold.co/40x40/8B5CF6/FFF?text=E" alt="Eve" />
                                        <span class="font-semibold text-text-dark">Eve</span>
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
                                            <a href="tenant-detail.php"
                                                class="block px-4 py-2 text-sm text-text-dark hover:bg-gray-100">View
                                                Detail</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <!-- Table Row 6 -->
                            <tr class="bg-light border-b hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <img class="w-8 h-8 rounded-full"
                                            src="https://placehold.co/40x40/EC4899/FFF?text=F" alt="Fiona" />
                                        <span class="font-semibold text-text-dark">Fiona</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-medium text-text-dark">F-1</td>
                                <td class="px-6 py-4">F-1</td>
                                <td class="px-6 py-4">012 345 678</td>
                                <td class="px-6 py-4">21 years old</td>
                                <td class="px-6 py-4">01 September 2025</td>
                                <td class="px-6 py-4">01 September 2026</td>
                                <td class="px-6 py-4 font-medium text-text-dark">
                                    Yearly
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
                                            <a href="tenant-detail.php"
                                                class="block px-4 py-2 text-sm text-text-dark hover:bg-gray-100">View
                                                Detail</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <!-- Table Row 7 -->
                            <tr class="bg-light border-b hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <img class="w-8 h-8 rounded-full"
                                            src="https://placehold.co/40x40/78716C/FFF?text=G" alt="George" />
                                        <span class="font-semibold text-text-dark">George</span>
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
                                            <a href="tenant-detail.php"
                                                class="block px-4 py-2 text-sm text-text-dark hover:bg-gray-100">View
                                                Detail</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <!-- Table Row 8 -->
                            <tr class="bg-light border-b hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <img class="w-8 h-8 rounded-full"
                                            src="https://placehold.co/40x40/EA4335/FFF?text=A" alt="Alisha" />
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
                                    Yearly
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
                                            <a href="tenant-detail.php"
                                                class="block px-4 py-2 text-sm text-text-dark hover:bg-gray-100">View
                                                Detail</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <!-- Table Row 9 -->
                            <tr class="bg-light border-b hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <img class="w-8 h-8 rounded-full"
                                            src="https://placehold.co/40x40/EA4335/FFF?text=A" alt="Alisha" />
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
                                            <a href="tenant-detail.php"
                                                class="block px-4 py-2 text-sm text-text-dark hover:bg-gray-100">View
                                                Detail</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <!-- Table Row 10 -->
                            <tr class="bg-light hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <img class="w-8 h-8 rounded-full"
                                            src="https://placehold.co/40x40/EA4335/FFF?text=A" alt="Alisha" />
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
                                    Yearly
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
                                            <a href="tenant-detail.php"
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
