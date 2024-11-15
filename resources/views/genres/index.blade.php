@extends('layouts.app', ['page' => __('Genres'), 'pageSlug' => 'genres'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title"> Genres index</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <a href="{{ route('genres.create') }}" class="btn btn-primary">Add genre</a>
                        <br>
                        <br>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

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
                                @foreach ($genres as $genre)
                                    <tr>

                                        // $genre->name clickable to show genre details
                                        <td><a href="{{ route('genres.show', $genre->id) }}">{{ $genre->name }}</a></td>
                                        <td>{{ $genre->description }}</td>
                                        <td>{{ $genre->created_at }}</td>
                                        <td>{{ $genre->updated_at }}</td>
                                        <td>
                                            <a href="{{ route('genres.edit', $genre->id) }}"
                                                class="btn btn-primary btn-link btn-icon btn-sm">
                                                <i class="tim-icons icon-pencil"></i>
                                            </a>
                                            <form action="{{ route('genres.destroy', $genre->id) }}" method="post"
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
        @endsection
