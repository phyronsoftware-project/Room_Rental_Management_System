<!-- resources/views/login.blade.php (single page only / frontend only) -->
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Login</title>
    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- <link rel="stylesheet" href="{{ asset('admin.css') }}"> --}}
    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet" />

    <!-- If your project already loads Tailwind via Vite globally, you can remove this comment.
       This page assumes Tailwind classes exist in your project CSS. -->

</head>

<body class="min-h-screen bg-slate-50 flex items-center justify-center px-4 py-10">
    <div class="w-full max-w-md">

        <!-- Top Brand -->
        {{-- <div class="mb-6 text-center">
            <div class="mx-auto w-12 h-12 rounded-2xl bg-blue-100 flex items-center justify-center">
                <!-- Home icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-blue-700" fill="none" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 10.5 12 3l9 7.5V21a.75.75 0 0 1-.75.75H3.75A.75.75 0 0 1 3 21V10.5z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 21V12h6v9" />
                </svg>
            </div>

            <h1 class="mt-4 text-2xl font-extrabold text-slate-900">Room Rental Dashboard</h1>
            <p class="mt-1 text-sm text-slate-500">Sign in to manage rooms, tenants, and payments</p>
        </div> --}}

        <!-- Card -->
        <div class="bg-white border border-slate-200 rounded-2xl shadow-lg p-6 sm:p-8">

            <!-- UI-only alert -->
            <div id="loginAlert" class="hidden mb-5 px-4 py-3 rounded-lg text-sm border">
                <!-- text set by JS -->
            </div>

            <form id="loginForm" action="javascript:void(0)" onsubmit="return false;" class="space-y-5">

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-slate-700 mb-2">Email</label>

                    <div class="relative">
                        <input id="email" type="email" required placeholder="admin@example.com"
                            value=""
                            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 pr-11 text-sm text-slate-900
                     focus:outline-none focus:ring-2 focus:ring-blue-500/40 focus:border-blue-500" />

                        <!-- icon RIGHT -->
                        <span
                            class="absolute inset-y-0 right-0 flex items-center pr-3 text-slate-400 pointer-events-none">
                            <!-- mail icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.6" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21.75 6.75v10.5A2.25 2.25 0 0 1 19.5 19.5h-15A2.25 2.25 0 0 1 2.25 17.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15A2.25 2.25 0 0 0 2.25 6.75m19.5 0-9.75 6.5-9.75-6.5" />
                            </svg>
                        </span>
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-semibold text-slate-700 mb-2">Password</label>

                    <div class="relative">
                        <input id="password" type="password" required minlength="6" placeholder="••••••••"
                            value=""
                            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 pr-20 text-sm text-slate-900
                     focus:outline-none focus:ring-2 focus:ring-blue-500/40 focus:border-blue-500" />


                        <button type="button" onclick="togglePassword()"
                            class="absolute inset-y-0 right-0 flex items-center gap-2 px-3 text-slate-500 hover:text-slate-800">
                            <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.6" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <svg id="eyeClosed" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 hidden" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.6" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3l18 18" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10.5 10.677A2.999 2.999 0 0 0 12 15a2.999 2.999 0 0 0 2.323-1.5" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.228 6.228C4.44 7.61 3.11 9.52 2.25 12c1.39 4.171 5.325 7.5 9.75 7.5 1.58 0 3.086-.424 4.398-1.164" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.88 4.67A10.49 10.49 0 0 1 12 4.5c4.638 0 8.573 3.007 9.963 7.178.158.46.158.684 0 1.144a12.74 12.74 0 0 1-1.347 2.746" />
                            </svg>
                        </button>
                    </div>

                    <div class="mt-2 flex items-center justify-between">
                        <label class="inline-flex items-center gap-2 text-sm text-slate-600 cursor-pointer">
                            <input type="checkbox" class="rounded border-slate-300 text-blue-600 focus:ring-blue-500/40"
                                checked />
                            Remember me
                        </label>
                        <a href="#" class="text-sm font-semibold text-blue-700 hover:text-blue-900">Forgot?</a>
                    </div>
                </div>

                <!-- Submit -->
                <button id="loginBtn" type="button" onclick="fakeLogin()"
                    class="w-full rounded-xl bg-blue-700 text-white py-3 font-semibold shadow-md hover:bg-blue-800
                 transition flex items-center justify-center gap-2">
                    <span id="btnText">Sign in</span>
                    <svg id="spinner" class="w-5 h-5 hidden animate-spin" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 0 1 8-8v4a4 4 0 0 0-4 4H4z">
                        </path>
                    </svg>
                </button>

                {{-- <p class="text-xs text-slate-500 text-center">
                    UI only (frontend). Connect to backend later.
                </p> --}}
            </form>
        </div>

        <div class="mt-6 text-center text-xs text-slate-500">
            © 2026 Room Rental Management
        </div>

    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const eyeOpen = document.getElementById('eyeOpen');
            const eyeClosed = document.getElementById('eyeClosed');
            const text = document.getElementById('toggleText');

            const isHidden = input.type === 'password';
            input.type = isHidden ? 'text' : 'password';

            eyeOpen.classList.toggle('hidden', !isHidden);
            eyeClosed.classList.toggle('hidden', isHidden);
            text.textContent = isHidden ? 'Hide' : 'Show';
        }

        function fakeLogin() {
            const email = document.getElementById('email');
            const pass = document.getElementById('password');
            const form = document.getElementById('loginForm');
            const alertBox = document.getElementById('loginAlert');
            const btn = document.getElementById('loginBtn');
            const btnText = document.getElementById('btnText');
            const spinner = document.getElementById('spinner');

            if (!email.checkValidity() || !pass.checkValidity()) {
                form.reportValidity();
                return;
            }

            // loading UI
            btn.disabled = true;
            btn.classList.add('opacity-80', 'cursor-not-allowed');
            btnText.textContent = 'Signing in...';
            spinner.classList.remove('hidden');

            setTimeout(() => {
                btn.disabled = false;
                btn.classList.remove('opacity-80', 'cursor-not-allowed');
                btnText.textContent = 'Sign in';
                spinner.classList.add('hidden');

                // UI success message
                alertBox.classList.remove('hidden');
                alertBox.className =
                    'mb-5 px-4 py-3 rounded-lg text-sm border bg-emerald-50 border-emerald-200 text-emerald-800';
                alertBox.textContent = '✅ Login success (UI only). Redirect to dashboard later.';

                // If you want redirect later (when backend ready):
                // window.location.href = "/dashboard";
            }, 900);
        }
    </script>
</body>

</html>
