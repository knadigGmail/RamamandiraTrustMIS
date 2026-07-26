<nav class="bg-white border-b shadow-sm">

    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center p-3">

            <div>
                <h4 class="mb-0">
                    🛕 Honnavalli Ramamandira Trust MIS
                </h4>
            </div>

            <div class="d-flex align-items-center">

                <span class="me-3">
                    {{ auth()->user()->name ?? 'Administrator' }}
                </span>

                <form action="{{ route('logout') }}"
                      method="POST">

                    @csrf

                    <button class="btn btn-outline-danger btn-sm">

                        Logout

                    </button>

                </form>

            </div>

        </div>

    </div>

</nav>