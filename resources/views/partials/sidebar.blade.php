<aside class="sidebar bg-dark text-white">

    <!-- Logo -->

   <div class="sidebar-header text-center border-bottom py-4">

    <img src="{{ asset('images/logo.png') }}"
         class="sidebar-logo mb-3"
         alt="Logo">

    <h5 class="fw-bold text-warning mb-1">
        Ramamandira Trust
    </h5>

    <small class="text-light d-block">
        Honnavally
    </small>

    <small class="text-secondary">
        Trust Management ERP
    </small>

</div>

       

    
<div class="user-panel text-center py-3 border-bottom">

    <div class="mb-2">

        <i class="fas fa-user-circle fa-3x text-warning"></i>

    </div>

    <div class="fw-bold text-white">

        {{ auth()->user()->name ?? 'Administrator' }}

    </div>

    <small class="text-secondary">

        System Administrator

    </small>

</div>
    <div class="sidebar-menu">

        <!-- Dashboard -->

        <a href="{{ route('dashboard') }}"
           class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">

            <i class="fas fa-gauge-high me-2"></i>

            Dashboard

        </a>

        <!-- Masters -->

        <div class="sidebar-section">

            <div class="sidebar-title">
                Masters
            </div>

            <a href="{{ route('trustees.index') }}"
               class="sidebar-link {{ request()->routeIs('trustees.*') ? 'active' : '' }}">

                <i class="fas fa-users me-2"></i>
                Trustees

            </a>

            <a href="{{ route('users.index') }}"
               class="sidebar-link {{ request()->routeIs('users.*') ? 'active' : '' }}">

                <i class="fas fa-user-shield me-2"></i>
                Users

            </a>

            <a href="{{ route('employees.index') }}"
               class="sidebar-link {{ request()->routeIs('employees.*') ? 'active' : '' }}">

                <i class="fas fa-user-tie me-2"></i>
                Employees

            </a>

            <a href="{{ route('customers.index') }}"
               class="sidebar-link {{ request()->routeIs('customers.*') ? 'active' : '' }}">

                <i class="fas fa-address-book me-2"></i>
                Customers

            </a>

            <a href="{{ route('donors.index') }}"
               class="sidebar-link {{ request()->routeIs('donors.*') ? 'active' : '' }}">

                <i class="fas fa-hand-holding-heart me-2"></i>
                Donors

            </a>

            <a href="{{ route('halls.index') }}"
               class="sidebar-link {{ request()->routeIs('halls.*') ? 'active' : '' }}">

                <i class="fas fa-building me-2"></i>
                Halls

            </a>

        </div>

        <!-- Bookings -->

        <div class="sidebar-section">

            <div class="sidebar-title">
                Bookings
            </div>

            <a href="{{ route('bookings.create') }}"
               class="sidebar-link">

                <i class="fas fa-calendar-plus me-2"></i>
                New Booking

            </a>

            <a href="{{ route('bookings.index') }}"
               class="sidebar-link {{ request()->routeIs('bookings.*') ? 'active' : '' }}">

                <i class="fas fa-calendar-check me-2"></i>
                Booking Register

            </a>

        </div>

        <!-- Finance -->

        <div class="sidebar-section">

            <div class="sidebar-title">
                Finance
            </div>

            <a href="{{ route('account-heads.index') }}"
               class="sidebar-link {{ request()->routeIs('account-heads.*') ? 'active' : '' }}">

                <i class="fas fa-sitemap me-2"></i>
                Chart of Accounts

            </a>

            <a href="{{ route('financial-accounts.index') }}"
               class="sidebar-link {{ request()->routeIs('financial-accounts.*') ? 'active' : '' }}">

                <i class="fas fa-university me-2"></i>
                Financial Accounts

            </a>

            <a href="{{ route('payment-vouchers.index') }}"
               class="sidebar-link {{ request()->routeIs('payment-vouchers.*') ? 'active' : '' }}">

                <i class="fas fa-file-invoice-dollar me-2"></i>
                Payment Vouchers

            </a>
<a href="{{ route('receipt-vouchers.index') }}"
   class="sidebar-link {{ request()->routeIs('receipt-vouchers.*') ? 'active' : '' }}">

    <i class="fas fa-receipt me-2"></i>

    Receipt Vouchers

</a>
<a href="{{ route('ledger.index') }}"
   class="sidebar-link {{ request()->routeIs('ledger.*') ? 'active' : '' }}">

    <i class="fas fa-book me-2"></i>

    General Ledger

</a>
        </div>

        <!-- Temple -->

        <div class="sidebar-section">

            <div class="sidebar-title">
                Temple
            </div>

            <a href="{{ route('donations.index') }}"
               class="sidebar-link {{ request()->routeIs('donations.*') ? 'active' : '' }}">

                <i class="fas fa-hand-holding-heart me-2"></i>
                Donations

            </a>

            <a href="{{ route('sevas.index') }}"
               class="sidebar-link {{ request()->routeIs('sevas.*') ? 'active' : '' }}">

                <i class="fas fa-hands-praying me-2"></i>
                Sevas

            </a>

        </div>

        <!-- Administration -->

        <div class="sidebar-section">

            <div class="sidebar-title">
                Administration
            </div>

            <a href="{{ route('settings.edit') }}"
               class="sidebar-link {{ request()->routeIs('settings.*') ? 'active' : '' }}">

                <i class="fas fa-gear me-2"></i>
                Trust Profile

            </a>

        </div>

    </div>

</aside>