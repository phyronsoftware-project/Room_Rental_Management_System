{{-- resources/views/partials/header.blade.php --}}
<nav class="bg-primary-dark text-white flex justify-between items-center px-6 py-3 shadow-lg z-20">
    <div class="flex items-center gap-3">
        <svg class="w-7 h-7 text-blue-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h6.75M9 10.5h6.75M9 14.25h6.75M9 18h6.75" />
        </svg>
        <span class="text-xl font-bold tracking-wide">ANTHONY RESIDENCE</span>
    </div>

    <div class="flex items-center gap-5">
        <button class="relative p-2 rounded-full hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-primary-dark focus:ring-white">
            <span class="sr-only">View notifications</span>
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
            </svg>
            <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full border-2 border-primary-dark"></span>
        </button>

        <div class="relative">
            <button id="user-menu-button" class="flex items-center gap-2 bg-blue-900 px-3 py-2 rounded-full text-sm font-medium hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-primary-dark focus:ring-white">
                <img class="w-8 h-8 rounded-full" src="https://placehold.co/40x40/60A5FA/FFF?text=D" alt="User avatar" />
                <span>{{ $admin_name ?? 'Daniel' }}</span>
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
            </button>

            <div id="user-menu" class="absolute right-0 mt-2 w-48 bg-light rounded-md shadow-lg py-1 border border-gray-200 z-30 hidden transition-all duration-300 ease-in-out" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button">
                <a href="{{ aroute('') }}" class="block px-4 py-2 text-sm text-text-dark hover:bg-base" role="menuitem">Your Profile</a>
                <a href="{{ url('/settings') }}" class="block px-4 py-2 text-sm text-text-dark hover:bg-base" role="menuitem">Settings</a>
                <hr class="border-gray-200 my-1" />
                <a href="{{ url('/logout') }}" class="block px-4 py-2 text-sm text-danger-dark hover:bg-danger-light" role="menuitem">Sign out</a>
            </div>
        </div>
    </div>
</nav>
