@extends('layouts.app', ['page' => __('Act'), 'pageSlug' => 'acts'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title"> Acts index</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <a href="{{ route('acts.create') }}" class="btn btn-primary">Add act</a>
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
                                    <th>Members</th>
                                    <th>Genre</th>
                                    <th>Description</th>
                                    <th>Date added</th>
                                    <th>Date last update</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($acts as $act)
                                    <tr>
                                        <td><a href="{{ route('acts.show', $act->id) }}">{{ $act->name }}</a></td>
                                        <td>{{ $act->number_of_members }}</td>
                                        <td>{{ $act->genre }}</td>
                                        <td>{{ $act->description }}</td>
                                        <td>{{ $act->created_at }}</td>
                                        <td>{{ $act->updated_at }}</td>
                                        <td>
                                            <a href="{{ route('acts.edit', $act->id) }}"
                                                class="btn btn-primary btn-link btn-icon btn-sm">
                                                <i class="tim-icons icon-pencil"></i>
                                            </a>
                                            <form action="{{ route('acts.destroy', $act->id) }}" method="post"
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

