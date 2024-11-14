@extends('layouts.app', ['page' => __('Artists'), 'pageSlug' => 'artists'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title"> Artists index</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th>Name</th>
                                    <th>Sex</th>
                                    <th>Age</th>
                                    <th>Style</th>
                                    <th>Description</th>
                                    <th>Website</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($artists as $artist)
                                    <tr>
                                        <td>{{ $artist->name }}</td>
                                        <td>{{ $artist->sex }}</td>
                                        <td>{{ $artist->age }}</td>
                                        <td>{{ $artist->style }}</td>
                                        <td>{{ $artist->description }}</td>
                                        <td><a href=" {{ $artist->website }}"> {{ $artist->website }}</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endsection
