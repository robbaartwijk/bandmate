@php
$user = auth()->user();
@endphp

@extends('layouts.app', ['page' => __('Availablemusicians'), 'pageSlug' => 'availablemusicians'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h3 class="card-title"><b>Available musicians index</b></h3>
            </div>

            <div class="card-body">
                <div class="table-responsive">

                    <a href="{{ route('availablemusicians.create') }}" class="btn btn-primary">Add available musician</a>

                    @if(request()->has('private') && request()->private)
                    <a href="{{ route('availablemusicians.index', ['private' => false]) }}" class="btn btn-info">Show all available musicians</a>
                    @else
                    <a href="{{ route('availablemusicians.index', ['private' => true]) }}" class="btn btn-info">Show only my available musicians</a>
                    @endif

                    <div class="float-right">
                        <form action="{{ route('availablemusicians.index') }}" method="get">

                            <div class="input-group no-border">

                                <select name="selectrecords" class="form-control btn btn-secondary btn-round rounded border text-center" style="margin: 10px; width: 210px;" onchange="location.href='{{ route('availablemusicians.index') }}?sort=' + document.querySelector('select[name=sort]').value + '&search=' + document.querySelector('input[name=search]').value + '&selectrecords=' + this.value">
                                    <option value="25" {{ request()->selectrecords == '25' ? 'selected' : '' }}>
                                        Select 25 availablemusicians
                                    </option>
                                    <option value="50" {{ request()->selectrecords == '50' ? 'selected' : '' }}>
                                        Select 50 availablemusicians
                                    </option>
                                    <option value="100" {{ request()->selectrecords == '100' ? 'selected' : '' }}>
                                        Select 100 availablemusicians
                                    </option>
                                </select>

                                <input type="text" name="search" value="{{ request()->search }}" class="form-control border" style="margin: 10px; width: 300px;" placeholder="Search...">

                                <select name="sort" class="form-control btn btn-secondary btn-round rounded border text-center" style="margin: 10px; width: 210px;" onchange="location.href='{{ route('availablemusicians.index') }}?sort=' + this.value + '&search=' + document.querySelector('input[name=search]').value">
                                    <option value="musician_name" {{ request()->sort == 'musician_name' ? 'selected' : '' }}>
                                        Sort by musician name
                                    </option>
                                    <option value="instrument_name" {{ request()->sort == 'instrument_name' ? 'selected' : '' }}>
                                        Sort by instrument
                                    </option>
                                    <option value="genre_name" {{ request()->sort == 'genre_name' ? 'selected' : '' }}>
                                        Sort by genre
                                    </option>
                                    <option value="description" {{ request()->sort == 'description' ? 'selected' : '' }}>
                                        Sort by description
                                    </option>
                                    <option value="available_from" {{ request()->sort == 'available_from' ? 'selected' : '' }}>
                                        Sort by available from
                                    </option>
                                    <option value="available_until" {{ request()->sort == 'available_until' ? 'selected' : '' }}>
                                        Sort by available until
                                    </option>
                                    <option value="created_at" {{ request()->sort == 'created_at' ? 'selected' : '' }}>
                                        Sort by date added
                                    </option>
                                    <option value="updated_at" {{ request()->sort == 'updated_at' ? 'selected' : '' }}>
                                        Sort by date last update
                                    </option>
                                </select>


                                <div class="input-group-append">
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
                }, 1000);

            </script>
            @endif

            <table class="table tablesorter " id="">
                <thead class=" text-primary">
                    <tr>
                        <th>Musician name</th>
                        <th>Instrument</th>
                        <th>Genre</th>
                        <th>Description</th>
                        <th>Available from</th>
                        <th>Available until</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($availablemusicians as $availablemusician)
                    <tr>
                        <td>{{ $availablemusician->user->name }}</td>
                        <td>{{ $availablemusician->instrument->name }}</td>
                        <td><a href="{{ route('genres.show', $availablemusician->genre->id) }}">{{ $availablemusician->genre->name }}</a></td>
                        <td><a href="{{ route('availablemusicians.show', $availablemusician->id) }}">{{ Str::limit($availablemusician->description, 35) }}</a></td>
                        <td>{{ $availablemusician->available_from }}</td>
                        <td>{{ $availablemusician->available_until }}</td>
                        <td>{{ $availablemusician->created_at }}</td>
                        <td>{{ $availablemusician->updated_at }}</td>

                        @if ($user->is_admin || $user->id == $availablemusician->user_id)
                        <td><a href="{{ route('availablemusicians.edit', $availablemusician->id) }}" class="btn btn-primary btn-link btn-icon btn-sm">
                                <i class="tim-icons icon-pencil"></i>
                            </a>
                            <form action="{{ route('availablemusicians.destroy', $availablemusician->id) }}" method="post" style="display:inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-link btn-icon btn-sm">
                                    <i class="tim-icons icon-simple-remove"></i>
                                </button>
                            </form>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    {{ $availablemusicians->links() }}


    @if($availablemusicians->count() < 25) <div class="float-left" style="color:white">
        {{ $availablemusicians->count() }} {{ $availablemusicians->count() > 1 ? 'available musicians found' : 'available musician found' }}
</div>
@endif

</div>

@endsection
