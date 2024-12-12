@php
$user = auth()->user();
@endphp

@extends('layouts.app', ['page' => __('Acts'), 'pageSlug' => 'acts'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h3 class="card-title"><b> Acts index</b></h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <a href="{{ route('acts.create') }}" class="btn btn-primary">Add act</a>

                    <a href="{{ route('acts.index', ['private' => false]) }}" class="btn btn-info">Show all acts</a>
                    <a href="{{ route('acts.index', ['private' => true]) }}" class="btn btn-info">Show only my acts</a>

                    <div class="float-right">

                        <form action="{{ route('acts.index') }}" method="get">
                            <div class="input-group no-border">

                                <input type="text" name="search" value="{{ request()->search }}" class="form-control border" style="margin: 10px; width: 300px;" placeholder="Search...">

                                <select name="sort" class="form-control btn btn-secondary btn-round rounded border text-center" style="margin: 10px; width: 210px;" onchange="location.href='{{ route('acts.index') }}?sort=' + this.value + '&search=' + document.querySelector('input[name=search]').value">
                                    <option value="name" {{ request()->sort == 'name' ? 'selected' : '' }}>
                                        Sort by name
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
                    }, 1000);

                </script>
                @endif

                <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                        <tr>
                            <th>Name</th>
                            <th>Members</th>
                            <th>Genre</th>
                            <th>Description</th>
                            <th>Date added</th>
                            <th>Date last update</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($acts as $act)
                        <tr>
                            <td><a href="{{ route('acts.show', $act->id) }}">{{ $act->name }}</a></td>
                            <td>{{ $act->number_of_members }}</td>
                            <td>{{ $act->genre ? $act->genre->name : 'N/A' }}</td>
                            <td>{{ Str::limit($act->description, 41) }}</td>
                            <td>{{ $act->created_at }}</td>
                            <td>{{ $act->updated_at }}</td>

                            @if($user->is_admin || $user->id == $act->user_id)
                            <td>
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
                            @endif

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="float-left" style="color:white">
            {{ $acts->count() }} {{ $acts->count() > 1 ? 'acts found' : 'act found' }}
        </div>
    </div>
</div>
@endsection
