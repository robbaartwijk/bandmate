@php
$user = auth()->user();
@endphp

@extends('layouts.app', ['page' => __('Availablemusicians'), 'pageSlug' => 'availablemusicians'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="bm_card card ">
            <div class="card-header">
                <h3 class="card-title"><b>Available musicians index</b></h3>
            </div>

            <div class="card-body">

                {{-- Action buttons + search controls, wrapping on mobile --}}
                <div style="display:flex; flex-wrap:wrap; align-items:flex-start; gap:8px; margin-bottom:12px;">

                    <a href="{{ route('availablemusicians.create') }}" class="btn btn-primary">Add available musician</a>

                    @if(request()->has('private') && request()->private)
                    <a href="{{ route('availablemusicians.index', ['private' => false]) }}" class="btn btn-info">Show all available musicians</a>
                    @else
                    <a href="{{ route('availablemusicians.index', ['private' => true]) }}" class="btn btn-info">Show only my available musicians</a>
                    @endif

                    <form action="{{ route('availablemusicians.index') }}" method="get" style="display:flex; flex-wrap:wrap; gap:8px; align-items:center; margin-left:auto;">

                        <select name="selectrecords" class="form-control btn btn-secondary btn-round rounded border text-center" style="width:150px;" onchange="this.form.submit()">
                            <option value="25"  {{ !request()->selectrecords || request()->selectrecords == '25'  ? 'selected' : '' }}>25 musicians</option>
                            <option value="50"  {{ request()->selectrecords == '50'  ? 'selected' : '' }}>50 musicians</option>
                            <option value="100" {{ request()->selectrecords == '100' ? 'selected' : '' }}>100 musicians</option>
                        </select>

                        <input type="text" name="search" value="{{ request()->search }}" class="form-control border" style="width:180px; min-width:120px;" placeholder="Search...">

                        <select name="sort" class="form-control btn btn-secondary btn-round rounded border text-center" style="width:180px;" onchange="this.form.submit()">
                            <option value="musician_name"  {{ request()->sort == 'musician_name'  ? 'selected' : '' }}>Sort by musician name</option>
                            <option value="instrument_name"{{ request()->sort == 'instrument_name'? 'selected' : '' }}>Sort by instrument</option>
                            <option value="genre_name"     {{ request()->sort == 'genre_name'     ? 'selected' : '' }}>Sort by genre</option>
                            <option value="description"    {{ request()->sort == 'description'    ? 'selected' : '' }}>Sort by description</option>
                            <option value="available_from" {{ request()->sort == 'available_from' ? 'selected' : '' }}>Sort by available from</option>
                            <option value="available_until"{{ request()->sort == 'available_until'? 'selected' : '' }}>Sort by available until</option>
                            <option value="created_at"     {{ request()->sort == 'created_at'     ? 'selected' : '' }}>Sort by date added</option>
                            <option value="updated_at"     {{ request()->sort == 'updated_at'     ? 'selected' : '' }}>Sort by date last update</option>
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
                                <th>Musician name</th>
                                <th>Instrument</th>
                                <th class="d-none d-sm-table-cell">Genre</th>
                                <th class="d-none d-md-table-cell">Description</th>
                                <th class="d-none d-lg-table-cell">Available from</th>
                                <th class="d-none d-lg-table-cell">Available until</th>
                                <th class="d-none d-xl-table-cell">Created at</th>
                                <th class="d-none d-xl-table-cell">Updated at</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($availablemusicians as $availablemusician)
                            <tr>
                                <td>{{ $availablemusician->user->name }}</td>
                                <td>{{ $availablemusician->instrument->name }}</td>
                                <td class="d-none d-sm-table-cell">
                                    <a href="{{ route('genres.show', $availablemusician->genre->id) }}">{{ $availablemusician->genre->name }}</a>
                                </td>
                                <td class="d-none d-md-table-cell">
                                    <a href="{{ route('availablemusicians.show', $availablemusician->id) }}">{{ Str::limit($availablemusician->description, 35) }}</a>
                                </td>
                                <td class="d-none d-lg-table-cell">{{ $availablemusician->available_from }}</td>
                                <td class="d-none d-lg-table-cell">{{ $availablemusician->available_until }}</td>
                                <td class="d-none d-xl-table-cell">{{ $availablemusician->created_at }}</td>
                                <td class="d-none d-xl-table-cell">{{ $availablemusician->updated_at }}</td>

                                @if ($user->is_admin || $user->id == $availablemusician->user_id)
                                <td style="white-space:nowrap;">
                                    <a href="{{ route('availablemusicians.edit', $availablemusician->id) }}" class="btn btn-primary btn-link btn-icon btn-sm">
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
                                @else
                                <td></td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

<?php echo $availablemusicians->appends(['sort' => request()->sort, 'search' => request()->search, 'selectrecords' => request()->selectrecords])->links(); ?>

@if($availablemusicians->count() < 25)
<div class="float-left" style="color:white">
    {{ $availablemusicians->count() }} {{ $availablemusicians->count() > 1 ? 'available musicians found' : 'available musician found' }}
</div>
@endif

@endsection