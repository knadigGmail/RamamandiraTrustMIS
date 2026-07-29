<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm border-bottom sticky-top">

    <div class="container-fluid">

        <!-- Mobile Sidebar Toggle -->
        <button class="btn btn-outline-secondary d-lg-none me-2"
                type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#sidebarMenu">

            <i class="fas fa-bars"></i>

        </button>

        <!-- Page Title -->
        <div>

            <h5 class="mb-0 fw-bold text-dark">
                @yield('page-title', 'Dashboard')
            </h5>

            <small class="text-muted">
                HVL Ramamandira Trust Management Information System
            </small>

        </div>

        <div class="ms-auto d-flex align-items-center">

            <!-- Financial Year -->
            <span class="badge bg-success me-3 px-3 py-2">
                FY 2026-27
            </span>

            <!-- Notifications -->
            <div class="dropdown me-3">

                <button class="btn btn-light position-relative"
                        data-bs-toggle="dropdown">

                    <i class="fas fa-bell"></i>

                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        3
                    </span>

                </button>

                <ul class="dropdown-menu dropdown-menu-end shadow">

                    <li>
                        <h6 class="dropdown-header">
                            Notifications
                        </h6>
                    </li>

                    <li>
                        <a class="dropdown-item" href="#">
                            Pending Payment Voucher Approval
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="#">
                            Hall Booking Tomorrow
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="#">
                            Ramotsava Meeting Scheduled
                        </a>
                    </li>

                </ul>

            </div>

            <!-- User -->
            <div class="dropdown">

                <button class="btn btn-light dropdown-toggle"
                        data-bs-toggle="dropdown">

                    <i class="fas fa-user-circle me-2"></i>

                    {{ Auth::user()->name }}

                </button>

                <ul class="dropdown-menu dropdown-menu-end shadow">

                    <li>

                        <a class="dropdown-item"
                           href="{{ route('profile.edit') }}">

                            <i class="fas fa-user me-2"></i>

                            My Profile

                        </a>

                    </li>

                    <li><hr class="dropdown-divider"></li>

                    <li>

                        <form method="POST"
                              action="{{ route('logout') }}">

                            @csrf

                            <button class="dropdown-item">

                                <i class="fas fa-right-from-bracket me-2"></i>

                                Logout

                            </button>

                        </form>

                    </li>

                </ul>

            </div>

        </div>

    </div>

</nav>