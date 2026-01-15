<?php
// Define variables for this page
$page_title = "Rooms";
$admin_name = "DANIEL";
$active_page = "rooms"; // Used to set the active sidebar link
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Updated Title -->
  <title><?php echo $page_title; ?></title>
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
    rel="stylesheet" />
  <!-- Font for the welcome heading -->
  <link
    href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap"
    rel="stylesheet" />

  <!-- Custom Tailwind Configuration - UPDATED -->
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ["Inter", "sans-serif"],
            bebas: ["Bebas Neue", "cursive"], // Added bebas font
          },
          colors: {
            "primary-dark": "#172554", // Dark Blue (e.g., blue-950)
            primary: "#1d4ed8", // Bright Blue (e.g., blue-700)
            "primary-light": "#dbeafe", // Light Blue (e.g., blue-100)
            light: "#ffffff", // White
            base: "#f9fafb", // Off-white (e.g., gray-50)
            "text-dark": "#1f2937", // Dark Gray (e.g., gray-800)
            "text-mid": "#6b7280", // Medium Gray (e.g., gray-500)
            "warning-dark": "#f59e0b", // Amber-500
            "warning-light": "#fef3c7", // Amber-100
            "success-dark": "#10b981", // Emerald-500
            "success-light": "#ecfdf5", // Emerald-100

            /* --- ADDED THESE MISSING COLORS --- */
            "danger-dark": "#dc2626", // Red-600
            "danger-light": "#fee2e2", // Red-100
            accent: "#a16207", // Amber-700 (for brown/orange accent)
            // Brand colors for icons
            facebook: "#1877F2",
            linkedin: "#0A66C2",
            telegram: "#24A1DE",
            gmail: "#EA4335",
            youtube: "#FF0000", // YouTube Red
            /* --- END OF ADDED COLORS --- */
          },
          // Added text shadow utility
          textShadow: {
            custom: "1px 1px 3px rgba(0, 0, 0, 0.1)",
          },
        },
      },
      // Add plugin for text-shadow
      plugins: [
        function({
          addUtilities,
          theme,
          e
        }) {
          const newUtilities = {};
          Object.entries(theme("textShadow")).forEach(([key, value]) => {
            newUtilities[`.${e(`text-shadow-${key}`)}`] = {
              textShadow: value,
            };
          });
          addUtilities(newUtilities);
        },
      ],
    };
  </script>

  <!-- Inline styles for scrollbar and body -->
  <style>
    body {
      font-family: "Inter", sans-serif;
    }

    /* Custom scrollbar */
    ::-webkit-scrollbar {
      width: 6px;
    }

    ::-webkit-scrollbar-track {
      background: #f1f1f1;
    }

    ::-webkit-scrollbar-thumb {
      background: #cbd5e1;
      border-radius: 6px;
    }

    ::-webkit-scrollbar-thumb:hover {
      background: #a0aec0;
    }

    /* Style for the active nav link */
    .nav-link.active {
      background-color: #dbeafe;
      /* primary-light */
      color: #1d4ed8;
      /* primary */
      font-weight: 600;
      border-left: 4px solid #1d4ed8;
      /* primary */
      padding-left: calc(1rem - 4px);
      /* Adjust padding */
    }
  </style>
</head>

