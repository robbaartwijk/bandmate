@extends('layouts.app', ['page' => __('Genres'), 'pageSlug' => 'genres'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title"> Show genre</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Date added</th>
                                    <th>Date last update</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $genre->name }}</td>
                                    <td>{{ $genre->description }}</td>
                                    <td>{{ $genre->created_at }}</td>
                                    <td>{{ $genre->updated_at }}</td>
                                    <td>

                                        <form action="{{ route('genres.destroy', $genre->id) }}" method="post"
                                            style="display:inline">
                                            @csrf
                                            @method('delete')
                                        </form>

                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        
                        <a href="{{ route('genres.index') }}" class="btn btn-secondary">Back</a>

                    </div>

                </div>
            </div>
        @endsection
