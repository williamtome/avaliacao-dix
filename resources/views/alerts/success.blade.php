@if (session($key ?? 'status'))
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{ session($key ?? 'status') }}
    </div>
@endif
