@extends('layouts.app', ['page' => __('Venues'), 'pageSlug' => 'venues'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">Venues index</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <a href="{{ route('venues.create') }}" class="btn btn-primary">Add venue</a>

                        <div class="float-right">

                            <form action="{{ route('venues.index') }}" method="get">
                                <div class="input-group no-border">
                                    <input type="text" name="search" value="{{ request()->search }}"
                                        class="form-control" placeholder="Search...">
                                    <a href="{{ route('venues.index', ['sort' => 'name']) }}" class="btn btn-secondary">Sort
                                        by name</a>
                                    <a href="{{ route('venues.index', ['sort' => 'city']) }}" class="btn btn-secondary">Sort
                                        by city</a>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="nc-icon nc-zoom-split"></i>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
                                    <th>City</th>
                                    <th>Website</th>
                                    <th>Date added</th>
                                    <th>Date last update</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($venues as $venue)
                                    <tr>
                                        <td><a href="{{ route('venues.show', $venue->id) }}">{{ $venue->name }}</a></td>
                                        <td>{{ $venue->city }}</td>
                                        <td><a href="{{ $venue->website }}">{{ $venue->website }}</a></td>
                                        <td>{{ $venue->created_at }}</td>
                                        <td>{{ $venue->updated_at }}</td>

                                        <td>
                                            <a href="{{ route('venues.edit', $venue->id) }}"
                                                class="btn btn-primary btn-link btn-icon btn-sm">
                                                <i class="tim-icons icon-pencil"></i>
                                            </a>
                                            <form action="{{ route('venues.destroy', $venue->id) }}" method="post"
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
            </div>

            <div class="float-left" style="color:white">
                {{ $venues->count() }} {{ $venues->count() > 1 ? 'venues found' : 'venue found' }}
            </div>

        </div>
    </div>
@endsection
