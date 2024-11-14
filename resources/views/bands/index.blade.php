@extends('layouts.app', ['page' => __('Bands'), 'pageSlug' => 'bands'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title"> Bands index</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th>Name</th>
                                    <th>Number of members</th>
                                    <th>Style</th>
                                    <th>Description</th>
                                    <th>Website</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bands as $band)
                                    <tr>
                                        <td>{{ $band->name }}</td>
                                        <td>{{ $band->number_of_members }}</td>
                                        <td>{{ $band->style }}</td>
                                        <td>{{ $band->description }}</td>
                                        <td><a href=" {{ $band->website }}"> {{ $band->website }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endsection
