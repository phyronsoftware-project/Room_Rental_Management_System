{{-- resources/views/dashboard.blade.php --}}
@extends('layouts.app')

@section('title', 'Dashboard')

@php
    $active_page = 'dashboard';
    $admin_name  = $admin_name ?? 'Daniel';

    // ✅ Demo data (later replace with DB)
    $kpi = [
        'rooms_total'     => 50,
        'rooms_occupied'  => 39,
        'rooms_available' => 11,
        'tenants_active'  => 39,
        'overdue'         => 6210,
        'maintenance'     => 1300,
        'rent_month'      => 12300,
    ];

    $recentPayments = [
        ['room' => '101', 'floor' => '1', 'tenant' => 'Daniel', 'due' => 200, 'status' => 'Paid'],
        ['room' => '201', 'floor' => '2', 'tenant' => 'Run',    'due' => 120, 'status' => 'Paid'],
        ['room' => '102', 'floor' => '1', 'tenant' => 'Sokha',  'due' => 150, 'status' => 'Paid'],
        ['room' => '305', 'floor' => '3', 'tenant' => 'Nita',   'due' => 200, 'status' => 'Paid'],
        ['room' => '404', 'floor' => '4', 'tenant' => 'David',  'due' => 100, 'status' => 'Pending'],
    ];

    $latestTenants = [
        ['name' => 'Alisha', 'room' => '101', 'floor' => '1', 'date' => '2025-09-01', 'status' => 'Active'],
        ['name' => 'Sokha',  'room' => '201', 'floor' => '2', 'date' => '2025-10-05', 'status' => 'Active'],
        ['name' => 'Nita',   'room' => '305', 'floor' => '3', 'date' => '2025-11-10', 'status' => 'Past'],
    ];

    $requests = [
        ['title' => 'Aircon not cold', 'room' => '305', 'by' => 'Nita',   'priority' => 'High'],
        ['title' => 'Water leak',      'room' => '201', 'by' => 'Sokha',  'priority' => 'Medium'],
        ['title' => 'Light broken',    'room' => '101', 'by' => 'Alisha', 'priority' => 'Low'],
    ];
@endphp

