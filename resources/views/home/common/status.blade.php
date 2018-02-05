@if(session('success'))
<div class="alert alert-dismissible my_alert" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    {{session('success')}}
</div>

@elseif(session('error'))
<div class="alert alert-danger alert-dismissible my_alert" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    {{session('error')}}
</div>
@endif