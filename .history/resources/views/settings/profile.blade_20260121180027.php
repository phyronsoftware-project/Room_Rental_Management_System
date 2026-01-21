@extends('layouts.app')

@php
    $active_page = 'profile';

    $u = auth()->user();
    $name = $u->full_name ?? ($u->name ?? 'Admin');
    $email = $u->email ?? '';
    $avatar = $u->profile_image_url
        ? (str_starts_with($u->profile_image_url, 'http')
            ? $u->profile_image_url
            : asset('storage/' . ltrim($u->profile_image_url, '/')))
        : 'https://placehold.co/220x220/FACC15/111827?text=' . urlencode(strtoupper(substr($name, 0, 1)));
@endphp

@section('content')
    <main class="flex-1 overflow-y-auto bg-base">
        <div class="p-6 md:p-8 space-y-6">

            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-primary-dark">Profile</h1>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                {{-- LEFT: Profile Card --}}
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6 flex flex-col items-center">
                        <h2 class="text-lg font-semibold text-slate-700 mb-4">Profile</h2>

                        {{-- Avatar upload --}}
                        <form method="POST" action="{{ route('profile.avatar') }}" enctype="multipart/form-data"
                            class="w-full flex flex-col items-center">
                            @csrf

                            <div class="relative">
                                <img id="avatar-preview" src="{{ $avatar }}"
                                    class="w-40 h-40 rounded-full object-cover ring-2 ring-white shadow" alt="avatar">

                                {{-- camera badge --}}
                                <button type="button" onclick="document.getElementById('avatar_file').click()"
                                    class="absolute -right-1 -bottom-1 w-11 h-11 rounded-full bg-slate-200 hover:bg-slate-300 flex items-center justify-center shadow border border-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-slate-700" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18A2.25 2.25 0 004.5 20.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </button>

                                <input id="avatar_file" name="avatar" type="file" accept="image/*" class="hidden"
                                    onchange="previewAvatar(this)">
                            </div>

                            <div class="mt-4 text-center">
                                <div class="text-lg font-semibold text-slate-800">{{ $name }}</div>
                                <div class="text-sm text-slate-500">{{ $email }}</div>
                                <div class="mt-1 text-sm text-slate-500">
                                    Role: <span class="font-semibold text-slate-700">{{ $u->role ?? '-' }}</span>
                                </div>
                            </div>

                            <button type="submit"
                                class="mt-4 w-full rounded-lg bg-blue-700 text-white py-2.5  font-semibold hover:bg-blue-800 transition">
                                Save Photo
                            </button>

                            @error('avatar')
                                <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
                            @enderror

                            @if (session('avatar_ok'))
                                <div class="mt-2 text-sm text-emerald-700">{{ session('avatar_ok') }}</div>
                            @endif
                        </form>
                    </div>
                </div>

                {{-- RIGHT: Edit (ONLY full_name + email) + Change Password --}}
                <div class="lg:col-span-2 space-y-6">

                    {{-- Edit Details --}}
                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm">
                        <div class="px-6 py-4 border-b border-slate-200">
                            <h2 class="text-lg font-semibold text-slate-800">Edit Details</h2>
                        </div>

                        <form method="POST" action="{{ route('profile.update') }}" class="p-6 space-y-5">
                            @csrf

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                                        Full Name <span class="text-red-500">*</span>
                                    </label>
                                    <input name="full_name" value="{{ old('full_name', $u->full_name ?? '') }}"
                                        class="w-full rounded-lg border border-slate-200 px-4 py-2.5
                                              focus:outline-none focus:ring-2 focus:ring-blue-500/40">
                                    @error('full_name')
                                        <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                                        Email <span class="text-red-500">*</span>
                                    </label>
                                    <input name="email" type="email" value="{{ old('email', $u->email ?? '') }}"
                                        class="w-full rounded-lg border border-slate-200 px-4 py-2.5
                                              focus:outline-none focus:ring-2 focus:ring-blue-500/40">
                                    @error('email')
                                        <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex justify-end">
                                <button type="submit"
                                    class="rounded-lg bg-blue-700 text-white px-6 py-2.5  font-semibold hover:bg-blue-800 transition">
                                    Save Changes
                                </button>
                            </div>

                            @if (session('profile_ok'))
                                <div class="text-sm text-emerald-700">{{ session('profile_ok') }}</div>
                            @endif
                        </form>
                    </div>

                    {{-- Change Password --}}
                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm">
                        <div class="px-6 py-4 border-b border-slate-200">
                            <h2 class="text-lg font-semibold text-slate-800">Change Password</h2>
                        </div>

                        <form method="POST" action="{{ route('profile.password') }}" class="p-6 space-y-5">
                            @csrf

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">Current Password</label>
                                <input name="current_password" type="password"
                                    class="w-full rounded-lg border border-slate-200 px-4 py-2.5
                                          focus:outline-none focus:ring-2 focus:ring-blue-500/40">
                                @error('current_password')
                                    <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">New Password</label>
                                    <input name="password" type="password" autocomplete="new-password" autocapitalize="off"
                                        spellcheck="false"
                                        class="w-full rounded-lg border border-slate-200 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500/40">

                                    @error('password')
                                        <div class="text-sm text-red-600 mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-slate-700 mb-2">Confirm New
                                        Password</label>
                                    <input name="password_confirmation" type="password" autocomplete="new-password"
                                        autocapitalize="off" spellcheck="false"
                                        class="w-full rounded-lg border border-slate-200 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500/40">
                                </div>
                            </div>

                            <div class="flex justify-end">
                                <button type="submit"
                                    class="rounded-lg bg-blue-700 text-white px-6 py-2.5  font-semibold hover:bg-blue-800 transition">
                                    Update Password
                                </button>
                            </div>

                            @if (session('pass_ok'))
                                <div class="text-sm text-emerald-700">{{ session('pass_ok') }}</div>
                            @endif
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <script>
        function previewAvatar(input) {
            const file = input.files && input.files[0];
            if (!file) return;
            document.getElementById('avatar-preview').src = URL.createObjectURL(file);
        }
        window.addEventListener('load', () => {
            document.querySelectorAll('input[type="password"]').forEach(i => i.value = '');
        });
    </script>
@endsection
