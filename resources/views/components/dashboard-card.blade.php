@props([
    'title',
    'value',
    'icon',
    'color' => 'primary',
    'subtitle' => null,
    'route' => null
])

<div class="col-xl-3 col-lg-6 col-md-6 mb-4">

    <div class="card shadow-sm border-0 h-100">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h6 class="text-muted mb-2">
                        {{ $title }}
                    </h6>

                    <h2 class="fw-bold mb-0">
                        {{ $value }}
                    </h2>

                    @if($subtitle)
                        <small class="text-success">
                            {!! $subtitle !!}
                        </small>
                    @endif

                </div>

                <div>

                    <div class="rounded-circle bg-{{ $color }} text-white d-flex align-items-center justify-content-center"
                         style="width:70px;height:70px;">

                        <i class="{{ $icon }} fa-2x"></i>

                    </div>

                </div>

            </div>

        </div>

        @if($route)

            <div class="card-footer bg-white">

                <a href="{{ $route }}" class="text-decoration-none">

                    View Details
                    <i class="fas fa-arrow-right ms-1"></i>

                </a>

            </div>

        @endif

    </div>

</div>