<body class="bg-base text-text-dark">
  <div class="flex flex-col h-screen">
    <!-- Top Navigation Bar -->
    <nav
      class="bg-primary-dark text-white flex justify-between items-center px-6 py-3 shadow-lg z-20">
      <!-- Left Side: Logo and Title -->
      <div class="flex items-center gap-3">
        <svg
          class="w-7 h-7 text-blue-300"
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke-width="1.5"
          stroke="currentColor">
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h6.75M9 10.5h6.75M9 14.25h6.75M9 18h6.75" />
        </svg>
        <span class="text-xl font-bold tracking-wide">ANTHONY RESIDENCE</span>
      </div>

      <!-- Right Side: Icons and User Profile -->
      <div class="flex items-center gap-5">
        <!-- Notification Bell -->
        <!-- Updated color to bg-accent -->
        <button
          class="relative p-2 rounded-full hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-primary-dark focus:ring-white">
          <span class="sr-only">View notifications</span>
          <svg
            class="w-6 h-6"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor">
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
          </svg>
          <!-- Notification dot -->
          <span
            class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full border-2 border-primary-dark"></span>
        </button>

        <!-- User Profile Dropdown -->
        <div class="relative">
          <button
            id="user-menu-button"
            class="flex items-center gap-2 bg-blue-900 px-3 py-2 rounded-full text-sm font-medium hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-primary-dark focus:ring-white">
            <img
              class="w-8 h-8 rounded-full"
              src="https://placehold.co/40x40/60A5FA/FFF?text=D"
              alt="User avatar" />
            <span>Daniel</span>
            <svg
              class="w-4 h-4"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="2"
              stroke="currentColor">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>
          </button>

          <!-- Dropdown Menu (Initially hidden) -->
          <div
            id="user-menu"
            class="absolute right-0 mt-2 w-48 bg-light rounded-md shadow-lg py-1 border border-gray-200 z-30 hidden transition-all duration-300 ease-in-out"
            role="menu"
            aria-orientation="vertical"
            aria-labelledby="user-menu-button">
            <a
              href="profile.php"
              class="block px-4 py-2 text-sm text-text-dark hover:bg-base"
              role="menuitem">Your Profile</a>
            <a
              href="settings.php"
              class="block px-4 py-2 text-sm text-text-dark hover:bg-base"
              role="menuitem">Settings</a>
            <hr class="border-gray-200 my-1" />
            <a
              href="logout.php"
              class="block px-4 py-2 text-sm text-danger-dark hover:bg-danger-light"
              role="menuitem">Sign out</a>
          </div>
        </div>
      </div>
    </nav>

    <div class="flex flex-1 overflow-hidden">
      <!-- Sidebar Navigation -->
      <aside
        class="w-64 bg-light shadow-lg border-r border-gray-200 flex flex-col z-10 overflow-y-auto">
        <!-- Nav Links -->
        <nav class="mt-6 px-4 flex-1">
          <ul class="space-y-2">
            <li>
              <!-- Dashboard Link -->
              <a
                href="dashboard.php"
                class="nav-link <?php if ($active_page === 'dashboard') echo 'active'; ?> flex items-center gap-3 px-4 py-2.5 rounded-lg text-text-mid hover:bg-primary-light hover:text-primary transition-all">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="size-6">
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0V12a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 12V5.25" />
                </svg>
                <span>Dashboard</span>
              </a>
            </li>
            <li>
              <!-- Tenants Link -->
              <a
                href="tenants.php"
                class="nav-link <?php if ($active_page === 'tenants') echo 'active'; ?> flex items-center gap-3 px-4 py-2.5 rounded-lg text-text-mid hover:bg-primary-light hover:text-primary transition-all">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="size-6">
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                </svg>
                <span>Tenants</span>
              </a>
            </li>
            <li>
              <!-- Rooms Link -->
              <a
                href="#"
                class="nav-link <?php if ($active_page === 'rooms') echo 'active'; ?> flex items-center gap-3 px-4 py-2.5 rounded-lg text-text-mid hover:bg-primary-light hover:text-primary transition-all">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="size-6">
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                </svg>
                <span>Rooms</span>
              </a>
            </li>
            <li>
              <!-- Payment Link -->
              <a
                href="payments.php"
                class="nav-link <?php if ($active_page === 'payments') echo 'active'; ?> flex items-center gap-3 px-4 py-2.5 rounded-lg text-text-mid hover:bg-primary-light hover:text-primary transition-all">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="size-6">
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <span>Payment</span>
              </a>
            </li>
            <li>
              <!-- Maintenance Link -->
              <a
                href="maintenance.php"
                class="nav-link <?php if ($active_page === 'maintenance') echo 'active'; ?> flex items-center gap-3 px-4 py-2.5 rounded-lg text-text-mid hover:bg-primary-light hover:text-primary transition-all">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="size-6">
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 1 1-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 0 0 4.486-6.336l-3.276 3.277a3.004 3.004 0 0 1-2.25-2.25l3.276-3.276a4.5 4.5 0 0 0-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437 1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008Z" />
                </svg>
                <span>Maintenance</span>
              </a>
            </li>
            <li>
              <!-- Report Link -->
              <a
                href="report.php"
                class="nav-link <?php if ($active_page === 'report') echo 'active'; ?> flex items-center gap-3 px-4 py-2.5 rounded-lg text-text-mid hover:bg-primary-light hover:text-primary transition-all">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="1.5"
                  stroke="currentColor"
                  class="size-6">
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                </svg>

                <span>Report</span>
              </a>
            </li>
          </ul>
        </nav>

        <!-- Settings Link -->
        <div class="px-4 pb-6">
          <hr class="border-gray-200 mb-4" />
          <a
            href="settings.php"
            class="nav-link <?php if ($active_page === 'settings') echo 'active'; ?> flex items-center gap-3 px-4 py-2.5 rounded-lg text-text-mid hover:bg-primary-light hover:text-primary transition-all">
            <svg
              class="w-5 h-5"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M10.5 6h9.75M10.5 6a1.5 1.5 0 11-3 0m3 0a1.5 1.5 0 10-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m-9.75 0h9.75" />
            </svg>

            <span>Settings</span>
          </a>
        </div>
      </aside>

      <!-- Main Content Area -->
      <!-- REPLACED CONTENT FOR ROOMS PAGE -->
      <main class="flex-1 overflow-y-auto bg-base">
        <div class="p-10 space-y-6">
          <!-- Page Header -->
          <h1 class="text-3xl font-bold text-primary-dark">ROOMS</h1>

          <!-- Alert -->
          <div
            class="bg-danger-light border border-danger-dark/50 text-danger-dark px-4 py-3 rounded-lg relative flex items-center gap-3">
            <svg
              class="w-5 h-5"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
            </svg>
            <span class="block sm:inline font-medium">Room alert</span>
            <span class="block sm:inline">Please note that your subscription plan is limited to 50
              rooms</span>
            <button class="absolute top-0 bottom-0 right-0 px-4 py-3">
              <svg
                class="w-6 h-6 fill-current text-danger-dark/70"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20">
                <title>Close</title>
                <path
                  d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 2.651a1.2 1.2 0 1 1-1.697-1.697L8.18 10l-2.651-2.651a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-2.651a1.2 1.2 0 1 1 1.697 1.697L11.819 10l2.651 2.651a1.2 1.2 0 0 1 0 1.698z" />
              </svg>
            </button>
          </div>

          <!-- Tabs and Filters -->
          <div class="flex justify-between items-center pt-2">
            <!-- Tabs -->
            <div class="flex items-center gap-6 border-b border-gray-200">
              <a
                href="#"
                class="py-2 px-1 text-sm font-semibold text-primary border-b-2 border-primary">All Rooms</a>
              <a
                href="rooms_avail_rooms.php"
                class="py-2 px-1 text-sm font-medium text-text-mid hover:text-text-dark">Available Rooms</a>
              <a
                href="rooms_occupied_rooms.php"
                class="py-2 px-1 text-sm font-medium text-text-mid hover:text-text-dark">Occupied</a>
            </div>

            <!-- Actions -->
            <div class="flex items-center gap-3">
              <button
                class="flex items-center gap-2 text-sm font-medium text-text-dark bg-light border border-gray-300 px-4 py-2.5 rounded-lg shadow-sm hover:bg-gray-50">
                <svg
                  class="w-4 h-4"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="2"
                  stroke="currentColor">
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 3c2.755 0 5.455.232 7.973.65m-15.946 0A18.01 18.01 0 0112 3m0 0v5.828a5.88 5.88 0 01-1.51 3.96L8.027 15.66A9.03 9.03 0 0012 21c1.248 0 2.44-.25 3.535-.7" />
                </svg>
                <span>Filter</span>
              </button>
              <button
                id="add-room-btn"
                class="bg-blue-900 text-white px-5 py-2.5 rounded-lg font-semibold text-sm shadow-md hover:bg-blue-800 transition-all flex items-center gap-2">
                <svg
                  class="w-4 h-4"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 24 24"
                  stroke-width="2"
                  stroke="currentColor">
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                <span>Add a new room</span>
              </button>
            </div>
          </div>

          <!-- All Rooms Table -->
          <div class="bg-light rounded-lg shadow-md border border-gray-200">
            <div
              class="p-5 border-b border-gray-200 flex justify-between items-center">
              <h2 class="text-xl font-semibold text-primary-dark">
                ALL ROOMS
              </h2>
              <div class="relative w-72">
                <input
                  type="text"
                  placeholder="Search rooms..."
                  class="w-full pl-10 pr-4 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary/50 focus:border-primary" />
                <span
                  class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-text-mid">
                  <svg
                    class="w-5 h-5"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor">
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                  </svg>
                </span>
              </div>
            </div>
            <div class="overflow-x-auto">
              <table class="w-full text-sm text-left text-text-mid">
                <thead
                  class="text-xs text-text-dark uppercase bg-gray-50 font-semibold">
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
                      <svg
                        class="w-4 h-4 text-text-mid"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor">
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
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
                      <svg
                        class="w-4 h-4 text-text-mid"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor">
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
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
                      <svg
                        class="w-4 h-4 text-text-mid"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor">
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
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
                      <svg
                        class="w-4 h-4 text-text-mid"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor">
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
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
                      <svg
                        class="w-4 h-4 text-text-mid"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor">
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
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
                      <svg
                        class="w-4 h-4 text-text-mid"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor">
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
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
                      <svg
                        class="w-4 h-4 text-text-mid"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor">
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
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
                      <svg
                        class="w-4 h-4 text-text-mid"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor">
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
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
                      <svg
                        class="w-4 h-4 text-text-mid"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor">
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
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
                      <svg
                        class="w-4 h-4 text-text-mid"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor">
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
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
            <div
              class="p-5 flex justify-between items-center text-sm text-text-mid">
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
                  <button
                    class="border border-gray-300 text-gray-400 w-7 h-7 rounded-md font-bold text-xs">
                    1
                  </button>
                  <button
                    class="bg-warning-dark text-white w-7 h-7 rounded-md font-bold text-xs">
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
      <!-- END REPLACEMENT -->
    </div>
  </div>
  <!-- Add New Room Modal -->
  <div
    id="add-room-modal"
    class="fixed inset-0 bg-black/30 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
    <div
      class="bg-white rounded-xl shadow-2xl w-full max-w-md border border-gray-200">
      <!-- Modal Header -->
      <div
        class="flex justify-between items-center p-5 border-b border-gray-200">
        <h2 class="text-xl font-semibold text-primary-dark">
          Add a New Room
        </h2>
        <button
          id="modal-close-btn"
          class="text-gray-400 hover:text-gray-600">
          <svg
            class="w-6 h-6"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor">
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <!-- Modal Body -->
      <form class="p-6 space-y-4">
        <div>
          <label for="room-no" class="block text-sm font-medium text-text-mid">Room No</label>
          <input
            type="text"
            id="room-no"
            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary/50"
            placeholder="e.g., 01" />
        </div>

        <div>
          <label
            for="room-floor"
            class="block text-sm font-medium text-text-mid">Room Floor</label>
          <input
            type="text"
            id="room-floor"
            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary/50"
            placeholder="e.g., F-1" />
        </div>

        <div>
          <label for="price" class="block text-sm font-medium text-text-mid">Price</label>
          <div class="relative mt-1">
            <span
              class="absolute inset-y-0 left-0 pl-3 flex items-center text-sm text-gray-500">$</span>
            <input
              type="number"
              id="price"
              class="block w-full pl-7 pr-12 border border-gray-300 rounded-lg shadow-sm py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary/50"
              placeholder="0.00" />
            <span
              class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm text-gray-500">/month</span>
          </div>
        </div>

        <div>
          <label
            for="availability"
            class="block text-sm font-medium text-text-mid">Availability</label>
          <select
            id="availability"
            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary/50">
            <option value="available">Available</option>
            <option value="occupied">Occupied</option>
            <option value="maintenance">Under Maintenance</option>
          </select>
        </div>
      </form>

      <!-- Modal Footer -->
      <div
        class="flex justify-end items-center gap-3 p-5 bg-gray-50 rounded-b-xl">
        <button
          id="modal-cancel-btn"
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

  <!-- Modal Toggle Script -->
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const addRoomBtn = document.getElementById("add-room-btn");
      const modal = document.getElementById("add-room-modal");
      const closeModalBtn = document.getElementById("modal-close-btn");
      const cancelModalBtn = document.getElementById("modal-cancel-btn");

      // Check if all elements exist before adding listeners
      if (addRoomBtn && modal && closeModalBtn && cancelModalBtn) {
        const openModal = () => modal.classList.remove("hidden");
        const closeModal = () => modal.classList.add("hidden");

        addRoomBtn.addEventListener("click", openModal);
        closeModalBtn.addEventListener("click", closeModal);
        cancelModalBtn.addEventListener("click", closeModal);

        // Optional: Close modal when clicking outside the content
        modal.addEventListener("click", (e) => {
          if (e.target === modal) {
            closeModal();
          }
        });
      }

      // --- User Menu Dropdown ---
      const userMenuButton = document.getElementById("user-menu-button");
      const userMenu = document.getElementById("user-menu");

      if (userMenuButton && userMenu) {
        // Toggle dropdown on button click
        userMenuButton.addEventListener("click", function(event) {
          event.stopPropagation(); // Prevents the click from bubbling up to the window
          userMenu.classList.toggle("hidden");
        });

        // Close dropdown when clicking outside
        window.addEventListener("click", function(event) {
          if (
            !userMenu.classList.contains("hidden") &&
            !userMenu.contains(event.target) &&
            !userMenuButton.contains(event.target)
          ) {
            userMenu.classList.add("hidden");
          }
        });
      }
    });
  </script>
</body>

</html>