@php
$user = auth()->user();
@endphp

@extends('layouts.app', ['page' => __('Venues'), 'pageSlug' => 'venues'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h3 class="card-title">Venues index</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    @if($user->is_admin)
                        <a href="{{ route('venues.create') }}" class="btn btn-secondary">Add venue</a>
                    @endif

                    <div class="float-right">

                        <form action="{{ route('venues.index') }}" method="get">
                            <div class="input-group no-border">

                                <input type="text" name="search" value="{{ request()->search }}" class="form-control border" style="margin: 10px; width: 300px;" placeholder="Search...">

                                <select name="sort" class="form-control btn btn-secondary btn-round rounded border text-center" style="margin: 10px; width: 210px;" onchange="location.href='{{ route('venues.index') }}?sort=' + this.value + '&search=' + document.querySelector('input[name=search]').value">
                                    <option value="name" {{ request()->sort == 'name' ? 'selected' : '' }}>
                                        Sort by name
                                    </option>
                                    <option value="city" {{ request()->sort == 'city' ? 'selected' : '' }}>
                                        Sort by city
                                    </option>
                                    <option value="website" {{ request()->sort == 'website' ? 'selected' : '' }}>
                                        Sort by website
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
                                <td><a href="{{ $venue->website }}">{{ Str::limit($venue->website, 30) }}</a></td>
                                <td>{{ $venue->created_at }}</td>
                                <td>{{ $venue->updated_at }}</td>

                                @if($user->is_admin || $user->id == $venue->user_id)
                                <td>
                                    <a href="{{ route('venues.edit', $venue->id) }}" class="btn btn-primary btn-link btn-icon btn-sm">
                                        <i class="tim-icons icon-pencil"></i>
                                    </a>
                                    <form action="{{ route('venues.destroy', $venue->id) }}" method="post" style="display:inline">
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
        </div>

        <div class="float-left" style="color:white">
            {{ $venues->count() }} {{ $venues->count() > 1 ? 'venues found' : 'venue found' }}
        </div>

    </div>
</div>
@endsection
