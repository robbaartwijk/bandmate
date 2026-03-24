@extends('layouts.app', ['page' => __('instruments.show'), 'pageSlug' => 'instruments'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">{{ __('instruments.show') }}</h2>
        <div class="flex gap-2">
            <a href="{{ route('instruments.edit', $instrument->id) }}" class="bm-btn bm-btn-secondary bm-btn-sm"><i class="fas fa-pencil-alt"></i></a>
            <form action="{{ route('instruments.destroy', $instrument->id) }}" method="post" class="inline">
                @csrf @method('delete')
                <button type="button" class="bm-btn bm-btn-danger bm-btn-sm"
                        onclick="if(confirm('{{ __('instruments.delete_confirm') }}')) this.closest('form').submit()">
                    <i class="fas fa-trash"></i>
                </button>
            </form>
            <a href="{{ route('instruments.index') }}" class="bm-btn bm-btn-secondary bm-btn-sm">{{ __('common.back') }}</a>
        </div>
    </div>
    <div class="bm-card-body">
        @if(session('status'))
        <div class="bm-alert bm-alert-success mb-4" id="status-alert"><i class="fas fa-check-circle"></i> {{ session('status') }}</div>
        <script>setTimeout(() => { const el = document.getElementById('status-alert'); if(el) el.style.display='none'; }, 2000);</script>
        @endif

        <table class="bm-table">
            <tbody>
                <tr>
                    <th class="w-1/4 text-white/60 font-medium">{{ __('instruments.name') }}</th>
                    <td>{{ $instrument->name }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('instruments.type') }}</th>
                    <td>{{ $instrument->type }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('common.col_added') }}</th>
                    <td class="text-white/40 text-xs">{{ $instrument->created_at }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('common.col_updated') }}</th>
                    <td class="text-white/40 text-xs">{{ $instrument->updated_at }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection