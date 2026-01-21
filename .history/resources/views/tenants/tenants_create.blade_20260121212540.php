{{-- resources/views/tenants/tenants_create.blade.php --}}
@extends('layouts.app')

@section('title', 'Add New Tenant')

@php
    $active_page = 'tenants';
@endphp

@section('content')
    <style>
        /* Page */
        .tenant-page {
            padding: 28px 28px 44px;
        }

        /* Header */
        .tenant-header {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 18px;
        }

        .tenant-back {
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            border-radius: 12px;
            background: #fff;
            border: 1px solid rgba(17, 24, 39, .08);
            box-shadow: 0 1px 2px rgba(0, 0, 0, .04);
        }

        .tenant-back:hover {
            background: rgba(59, 130, 246, .06);
        }

        .tenant-title {
            font-size: 28px;
            line-height: 1.2;
            font-weight: 800;
            letter-spacing: .2px;
            color: #0f172a;
        }

        .tenant-sub {
            margin-top: 3px;
            font-size: 13px;
            color: rgba(15, 23, 42, .65);
        }

        /* Card */
        .tenant-card {
            background: #fff;
            border: 1px solid rgba(17, 24, 39, .10);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(2, 6, 23, .06);
        }

        .tenant-card-head {
            padding: 16px 18px;
            border-bottom: 1px solid rgba(17, 24, 39, .08);
            background: linear-gradient(180deg, rgba(59, 130, 246, .08), rgba(59, 130, 246, 0));
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }

        .tenant-card-head h2 {
            font-size: 14px;
            font-weight: 800;
            letter-spacing: .08em;
            color: rgba(15, 23, 42, .85);
        }

        .tenant-card-body {
            padding: 20px;
        }

        /* Form grid */
        .tenant-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 16px;
        }

        @media (min-width: 768px) {
            .tenant-grid {
                grid-template-columns: 1fr 1fr;
                gap: 18px;
            }
        }

        /* Field */
        .t-field label {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
            font-weight: 700;
            color: rgba(15, 23, 42, .75);
            margin-bottom: 8px;
        }

        .t-req {
            color: #ef4444;
            font-weight: 900;
        }

        .t-input,
        .t-select {
            width: 100%;
            border-radius: 12px;
            border: 1px solid rgba(15, 23, 42, .12);
            background: rgba(248, 250, 252, 1);
            padding: 11px 12px;
            font-size: 14px;
            color: #0f172a;
            outline: none;
            transition: all .18s ease;
        }

        .t-input::placeholder {
            color: rgba(15, 23, 42, .45);
        }

        .t-input:focus,
        .t-select:focus {
            background: #fff;
            border-color: rgba(59, 130, 246, .6);
            box-shadow: 0 0 0 4px rgba(59, 130, 246, .18);
        }

        .t-help {
            margin-top: 6px;
            font-size: 12px;
            color: rgba(15, 23, 42, .55);
        }

        /* Full width row */
        .t-span-2 {
            grid-column: 1 / -1;
        }

        /* Error box */
        .t-error {
            border-radius: 14px;
            border: 1px solid rgba(239, 68, 68, .25);
            background: rgba(239, 68, 68, .06);
            padding: 14px 14px;
            color: rgba(127, 29, 29, 1);
            margin-bottom: 10px;
        }

        .t-error ul {
            margin: 0;
            padding-left: 18px;
        }

        /* Footer actions */
        .tenant-actions {
            margin-top: 18px;
            padding-top: 16px;
            border-top: 1px solid rgba(17, 24, 39, .08);
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn-soft {
            padding: 10px 14px;
            border-radius: 12px;
            border: 1px solid rgba(15, 23, 42, .14);
            background: #fff;
            color: rgba(15, 23, 42, .75);
            font-weight: 800;
            font-size: 14px;
            transition: all .15s ease;
        }

        .btn-soft:hover {
            background: rgba(15, 23, 42, .04);
            transform: translateY(-1px);
        }

        .btn-primary2 {
            padding: 10px 16px;
            border-radius: 12px;
            border: 1px solid rgba(2, 6, 23, .08);
            background: linear-gradient(180deg, #2563eb, #1d4ed8);
            color: #fff;
            font-weight: 900;
            font-size: 14px;
            box-shadow: 0 10px 18px rgba(37, 99, 235, .24);
            transition: all .15s ease;
        }

        .btn-primary2:hover {
            transform: translateY(-1px);
            filter: brightness(1.03);
        }

        /* Small badge in header */
        .tenant-badge {
            font-size: 12px;
            font-weight: 800;
            color: rgba(37, 99, 235, 1);
            background: rgba(37, 99, 235, .10);
            border: 1px solid rgba(37, 99, 235, .20);
            padding: 6px 10px;
            border-radius: 999px;
        }
    </style>

    <main class="flex-1 overflow-y-auto bg-base">
        <div class="tenant-page max-w-5xl mx-auto">

            {{-- Header --}}
            <div class="tenant-header">
                <a href="{{ route('tanants.index') }}" class="tenant-back" aria-label="Back to tenants">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                    </svg>
                </a>

                <div>
                    <div class="tenant-title">Add New Tenant</div>
                    <div class="tenant-sub">Create a tenant profile and assign an available room.</div>
                </div>
            </div>

            {{-- Card --}}
            <div class="tenant-card">
                <div class="tenant-card-head">
                    <h2>TENANT INFORMATION</h2>
                    <span class="tenant-badge">Required fields *</span>
                </div>

                <div class="tenant-card-body">
                    <form action="{{ route('tanants.store') }}" method="POST" class="space-y-6">
                        @csrf

                        @if ($errors->any())
                            <div class="t-error">
                                <ul class="list-disc pl-5 text-sm space-y-1">
                                    @foreach ($errors->all() as $err)
                                        <li>{{ $err }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="tenant-grid">

                            {{-- Full Name --}}
                            <div class="t-field">
                                <label>Full Name <span class="t-req">*</span></label>
                                <input type="text" name="full_name" value="{{ old('full_name') }}"
                                    class="t-input" placeholder="e.g., John Doe" required />
                            </div>

                            {{-- Phone --}}
                            <div class="t-field">
                                <label>Phone Number <span class="t-req">*</span></label>
                                <input type="text" name="phone_number" value="{{ old('phone_number') }}"
                                    class="t-input" placeholder="e.g., 012 345 678" required />
                            </div>

                            {{-- Age --}}
                            <div class="t-field">
                                <label>Age</label>
                                <input type="number" name="age" value="{{ old('age') }}"
                                    class="t-input" placeholder="e.g., 25" />
                            </div>

                            {{-- Email --}}
                            <div class="t-field">
                                <label>Email</label>
                                <input type="email" name="email" value="{{ old('email') }}"
                                    class="t-input" placeholder="e.g., name@gmail.com" />
                            </div>

                            {{-- Password --}}
                            <div class="t-field">
                                <label>Password (Optional)</label>
                                <input type="password" name="password" class="t-input" placeholder="••••••" />
                                <div class="t-help">If left blank, password will be saved as null.</div>
                            </div>

                            {{-- Assign Room --}}
                            <div class="t-field">
                                <label>Assign Room <span class="t-req">*</span></label>
                                <select id="room_id" name="room_id" class="t-select" required>
                                    <option value="">Select an available room</option>
                                    @foreach ($rooms as $r)
                                        <option value="{{ $r->room_id }}" @selected(old('room_id') == $r->room_id)>
                                            Room {{ $r->room_number }} (Floor {{ $r->floor ?? '-' }})
                                        </option>
                                    @endforeach
                                </select>
                                <div class="t-help">Only rooms with status <b>Available</b> will appear here.</div>
                            </div>

                            {{-- Start Date --}}
                            <div class="t-field">
                                <label>Start Date <span class="t-req">*</span></label>
                                <input type="date" name="start_date" value="{{ old('start_date', now()->toDateString()) }}"
                                    class="t-input" required />
                            </div>

                            {{-- End Date --}}
                            <div class="t-field">
                                <label>End Date (Optional)</label>
                                <input type="date" name="end_date" value="{{ old('end_date') }}"
                                    class="t-input" />
                            </div>

                            {{-- Payment Term (full width) --}}
                            <div class="t-field t-span-2">
                                <label>Payment Term <span class="t-req">*</span></label>
                                <select name="payment_term" class="t-select" required>
                                    @foreach (['Monthly', 'Quarterly', 'Yearly'] as $term)
                                        <option value="{{ $term }}" @selected(old('payment_term', 'Monthly') == $term)>
                                            {{ $term }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        {{-- Actions --}}
                        <div class="tenant-actions">
                            <a href="{{ route('tanants.index') }}" class="btn-soft">Cancel</a>
                            <button type="submit" class="btn-primary2">Save Tenant</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </main>
@endsection
