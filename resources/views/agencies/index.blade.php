@php
$user = auth()->user();
@endphp

@extends('layouts.app', ['page' => __('Agencies'), 'pageSlug' => 'agencies'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="bm_card card ">
            <div class="card-header">
                <h3 class="card-title"><b>Agencies index</b></h3>
            </div>
            <div class="card-body">

                {{-- Action buttons + search controls, wrapping on mobile --}}
                <div style="display:flex; flex-wrap:wrap; align-items:flex-start; gap:8px; margin-bottom:12px;">

                    @if($user->is_admin)
                    <a href="{{ route('agencies.create') }}" class="btn btn-secondary">Add agency</a>
                    @endif

                    @if($user->is_admin)
                        @if(request()->has('private') && request()->private)
                        <a href="{{ route('agencies.index', ['private' => false]) }}" class="btn btn-info">Show all agencies</a>
                        @else
                        <a href="{{ route('agencies.index', ['private' => true]) }}" class="btn btn-info">Show only my agencies</a>
                        @endif
                    @endif

                    <form action="{{ route('agencies.index') }}" method="get" style="display:flex; flex-wrap:wrap; gap:8px; align-items:center; margin-left:auto;">

                        <select name="selectrecords" class="form-control btn btn-secondary btn-round rounded border text-center" style="width:150px;" onchange="this.form.submit()">
                            <option value="25"  {{ !request()->selectrecords || request()->selectrecords == '25'  ? 'selected' : '' }}>25 agencies</option>
                            <option value="50"  {{ request()->selectrecords == '50'  ? 'selected' : '' }}>50 agencies</option>
                            <option value="100" {{ request()->selectrecords == '100' ? 'selected' : '' }}>100 agencies</option>
                        </select>

                        <input type="text" name="search" value="{{ request()->search }}" class="form-control border" style="width:180px; min-width:120px;" placeholder="Search...">

                        <select name="sort" class="form-control btn btn-secondary btn-round rounded border text-center" style="width:180px;" onchange="this.form.submit()">
                            <option value="name"        {{ request()->sort == 'name'        ? 'selected' : '' }}>Sort by name</option>
                            <option value="country"     {{ request()->sort == 'country'     ? 'selected' : '' }}>Sort by country</option>
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

                <div class="table-responsive">
                    <table class="table tablesorter">
                        <thead class="text-primary">
                            <tr>
                                <th>Name</th>
                                <th class="d-none d-sm-table-cell">Country</th>
                                <th class="d-none d-md-table-cell">Description</th>
                                <th class="d-none d-lg-table-cell">Date added</th>
                                <th class="d-none d-lg-table-cell">Date last update</th>
                                @if($user->is_admin)
                                <th></th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($agencies as $agency)
                            <tr>
                                <td><a href="{{ route('agencies.show', $agency->id) }}">{{ $agency->name }}</a></td>
                                <td class="d-none d-sm-table-cell">{{ Str::limit($agency->country, 20) }}</td>
                                <td class="d-none d-md-table-cell">{{ Str::limit($agency->description, 40) }}</td>
                                <td class="d-none d-lg-table-cell">{{ $agency->created_at }}</td>
                                <td class="d-none d-lg-table-cell">{{ $agency->updated_at }}</td>

                                @if($user->is_admin)
                                <td style="white-space:nowrap;">
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

        <?php echo $agencies->appends(['sort' => request()->sort, 'search' => request()->search, 'selectrecords' => request()->selectrecords])->links(); ?>

        @if($agencies->count() < 25)
        <div class="float-left" style="color:white">
            {{ $agencies->count() }} {{ $agencies->count() > 1 ? 'agencies found' : 'agency found' }}
        </div>
        @endif

    </div>
</div>
@endsection