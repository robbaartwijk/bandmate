@extends('layouts.app', ['page' => __('Instrumenta'), 'pageSlug' => 'instruments'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title"> Instruments index</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Type
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($instruments as $instrument)
                                    <tr>
                                        <td>
                                            {{ $instrument->name }}
                                        </td>
                                        <td>
                                            {{ $instrument->type }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endsection
