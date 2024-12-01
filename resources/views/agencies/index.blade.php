@php
$user = auth()->user();
@endphp

@extends('layouts.app', ['page' => __('Agencies'), 'pageSlug' => 'agencies'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h3 class="card-title"> Agencies index</h3>
                <div class="card-body">
                    <div class="table-responsive">

                        @if($user->is_admin)
                            <a href="{{ route('agencies.create') }}" class="btn btn-secondary">Add agency</a>
                        @endif

                        <div class="float-right">

                            <form action="{{ route('agencies.index') }}" method="get">
                                <div class="input-group no-border">

                                    <input type="text" name="search" value="{{ request()->search }}" class="form-control border" style="margin: 10px; width: 300px;" placeholder="Search...">

                                    <select name="sort" class="form-control btn btn-secondary btn-round rounded border text-center" style="margin: 10px; width: 210px;" onchange="location.href='{{ route('agencies.index') }}?sort=' + this.value + '&search=' + document.querySelector('input[name=search]').value">
                                        <option value="name" {{ request()->sort == 'name' ? 'selected' : '' }}>
                                            Sort by name
                                        </option>
                                        <option value="country" {{ request()->sort == 'country' ? 'selected' : '' }}>
                                            Sort by country
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
                                <th>Country</th>
                                <th>Description</th>
                                <th>Date added</th>
                                <th>Date last update</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($agencies as $agency)
                            <tr>
                                <td><a href="{{ route('agencies.show', $agency->id) }}">{{ $agency->name }}</a>
                                </td>
                                <td>{{ Str::limit($agency->country, 20 ) }}</td>
                                <td>{{ Str::limit($agency->description, 40) }}</td>
                                <td>{{ $agency->created_at }}</td>
                                <td>{{ $agency->updated_at }}</td>
                                
                                @if($user->is_admin)
                                <td>
                                    <a href="{{ route('agencies.edit', $agency->id) }}" class="btn btn-primary btn-link btn-icon btn-sm">
                                        <i class="tim-icons icon-pencil"></i>
                                    </a>
                                    <form action="{{ route('agencies.destroy', $agency->id) }}" method="post" style="display:inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-link btn-icon btn-sm">
                                            <i class="tim-icons icon-simple-remove"></i>
                                        </button>
                                    </form>
                                </td>
                                @endif
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">No agencies found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="float-left" style="color:white">
            {{ $agencies->count() }} {{ $agencies->count() > 1 ? 'agencies found' : 'agency found' }}
        </div>

    </div>
</div>
@endsection
