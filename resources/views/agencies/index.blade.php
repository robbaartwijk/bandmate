@extends('layouts.app', ['page' => __('Agency'), 'pageSlug' => 'agencies'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title"> Agencies index</h4>
                    <div class="card-body">
                        <div class="table-responsive">

                            <a href="{{ route('agencies.create') }}" class="btn btn-primary">Add agency</a>

                            <div class="float-right">

                                <form action="{{ route('agencies.index') }}" method="get">
                                    <div class="input-group no-border">
                                        <input type="text" name="search" value="{{ request()->search }}"
                                            class="form-control" placeholder="Search...">
                                        <a href="{{ route('agencies.index', ['sort' => 'name']) }}"
                                            class="btn btn-secondary">Sort
                                            by name</a>
                                        <a href="{{ route('agencies.index', ['sort' => 'country']) }}"
                                            class="btn btn-secondary">Sort
                                            by country</a>
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
                                    <th>Country</th>
                                    <th>Description</th>
                                    <th>Date added</th>
                                    <th>Date last update</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($agencies as $agency)
                                    <tr>
                                        <td><a href="{{ route('agencies.show', $agency->id) }}">{{ $agency->name }}</a></td>
                                        <td>{{ $agency->country }}</td>
                                        <td>{{ $agency->description }}</td>
                                        <td>{{ $agency->created_at }}</td>
                                        <td>{{ $agency->updated_at }}</td>
                                        <td>
                                            <a href="{{ route('agencies.edit', $agency->id) }}"
                                                class="btn btn-primary btn-link btn-icon btn-sm">
                                                <i class="tim-icons icon-pencil"></i>
                                            </a>
                                            <form action="{{ route('agencies.destroy', $agency->id) }}" method="post"
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
                {{ $agencies->count() }} {{ $agencies->count() > 1 ? 'agencies found' : 'agency found' }}
            </div>

        </div>
    </div>
@endsection
