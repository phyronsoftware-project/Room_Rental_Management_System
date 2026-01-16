{{-- resources/views/dashboard.blade.php --}}
@extends('layouts.app')

@section('title', 'Dashboard')

@php
    // ✅ set active page for sidebar highlight
    $active_page = 'dashboard';
    $admin_name = $admin_name ?? 'Daniel';
@endphp

@section('content')

@endsection
