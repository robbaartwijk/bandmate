@extends('layouts.app', ['page' => __('Genres'), 'pageSlug' => 'genres'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title"> Genres index</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <a href="{{ route('genres.create') }}" class="btn btn-primary">Add genre</a>

                        <div class="float-right">

                            <form action="{{ route('genres.index') }}" method="get">
                                <div class="input-group no-border">
                                    <input type="text" name="search" value="{{ request()->search }}"
                                        class="form-control" placeholder="Search...">
                                    <a href="{{ route('genres.index', ['sort' => 'name']) }}" class="btn btn-secondary">Sort
                                        by name</a>
                                    <a href="{{ route('genres.index', ['sort' => 'group']) }}"
                                        class="btn btn-secondary">Sort
                                        by group</a>
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
                                    <td>{{ $genre->description }}</td>
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
