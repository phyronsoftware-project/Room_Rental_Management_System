{{-- resources/views/dashboard.blade.php --}}
@extends('layouts.app')

@section('title', 'Dashboard')

@php
    // ✅ set active page for sidebar highlight
    $active_page = 'dashboard';
    $admin_name = $admin_name ?? 'Daniel';
@endphp

@section('content')
    <main class="flex-1 overflow-y-auto bg-base">
        <div class="p-10 space-y-6">
            <!-- Page Header -->
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-primary-dark">SETTINGS</h1>
            </div>

            <!-- Settings Cards Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 max-w-6xl mx-auto">
                <!-- Profile Settings Card -->
                <div class="lg:col-span-2 bg-light rounded-lg shadow-md border border-gray-200">
                    <form>
                        <div class="p-5 border-b border-gray-200">
                            <h2 class="text-xl font-semibold text-primary-dark">
                                Profile Settings
                            </h2>
                            <p class="text-sm text-text-mid">
                                Manage your public profile information.
                            </p>
                        </div>
                        <div class="p-6 space-y-4">
                            <div>
                                <label for="full-name" class="block text-sm font-medium text-text-mid">Full Name</label>
                                <input type="text" id="full-name"
                                    class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary/50"
                                    value="Daniel" />
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-text-mid">Email Address</label>
                                <input type="email" id="email"
                                    class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary/50 bg-gray-100 cursor-not-allowed"
                                    value="daniel@anthonyresidence.com" disabled />
                            </div>
                            <div>
                                <label for="avatar" class="block text-sm font-medium text-text-mid">Profile
                                    Picture</label>
                                <div class="mt-1 flex items-center gap-4">
                                    <img class="w-12 h-12 rounded-full" src="https://placehold.co/40x40/60A5FA/FFF?text=D"
                                        alt="User avatar" />
                                    <button type="button"
                                        class="bg-white border border-gray-300 text-text-mid px-4 py-2 rounded-lg font-semibold text-sm hover:bg-gray-100 transition-all">
                                        Change
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end items-center gap-3 p-5 bg-gray-50 rounded-b-lg">
                            <button type="submit"
                                class="bg-primary text-white px-5 py-2.5 rounded-lg font-semibold text-sm shadow-md hover:bg-primary-dark transition-all">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Change Password Card -->
                <div class="lg:col-span-1 bg-light rounded-lg shadow-md border border-gray-200">
                    <form>
                        <div class="p-5 border-b border-gray-200">
                            <h2 class="text-xl font-semibold text-primary-dark">
                                Change Password
                            </h2>
                            <p class="text-sm text-text-mid">
                                Update your account password.
                            </p>
                        </div>
                        <div class="p-6 space-y-4">
                            <div>
                                <label for="current-password" class="block text-sm font-medium text-text-mid">Current
                                    Password</label>
                                <input type="password" id="current-password"
                                    class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary/50" />
                            </div>
                            <div>
                                <label for="new-password" class="block text-sm font-medium text-text-mid">New
                                    Password</label>
                                <input type="password" id="new-password"
                                    class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary/50" />
                            </div>
                            <div>
                                <label for="confirm-password" class="block text-sm font-medium text-text-mid">Confirm New
                                    Password</label>
                                <input type="password" id="confirm-password"
                                    class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-primary/50" />
                            </div>
                        </div>
                        <div class="flex justify-end items-center gap-3 p-5 bg-gray-50 rounded-b-lg">
                            <button type="submit"
                                class="bg-primary text-white px-5 py-2.5 rounded-lg font-semibold text-sm shadow-md hover:bg-primary-dark transition-all w-full">
                                Update Password
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Notification Settings -->
                <div class="lg:col-span-2 bg-light rounded-lg shadow-md border border-gray-200">
                    <div class="p-5 border-b border-gray-200">
                        <h2 class="text-xl font-semibold text-primary-dark">
                            Notification Settings
                        </h2>
                        <p class="text-sm text-text-mid">
                            Control how you receive notifications.
                        </p>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="font-medium text-text-dark">
                                    Email Notifications
                                </h3>
                                <p class="text-sm text-text-mid">
                                    Receive email updates for payments and maintenance.
                                </p>
                            </div>
                            <input type="checkbox" id="email-toggle" class="toggle-checkbox" checked />
                        </div>
                        <hr class="border-gray-200" />
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="font-medium text-text-dark">
                                    Monthly Reports
                                </h3>
                                <p class="text-sm text-text-mid">
                                    Automatically send monthly reports to your email.
                                </p>
                            </div>
                            <input type="checkbox" id="report-toggle" class="toggle-checkbox" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
