{{-- resources/views/dashboard.blade.php --}}
@extends('layouts.app')

@section('title', 'Dashboard')

@php
    $active_page = 'dashboard';

    // ✅ អ្នកអាចផ្ញើ $stats ពី controller មក (optional)
    $stats = $stats ?? [
        'sales_total' => 0,
        'sales_count' => 0,
        'sales_cash'  => 0,
        'sales_bank'  => 0,

        'purchase_total' => 0,
        'purchase_count' => 0,
        'purchase_cash'  => 0,
        'purchase_bank'  => 0,

        'expense_total' => 0,
        'expense_count' => 0,
        'expense_cash'  => 0,
        'expense_bank'  => 0,

        'cash_in_total' => 0,
        'cash_in_count' => 0,
        'cash_in_cash'  => 0,
        'cash_in_bank'  => 0,

        'transfer_total' => 0,
        'transfer_count' => 0,

        'customers_total' => 1040,
        'customers_count' => 2,
    ];

    // Date range UI (only)
    $rangeText = request('range', '01/03/2025 00:00 - 03/03/2025 10:43');


@endphp

@section('content')
<style>
  :root{
    --bg: #f3f4f6;
    --card-radius: 14px;
    --shadow: 0 6px 18px rgba(2,6,23,.10);
    --line: rgba(15,23,42,.08);
    --text: #0f172a;
    --muted: rgba(15,23,42,.60);
  }

  .dash-wrap{ padding: 18px 22px 40px; }
  .dash-top{
    display:flex; align-items:center; justify-content:space-between; gap: 12px;
    padding-bottom: 12px; border-bottom: 1px solid var(--line);
  }
  .dash-title{
    display:flex; align-items:center; gap: 10px;
    font-weight: 900; font-size: 22px; color: var(--text);
  }
  .hamb{ width: 20px; height: 20px; opacity: .75; }

  .range-box{
    display:flex; align-items:center; gap: 10px;
    background:#fff; border: 1px solid var(--line);
    border-radius: 8px; padding: 8px 10px;
    box-shadow: 0 1px 2px rgba(0,0,0,.04);
  }
  .range-icons{ display:flex; gap: 8px; color: rgba(37,99,235,.9); }
  .range-input{
    border: 0; outline: none; background: transparent;
    font-weight: 700; color: rgba(15,23,42,.70);
    min-width: 240px;
  }
  .range-caret{ opacity: .55; }

  /* Stat Cards Grid */
  .stat-grid{
    margin-top: 18px;
    display:grid;
    grid-template-columns: 1fr;
    gap: 16px;
  }
  @media (min-width: 900px){
    .stat-grid{ grid-template-columns: repeat(3, 1fr); }
  }

  .stat-card{
    position: relative;
    border-radius: var(--card-radius);
    overflow: hidden;
    color: #fff;
    box-shadow: var(--shadow);
    min-height: 150px;
  }
  .stat-inner{ position:relative; z-index:2; padding: 18px 18px 16px 18px; display:flex; gap: 16px; }
  .stat-ic{
    width: 44px; height: 44px; border-radius: 999px;
    background: rgba(255,255,255,.22);
    display:grid; place-items:center;
    flex: 0 0 auto;
  }
  .stat-ic svg{ width: 22px; height: 22px; opacity: .95; }

  .stat-title{ font-weight: 900; letter-spacing: .2px; font-size: 16px; }
  .stat-value{ margin-top: 6px; font-weight: 900; font-size: 38px; line-height: 1; }
  .stat-meta{ margin-top: 10px; font-size: 13px; opacity: .95; }
  .stat-sub{ margin-top: 8px; font-size: 13px; opacity: .95; }

  /* Background circles + watermark */
  .stat-card:before{
    content:"";
    position:absolute; right:-30px; top:-34px;
    width: 160px; height: 160px; border-radius: 999px;
    background: rgba(255,255,255,.18);
    z-index:1;
  }
  .stat-card:after{
    content:"S";
    position:absolute; right: 18px; bottom: -26px;
    font-size: 120px; font-weight: 900;
    opacity: .12;
    z-index:1;
  }

  /* Color Themes */
  .g-green{ background: linear-gradient(90deg, #2ea043, #4caf50); }
  .g-purple{ background: linear-gradient(90deg, #7b2cbf, #9c27b0); }
  .g-red{ background: linear-gradient(90deg, #ef4444, #f44336); }
  .g-green2{ background: linear-gradient(90deg, #2ea043, #66bb6a); }
  .g-orange{ background: linear-gradient(90deg, #f59e0b, #fb923c); }
  .g-purple2{ background: linear-gradient(90deg, #7b2cbf, #a855f7); }

  /* Section Card */
  .section{
    margin-top: 18px;
    background:#fff;
    border: 1px solid var(--line);
    border-radius: 12px;
    box-shadow: 0 1px 2px rgba(0,0,0,.04);
  }
  .section-head{
    padding: 14px 16px;
    display:flex; align-items:center; gap: 10px;
    border-bottom: 1px solid var(--line);
    color: rgba(15,23,42,.80);
    font-weight: 900;
  }
  .section-body{ padding: 16px; }

  /* Quick Tiles */
  .quick-row{
    display:grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 14px;
  }
  @media (min-width: 900px){
    .quick-row{ grid-template-columns: repeat(6, 1fr); }
  }
  .q-tile{
    border-radius: 10px;
    border: 1px solid rgba(15,23,42,.06);
    background: #f8fafc;
    padding: 14px 10px;
    display:flex; flex-direction:column;
    align-items:center; justify-content:center;
    gap: 8px;
    text-align:center;
    transition: .15s ease;
  }
  .q-tile:hover{ transform: translateY(-1px); box-shadow: 0 10px 20px rgba(2,6,23,.08); background: #fff; }
  .q-ic{ width: 30px; height: 30px; }
  .q-label{ font-weight: 900; font-size: 13px; }
  .q-blue{ color: #2563eb; background: rgba(37,99,235,.08); }
  .q-green{ color: #16a34a; background: rgba(34,197,94,.10); }
  .q-yellow{ color: #d97706; background: rgba(245,158,11,.12); }
  .q-red{ color: #dc2626; background: rgba(239,68,68,.10); }
  .q-purple{ color: #7c3aed; background: rgba(124,58,237,.10); }
  .q-sky{ color: #0284c7; background: rgba(14,165,233,.10); }
  .q-icwrap{
    width: 52px; height: 52px; border-radius: 12px;
    display:grid; place-items:center;
  }

  /* Placeholder content */
  .big-box{
    height: 240px;
    border: 2px dashed rgba(15,23,42,.12);
    border-radius: 12px;
    background: rgba(248,250,252,1);
  }
</style>

<main class="flex-1 overflow-y-auto bg-base">
  <div class="dash-wrap">

    {{-- Top Bar --}}
    <div class="dash-top">
      <div class="dash-title">
        <svg class="hamb" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5M3.75 17.25h16.5" />
        </svg>
        <span>ផ្ទាំងគ្រប់គ្រង</span>
      </div>

      <form method="GET" action="{{ $links['dashboard'] }}">
        <div class="range-box">
          <div class="range-icons">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:18px;height:18px;">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3 8.25V18a2.25 2.25 0 002.25 2.25h13.5A2.25 2.25 0 0021 18V8.25M3 8.25A2.25 2.25 0 015.25 6h13.5A2.25 2.25 0 0121 8.25M3 8.25V6" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:18px;height:18px;">
              <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3M4 11h16M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
          </div>

          <input class="range-input" type="text" name="range" value="{{ $rangeText }}" />
          <span class="range-caret">▾</span>
        </div>
      </form>
    </div>

    {{-- Stat Cards (2 rows x 3) --}}
    <div class="stat-grid">

      {{-- Green --}}
      <div class="stat-card g-green">
        <div class="stat-inner">
          <div class="stat-ic">
            {{-- basket --}}
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18l-2 13H5L3 7z" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M8 7l4-4 4 4" />
            </svg>
          </div>
          <div>
            <div class="stat-title">ការលក់</div>
            <div class="stat-value">{{ number_format($stats['sales_total'], 2) }}</div>
            <div class="stat-meta">{{ $stats['sales_count'] }} invoice</div>
            <div class="stat-sub">
              {{ number_format($stats['sales_cash'], 2) }} សាច់ប្រាក់ &amp; {{ number_format($stats['sales_bank'], 2) }} ធនាគារ
            </div>
          </div>
        </div>
      </div>

      {{-- Purple --}}
      <div class="stat-card g-purple">
        <div class="stat-inner">
          <div class="stat-ic">
            {{-- cart --}}
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.5l1.5 12h12.75l2.25-8.25H6" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 20.25a.75.75 0 100-1.5.75.75 0 000 1.5zM18 20.25a.75.75 0 100-1.5.75.75 0 000 1.5z" />
            </svg>
          </div>
          <div>
            <div class="stat-title">ការទិញ</div>
            <div class="stat-value">{{ number_format($stats['purchase_total'], 2) }}</div>
            <div class="stat-meta">{{ $stats['purchase_count'] }} ការទិញ</div>
            <div class="stat-sub">
              {{ number_format($stats['purchase_cash'], 2) }} សាច់ប្រាក់ &amp; {{ number_format($stats['purchase_bank'], 2) }} ធនាគារ
            </div>
          </div>
        </div>
      </div>

      {{-- Red --}}
      <div class="stat-card g-red">
        <div class="stat-inner">
          <div class="stat-ic">
            {{-- refresh --}}
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v6h6" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M20 20v-6h-6" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M20 14a8 8 0 00-14-5.2L4 10" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M4 10a8 8 0 0014 5.2L20 14" />
            </svg>
          </div>
          <div>
            <div class="stat-title">ចំណាយ</div>
            <div class="stat-value">{{ number_format($stats['expense_total'], 2) }}</div>
            <div class="stat-meta">{{ $stats['expense_count'] }} ចំណាយ</div>
            <div class="stat-sub">
              {{ number_format($stats['expense_cash'], 2) }} សាច់ប្រាក់ &amp; {{ number_format($stats['expense_bank'], 2) }} ធនាគារ
            </div>
          </div>
        </div>
      </div>

      {{-- Green 2 --}}
      <div class="stat-card g-green2">
        <div class="stat-inner">
          <div class="stat-ic">
            {{-- money --}}
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3 7.5h18v9H3v-9z" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 12h.01M16.5 12h.01" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5a1.5 1.5 0 100 3 1.5 1.5 0 000-3z" />
            </svg>
          </div>
          <div>
            <div class="stat-title">ប្រាក់ចំណូលសរុប</div>
            <div class="stat-value">{{ number_format($stats['cash_in_total'], 2) }}</div>
            <div class="stat-meta">{{ $stats['cash_in_count'] }} ការចំណូល</div>
            <div class="stat-sub">
              {{ number_format($stats['cash_in_cash'], 2) }} សាច់ប្រាក់ &amp; {{ number_format($stats['cash_in_bank'], 2) }} ធនាគារ
            </div>
          </div>
        </div>
      </div>

      {{-- Orange --}}
      <div class="stat-card g-orange">
        <div class="stat-inner">
          <div class="stat-ic">
            {{-- transfer --}}
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M7 7h14l-3-3m3 3l-3 3" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M17 17H3l3 3m-3-3l3-3" />
            </svg>
          </div>
          <div>
            <div class="stat-title">ប្រាក់ផ្ទេរចេញ/ចូល</div>
            <div class="stat-value">{{ number_format($stats['transfer_total'], 2) }}</div>
            <div class="stat-meta">{{ $stats['transfer_count'] }} ការផ្ទេរ</div>
            <div class="stat-sub">—</div>
          </div>
        </div>
      </div>

      {{-- Purple 2 --}}
      <div class="stat-card g-purple2">
        <div class="stat-inner">
          <div class="stat-ic">
            {{-- users --}}
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.003 9.003 0 00-6 0M16.5 6.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M21 20.25a7.5 7.5 0 00-14.1-3.3" />
            </svg>
          </div>
          <div>
            <div class="stat-title">អតិថិជន</div>
            <div class="stat-value">{{ number_format($stats['customers_total'], 2) }}$</div>
            <div class="stat-meta">{{ $stats['customers_count'] }} អតិថិជន</div>
            <div class="stat-sub">—</div>
          </div>
        </div>
      </div>

    </div>

    {{-- Quick Access Section --}}
    <div class="section">
      <div class="section-head">
        {{-- grid icon --}}
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:18px;height:18px;">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h8v8H3V3zm10 0h8v8h-8V3zM3 13h8v8H3v-8zm10 0h8v8h-8v-8z" />
        </svg>
        <span>ផ្លូវកាត់ប្រើប្រាស់</span>
      </div>
      <div class="section-body">
        <div class="quick-row">

          <a class="q-tile" href="{{ $links['report'] }}">
            <div class="q-icwrap q-blue">
              <svg class="q-ic" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-6m4 6V7m4 10v-4M4 19h16" />
              </svg>
            </div>
            <div class="q-label">របាយការណ៍</div>
          </a>

          <a class="q-tile" href="{{ $links['tenants'] }}">
            <div class="q-icwrap q-green">
              <svg class="q-ic" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.118a7.5 7.5 0 0115 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.5-1.632z" />
              </svg>
            </div>
            <div class="q-label">Tenants</div>
          </a>

          <a class="q-tile" href="{{ $links['rooms'] }}">
            <div class="q-icwrap q-yellow">
              <svg class="q-ic" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h6.75M9 10.5h6.75M9 14.25h6.75M9 18h6.75" />
              </svg>
            </div>
            <div class="q-label">Rooms</div>
          </a>

          <a class="q-tile" href="{{ $links['payment'] }}">
            <div class="q-icwrap q-red">
              <svg class="q-ic" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-3 0-5 1.5-5 4s2 4 5 4 5-1.5 5-4-2-4-5-4z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2m0 14v2" />
              </svg>
            </div>
            <div class="q-label">Payment</div>
          </a>

          <a class="q-tile" href="{{ $links['maintenance'] }}">
            <div class="q-icwrap q-purple">
              <svg class="q-ic" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 2" />
              </svg>
            </div>
            <div class="q-label">Maintenance</div>
          </a>

          <a class="q-tile" href="{{ $links['dashboard'] }}">
            <div class="q-icwrap q-sky">
              <svg class="q-ic" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 7h16M4 12h16M4 17h16" />
              </svg>
            </div>
            <div class="q-label">Dashboard</div>
          </a>

        </div>
      </div>
    </div>

    {{-- Another section (similar to screenshot bottom empty area) --}}
    <div class="section" style="margin-top:16px;">
      <div class="section-head">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:18px;height:18px;">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        <span>ទិន្នន័យរបាយការណ៍</span>
      </div>
      <div class="section-body">
        <div class="big-box"></div>
      </div>
    </div>

  </div>
</main>
@endsection
