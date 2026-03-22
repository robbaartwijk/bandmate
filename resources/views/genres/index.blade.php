@extends('layouts.app', ['page' => __('Genres'), 'pageSlug' => 'genres'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="bm_card card ">
            <div class="card-header">
                <h3 class="card-title"><b>Genres index</b></h3>
            </div>
            <div class="card-body">

                <div style="display:flex; flex-wrap:wrap; align-items:flex-start; gap:8px; margin-bottom:12px;">

                    <a href="{{ route('genres.create') }}" class="btn btn-secondary">Add genre</a>

                    <form action="{{ route('genres.index') }}" method="get" style="display:flex; flex-wrap:wrap; gap:8px; align-items:center; margin-left:auto;">

                        <input type="text" name="search" value="{{ request()->search }}" class="form-control border" style="width:180px; min-width:120px;" placeholder="Search...">

                        <select name="sort" class="form-control btn btn-secondary btn-round rounded border text-center" style="width:180px;" onchange="this.form.submit()">
                            <option value="name"        {{ request()->sort == 'name'        ? 'selected' : '' }}>Sort by name</option>
                            <option value="group"       {{ request()->sort == 'group'       ? 'selected' : '' }}>Sort by group</option>
                            <option value="description" {{ request()->sort == 'description' ? 'selected' : '' }}>Sort by description</option>
                            <option value="created_at"  {{ request()->sort == 'created_at'  ? 'selected' : '' }}>Sort by date added</option>
                            <option value="updated_at"  {{ request()->sort == 'updated_at'  ? 'selected' : '' }}>Sort by date last update</option>
                        </select>

                        <button type="submit" class="btn btn-secondary">
                            <i class="nc-icon nc-zoom-split"></i>
                        </button>

                    </form>
                </div>

                @if (session('status'))
                <div class="alert alert-success" role="alert" id="status-alert">
                    {{ session('status') }}
                </div>
                <script>
                    setTimeout(function() {
                        document.getElementById('status-alert').style.display = 'none';
                    }, 1000);
                </script>
                @endif

                <div class="table-responsive">
                    <table class="table tablesorter">
                        <thead class="text-primary">
                            <tr>
                                <th>Name</th>
                                <th>Group</th>
                                <th class="d-none d-md-table-cell">Description</th>
                                <th class="d-none d-lg-table-cell">Date added</th>
                                <th class="d-none d-lg-table-cell">Date last update</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($genres as $genre)
                            <tr>
                                <td><a href="{{ route('genres.show', $genre->id) }}">{{ $genre->name }}</a></td>
                                <td>{{ $genre->group }}</td>
                                <td class="d-none d-md-table-cell">{!! Str::limit($genre->description, 80) !!}</td>
                                <td class="d-none d-lg-table-cell">{{ $genre->created_at }}</td>
                                <td class="d-none d-lg-table-cell">{{ $genre->updated_at }}</td>
                                <td style="white-space:nowrap;">
                                    <a href="{{ route('genres.edit', $genre->id) }}" class="btn btn-primary btn-link btn-icon btn-sm">
                                        <i class="tim-icons icon-pencil"></i>
                                    </a>
                                    <form action="{{ route('genres.destroy', $genre->id) }}" method="post" style="display:inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-link btn-icon btn-sm">
                                            <i class="tim-icons icon-simple-remove"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="float-left" style="color:white">
                    {{ $genres->count() }} {{ $genres->count() > 1 ? 'genres found' : 'genre found' }}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection