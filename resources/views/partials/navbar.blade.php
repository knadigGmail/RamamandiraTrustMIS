<nav class="navbar navbar-expand-lg bg-white shadow-sm border-bottom px-4">

    <div class="container-fluid">

        <!-- Left -->
        <div>
            <h4 class="mb-0 fw-bold text-dark">
                @yield('page-title', 'Dashboard')
            </h4>

            <small class="text-muted">
                HVL Ramamandira Trust Management Information System
            </small>
        </div>

        <!-- Right -->
        <div class="d-flex align-items-center">

            <!-- Date -->
            <div class="text-end me-4">
                <small class="text-muted d-block">Today</small>
                <strong>{{ now()->format('d M Y') }}</strong>
            </div>

            <!-- User -->
            <div class="dropdown">

                <button
                    type="button"
                    class="btn btn-light border dropdown-toggle"
                    data-bs-toggle="dropdown"
                    aria-expanded="false">

                    <i class="fas fa-user-circle me-2"></i>

                    {{ Auth::user()->name }}

                </button>

                <ul class="dropdown-menu dropdown-menu-end shadow">

                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-user me-2"></i>
                            Profile
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-key me-2"></i>
                            Change Password
                        </a>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit" class="dropdown-item">
                                <i class="fas fa-sign-out-alt me-2 text-danger"></i>
                                <span class="text-danger">Logout</span>
                            </button>
                        </form>
                    </li>

                </ul>

            </div>

        </div>

    </div>

</nav>