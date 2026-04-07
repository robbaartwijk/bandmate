@extends('layouts.app', ['page' => __('users.show'), 'pageSlug' => 'users'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">{{ __('users.show') }}</h2>
        <div class="flex gap-2">
            <a href="{{ route('users.edit', $user->id) }}" class="bm-btn bm-btn-secondary bm-btn-sm"><i class="fas fa-pencil-alt"></i></a>
            <form action="{{ route('users.destroy', $user->id) }}" method="post" class="inline">
                @csrf @method('delete')
                <button type="button" class="bm-btn bm-btn-danger bm-btn-sm"
                        onclick="if(confirm('{{ __('users.delete_confirm') }}')) this.closest('form').submit()">
                    <i class="fas fa-trash"></i>
                </button>
            </form>
            <a href="{{ route('users.index') }}" class="bm-btn bm-btn-secondary bm-btn-sm">{{ __('common.back') }}</a>
        </div>
    </div>
    <div class="bm-card-body">
        @if(session('status'))
        <div class="bm-alert bm-alert-success mb-4" id="status-alert"><i class="fas fa-check-circle"></i> {{ session('status') }}</div>
        <script>setTimeout(() => { const el = document.getElementById('status-alert'); if(el) el.style.display='none'; }, 2000);</script>
        @endif

        @if($user->image)
        <div class="mb-6">
            <img src="{{ asset('/storage/' . $user->image->id . '/' . $user->image->file_name) }}"
                 class="rounded-lg border border-white/10 w-full object-cover"
                 style="max-height:400px;"
                 alt="{{ $user->name }}">
        </div>
        @endif

        <table class="bm-table">
            <tbody>
                <tr>
                    <th class="w-1/4 text-white/60 font-medium">{{ __('users.col_name') }}</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('users.col_email') }}</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('users.col_role') }}</th>
                    <td>{{ $user->is_admin ? __('users.role_admin') : __('users.role_user') }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('users.col_registered') }}</th>
                    <td class="text-white/40 text-xs">{{ $user->created_at }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('common.col_updated') }}</th>
                    <td class="text-white/40 text-xs">{{ $user->updated_at }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
