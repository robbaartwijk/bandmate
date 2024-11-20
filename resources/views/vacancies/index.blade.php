@extends('layouts.app', ['page' => __('Vacancies'), 'pageSlug' => 'vacancies'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title"> Vacancies index</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <a href="{{ route('vacancies.create') }}" class="btn btn-primary">Add vacancy</a>

                        <div class="float-right">
                            <form action="{{ route('vacancies.index') }}" method="get">
                                <div class="input-group no-border">
                                    <input type="text" name="search" value="{{ request()->search }}"
                                        class="form-control" placeholder="Search...">
                                    <a href="{{ route('vacancies.index', ['sort' => 'act_name']) }}"
                                        class="btn btn-secondary">Sort
                                        by user</a>
                                    <a href="{{ route('vacancies.index', ['sort' => 'instrument_name']) }}"
                                        class="btn btn-secondary">Sort
                                        by instrument</a>
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
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                        <tr>
                            <th>Act name</th>
                            <th>Instrument</th>
                            <th>Description</th>
                            <th>Created by</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vacancies as $vacancy)
                            <tr>
                                <td><a href="{{ route('vacancies.show', $vacancy->id) }}">{{ $vacancy->act_name }}</a></td>
                                <td>{{ $vacancy->instrument_name }}</td>
                                <td>{{ $vacancy->description }}</td>
                                <td>{{ $vacancy->user_name }}</td>
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
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
