@if (session('alert.success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('alert.success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
    </button>
</div>
@endif
