{{-- resources/views/dashboard.blade.php --}}
@extends('layouts.app')

@section('title', 'Rooms Available')

@php
    // ✅ set active page for sidebar highlight (UI only)
    $active_page = 'dashboard';
@endphp

@section('content')
