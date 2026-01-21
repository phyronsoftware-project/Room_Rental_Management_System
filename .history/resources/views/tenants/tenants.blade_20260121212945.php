@extends('layouts.app')

@section('title', 'Tenants')

@php
    $active_page = 'tenants';
@endphp

@section('content')
    <style>
        /* Layout */
        .page-wrap { padding: 28px; }
        .card {
            background: #fff;
            border: 1px solid rgba(17, 24, 39, .10);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(2, 6, 23, .06);
        }
        .card-head {
            padding: 16px 18px;
            border-bottom: 1px solid rgba(17, 24, 39, .08);
            display: flex; align-items: center; justify-content: space-between; gap: 12px;
            background: linear-gradient(180deg, rgba(59,130,246,.08), rgba(59,130,246,0));
        }
        .card-head h2 {
            font-size: 14px; font-weight: 900; letter-spacing: .08em; color: rgba(15,23,42,.85);
        }
        .btn-primary2{
            display:inline-flex; align-items:center; gap:10px;
            padding: 10px 14px; border-radius: 12px;
            border: 1px solid rgba(2,6,23,.08);
            background: linear-gradient(180deg, #2563eb, #1d4ed8);
            color: #fff; font-weight: 900; font-size: 13px;
            box-shadow: 0 10px 18px rgba(37,99,235,.24);
            transition: all .15s ease;
        }
        .btn-primary2:hover{ transform: translateY(-1px); filter: brightness(1.03); }

        /* Filter */
        .filter-card { padding: 16px 18px; }
        .f-label { font-size: 12px; font-weight: 800; color: rgba(15,23,42,.65); letter-spacing: .06em; }
        .f-input {
            width: 100%;
            border-radius: 12px;
            border: 1px solid rgba(15,23,42,.12);
            background: rgba(248,250,252,1);
            padding: 10px 12px;
            font-size: 14px;
            outline: none;
            transition: all .18s ease;
        }
        .f-input:focus{
            background: #fff;
            border-color: rgba(59,130,246,.6);
            box-shadow: 0 0 0 4px rgba(59,130,246,.18);
        }
        .btn-soft {
            padding: 10px 12px;
            border-radius: 12px;
            border: 1px solid rgba(15,23,42,.14);
            background: #fff;
            color: rgba(15,23,42,.75);
            font-weight: 900;
            font-size: 13px;
        }
        .btn-soft:hover{ background: rgba(15,23,42,.04); }

        /* Table */
        .table-wrap { overflow-x: auto; }
        table.tenants { width: 100%; border-collapse: separate; border-spacing: 0; }
        table.tenants thead th {
            position: sticky; top: 0;
            background: rgba(248,250,252,1);
            color: rgba(15,23,42,.75);
            font-size: 12px;
            letter-spacing: .06em;
            text-transform: uppercase;
            font-weight: 900;
            border-bottom: 1px solid rgba(17,24,39,.08);
            padding: 12px 16px;
            z-index: 1;
        }
        table.tenants tbody td {
            padding: 14px 16px;
            border-bottom: 1px solid rgba(17,24,39,.06);
            color: rgba(15,23,42,.75);
            font-size: 14px;
            vertical-align: middle;
            background: #fff;
        }
        table.tenants tbody tr:hover td { background: rgba(2,6,23,.02); }

        .avatar {
            width: 36px; height: 36px; border-radius: 999px;
            border: 1px solid rgba(17,24,39,.08);
        }
        .name { font-weight: 900; color: rgba(15,23,42,.90); }
        .muted { font-size: 12px; color: rgba(15,23,42,.55); }

        .badge {
            display: inline-flex; align-items: center;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 900;
            border: 1px solid rgba(2,6,23,.08);
            background: rgba(2,6,23,.04);
            color: rgba(15,23,42,.80);
        }
        .badge-active { background: rgba(34,197,94,.10); border-color: rgba(34,197,94,.25); color: rgba(22,101,52,1); }
        .badge-past { background: rgba(59,130,246,.10); border-color: rgba(59,130,246,.25); color: rgba(30,64,175,1); }
        .badge-evicted { background: rgba(239,68,68,.10); border-color: rgba(239,68,68,.25); color: rgba(127,29,29,1); }

        /* Dropdown */
        .icon-btn {
            width: 36px; height: 36px;
            border-radius: 12px;
            display: grid; place-items: center;
            border: 1px solid rgba(15,23,42,.10);
            background: #fff;
        }
        .icon-btn:hover{ background: rgba(2,6,23,.03); }

        .dd {
            position: absolute; right: 0; margin-top: 10px;
            width: 180px;
            background: #fff;
            border: 1px solid rgba(17,24,39,.10);
            border-radius: 12px;
            box-shadow: 0 18px 35px rgba(2,6,23,.12);
            overflow: hidden;
            z-index: 20;
        }
        .dd a, .dd button {
            width: 100%;
            display: block;
            text-align: left;
            padding: 10px 12px;
            font-size: 13px;
            font-weight: 800;
            color: rgba(15,23,42,.82);
            background: #fff;
        }
        .dd a:hover, .dd button:hover { background: rgba(2,6,23,.03); }
        .dd .danger { color: rgba(220,38,38,1); }
        .dd .danger:hover { background: rgba(239,68,68,.08); }

        /* Footer */
        .table-footer{
            padding: 14px 18px;
            display:flex; justify-content:space-between; align-items:center;
            gap: 12px; flex-wrap: wrap;
            background: rgba(248,250,252,1);
            border-top: 1px solid rgba(17,24,39,.08);
        }
    </style>

    <main class="flex-1 overflow-y-auto bg-base">
        <div class="page-wrap space-y-6">

            {{-- Header --}}
            <div class="flex items-center justify-between gap-4">
                <div>
                    <h1 class="text-3xl font-extrabold text-primary-dark">TENANTS</h1>
                    <div class="text-sm text-text-mid mt-1">Manage tenants, rooms, and rental terms.</div>
                </div>

                <a href="{{ route('tanants.createblade') }}" class="btn-primary2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                        <path
                            d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                    </svg>
                    ADD NEW
                </a>
            </div>

            {{-- Filter --}}
            <div class="card">
                <div class="filter-card">
                    <form method="GET" action="{{ route('tanants.index') }}" class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <div class="f-label">From Date</div>
                                <input type="date" name="from_date" value="{{ request('from_date') }}" class="f-input" />
                            </div>

                            <div>
                                <div class="f-label">To Date</div>
                                <input type="date" name="to_date" value="{{ request('to_date') }}" class="f-input" />
                            </div>

                            <div>
                                <div class="f-label">Search</div>
                                <input type="text" name="search" value="{{ request('search') }}"
                                    placeholder="Name, phone, email, room..." class="f-input" />
                            </div>
                        </div>

                        <div class="flex items-center gap-2 flex-wrap">
                            <button class="btn-primary2" type="submit">FILTER</button>
                            <a href="{{ route('tanants.index') }}" class="btn-soft">CLEAR</a>

                            <div class="ml-auto flex items-center gap-2">
                                <span class="text-sm text-text-mid">Records per page</span>
                                <select name="per_page" onchange="this.form.submit()" class="f-input"
                                    style="width:auto; padding: 8px 10px;">
                                    @foreach ([10, 25, 50] as $n)
                                        <option value="{{ $n }}" @selected((int) request('per_page', 10) === $n)>
                                            {{ $n }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Table --}}
            <div class="card">
                <div class="card-head">
                    <h2>ALL TENANTS</h2>
                    <div class="text-sm text-text-mid">
                        Total: <b class="text-text-dark">{{ $tenants->total() }}</b>
                    </div>
                </div>

                <div class="table-wrap">
                    <table class="tenants">
                        <thead>
                            <tr>
                                <th>Tenant</th>
                                <th>Room No</th>
                                <th>Room Floor</th>
                                <th>Phone Number</th>
                                <th>Age</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Payment Term</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($tenants as $t)
                                @php
                                    // ✅ match schema: room_number + floor
                                    $roomNo = data_get($t, 'room.room_number', '-');
                                    $floor = data_get($t, 'room.floor', '-');

                                    $avatarText = strtoupper(mb_substr($t->full_name, 0, 1));
                                    $start = optional($t->start_date)->format('d M Y');
                                    $end = $t->end_date ? $t->end_date->format('d M Y') : '-';

                                    $status = $t->status ?? 'Active';
                                    $badgeClass = $status === 'Active' ? 'badge-active' : ($status === 'Past' ? 'badge-past' : 'badge-evicted');
                                @endphp

                                <tr>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <img class="avatar"
                                                src="https://placehold.co/72x72/1E3A8A/FFF?text={{ urlencode($avatarText) }}"
                                                alt="{{ $t->full_name }}" />

                                            <div class="flex flex-col">
                                                <span class="name">{{ $t->full_name }}</span>
                                                <span class="muted">{{ $t->email ?? '—' }}</span>
                                                {{-- <span class="mt-1 badge {{ $badgeClass }}">{{ $status }}</span> --}}
                                            </div>
                                        </div>
                                    </td>

                                    <td class="name">{{ $roomNo }}</td>
                                    <td>{{ $floor }}</td>
                                    <td>{{ $t->phone_number }}</td>
                                    <td>{{ $t->age ? $t->age . ' yrs' : '-' }}</td>
                                    <td>{{ $start }}</td>
                                    <td>{{ $end }}</td>
                                    <td class="name">{{ $t->payment_term }}</td>

                                    <td class="text-center">
                                        <div class="relative inline-block">
                                            <button type="button" class="icon-btn" data-action="toggle-dropdown">
                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                                </svg>
                                            </button>

                                            <div class="dd hidden">
                                                <a href="{{ route('tanants.show', $t->tenant_id) }}">View Detail</a>
                                                <a href="{{ route('tanants.edit', $t->tenant_id) }}">Edit</a>

                                                <form action="{{ route('tanants.destroy', $t->tenant_id) }}"
                                                    method="POST" onsubmit="return confirm('Delete this tenant?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" style="padding: 22px 16px; text-align:center; color: rgba(15,23,42,.55);">
                                        No tenants found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Footer / Pagination (Real) --}}
                <div class="table-footer">
                    <div class="text-sm text-text-mid">
                        Showing <b class="text-text-dark">{{ $tenants->firstItem() ?? 0 }}</b> to
                        <b class="text-text-dark">{{ $tenants->lastItem() ?? 0 }}</b> of
                        <b class="text-text-dark">{{ $tenants->total() }}</b> results
                    </div>

                    <div>
                        {{ $tenants->links() }}
                    </div>
                </div>
            </div>

        </div>
    </main>

    <script>
        document.addEventListener('click', (e) => {
            const btn = e.target.closest('[data-action="toggle-dropdown"]');

            // close all first
            document.querySelectorAll('.dd').forEach(d => d.classList.add('hidden'));

            if (btn) {
                const wrap = btn.closest('.relative');
                const dd = wrap ? wrap.querySelector('.dd') : null;
                if (dd) dd.classList.toggle('hidden');
                e.stopPropagation();
            }
        });
    </script>
@endsection
