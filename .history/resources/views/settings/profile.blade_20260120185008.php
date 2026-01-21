@extends('layouts.app')

@php
    $active_page = 'profile';

    $u = auth()->user();
    $name  = $u->full_name ?? $u->name ?? 'Admin';
    $email = $u->email ?? '';
    $avatar = $u->profile_image_url
        ? (str_starts_with($u->profile_image_url, 'http') ? $u->profile_image_url : asset('storage/' . ltrim($u->profile_image_url, '/')))
        : 'https://placehold.co/220x220/FACC15/111827?text=' . urlencode(strtoupper(substr($name, 0, 1)));
@endphp

@section('content')
<main class="flex-1 overflow-y-auto bg-base">
    <div class="p-10 space-y-8">

        <div class="flex justify-between items-center">
            <h1 class="text-3xl font-bold text-primary-dark">Profile</h1>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- LEFT: Profile Card --}}
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-8 flex flex-col items-center">
                    <h2 class="text-xl font-semibold text-slate-700 mb-6">Profile</h2>

                    {{-- Avatar upload --}}
                    <form method="POST" action="{{ route('profile.avatar') }}" enctype="multipart/form-data" class="w-full flex flex-col items-center">
                        @csrf

                        <div class="relative">
                            <img id="avatar-preview"
                                src="{{ $avatar }}"
                                class="w-44 h-44 rounded-full object-cover ring-4 ring-white shadow"
                                alt="avatar">

                            {{-- camera badge --}}
                            <button type="button"
                                onclick="document.getElementById('avatar_file').click()"
                                class="absolute -right-1 -bottom-1 w-12 h-12 rounded-full bg-slate-200 hover:bg-slate-300 flex items-center justify-center shadow border border-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-slate-700" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18A2.25 2.25 0 004.5 20.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </button>

                            <input id="avatar_file" name="avatar" type="file" accept="image/*" class="hidden"
                                onchange="previewAvatar(this)">
                        </div>

                        <div class="mt-6 text-center">
                            <div class="text-lg font-semibold text-slate-800">{{ $name }}</div>
                            <div class="text-sm text-slate-500">{{ $email }}</div>
                        </div>

                        <button type="submit"
                            class="mt-6 w-full rounded-lg bg-blue-700 text-white py-2.5 font-semibold hover:bg-blue-800 transition">
                            Save Photo
                        </button>

                        @error('avatar')
                            <div class="mt-3 text-sm text-red-600">{{ $message }}</div>
                        @enderror

                        @if (session('avatar_ok'))
                            <div class="mt-3 text-sm text-emerald-700">{{ session('avatar_ok') }}</div>
                        @endif
                    </form>
                </div>
            </div>

            {{-- RIGHT: Edit Details + Change Password --}}
            <div class="lg:col-span-2 space-y-8">

                {{-- Edit Details --}}
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm">
                    <div class="px-8 py-6 border-b border-slate-200">
                        <h2 class="text-lg font-semibold text-slate-800">Edit Details</h2>
                    </div>

                    <form method="POST" action="{{ route('profile.update') }}" class="p-8 space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">ឈ្មោះអ្នកប្រើប្រាស់ <span class="text-red-500">*</span></label>
                                <input name="full_name" value="{{ old('full_name', $u->full_name ?? '') }}"
                                    class="w-full rounded-lg border border-slate-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500/40">
                                @error('full_name') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">អ៊ីមែល <span class="text-red-500">*</span></label>
                                <input name="email" type="email" value="{{ old('email', $u->email ?? '') }}"
                                    class="w-full rounded-lg border border-slate-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500/40">
                                @error('email') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">លេខទូរស័ព្ទ <span class="text-red-500">*</span></label>
                                <input name="phone" value="{{ old('phone', $u->phone ?? '') }}"
                                    class="w-full rounded-lg border border-slate-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500/40">
                                @error('phone') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-slate-700 mb-2">តេលេក្រាម</label>
                                <input name="telegram" value="{{ old('telegram', $u->telegram ?? '') }}"
                                    class="w-full rounded-lg border border-slate-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500/40">
                                @error('telegram') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">អាសយដ្ឋាន <span class="text-red-500">*</span></label>
                            <textarea name="address" rows="3"
                                class="w-full rounded-lg border border-slate-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500/40">{{ old('address', $u->address ?? '') }}</textarea>
                            @error('address') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">កំណត់ចំណាំ</label>
                            <textarea name="note" rows="3"
                                class="w-full rounded-lg border border-slate-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500/40">{{ old('note', $u->note ?? '') }}</textarea>
                            @error('note') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="rounded-lg bg-blue-700 text-white px-6 py-2.5 font-semibold hover:bg-blue-800 transition">
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
                    <div class="px-8 py-6 border-b border-slate-200">
                        <h2 class="text-lg font-semibold text-slate-800">Change Password</h2>
                    </div>

                    <form method="POST" action="{{ route('profile.password') }}" class="p-8 space-y-6">
                        @csrf

                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">ពាក្យសម្ងាត់ចាស់</label>
                            <input name="current_password" type="password"
                                class="w-full rounded-lg border border-slate-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500/40">
                            @error('current_password') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">ពាក្យសម្ងាត់ថ្មី</label>
                            <input name="password" type="password"
                                class="w-full rounded-lg border border-slate-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500/40">
                            @error('password') <div class="text-sm text-red-600 mt-1">{{ $message }}</div> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700 mb-2">បញ្ជាក់ពាក្យសម្ងាត់ថ្មី</label>
                            <input name="password_confirmation" type="password"
                                class="w-full rounded-lg border border-slate-200 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500/40">
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="rounded-lg bg-blue-700 text-white px-6 py-2.5 font-semibold hover:bg-blue-800 transition">
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
</script>
@endsection
