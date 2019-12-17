@if (Session::has('message'))
{{-- <div aria-live="polite" class="customMsg" aria-atomic="true" style="position: relative; min-height: 200px;">
    <div class="toast" style="position: absolute; top: 0; right: 0;">
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <div class="toast-body">
            {{ Session::get('message') }}
        </div>
    </div>
</div> --}}
<div class="alert alert-success alert-dismissible fade show shadow customMsg" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    {{ Session::get('message') }}
</div>
@endif