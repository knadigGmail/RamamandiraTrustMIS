@if($photo)

<img
    src="{{ asset('storage/'.$photo) }}"
    width="60"
    height="60"
    class="img-circle"
    style="object-fit:cover"
    alt="Photo">

@else

<img
    src="{{ asset('images/no-image.png') }}"
    width="60"
    height="60"
    class="img-circle"
    style="object-fit:cover"
    alt="No Photo">

@endif