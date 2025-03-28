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
                <div class="table-responsive">

                    <a href="{{ route('rehearsalrooms.create') }}" class="btn btn-primary">Add rehearsal room</a>

                    @if(request()->has('private') && request()->private)
                    <a href="{{ route('rehearsalrooms.index', ['private' => false]) }}" class="btn btn-info">Show all rehearsalrooms</a>
                    @else
                    <a href="{{ route('rehearsalrooms.index', ['private' => true]) }}" class="btn btn-info">Show only my rehearsalrooms</a>
                    @endif

                    <div class="float-right">

                        <form action="{{ route('rehearsalrooms.index') }}" method="get">
                            <div class="input-group no-border">

                                <select name="selectrecords" class="form-control btn btn-secondary btn-round rounded border text-center" style="margin: 10px; width: 210px;" onchange="location.href='{{ route('rehearsalrooms.index') }}?sort=' + document.querySelector('select[name=sort]').value + '&search=' + document.querySelector('input[name=search]').value + '&selectrecords=' + document.querySelector('select[name=selectrecords]').value">
                                    <option value="25" {{ request()->selectrecords == '25' ? 'selected' : '25' }}>
                                        Select 25 rehearsalrooms
                                    </option>
                                    <option value="50" {{ request()->selectrecords == '50' ? 'selected' : '50' }}>
                                        Select 50 rehearsalrooms
                                    </option>
                                    <option value="100" {{ request()->selectrecords == '100' ? 'selected' : '100' }}>
                                        Select 100 rehearsalrooms
                                    </option>
                                </select>

                                <input type="text" name="search" value="{{ request()->search }}" class="form-control border" style="margin: 10px; width: 300px;" placeholder="Search...">

                                <select name="sort" class="form-control btn btn-secondary btn-round rounded border text-center" style="margin: 10px; width: 210px;" onchange="location.href='{{ route('rehearsalrooms.index') }}?sort=' + this.value + '&search=' + document.querySelector('input[name=search]').value">
                                    <option value="name" {{ request()->sort == 'name' ? 'selected' : '' }}>
                                        Sort by name
                                    </option>
                                    <option value="city" {{ request()->sort == 'city' ? 'selected' : '' }}>
                                        Sort by city
                                    </option>
                                    <option value="country" {{ request()->sort == 'country' ? 'selected' : '' }}>
                                        Sort by country
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
                            <th>City</th>
                            <th>Country</th>
                            <th>Date added</th>
                            <th>Date last update</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rehearsalrooms as $rehearsalroom)
                        <tr>
                            <td><a href="{{ route('rehearsalrooms.show', $rehearsalroom->id) }}">{{ $rehearsalroom->name }}</a>
                            </td>
                            <td>{{ $rehearsalroom->city }}</td>
                            <td>{{ $rehearsalroom->country }}</td>
                            <td>{{ $rehearsalroom->created_at }}</td>
                            <td>{{ $rehearsalroom->updated_at }}</td>

                            @if ($user->is_admin || $user->id == $rehearsalroom->user_id)
                            <td>
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
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <?php echo $rehearsalrooms->appends(array('sort' => request()->sort))->links(); ?>

        @if($rehearsalrooms->count() < 25) <div class="float-left" style="color:white">
            {{ $rehearsalrooms->count() }} {{ $rehearsalrooms->count() > 1 ? 'rehearsalrooms found' : 'rehearsalroom found' }}
    </div>
    @endif

</div>
@endsection
