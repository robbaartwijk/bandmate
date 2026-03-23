@if (session($key ?? 'status'))
    <div class="bm-alert bm-alert-success" role="alert">
        <i class="fas fa-check-circle text-sm"></i>
        {{ session($key ?? 'status') }}
    </div>
@endif