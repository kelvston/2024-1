@extends('layouts.app')

@section('title', 'Admin Dashboard')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endpush

@section('content')
    <div class="admin-wrapper">
        <nav id="sidebar">
            <button id="toggleSidebar">☰</button>
            <ul class="list-unstyled components">
                <li><a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="#"><i class="fas fa-briefcase"></i> Cases</a></li>
                <li><a href="#"><i class="fas fa-users"></i> Clients</a></li>
                <li><a href="#"><i class="fas fa-user-tie"></i> Lawyers</a></li>
                <li><a href="#"><i class="fas fa-calendar-check"></i> Appointments</a></li>
                <li><a href="#"><i class="fas fa-chart-line"></i> Reports</a></li>
                <li><a href="{{ route('categories.index') }}"><i class="fas fa-folder"></i> Case Categories</a></li>
                <li><a href="#"><i class="fas fa-user-shield"></i> Case Assignments</a></li>
                <li><a href="#"><i class="fas fa-gavel"></i> Court Schedules</a></li>
                <li><a href="#"><i class="fas fa-file-invoice"></i> Client Invoices</a></li>
                <li><a href="#"><i class="fas fa-chart-bar"></i> Lawyer Performance</a></li>
                <li><a href="#"><i class="fas fa-credit-card"></i> Payment History</a></li>
                <li><a href="#"><i class="fas fa-file-alt"></i> Legal Documents</a></li>
                <li><a href="#"><i class="fas fa-users-cog"></i> User Management</a></li>
                <li><a href="#"><i class="fas fa-bell"></i> Notifications</a></li>
            </ul>

        </nav>
        <div id="content">
            @yield('admin-content')
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/admin.js') }}"></script>
@endpush
