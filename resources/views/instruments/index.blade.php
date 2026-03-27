@extends('layouts.app', ['page' => __('instruments.title'), 'pageSlug' => 'instruments'])

@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">Instruments</h2>
        <a href="{{ route('instruments.create') }}" class="bm-btn bm-btn-primary bm-btn-sm">
            <i class="fas fa-plus"></i> Add instrument
        </a>
    </div>

    <div class="bm-card-body">
        <div class="flex flex-wrap items-center gap-2 mb-4">
            <form action="{{ route('instruments.index') }}" method="get" class="flex flex-wrap items-center gap-2 ml-auto">
                <input type="text" name="search" value="{{ request()->search }}" class="bm-input text-sm py-1.5" style="width:160px;" placeholder="Search...">

                <select name="sort" class="bm-select text-sm py-1.5" style="width:160px;" onchange="this.form.submit()">
                    <option value="name" {{ request()->sort == 'name' ? 'selected' : '' }}>Sort by name</option>
                    <option value="type" {{ request()->sort == 'type' ? 'selected' : '' }}>Sort by type</option>
                    <option value="created_at" {{ request()->sort == 'created_at' ? 'selected' : '' }}>Sort by date added</option>
                    <option value="updated_at" {{ request()->sort == 'updated_at' ? 'selected' : '' }}>Sort by last update</option>
                </select>

                <button type="submit" class="bm-btn bm-btn-secondary bm-btn-sm">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>

        @if(session('status'))
            <div class="bm-alert bm-alert-success mb-4" id="status-alert">
                <i class="fas fa-check-circle"></i> {{ session('status') }}
            </div>
            <script>
                setTimeout(() => {
                    const el = document.getElementById('status-alert');
                    if (el) el.style.display = 'none';
                }, 2000);
            </script>
        @endif

        <div class="overflow-x-auto">
            <table class="bm-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th class="hidden lg:table-cell">Added</th>
                        <th class="hidden lg:table-cell">Updated</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($instruments as $instrument)
                        <tr>
                            <td>
                                <a href="{{ route('instruments.show', $instrument->id) }}"
                                   class="text-indigo-400 hover:text-indigo-300">
                                    {{ $instrument->name }}
                                </a>
                            </td>

                            <td>
                                {{-- SAFE CALL --}}
                                <x-instrument-type-badge :type="$instrument->type" />
                            </td>

                            <td class="hidden lg:table-cell text-white/40 text-xs">
                                {{ $instrument->created_at }}
                            </td>

                            <td class="hidden lg:table-cell text-white/40 text-xs">
                                {{ $instrument->updated_at }}
                            </td>

                            <td class="whitespace-nowrap">
                                <a href="{{ route('instruments.edit', $instrument->id) }}"
                                   class="bm-btn bm-btn-secondary bm-btn-sm mr-1">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>

                                <form action="{{ route('instruments.destroy', $instrument->id) }}"
                                      method="post" class="inline">
                                    @csrf
                                    @method('delete')

                                    <button type="button"
                                            class="bm-btn bm-btn-danger bm-btn-sm"
                                            onclick="if(confirm('Delete this instrument?')) this.closest('form').submit()">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4 flex flex-col items-center gap-2">
            {{ $instruments->appends(request()->query())->links() }}

            <span class="text-white/40 text-xs">
                {{ $instruments->firstItem() ?? 0 }} –
                {{ $instruments->lastItem() ?? 0 }} of
                {{ $instruments->total() }}
            </span>
        </div>
    </div>
</div>
@endsection