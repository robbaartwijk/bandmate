@extends('layouts.app', ['page' => __('Genres'), 'pageSlug' => 'genres'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title"> Genres index</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <a href="{{ route('genres.create') }}" class="btn btn-secondary">Add genre</a>

                        <div class="float-right">

                            <form action="{{ route('genres.index') }}" method="get">
                                <div class="input-group no-border">

                                    <input type="text" name="search" value="{{ request()->search }}"
                                        class="form-control border" style="margin: 10px; width: 300px;"
                                        placeholder="Search...">

                                    <select name="sort"
                                        class="form-control btn btn-secondary btn-round rounded border text-center"
                                        style="margin: 10px; width: 210px;"
                                        onchange="location.href='{{ route('genres.index') }}?sort=' + this.value + '&search=' + document.querySelector('input[name=search]').value">
                                        <option value="name" {{ request()->sort == 'name' ? 'selected' : '' }}>
                                            Sort by name
                                        </option>
                                        <option value="group" {{ request()->sort == 'group' ? 'selected' : '' }}>
                                            Sort by group
                                        </option>
                                        <option value="description" {{ request()->sort == 'description' ? 'selected' : '' }}>
                                            Sort by description
                                        </option>
                                        <option value="created_at" {{ request()->sort == 'created_at' ? 'selected' : '' }}>
                                            Sort by date added
                                        </option>
                                        <option value="updated_at" {{ request()->sort == 'updated_at' ? 'selected' : '' }}>
                                            Sort by date last update
                                        </option>
                                    </select>

                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="nc-icon nc-zoom-split"></i>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert" id="status-alert">
                            {{ session('status') }}
                        </div>
                        <script>
                            setTimeout(function() {
                                document.getElementById('status-alert').style.display = 'none';
                            }, 2000);
                        </script>
                    @endif

                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                            <tr>
                                <th>Name</th>
                                <th>Group</th>
                                <th>Description</th>
                                <th>Date added</th>
                                <th>Date last update</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($genres as $genre)
                                <tr>
                                    <td><a href="{{ route('genres.show', $genre->id) }}">{{ $genre->name }}</a></td>
                                    <td>{{ $genre->group }}</td>
                                    <td>{!! Str::limit($genre->description, 30) !!}</td>
                                    <td>{{ $genre->created_at }}</td>
                                    <td>{{ $genre->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('genres.edit', $genre->id) }}"
                                            class="btn btn-primary btn-link btn-icon btn-sm">
                                            <i class="tim-icons icon-pencil"></i>
                                        </a>
                                        <form action="{{ route('genres.destroy', $genre->id) }}" method="post"
                                            style="display:inline">
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
            </div>

            <div class="float-left" style="color:white">
                {{ $genres->count() }} {{ $genres->count() > 1 ? 'genres found' : 'genre found' }}
            </div>

        </div>
    </div>
@endsection
