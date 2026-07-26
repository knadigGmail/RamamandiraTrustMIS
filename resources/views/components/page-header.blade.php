<div class="d-flex justify-content-between align-items-center mb-3">

    <h2>{{ $title }}</h2>

    @isset($createRoute)

    <a href="{{ route($createRoute) }}"
       class="btn btn-success">

        <i class="fas fa-plus"></i>

        {{ $buttonText }}

    </a>

    @endisset

</div>