@extends('layouts.app', ['page' => __('Mailing lists'), 'pageSlug' => 'mailings'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="bm_card card">
            <div class="card-header">
                <h3 class="card-title"><b>Show Email List Entries</b></h3>
            </div>

            <div class="card-body text-primary">
                <h3><b>Name : </b>{{ $mailingList->name }}</h3>
                <h3><b>Description : </b>{{ $mailingList->description }}</h3>
                <h3><b>Number of subscriptions : </b>{{ $mailingList->subscribers_count }}</h3>

                <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
            </div>
        </div>
        
        <div class="bm_card card">
        <table class="table tablesorter " id="subscribers">
            <thead class=" text-primary">
                <tr>
                    <th><h4><b>User name</b></h4></th>
                    <th><h4><b>Email</b></h4></th>
                    <th><h4><b>City</b></h4></th>
                    <th><h4><b>Country</b></h4></th>
                    <th><h4><b>Registered at</b></h4></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($subscribedUsers as $subscribedUser)
                <tr>
                    <td>{{ $subscribedUser->name }}</td>
                    <td>{{ $subscribedUser->email }}</td>
                    <td>{{ $subscribedUser->city }}</td>
                    <td>{{ $subscribedUser->country }}</td>
                    <td>{{ $subscribedUser->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
            
        </table>
    </div>





    </div>
    
</div>
    @endsection
