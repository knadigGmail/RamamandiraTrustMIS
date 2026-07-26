<div class="btn-group" role="group">

    @if(isset($view))
    <a href="{{ $view }}"
       class="btn btn-info btn-sm"
       title="View">
        <i class="fas fa-eye"></i>
    </a>
    @endif

    @if(isset($edit))
    <a href="{{ $edit }}"
       class="btn btn-warning btn-sm"
       title="Edit">
        <i class="fas fa-edit"></i>
    </a>
    @endif

    @if(isset($delete))
    <form action="{{ $delete }}"
          method="POST"
          style="display:inline">

        @csrf
        @method('DELETE')

        <button class="btn btn-danger btn-sm"
                title="Delete"
                onclick="return confirm('Delete this record?')">

            <i class="fas fa-trash"></i>

        </button>

    </form>
    @endif

</div>