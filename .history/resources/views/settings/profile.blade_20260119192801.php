
@extends('layouts.app')

@php
    // ✅ sidebar highlight (UI only)
    $active_page = 'profile';
@endphp

@section('content')
    <main class="flex-1 overflow-y-auto bg-base">
        <div class="p-10 space-y-8">

            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-primary-dark">Your Profile</h1>
            </div>

            {{-- ✅ Static message (UI only) --}}
            <div class="p-4 rounded-lg mb-4 text-sm bg-success-light text-success-dark">
                ✅ Demo: Profile updated successfully (UI only)
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                {{-- Profile Card --}}
                <div class="lg:col-span-1 space-y-8">
                    <div class="bg-light p-6 rounded-lg shadow-lg border border-gray-200 flex flex-col items-center">

                        {{-- UI only: no action --}}
                        <form action="javascript:void(0)" method="POST" enctype="multipart/form-data" id="profile-form"
                            class="flex flex-col items-center w-full" onsubmit="return false;">

                            <div class="relative group cursor-pointer"
                                onclick="document.getElementById('profile_pic_input').click()">
                                <img id="avatar-preview"
                                    class="w-32 h-32 rounded-full ring-4 ring-primary-light object-cover transition-opacity group-hover:opacity-75"
                                    src="https://placehold.co/128x128/60A5FA/FFF?text=D" alt="User avatar" />

                                <div
                                    class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="white" class="w-10 h-10 drop-shadow-md">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                                    </svg>
                                </div>
                            </div>

                            {{-- Hidden input (UI only) --}}
                            <input type="file" id="profile_pic_input" class="hidden" accept="image/*"
                                onchange="previewAvatar(this)">

                            {{-- Fake user info --}}
                            <h2 class="text-2xl font-bold text-text-dark mt-4">Daniel</h2>
                            <p class="text-primary font-medium">Admin</p>
                            <p class="text-xs text-text-mid mt-1">(Click image to change)</p>

                            {{-- UI only small button --}}
                            <button type="button" onclick="fakeToast('Avatar updated (UI only)')"
                                class="mt-5 w-full bg-primary text-white py-2.5 px-4 rounded-lg font-semibold hover:bg-blue-800 transition-colors flex items-center justify-center gap-2">
                                Save Avatar
                            </button>
                        </form>

                        <a href="#"
                            class="mt-4 w-full bg-light border border-gray-300 text-text-dark py-2.5 px-4 rounded-lg font-semibold hover:bg-gray-50 transition-colors flex items-center justify-center gap-2">
                            Edit Details
                        </a>
                    </div>
                </div>

                {{-- Info & Residence Image --}}
                <div class="lg:col-span-2 space-y-8">

                    {{-- Account Details --}}
                    <div class="bg-light p-8 rounded-lg shadow-lg border border-gray-200">
                        <h2 class="text-2xl font-semibold text-primary-dark mb-6">Account Details</h2>

                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-text-mid mb-1">Full Name</label>
                                <input type="text" class="w-full rounded-lg px-4 py-3 bg-base border border-gray-300"
                                    value="Daniel" readonly />
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-text-mid mb-1">Email</label>
                                <input type="text" class="w-full rounded-lg px-4 py-3 bg-base border border-gray-300"
                                    value="daniel@example.com" readonly />
                            </div>
                        </div>
                    </div>

                    {{-- Residence Image Settings --}}
                    <div class="bg-light p-8 rounded-lg shadow-lg border border-gray-200">
                        <h2 class="text-2xl font-semibold text-primary-dark mb-4">Residence Image</h2>
                        <p class="text-sm text-text-mid mb-6">This image will appear on your Dashboard header.</p>

                        {{-- UI only: no action --}}
                        <form action="javascript:void(0)" method="POST" enctype="multipart/form-data" class="space-y-4"
                            onsubmit="return false;">
                            <div
                                class="relative w-full h-64 bg-gray-100 rounded-lg overflow-hidden border-2 border-dashed border-gray-300 flex items-center justify-center group">
                                <img id="residence-preview" class="absolute inset-0 w-full h-full object-cover"
                                    src="https://placehold.co/800x400/dbeafe/172554?text=No+Image" alt="Residence image" />

                                <div class="absolute inset-0 bg-black/50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity cursor-pointer"
                                    onclick="document.getElementById('residence_pic').click()">
                                    <span class="text-white font-semibold">Click to Change</span>
                                </div>
                            </div>

                            <input type="file" id="residence_pic" class="hidden" accept="image/*"
                                onchange="previewResidence(this)">

                            <div class="flex justify-end gap-3">
                                <button type="button" onclick="resetResidence()"
                                    class="border border-gray-300 text-text-dark px-5 py-2.5 rounded-lg font-semibold hover:bg-gray-50">
                                    Reset
                                </button>

                                <button type="button" onclick="fakeToast('Residence image updated (UI only)')"
                                    class="bg-primary text-white px-5 py-2.5 rounded-lg font-semibold shadow-md hover:bg-primary-dark">
                                    Update Image
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            {{-- Toast (UI only) --}}
            <div id="toast"
                class="hidden fixed bottom-6 right-6 bg-light border border-gray-200 shadow-lg rounded-xl px-4 py-3 text-sm text-text-dark">
                ✅ Saved (UI only)
            </div>

        </div>
    </main>

    <script>
        const DEFAULT_AVATAR = "https://placehold.co/128x128/60A5FA/FFF?text=D";
        const DEFAULT_RESIDENCE = "https://placehold.co/800x400/dbeafe/172554?text=No+Image";

        function previewAvatar(input) {
            const file = input.files && input.files[0];
            if (!file) return;
            const url = URL.createObjectURL(file);
            document.getElementById('avatar-preview').src = url;
            fakeToast('Avatar selected (UI only)');
        }

        function previewResidence(input) {
            const file = input.files && input.files[0];
            if (!file) return;
            const url = URL.createObjectURL(file);
            document.getElementById('residence-preview').src = url;
            fakeToast('Residence image selected (UI only)');
        }

        function resetResidence() {
            document.getElementById('residence-preview').src = DEFAULT_RESIDENCE;
            const inp = document.getElementById('residence_pic');
            if (inp) inp.value = '';
            fakeToast('Residence reset (UI only)');
        }

        function fakeToast(text) {
            const t = document.getElementById('toast');
            if (!t) return;
            t.textContent = "✅ " + text;
            t.classList.remove('hidden');
            clearTimeout(window.__toastTimer);
            window.__toastTimer = setTimeout(() => t.classList.add('hidden'), 1600);
        }
    </script>
@endsection

@endsection
