@php
$user = auth()->user();
@endphp

@extends('layouts.app', ['page' => __('Vacancies'), 'pageSlug' => 'vacancies'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="bm_card card ">
            <div class="card-header">
                <h3 class="card-title"><b>Vacancies index</b></h3>
            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <a href="{{ route('vacancies.create') }}" class="btn btn-primary">Add vacancy</a>

                    @if(request()->has('private') && request()->private)
                    <a href="{{ route('vacancies.index', ['private' => false]) }}" class="btn btn-info">Show all vacancies</a>
                    @else
                    <a href="{{ route('vacancies.index', ['private' => true]) }}" class="btn btn-info">Show only my vacancies</a>
                    @endif

                    <div class="float-right">

                        <form action="{{ route('vacancies.index') }}" method="get">

                            <div class="input-group no-border">

                                <select name="selectrecords" class="form-control btn btn-secondary btn-round rounded border text-center" style="margin: 10px; width: 210px;" onchange="location.href='{{ route('vacancies.index') }}?sort=' + document.querySelector('select[name=sort]').value + '&search=' + document.querySelector('input[name=search]').value + '&selectrecords=' + document.querySelector('select[name=selectrecords]').value">
                                    <option value="25" {{ request()->selectrecords == '25' ? 'selected' : '25' }}>
                                        Select 25 vacancies
                                    </option>
                                    <option value="50" {{ request()->selectrecords == '50' ? 'selected' : '50' }}>
                                        Select 50 vacancies
                                    </option>
                                    <option value="100" {{ request()->selectrecords == '100' ? 'selected' : '100' }}>
                                        Select 100 vacancies
                                    </option>
                                </select>

                                <input type="text" name="search" value="{{ request()->search }}" class="form-control border" style="margin: 10px; width: 300px;" placeholder="Search...">

                                <select name="sort" class="form-control btn btn-secondary btn-round rounded border text-center" style="margin: 10px; width: 210px;" onchange="location.href='{{ route('vacancies.index') }}?sort=' + this.value + '&search=' + document.querySelector('input[name=search]').value">
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

                <table class="table tablesorter" id="">
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

                            @if ($user->is_admin || $user->id == $vacancy->user_id)
                            <td><a href="{{ route('vacancies.edit', $vacancy->id) }}" class="btn btn-primary btn-link btn-icon btn-sm">
                                    <i class="tim-icons icon-pencil"></i>
                                </a>
                                <form action="{{ route('vacancies.destroy', $vacancy->id) }}" method="post" style="display:inline">
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

    <?php echo $vacancies->appends(array('sort' => request()->sort))->links(); ?>

    @if($vacancies->count() < 25) <div class="float-left" style="color:white">
        {{ $vacancies->count() }} {{ $vacancies->count() > 1 ? 'vacancies found' : 'vacancy found' }}
</div>
@endif

@endsection
