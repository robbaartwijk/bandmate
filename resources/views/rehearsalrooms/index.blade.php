@extends('layouts.app', ['page' => __('Rehearsal rooms'), 'pageSlug' => 'rehearsalrooms'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">Rehearsal rooms index</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <a href="{{ route('rehearsalrooms.create') }}" class="btn btn-primary">Add rehearsal room</a>
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
                                    <th>City</th>
                                    <th>Postal code</th>
                                    <th>Website</th>
                                    <th>Date added</th>
                                    <th>Date last update</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rehearsalrooms as $rehearsalroom)
                                    <tr>
                                        <td><a href="{{ route('rehearsalrooms.show', $rehearsalroom->id) }}">{{ $rehearsalroom->name }}</a></td>
                                        <td>{{ $rehearsalroom->city }}</td>
                                        <td>{{ $rehearsalroom->zip }}</td>

                                        <td></b> <a href="{{ $rehearsalroom->website }}">{{ $rehearsalroom->website }}</a></td>
                                        <td>{{ $rehearsalroom->created_at }}</td>
                                        <td>{{ $rehearsalroom->updated_at }}</td>

                                        <td>
                                            <a href="{{ route('rehearsalrooms.edit', $rehearsalroom->id) }}"
                                                class="btn btn-primary btn-link btn-icon btn-sm">
                                                <i class="tim-icons icon-pencil"></i>
                                            </a>
                                            <form action="{{ route('rehearsalrooms.destroy', $rehearsalroom->id) }}" method="post"
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
                </div>
            </div>
        @endsection