@section('content')
<style>
    /* Page */
    .dash-wrap { padding: 26px 28px 44px; }
    .dash-head {
        display:flex; align-items:flex-end; justify-content:space-between; gap:12px;
        margin-bottom: 16px;
    }
    .dash-title {
        font-size: 28px; font-weight: 900; color: #0f172a; letter-spacing: .2px;
        line-height: 1.15;
    }
    .dash-sub { margin-top: 4px; color: rgba(15,23,42,.60); font-size: 13px; }

    .pill {
        display:inline-flex; align-items:center; gap:8px;
        padding: 7px 12px; border-radius: 999px;
        border: 1px solid rgba(17,24,39,.10);
        background: rgba(248,250,252,1);
        color: rgba(15,23,42,.75);
        font-weight: 800; font-size: 13px;
        transition: all .15s ease;
    }
    .pill:hover { background: rgba(2,6,23,.03); transform: translateY(-1px); }

    /* Layout grid */
    .dash-grid { display:grid; grid-template-columns: 1fr; gap: 16px; }
    @media (min-width: 1024px) { .dash-grid { grid-template-columns: 2fr 1fr; } }

    /* Cards */
    .card {
        background:#fff;
        border:1px solid rgba(17,24,39,.10);
        border-radius:16px;
        overflow:hidden;
        box-shadow: 0 10px 30px rgba(2,6,23,.06);
    }
    .card-head {
        padding: 14px 16px;
        border-bottom: 1px solid rgba(17,24,39,.08);
        display:flex; align-items:center; justify-content:space-between; gap:10px;
        background: linear-gradient(180deg, rgba(59,130,246,.08), rgba(59,130,246,0));
    }
    .card-head h2 {
        font-size: 14px;
        font-weight: 900;
        letter-spacing: .08em;
        color: rgba(15,23,42,.85);
    }
    .card-body { padding: 16px; }

    /* KPI cards */
    .kpi-grid { display:grid; grid-template-columns: 1fr; gap: 12px; }
    @media (min-width: 768px) { .kpi-grid { grid-template-columns: repeat(3, 1fr); } }

    .kpi {
        border-radius: 16px;
        border: 1px solid rgba(17,24,39,.10);
        background: rgba(248,250,252,1);
        padding: 14px;
        transition: all .15s ease;
    }
    .kpi:hover { transform: translateY(-1px); box-shadow: 0 14px 26px rgba(2,6,23,.08); background:#fff; }
    .kpi-top { display:flex; align-items:center; justify-content:space-between; gap:10px; }
    .kpi-label { font-size: 12px; font-weight: 900; color: rgba(15,23,42,.60); letter-spacing: .08em; text-transform: uppercase; }
    .kpi-value { margin-top: 6px; font-size: 28px; font-weight: 900; color: rgba(15,23,42,.92); line-height: 1; }
    .kpi-note { margin-top: 6px; font-size: 12px; color: rgba(15,23,42,.55); }

    .kpi-ic {
        width: 40px; height: 40px; border-radius: 14px;
        display:grid; place-items:center;
        border: 1px solid rgba(17,24,39,.10);
        background: #fff;
    }
    .kpi-ic svg { width: 20px; height: 20px; color: rgba(37,99,235,1); }
    .ic-green svg { color: rgba(22,163,74,1); }
    .ic-amber svg { color: rgba(245,158,11,1); }
    .ic-red svg { color: rgba(220,38,38,1); }

    /* Table */
    .table-wrap { overflow-x:auto; }
    table {
        width:100%;
        border-collapse: separate;
        border-spacing: 0;
        font-size: 14px;
    }
    thead th {
        position: sticky;
        top: 0;
        background: rgba(248,250,252,1);
        font-size: 12px;
        letter-spacing: .06em;
        text-transform: uppercase;
        color: rgba(15,23,42,.70);
        font-weight: 900;
        padding: 12px 14px;
        border-bottom: 1px solid rgba(17,24,39,.08);
        z-index: 1;
        text-align:left;
    }
    tbody td {
        padding: 12px 14px;
        border-bottom: 1px solid rgba(17,24,39,.06);
        color: rgba(15,23,42,.75);
        background:#fff;
    }
    tbody tr:hover td { background: rgba(2,6,23,.02); }

    .badge {
        display:inline-flex; align-items:center;
        padding: 6px 10px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 900;
        border: 1px solid rgba(2,6,23,.08);
        background: rgba(2,6,23,.04);
        color: rgba(15,23,42,.80);
    }
    .b-paid { background: rgba(34,197,94,.10); border-color: rgba(34,197,94,.25); color: rgba(22,101,52,1); }
    .b-pending { background: rgba(245,158,11,.10); border-color: rgba(245,158,11,.25); color: rgba(146,64,14,1); }
    .b-high { background: rgba(239,68,68,.10); border-color: rgba(239,68,68,.25); color: rgba(127,29,29,1); }
    .b-medium { background: rgba(59,130,246,.10); border-color: rgba(59,130,246,.25); color: rgba(30,64,175,1); }
    .b-low { background: rgba(34,197,94,.10); border-color: rgba(34,197,94,.25); color: rgba(22,101,52,1); }

    /* Right column lists */
    .list { display:flex; flex-direction:column; gap: 10px; }
    .item {
        display:flex; align-items:center; justify-content:space-between; gap:10px;
        padding: 12px;
        border-radius: 14px;
        border: 1px solid rgba(17,24,39,.10);
        background: rgba(248,250,252,1);
    }
    .item:hover { background:#fff; }
    .item-left { display:flex; align-items:center; gap:10px; }
    .dot {
        width: 10px; height: 10px; border-radius:999px;
        background: rgba(59,130,246,1);
        box-shadow: 0 0 0 5px rgba(59,130,246,.10);
    }
    .dot-green { background: rgba(34,197,94,1); box-shadow: 0 0 0 5px rgba(34,197,94,.10); }
    .dot-amber { background: rgba(245,158,11,1); box-shadow: 0 0 0 5px rgba(245,158,11,.10); }
    .dot-red { background: rgba(220,38,38,1); box-shadow: 0 0 0 5px rgba(220,38,38,.10); }

    .item-title { font-weight: 900; color: rgba(15,23,42,.88); font-size: 14px; }
    .item-sub { font-size: 12px; color: rgba(15,23,42,.55); margin-top: 2px; }

    .quick-grid { display:grid; grid-template-columns: 1fr; gap: 10px; }
    @media (min-width: 640px) { .quick-grid { grid-template-columns: repeat(2, 1fr); } }

    .quick {
        display:flex; align-items:center; justify-content:space-between; gap:10px;
        border-radius: 14px;
        border: 1px solid rgba(17,24,39,.10);
        background: #fff;
        padding: 12px;
        transition: all .15s ease;
    }
    .quick:hover { background: rgba(2,6,23,.02); transform: translateY(-1px); }
    .quick span { font-weight: 900; color: rgba(15,23,42,.85); }
    .quick small { display:block; font-size: 12px; color: rgba(15,23,42,.55); margin-top: 3px; }
</style>

<main class="flex-1 overflow-y-auto bg-base">
    <div class="dash-wrap space-y-6">

        {{-- Header --}}
        <div class="dash-head">
            <div>
                <div class="dash-title">Dashboard</div>
                <div class="dash-sub">Overview for your property management system.</div>
            </div>

            <div class="flex flex-wrap gap-2">
                <a class="pill" href="{{ route('tanants.index') }}">Tenants</a>
                {{-- add routes when you have them --}}
                <a class="pill" href="#">Rooms</a>
                <a class="pill" href="#">Payment</a>
                <a class="pill" href="#">Maintenance</a>
                <a class="pill" href="#">Report</a>
            </div>
        </div>

        <div class="dash-grid">
            {{-- LEFT --}}
            <div class="space-y-6">

                {{-- KPI --}}
                <div class="kpi-grid">
                    <div class="kpi">
                        <div class="kpi-top">
                            <div>
                                <div class="kpi-label">Total Rooms</div>
                                <div class="kpi-value">{{ $kpi['rooms_total'] }}</div>
                                <div class="kpi-note">All units in system</div>
                            </div>
                            <div class="kpi-ic">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h6.75M9 10.5h6.75M9 14.25h6.75M9 18h6.75" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="kpi">
                        <div class="kpi-top">
                            <div>
                                <div class="kpi-label">Occupied</div>
                                <div class="kpi-value">{{ $kpi['rooms_occupied'] }}</div>
                                <div class="kpi-note">Currently occupied</div>
                            </div>
                            <div class="kpi-ic ic-amber">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="kpi">
                        <div class="kpi-top">
                            <div>
                                <div class="kpi-label">Available</div>
                                <div class="kpi-value">{{ $kpi['rooms_available'] }}</div>
                                <div class="kpi-note">Ready to rent</div>
                            </div>
                            <div class="kpi-ic ic-green">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20 7.5l-8.5 8.5L4 8.5" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="kpi">
                        <div class="kpi-top">
                            <div>
                                <div class="kpi-label">Active Tenants</div>
                                <div class="kpi-value">{{ $kpi['tenants_active'] }}</div>
                                <div class="kpi-note">Status: Active</div>
                            </div>
                            <div class="kpi-ic">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.118a7.5 7.5 0 0115 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.5-1.632z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="kpi">
                        <div class="kpi-top">
                            <div>
                                <div class="kpi-label">Rent This Month</div>
                                <div class="kpi-value">${{ number_format($kpi['rent_month']) }}</div>
                                <div class="kpi-note">Collected rent</div>
                            </div>
                            <div class="kpi-ic ic-green">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="kpi">
                        <div class="kpi-top">
                            <div>
                                <div class="kpi-label">Overdue</div>
                                <div class="kpi-value">${{ number_format($kpi['overdue']) }}</div>
                                <div class="kpi-note">Pending payments</div>
                            </div>
                            <div class="kpi-ic ic-red">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Recent Payments --}}
                <div class="card">
                    <div class="card-head">
                        <h2>RECENT PAYMENTS</h2>
                        <span class="text-sm text-text-mid">Latest transactions</span>
                    </div>

                    <div class="card-body">
                        <div class="table-wrap">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Room</th>
                                        <th>Floor</th>
                                        <th>Tenant</th>
                                        <th>Rent Due</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recentPayments as $p)
                                        @php
                                            $isPaid = $p['status'] === 'Paid';
                                        @endphp
                                        <tr>
                                            <td class="font-semibold text-text-dark">{{ $p['room'] }}</td>
                                            <td>{{ $p['floor'] }}</td>
                                            <td class="font-semibold text-text-dark">{{ $p['tenant'] }}</td>
                                            <td>${{ number_format($p['due']) }}</td>
                                            <td>
                                                <span class="badge {{ $isPaid ? 'b-paid' : 'b-pending' }}">
                                                    {{ $p['status'] }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

            {{-- RIGHT --}}
            <div class="space-y-6">

                {{-- Quick Actions --}}
                <div class="card">
                    <div class="card-head">
                        <h2>QUICK ACTIONS</h2>
                        <span class="text-sm text-text-mid">Shortcuts</span>
                    </div>
                    <div class="card-body">
                        <div class="quick-grid">
                            <a href="{{ route('tanants.createblade') }}" class="quick">
                                <div>
                                    <span>Add Tenant</span>
                                    <small>Create new tenant</small>
                                </div>
                                <div class="dot dot-green"></div>
                            </a>

                            <a href="{{ route('tanants.index') }}" class="quick">
                                <div>
                                    <span>Manage Tenants</span>
                                    <small>View all tenants</small>
                                </div>
                                <div class="dot"></div>
                            </a>

                            <a href="#" class="quick">
                                <div>
                                    <span>Rooms</span>
                                    <small>Manage rooms</small>
                                </div>
                                <div class="dot dot-amber"></div>
                            </a>

                            <a href="#" class="quick">
                                <div>
                                    <span>Reports</span>
                                    <small>Monthly summary</small>
                                </div>
                                <div class="dot"></div>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Latest Tenants --}}
                <div class="card">
                    <div class="card-head">
                        <h2>LATEST TENANTS</h2>
                        <span class="text-sm text-text-mid">Recent move-ins</span>
                    </div>
                    <div class="card-body">
                        <div class="list">
                            @foreach ($latestTenants as $t)
                                @php
                                    $b = $t['status'] === 'Active' ? 'b-paid' : 'b-pending';
                                @endphp
                                <div class="item">
                                    <div class="item-left">
                                        <div class="dot {{ $t['status'] === 'Active' ? 'dot-green' : 'dot-amber' }}"></div>
                                        <div>
                                            <div class="item-title">{{ $t['name'] }}</div>
                                            <div class="item-sub">Room {{ $t['room'] }} • Floor {{ $t['floor'] }} • {{ $t['date'] }}</div>
                                        </div>
                                    </div>
                                    <span class="badge {{ $b }}">{{ $t['status'] }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Maintenance Requests --}}
                <div class="card">
                    <div class="card-head">
                        <h2>MAINTENANCE</h2>
                        <span class="text-sm text-text-mid">New requests</span>
                    </div>
                    <div class="card-body">
                        <div class="list">
                            @foreach ($requests as $r)
                                @php
                                    $b = $r['priority'] === 'High' ? 'b-high' : ($r['priority'] === 'Medium' ? 'b-medium' : 'b-low');
                                    $dot = $r['priority'] === 'High' ? 'dot-red' : ($r['priority'] === 'Medium' ? 'dot-amber' : 'dot-green');
                                @endphp
                                <div class="item">
                                    <div class="item-left">
                                        <div class="dot {{ $dot }}"></div>
                                        <div>
                                            <div class="item-title">{{ $r['title'] }}</div>
                                            <div class="item-sub">Room {{ $r['room'] }} • By {{ $r['by'] }}</div>
                                        </div>
                                    </div>
                                    <span class="badge {{ $b }}">{{ $r['priority'] }}</span>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-4 text-sm text-text-mid">
                            Maintenance total this month: <b class="text-text-dark">${{ number_format($kpi['maintenance']) }}</b>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</main>
@endsection
