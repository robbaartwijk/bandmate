@extends('layouts.app', ['page' => __('Edit password'), 'pageSlug' => 'editpassword'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <h3 class="card-title"><b>Change password</b></h3>
            </div>

            <div class="bm_row_layout row">

                <div class="col-lg-3" style="position: relative; left: 50%; transform: translateX(-50%);">

                    <div style="border: 1px solid rgb(200, 130, 130); padding: 10px; margin-bottom: 10px; margin-left:15px;"">

                        <div class=" card-body text-primary">

                        <div class="table-responsive">

                            <div class="card-body">
                                <div class="table-responsive">
                                    <form action="{{ route('profile.updatePassword', $user->id) }}" method="post">
                                        @csrf
                                        @method('get')

                                        @if (!empty($user->avatar))
                                        <img src="{{ asset('/storage/' . $user->avatar->id . '/' . $user->avatar->file_name) }}" class="bm_zoom thumbnail" style="width: 150px; height: 150px;">
                                        @endif

                                        <div class="col-span-6 sm:col-span-4">
                                            <x-label for="current_password" value="{{ __('Current Password') }}" />
                                            <x-input id="current_password" type="password" class="mt-1 block w-full" wire:model="state.current_password" autocomplete="current-password" />
                                            <x-input-error for="current_password" class="mt-2" />
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <x-label for="password" value="{{ __('New Password') }}" />
                                            <x-input id="password" type="password" class="mt-1 block w-full" wire:model="state.password" autocomplete="new-password" />
                                            <x-input-error for="password" class="mt-2" />
                                        </div>

                                        <div class="col-span-6 sm:col-span-4">
                                            <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                                            <x-input id="password_confirmation" type="password" class="mt-1 block w-full" wire:model="state.password_confirmation" autocomplete="new-password" />
                                            <x-input-error for="password_confirmation" class="mt-2" />
                                        </div>

                                        <div style="margin-top:30px">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            <a href="{{ route('users.index') }}" <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                                        </div>

                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endsection
