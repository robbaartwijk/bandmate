@php
$user = auth()->user();
@endphp

@extends('layouts.app', ['page' => __('Rehearsal rooms'), 'pageSlug' => 'rehearsalrooms'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="bm_card card ">
            <div class="card-header">
                <h3 class="card-title"><b>Rehearsal rooms index</b></h3>
            </div>
            <div class="card-body">

                {{-- Action buttons + search controls, wrapping on mobile --}}
                <div style="display:flex; flex-wrap:wrap; align-items:flex-start; gap:8px; margin-bottom:12px;">

                    <a href="{{ route('rehearsalrooms.create') }}" class="btn btn-primary">Add rehearsal room</a>

                    @if(request()->has('private') && request()->private)
                    <a href="{{ route('rehearsalrooms.index', ['private' => false]) }}" class="btn btn-info">Show all rehearsalrooms</a>
                    @else
                    <a href="{{ route('rehearsalrooms.index', ['private' => true]) }}" class="btn btn-info">Show only my rehearsalrooms</a>
                    @endif

                    <form action="{{ route('rehearsalrooms.index') }}" method="get" style="display:flex; flex-wrap:wrap; gap:8px; align-items:center; margin-left:auto;">

                        <select name="selectrecords" class="form-control btn btn-secondary btn-round rounded border text-center" style="width:150px;" onchange="this.form.submit()">
                            <option value="25"  {{ !request()->selectrecords || request()->selectrecords == '25'  ? 'selected' : '' }}>25 rooms</option>
                            <option value="50"  {{ request()->selectrecords == '50'  ? 'selected' : '' }}>50 rooms</option>
                            <option value="100" {{ request()->selectrecords == '100' ? 'selected' : '' }}>100 rooms</option>
                        </select>

                        <input type="text" name="search" value="{{ request()->search }}" class="form-control border" style="width:180px; min-width:120px;" placeholder="Search...">

                        <select name="sort" class="form-control btn btn-secondary btn-round rounded border text-center" style="width:180px;" onchange="this.form.submit()">
                            <option value="name"       {{ request()->sort == 'name'       ? 'selected' : '' }}>Sort by name</option>
                            <option value="city"       {{ request()->sort == 'city'       ? 'selected' : '' }}>Sort by city</option>
                            <option value="country"    {{ request()->sort == 'country'    ? 'selected' : '' }}>Sort by country</option>
                            <option value="created_at" {{ request()->sort == 'created_at' ? 'selected' : '' }}>Sort by date added</option>
                            <option value="updated_at" {{ request()->sort == 'updated_at' ? 'selected' : '' }}>Sort by date last update</option>
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
                                <th>City</th>
                                <th class="d-none d-sm-table-cell">Country</th>
                                <th class="d-none d-lg-table-cell">Date added</th>
                                <th class="d-none d-lg-table-cell">Date last update</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rehearsalrooms as $rehearsalroom)
                            <tr>
                                <td><a href="{{ route('rehearsalrooms.show', $rehearsalroom->id) }}">{{ $rehearsalroom->name }}</a></td>
                                <td>{{ $rehearsalroom->city }}</td>
                                <td class="d-none d-sm-table-cell">{{ $rehearsalroom->country }}</td>
                                <td class="d-none d-lg-table-cell">{{ $rehearsalroom->created_at }}</td>
                                <td class="d-none d-lg-table-cell">{{ $rehearsalroom->updated_at }}</td>

                                @if ($user->is_admin || $user->id == $rehearsalroom->user_id)
                                <td style="white-space:nowrap;">
                                    <a href="{{ route('rehearsalrooms.edit', $rehearsalroom->id) }}" class="btn btn-primary btn-link btn-icon btn-sm">
                                        <i class="tim-icons icon-pencil"></i>
                                    </a>
                                    <form action="{{ route('rehearsalrooms.destroy', $rehearsalroom->id) }}" method="post" style="display:inline">
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

<?php echo $rehearsalrooms->appends(['sort' => request()->sort, 'search' => request()->search, 'selectrecords' => request()->selectrecords])->links(); ?>

@if($rehearsalrooms->count() < 25)
<div class="float-left" style="color:white">
    {{ $rehearsalrooms->count() }} {{ $rehearsalrooms->count() > 1 ? 'rehearsalrooms found' : 'rehearsalroom found' }}
</div>
@endif

@endsection