@extends('layouts.app', ['page' => __('Bands'), 'pageSlug' => 'bands'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title"> Acts index</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Number of members</th>
                                    <th>Style</th>
                                    <th>Rehearsal Room</th>
                                    <th>Website</th>
                                    <th>Active</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($acts as $act)
                                    <tr>
                                        <td>{{ $act->name }}</td>
                                        <td>{{ $act->type }}</td>
                                        <td>{{ $act->number_of_members }}</td>
                                        <td>{{ $act->style }}</td>
                                        <td>{{ $act->rehearsal_room }}</td>
                                        <td><a href=" {{ $act->website }}"> {{ $act->website }}</td>
                                        <td>{{ $act->active }}</td>
                                        <td>{{ $act->description }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endsection
