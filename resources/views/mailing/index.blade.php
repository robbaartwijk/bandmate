@extends('layouts.app', ['page' => __('Mailing lists'), 'pageSlug' => 'mailings'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="bm_card card ">
            <div class="card-header">
                <h2 class="card-title"><b>Mailing lists index</b></h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <div class="float-right">

                        <form action="{{ route('mailing.index') }}" method="get">
                            <div class="input-group no-border">
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
                    }, 1000);

                </script>
                @endif

                <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                        <tr>
                            <th>
                                <h3>Mailing list</h3>
                            </th>
                            <th>
                                <h3>Description</h3>
                            </th>
                            <th>
                                <h3>Number of subscribers</h3>
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($mailingLists as $mailingList)

                        <tr>
                            <td><a href="{{ route('mailing.show', $mailingList->id) }}">{{ $mailingList->name }}</a></td>
                            <td>{{ $mailingList->description }}</td>
                            <td>{{ $mailingList->subscribers_count }}</td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection
