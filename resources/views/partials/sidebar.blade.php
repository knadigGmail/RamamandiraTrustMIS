<aside class="bg-dark text-white" style="width:270px;min-height:100vh;overflow-y:auto;">

    <div class="p-3 border-bottom text-center">

        <img src="{{ asset('images/logo.png') }}"
             alt="Logo"
             style="height:70px;"
             class="mb-2">

        <h5 class="text-warning mb-0">
            Ramamandira Trust
        </h5>

        <small class="text-light">
            Management Information System
        </small>

    </div>

    <nav class="nav flex-column mt-2">

        <a href="{{ route('dashboard') }}"
           class="nav-link text-white">
            <i class="fas fa-gauge-high me-2"></i>
            Dashboard
        </a>

        <hr class="text-secondary">

        <small class="text-uppercase text-warning px-3 fw-bold">
            Masters
        </small>

        <a href="{{ route('trustees.index') }}" class="nav-link text-white">
            <i class="fas fa-users me-2"></i> Trustees
        </a>

        <a href="{{ route('users.index') }}" class="nav-link text-white">
            <i class="fas fa-user-shield me-2"></i> Users
        </a>

        <a href="#" class="nav-link text-white">
            <i class="fas fa-user-lock me-2"></i> Roles
        </a>

        <a href="{{ route('employees.index') }}" class="nav-link text-white">
            <i class="fas fa-user-tie me-2"></i> Employees
        </a>

        <a href="{{ route('customers.index') }}" class="nav-link text-white">
            <i class="fas fa-address-book me-2"></i> Customers
        </a>

        <a href="{{ route('halls.index') }}" class="nav-link text-white">
            <i class="fas fa-building me-2"></i> Halls
        </a>

        <a href="{{ route('donors.index') }}" class="nav-link text-white">
            <i class="fas fa-hand-holding-heart me-2"></i> Donors
        </a>

        <hr class="text-secondary">

        <small class="text-uppercase text-warning px-3 fw-bold">
            Bookings
        </small>

        <a href="{{ route('bookings.create') }}" class="nav-link text-white">
            <i class="fas fa-calendar-plus me-2"></i> New Booking
        </a>

        <a href="{{ route('bookings.index') }}" class="nav-link text-white">
            <i class="fas fa-calendar-check me-2"></i> Booking Register
        </a>

        <a href="#" class="nav-link text-white">
    <i class="fas fa-calendar-days me-2"></i> Booking Calendar
    <span class="badge bg-warning ms-2">Coming Soon</span>
</a>

        <a href="#" class="nav-link text-white">
            <i class="fas fa-door-open me-2"></i> Hall Availability
        </a>

        <hr class="text-secondary">

       <small class="text-uppercase text-warning px-3 fw-bold">
    Finance
</small>

<a href="{{ route('financial-accounts.index') }}" class="nav-link text-white">
    <i class="fas fa-university me-2"></i>
    Financial Accounts
</a>

<a href="#" class="nav-link text-white">
    <i class="fas fa-receipt me-2"></i>
    Receipts
    <span class="badge bg-warning ms-2">Soon</span>
</a>

<a href="#" class="nav-link text-white">
    <i class="fas fa-money-bill-wave me-2"></i>
    Payments
    <span class="badge bg-warning ms-2">Soon</span>
</a>

<a href="#" class="nav-link text-white">
    <i class="fas fa-file-invoice-dollar me-2"></i>
    Expenses
    <span class="badge bg-warning ms-2">Soon</span>
</a>

        <hr class="text-secondary">
<hr class="text-secondary">

<small class="text-uppercase text-warning px-3 fw-bold">
    Donations
</small>

<a href="{{ route('sevas.index') }}" class="nav-link text-white">
    <i class="fas fa-hands-praying me-2"></i>
    Seva Master
</a>
<a href="{{ route('donations.index') }}" class="nav-link text-white">
    <i class="fas fa-hand-holding-heart me-2"></i>
    Donation Entry
</a>
        <small class="text-uppercase text-warning px-3 fw-bold">
            Temple Activities
        </small>

        <a href="#" class="nav-link text-white">
            <i class="fas fa-place-of-worship me-2"></i> Ramotsava
        </a>

        <a href="#" class="nav-link text-white">
            <i class="fas fa-om me-2"></i> Kalyanotsava
        </a>

        <hr class="text-secondary">

        <small class="text-uppercase text-warning px-3 fw-bold">
            Merit Awards
        </small>

        <a href="#" class="nav-link text-white">
            <i class="fas fa-award me-2"></i> Merit Awards
        </a>

        <hr class="text-secondary">

        <small class="text-uppercase text-warning px-3 fw-bold">
            Reports
        </small>

        <a href="#" class="nav-link text-white">
            <i class="fas fa-chart-column me-2"></i> Reports
        </a>

        <hr class="text-secondary">

       <small class="text-uppercase text-warning px-3 fw-bold">
    Administration
</small>

<a href="{{ route('settings.edit') }}" class="nav-link text-white">
    <i class="fas fa-building me-2"></i>
    Trust Profile
</a>

<a href="#" class="nav-link text-white">
    <i class="fas fa-user-shield me-2"></i>
    User Management
    <span class="badge bg-warning ms-2">Soon</span>
</a>

<a href="#" class="nav-link text-white">
    <i class="fas fa-gear me-2"></i>
    System Settings
    <span class="badge bg-warning ms-2">Soon</span>
</a>

    </nav>

</aside>