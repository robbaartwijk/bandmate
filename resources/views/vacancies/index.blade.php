@extends('layouts.app', ['page' => __('Vacancies'), 'pageSlug' => 'vacancies'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h3 class="card-title"> Vacancies index</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <a href="{{ route('vacancies.create') }}" class="btn btn-primary">Add vacancy</a>

                        <div class="float-right">
                            <form action="{{ route('vacancies.index') }}" method="get">

                                <div class="input-group no-border">

                                    <input type="text" name="search" value="{{ request()->search }}"
                                        class="form-control border" style="margin: 10px; width: 300px;"
                                        placeholder="Search...">

                                    <select name="sort"
                                        class="form-control btn btn-secondary btn-round rounded border text-center"
                                        style="margin: 10px; width: 210px;"
                                        onchange="location.href='{{ route('vacancies.index') }}?sort=' + this.value + '&search=' + document.querySelector('input[name=search]').value">
                                        <option value="act_name" {{ request()->sort == 'act_name' ? 'selected' : '' }}>
                                            Sort by act name
                                        </option>
                                        <option value="instrument_name" {{ request()->sort == 'instrument_name' ? 'selected' : '' }}>
                                            Sort by instrument name
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
                            <th>Act name</th>
                            <th>Instrument</th>
                            <th>Description</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vacancies as $vacancy)
                            <tr>
                                <td><a href="{{ route('acts.show', $vacancy->act_id) }}">{{ $vacancy->act_name }}</a></td>
                                <td>{{ $vacancy->instrument_name }}</td>
                                <td><a href="{{ route('vacancies.show', $vacancy->id) }}">{{ Str::limit($vacancy->description, 42) }}</a>
                                </td>
                                <td>{{ $vacancy->created_at }}</td>
                                <td>{{ $vacancy->updated_at }}</td>
                                <td><a href="{{ route('vacancies.edit', $vacancy->id) }}"
                                        class="btn btn-primary btn-link btn-icon btn-sm">
                                        <i class="tim-icons icon-pencil"></i>
                                    </a>
                                    <form action="{{ route('vacancies.destroy', $vacancy->id) }}" method="post"
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
        {{ $vacancies->count() }} {{ $vacancies->count() > 1 ? 'vacancies found' : 'vacancy found' }}
    </div>
@endsection
