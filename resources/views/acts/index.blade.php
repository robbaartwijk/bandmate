@php
$user = auth()->user();
@endphp

@extends('layouts.app', ['page' => __('Acts'), 'pageSlug' => 'acts'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="bm_card card ">
            <div class="card-header">
                <h3 class="card-title"><b> Acts index</b></h3>
            </div>

            <div class="card-body">

                {{-- Action buttons + search controls, wrapping on mobile --}}
                <div style="display:flex; flex-wrap:wrap; align-items:flex-start; gap:8px; margin-bottom:12px;">

                    <a href="{{ route('acts.create') }}" class="btn btn-primary">Add act</a>

                    @if(request()->has('private') && request()->private)
                    <a href="{{ route('acts.index', ['private' => false]) }}" class="btn btn-info">Show all acts</a>
                    @else
                    <a href="{{ route('acts.index', ['private' => true]) }}" class="btn btn-info">Show only my acts</a>
                    @endif

                    <form action="{{ route('acts.index') }}" method="get" style="display:flex; flex-wrap:wrap; gap:8px; align-items:center; margin-left:auto;">

                        <select name="selectrecords" class="form-control btn btn-secondary btn-round rounded border text-center" style="width:150px;" onchange="this.form.submit()">
                            <option value="25"  {{ !request()->selectrecords || request()->selectrecords == '25'  ? 'selected' : '' }}>25 acts</option>
                            <option value="50"  {{ request()->selectrecords == '50'  ? 'selected' : '' }}>50 acts</option>
                            <option value="100" {{ request()->selectrecords == '100' ? 'selected' : '' }}>100 acts</option>
                        </select>

                        <input type="text" name="search" value="{{ request()->search }}" class="form-control border" style="width:180px; min-width:120px;" placeholder="Search...">

                        <select name="sort" class="form-control btn btn-secondary btn-round rounded border text-center" style="width:160px;" onchange="this.form.submit()">
                            <option value="name"        {{ request()->sort == 'name'        ? 'selected' : '' }}>Sort by name</option>
                            <option value="genre_name"  {{ request()->sort == 'genre_name'  ? 'selected' : '' }}>Sort by genre</option>
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

                {{-- table-responsive adds horizontal scroll on mobile --}}
                <div class="table-responsive">
                    <table class="table tablesorter">
                        <thead class="text-primary">
                            <tr>
                                <th>Name</th>
                                <th class="d-none d-sm-table-cell">Members</th>
                                <th>Genre</th>
                                <th class="d-none d-md-table-cell">Description</th>
                                <th class="d-none d-lg-table-cell">Date added</th>
                                <th class="d-none d-lg-table-cell">Date last update</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($acts as $act)
                            <tr>
                                <td><a href="{{ route('acts.show', $act->id) }}">{{ $act->name }}</a></td>
                                <td class="d-none d-sm-table-cell">{{ $act->number_of_members }}</td>
                                <td>
                                    @if($act->genre)
                                    <a href="{{ route('genres.show', $act->genre->id) }}">{{ $act->genre->name }}</a>
                                    @else
                                    N/A
                                    @endif
                                </td>
                                <td class="d-none d-md-table-cell">{{ Str::limit($act->description, 41) }}</td>
                                <td class="d-none d-lg-table-cell">{{ $act->created_at }}</td>
                                <td class="d-none d-lg-table-cell">{{ $act->updated_at }}</td>

                                @if($user->is_admin || $user->id == $act->user_id)
                                <td style="white-space:nowrap;">
                                    <a href="{{ route('acts.edit', $act->id) }}" class="btn btn-primary btn-link btn-icon btn-sm">
                                        <i class="tim-icons icon-pencil"></i>
                                    </a>
                                    <form action="{{ route('acts.destroy', $act->id) }}" method="post" style="display:inline">
                                        @csrf
                                        @method('delete')
                                        <button type="button" class="btn btn-danger btn-link btn-icon btn-sm" onclick="if(confirm('Are you sure you want to delete this act?')) { this.closest('form').submit(); }">
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

<?php echo $acts->appends(['sort' => request()->sort, 'search' => request()->search, 'selectrecords' => request()->selectrecords])->links(); ?>

@if($acts->count() < 25)
<div class="float-left" style="color:white">
    {{ $acts->count() }} {{ $acts->count() > 1 ? 'acts found' : 'act found' }}
</div>
@endif

@endsection