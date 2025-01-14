@extends('layouts.app', ['page' => __('About available musicians'), 'pageSlug' => 'aboutavailablemusicians'])
 
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="bm_card card ">
            <div class="card-header">
                <h3 class="card-title"><b>About available musicians</b></h3>
            </div>

            <div class="bm_help_textbox card-body text-primary">

                <ul style="margin-left:20px; list-style-type:disc;">
                    <li>
                        <h4>Acts are bands, trios, solo acts, orchestras, etcetera.</h4>
                    </li>
                    <li>
                        <h4>Now that you have registered you can enter your own act(s) into our database and you can now browse through said database.</h4>
                    </li>
                </ul>

            </div>
        </div>
    </div>
    @endsection