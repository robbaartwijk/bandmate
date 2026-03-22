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

                {{-- Action buttons + search controls, wrapping on mobile --}}
                <div style="display:flex; flex-wrap:wrap; align-items:flex-start; gap:8px; margin-bottom:12px;">

                    <a href="{{ route('vacancies.create') }}" class="btn btn-primary">Add vacancy</a>

                    @if(request()->has('private') && request()->private)
                    <a href="{{ route('vacancies.index', ['private' => false]) }}" class="btn btn-info">Show all vacancies</a>
                    @else
                    <a href="{{ route('vacancies.index', ['private' => true]) }}" class="btn btn-info">Show only my vacancies</a>
                    @endif

                    <form action="{{ route('vacancies.index') }}" method="get" style="display:flex; flex-wrap:wrap; gap:8px; align-items:center; margin-left:auto;">

                        <select name="selectrecords" class="form-control btn btn-secondary btn-round rounded border text-center" style="width:150px;" onchange="this.form.submit()">
                            <option value="25"  {{ !request()->selectrecords || request()->selectrecords == '25'  ? 'selected' : '' }}>25 vacancies</option>
                            <option value="50"  {{ request()->selectrecords == '50'  ? 'selected' : '' }}>50 vacancies</option>
                            <option value="100" {{ request()->selectrecords == '100' ? 'selected' : '' }}>100 vacancies</option>
                        </select>

                        <input type="text" name="search" value="{{ request()->search }}" class="form-control border" style="width:180px; min-width:120px;" placeholder="Search...">

                        <select name="sort" class="form-control btn btn-secondary btn-round rounded border text-center" style="width:180px;" onchange="this.form.submit()">
                            <option value="act_name"       {{ request()->sort == 'act_name'       ? 'selected' : '' }}>Sort by act name</option>
                            <option value="instrument_name"{{ request()->sort == 'instrument_name'? 'selected' : '' }}>Sort by instrument</option>
                            <option value="description"    {{ request()->sort == 'description'    ? 'selected' : '' }}>Sort by description</option>
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
                                <th>Act name</th>
                                <th>Instrument</th>
                                <th class="d-none d-md-table-cell">Description</th>
                                <th class="d-none d-lg-table-cell">Created at</th>
                                <th class="d-none d-lg-table-cell">Updated at</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vacancies as $vacancy)
                            <tr>
                                <td><a href="{{ route('acts.show', $vacancy->act_id) }}">{{ $vacancy->act_name }}</a></td>
                                <td>{{ $vacancy->instrument_name }}</td>
                                <td class="d-none d-md-table-cell">
                                    <a href="{{ route('vacancies.show', $vacancy->id) }}">{{ Str::limit($vacancy->description, 42) }}</a>
                                </td>
                                <td class="d-none d-lg-table-cell">{{ $vacancy->created_at }}</td>
                                <td class="d-none d-lg-table-cell">{{ $vacancy->updated_at }}</td>

                                @if ($user->is_admin || $user->id == $vacancy->user_id)
                                <td style="white-space:nowrap;">
                                    <a href="{{ route('vacancies.edit', $vacancy->id) }}" class="btn btn-primary btn-link btn-icon btn-sm">
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

<?php echo $vacancies->appends(['sort' => request()->sort, 'search' => request()->search, 'selectrecords' => request()->selectrecords])->links(); ?>

@if(isset($vacancies) && $vacancies->count() < 25)
<div class="float-left" style="color:white">
    {{ $vacancies->count() }} {{ $vacancies->count() > 1 ? 'vacancies found' : 'vacancy found' }}
</div>
@endif

@endsection