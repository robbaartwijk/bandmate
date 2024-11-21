@extends('layouts.app', ['page' => __('Act'), 'pageSlug' => 'acts'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title"> Acts index</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <a href="{{ route('acts.create') }}" class="btn btn-primary">Add act</a>

                        <div class="float-right">

                            <form action="{{ route('acts.index') }}" method="get">
                                <div class="input-group no-border">
                                    <input type="text" name="search" value="{{ request()->search }}"
                                        class="form-control" placeholder="Search...">
                                    <a href="{{ route('acts.index', ['sort' => 'name']) }}" class="btn btn-secondary">Sort
                                        by name</a>
                                    <a href="{{ route('acts.index', ['sort' => 'genre']) }}" class="btn btn-secondary">Sort
                                        by genre</a>
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
                                    <td>{{ $act->genre }}</td>
                                    <td>{{ $act->description }}</td>
                                    <td>{{ $act->created_at }}</td>
                                    <td>{{ $act->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('acts.edit', $act->id) }}"
                                            class="btn btn-primary btn-link btn-icon btn-sm">
                                            <i class="tim-icons icon-pencil"></i>
                                        </a>
                                        <form action="{{ route('acts.destroy', $act->id) }}" method="post"
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
                        {{ $acts->count }} {{ $acts->count > 1 ? 'acts found' : 'act found' }}
                    </div>
                </div>
            </div>
        @endsection
