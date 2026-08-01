<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold text-dark mb-1">
            {{ $title }}
        </h2>

        @if(isset($subtitle))
            <p class="text-muted mb-0">
                {{ $subtitle }}
            </p>
        @endif

    </div>

    @if(isset($buttonText))

        <a href="{{ $buttonLink }}"
           class="btn btn-primary shadow-sm">

            <i class="fas fa-plus me-2"></i>

            {{ $buttonText }}

        </a>

    @endif

</div>