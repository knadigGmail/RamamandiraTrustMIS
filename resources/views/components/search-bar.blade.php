<form method="GET" action="{{ route($route) }}">

<div class="row mb-3">

    <div class="col-md-4">

        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            class="form-control"
            placeholder="{{ $placeholder ?? 'Search...' }}">

    </div>

    <div class="col-md-2">

        <button class="btn btn-primary">

            <i class="fas fa-search"></i>

            Search

        </button>

    </div>

</div>

</form>