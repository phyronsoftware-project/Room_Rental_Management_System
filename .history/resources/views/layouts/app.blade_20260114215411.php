{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Dashboard')</title>

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- <link rel="stylesheet" href="{{ asset('admin.css') }}"> --}}
    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet" />

    {{-- Tailwind Config --}}
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    // font-family: Inter, ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, Arial, "Noto Sans", "Helvetica Neue", sans-serif;
        }
                    fontFamily: {
                        sans: ["Inter", "sans-serif"],
                        bebas: ["Bebas Neue", "cursive"],
                    },
                    colors: {
                        "primary-dark": "#172554",
                        primary: "#1d4ed8",
                        "primary-light": "#dbeafe",
                        light: "#ffffff",
                        base: "#f9fafb",
                        "text-dark": "#1f2937",
                        "text-mid": "#6b7280",
                        "warning-dark": "#f59e0b",
                        "warning-light": "#fef3c7",
                        "success-dark": "#10b981",
                        "success-light": "#ecfdf5",
                        "danger-dark": "#dc2626",
                        "danger-light": "#fee2e2",
                        accent: "#a16207",
                        facebook: "#1877F2",
                        linkedin: "#0A66C2",
                        telegram: "#24A1DE",
                        gmail: "#EA4335",
                        youtube: "#FF0000",
                    },
                    textShadow: {
                        custom: "1px 1px 3px rgba(0, 0, 0, 0.1)"
                    },
                },
            },
            plugins: [
                function({
                    addUtilities,
                    theme,
                    e
                }) {
                    const newUtilities = {};
                    Object.entries(theme("textShadow")).forEach(([key, value]) => {
                        newUtilities[`.${e(`text-shadow-${key}`)}`] = {
                            textShadow: value
                        };
                    });
                    addUtilities(newUtilities);
                },
            ],
        };
    </script>

    <style>
        body {
            font-family: "Inter", sans-serif;
        }

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

        .nav-link.active {
            background-color: #dbeafe;
            color: #1d4ed8;
            font-weight: 600;
            border-left: 4px solid #1d4ed8;
            padding-left: calc(1rem - 4px);
        }
    </style>

    @stack('head')
</head>

<body class="bg-base text-text-dark">
    <div class="flex flex-col h-screen">

        {{-- ✅ Header --}}
        @include('partials.header', [
            'admin_name' => $admin_name ?? 'Daniel',
        ])

        <div class="flex flex-1 overflow-hidden">

            {{-- ✅ Sidebar --}}
            @include('partials.sidebar', [
                'active_page' => $active_page ?? '',
            ])

            {{-- ✅ Main Content --}}
            <main class="flex-1 overflow-y-auto bg-base">
                @yield('content')
            </main>

        </div>
    </div>

    {{-- Dropdown Script --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const userMenuButton = document.getElementById("user-menu-button");
            const userMenu = document.getElementById("user-menu");

            if (userMenuButton && userMenu) {
                userMenuButton.addEventListener("click", function(event) {
                    event.stopPropagation();
                    userMenu.classList.toggle("hidden");
                });

                window.addEventListener("click", function(event) {
                    if (!userMenu.classList.contains("hidden") &&
                        !userMenu.contains(event.target) &&
                        !userMenuButton.contains(event.target)
                    ) {
                        userMenu.classList.add("hidden");
                    }
                });
            }
        });
    </script>

    @stack('scripts')
</body>

</html>
