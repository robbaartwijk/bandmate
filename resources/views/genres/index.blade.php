@extends('layouts.app', ['page' => __('Genres'), 'pageSlug' => 'genres'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">Genres</h2>
        <a href="{{ route('genres.create') }}" class="bm-btn bm-btn-primary bm-btn-sm"><i class="fas fa-plus"></i> Add genre</a>
    </div>
    <div class="bm-card-body">
        <div class="flex flex-wrap items-center gap-2 mb-4">
            <form action="{{ route('genres.index') }}" method="get" class="flex flex-wrap items-center gap-2 ml-auto">
                <input type="text" name="search" value="{{ request()->search }}" class="bm-input text-sm py-1.5" style="width:160px;" placeholder="Search...">
                <select name="sort" class="bm-select text-sm py-1.5" style="width:160px;" onchange="this.form.submit()">
                    <option value="name"        {{ request()->sort == 'name'        ? 'selected' : '' }}>Sort by name</option>
                    <option value="group"       {{ request()->sort == 'group'       ? 'selected' : '' }}>Sort by group</option>
                    <option value="description" {{ request()->sort == 'description' ? 'selected' : '' }}>Sort by description</option>
                    <option value="created_at"  {{ request()->sort == 'created_at'  ? 'selected' : '' }}>Sort by date added</option>
                </select>
                <button type="submit" class="bm-btn bm-btn-secondary bm-btn-sm"><i class="fas fa-search"></i></button>
            </form>
        </div>

        @if(session('status'))
        <div class="bm-alert bm-alert-success mb-4" id="status-alert"><i class="fas fa-check-circle"></i> {{ session('status') }}</div>
        <script>setTimeout(() => { const el = document.getElementById('status-alert'); if(el) el.style.display='none'; }, 2000);</script>
        @endif

        <div class="overflow-x-auto">
            <table class="bm-table">
                <thead><tr>
                    <th>Name</th><th>Group</th>
                    <th class="hidden md:table-cell">Description</th>
                    <th class="hidden lg:table-cell">Added</th>
                    <th></th>
                </tr></thead>
                <tbody>
                    @foreach ($genres as $genre)
                    <tr>
                        <td><a href="{{ route('genres.show', $genre->id) }}" class="text-indigo-400 hover:text-indigo-300">{{ $genre->name }}</a></td>
                        <td><span class="bm-badge bm-badge-blue">{{ $genre->group }}</span></td>
                        <td class="hidden md:table-cell text-white/50 text-xs">{{ Str::limit($genre->description, 80) }}</td>
                        <td class="hidden lg:table-cell text-white/40 text-xs">{{ $genre->created_at }}</td>
                        <td class="whitespace-nowrap">
                            <a href="{{ route('genres.edit', $genre->id) }}" class="bm-btn bm-btn-secondary bm-btn-sm mr-1"><i class="fas fa-pencil-alt"></i></a>
                            <form action="{{ route('genres.destroy', $genre->id) }}" method="post" class="inline">
                                @csrf @method('delete')
                                <button type="button" class="bm-btn bm-btn-danger bm-btn-sm"
                                        onclick="if(confirm('Delete this genre?')) this.closest('form').submit()">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4"><span class="text-white/40 text-xs">{{ $genres->count() }} {{ $genres->count() == 1 ? 'genre' : 'genres' }} found</span></div>
    </div>
</div>
@endsection