@extends('layouts.app', ['page' => __('Instruments'), 'pageSlug' => 'instruments'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title"> Instruments index</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <a href="{{ route('instruments.create') }}" class="btn btn-primary">Add instrument</a>

                        <div class="float-right">

                            <form action="{{ route('instruments.index') }}" method="get">
                                <div class="input-group no-border">
                                    <input type="text" name="search" value="{{ request()->search }}"
                                        class="form-control" placeholder="Search...">
                                    <a href="{{ route('instruments.index', ['sort' => 'name']) }}"
                                        class="btn btn-secondary">Sort
                                        by name</a>
                                    <a href="{{ route('instruments.index', ['sort' => 'type']) }}"
                                        class="btn btn-secondary">Sort
                                        by type</a>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="nc-icon nc-zoom-split"></i>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

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
                            <th>Type</th>
                            <th>Date added</th>
                            <th>Date last update</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($instruments as $instrument)
                            <tr>
                                <td><a href="{{ route('instruments.show', $instrument->id) }}">{{ $instrument->name }}</a>
                                </td>
                                <td>{{ $instrument->type }}</td>
                                <td>{{ $instrument->created_at }}</td>
                                <td>{{ $instrument->updated_at }}</td>

                                <td>
                                    <a href="{{ route('instruments.edit', $instrument->id) }}"
                                        class="btn btn-primary btn-link btn-icon btn-sm">
                                        <i class="tim-icons icon-pencil"></i>
                                    </a>
                                    <form action="{{ route('instruments.destroy', $instrument->id) }}" method="post"
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

            <div class="float-left" style="color:white">
                {{ $instruments->count() }} {{ $instruments->count() > 1 ? 'instruments found' : 'instrument found' }}
            </div>

        </div>
    </div>
@endsection
