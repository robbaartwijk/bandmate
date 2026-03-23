@extends('layouts.app', ['page' => __('Users'), 'pageSlug' => 'users'])
@section('content')

<div class="space-y-4">

    {{-- Profile card --}}
    <div class="bm-card">
        <div class="bm-card-header">
            <h2 class="bm-card-title">{{ $user->name }}</h2>
        </div>
        <div class="bm-card-body">
            <div class="flex flex-col md:flex-row gap-8">
                <div class="flex-shrink-0">
                    @if(!empty($user->image))
                    <img src="{{ asset('/storage/' . $user->image->id . '/' . $user->image->file_name) }}"
                         class="rounded-xl border border-white/10" style="width:180px; height:180px; object-fit:cover;">
                    @else
                    <img src="{{ asset('storage/defaults/defaultuser.jpg') }}"
                         class="rounded-xl border border-white/10" style="width:180px; height:180px; object-fit:cover;">
                    @endif
                </div>
                <div class="flex-1 grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10 mb-3">Profile</h3>
                        <dl class="space-y-2 text-sm">
                            @foreach([['Name',$user->name],['Stage name',$user->stage_name],['Phone',$user->phone],['Website',$user->website]] as [$l,$v])
                            @if($v)<div class="flex gap-2"><dt class="text-white/40 w-24 flex-shrink-0">{{ $l }}</dt><dd class="text-white/80 break-all">{{ $v }}</dd></div>@endif
                            @endforeach
                            <div class="flex gap-2"><dt class="text-white/40 w-24 flex-shrink-0">Email</dt>
                                <dd><a href="mailto:{{ $user->email }}" class="text-indigo-400 hover:text-indigo-300">{{ $user->email }}</a></dd></div>
                        </dl>
                    </div>
                    <div>
                        <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10 mb-3">Address</h3>
                        <dl class="space-y-2 text-sm">
                            @foreach([['Street',$user->street.' '.$user->street_number],['Zip',$user->zip],['City',$user->city],['State',$user->state],['Country',$user->country]] as [$l,$v])
                            @if(trim($v))<div class="flex gap-2"><dt class="text-white/40 w-24 flex-shrink-0">{{ $l }}</dt><dd class="text-white/80">{{ $v }}</dd></div>@endif
                            @endforeach
                        </dl>
                    </div>
                </div>
            </div>

            {{-- Notifications --}}
            <div class="mt-6">
                <h3 class="text-white/60 text-xs font-semibold uppercase tracking-wider pb-2 border-b border-white/10 mb-3">Email notifications</h3>
                <div class="flex flex-wrap gap-2 text-xs">
                    @foreach([
                        ['All',                 $user->email_notification_all],
                        ['Acts',                $user->email_notification_acts],
                        ['Vacancies',           $user->email_notification_vacancies],
                        ['Available musicians', $user->email_notification_availablemusicians],
                        ['Rehearsal rooms',     $user->email_notification_rehearsalrooms],
                        ['Venues',              $user->email_notification_venues],
                        ['Agencies',            $user->email_notification_agencies],
                        ['Newsletter',          $user->email_notification_newsletter],
                    ] as [$label, $enabled])
                    <span class="{{ $enabled ? 'bm-badge-green' : 'bm-badge-gray' }} bm-badge">
                        {{ $label }}: {{ $enabled ? 'On' : 'Off' }}
                    </span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- Acts table --}}
    <div class="bm-card">
        <div class="bm-card-header"><h3 class="bm-card-title">Acts</h3></div>
        <div class="bm-card-body p-0">
            <table class="bm-table">
                <thead><tr><th>Name</th><th class="hidden sm:table-cell">Genre</th><th class="hidden md:table-cell">Email</th><th class="hidden lg:table-cell">Added</th></tr></thead>
                <tbody>
                    @forelse($user->acts as $act)
                    <tr>
                        <td><a href="{{ route('acts.show', $act->id) }}" class="text-indigo-400 hover:text-indigo-300">{{ $act->name }}</a></td>
                        <td class="hidden sm:table-cell text-white/60">{{ $act->genre_name }}</td>
                        <td class="hidden md:table-cell"><a href="mailto:{{ $act->email }}" class="text-indigo-400 hover:text-indigo-300">{{ $act->email }}</a></td>
                        <td class="hidden lg:table-cell text-white/40 text-xs">{{ $act->created_at }}</td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="text-white/30 text-center py-4">No acts found</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Rehearsal rooms table --}}
    <div class="bm-card">
        <div class="bm-card-header"><h3 class="bm-card-title">Rehearsal rooms</h3></div>
        <div class="bm-card-body p-0">
            <table class="bm-table">
                <thead><tr><th>Name</th><th class="hidden sm:table-cell">City</th><th class="hidden md:table-cell">Email</th><th class="hidden lg:table-cell">Added</th></tr></thead>
                <tbody>
                    @forelse($user->rehearsalrooms as $room)
                    <tr>
                        <td><a href="{{ route('rehearsalrooms.show', $room->id) }}" class="text-indigo-400 hover:text-indigo-300">{{ $room->name }}</a></td>
                        <td class="hidden sm:table-cell text-white/60">{{ $room->city }}</td>
                        <td class="hidden md:table-cell"><a href="mailto:{{ $room->email }}" class="text-indigo-400 hover:text-indigo-300">{{ $room->email }}</a></td>
                        <td class="hidden lg:table-cell text-white/40 text-xs">{{ $room->created_at }}</td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="text-white/30 text-center py-4">No rehearsal rooms found</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Vacancies table --}}
    <div class="bm-card">
        <div class="bm-card-header"><h3 class="bm-card-title">Vacancies</h3></div>
        <div class="bm-card-body p-0">
            <table class="bm-table">
                <thead><tr><th>Act</th><th class="hidden sm:table-cell">Instrument</th><th class="hidden md:table-cell">Description</th><th class="hidden lg:table-cell">Added</th></tr></thead>
                <tbody>
                    @forelse($user->vacancies as $vacancy)
                    <tr>
                        <td><a href="{{ route('acts.show', $vacancy->act->id) }}" class="text-indigo-400 hover:text-indigo-300">{{ $vacancy->act->name }}</a></td>
                        <td class="hidden sm:table-cell text-white/60">{{ $vacancy->instrument_name }}</td>
                        <td class="hidden md:table-cell"><a href="{{ route('vacancies.show', $vacancy->id) }}" class="text-indigo-400 hover:text-indigo-300">{{ Str::limit($vacancy->description, 30) }}</a></td>
                        <td class="hidden lg:table-cell text-white/40 text-xs">{{ $vacancy->created_at }}</td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="text-white/30 text-center py-4">No vacancies found</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Available musicians table --}}
    <div class="bm-card">
        <div class="bm-card-header"><h3 class="bm-card-title">Available musician listings</h3></div>
        <div class="bm-card-body p-0">
            <table class="bm-table">
                <thead><tr><th>Instrument</th><th class="hidden sm:table-cell">Genre</th><th class="hidden md:table-cell">Description</th><th class="hidden lg:table-cell">From</th><th class="hidden lg:table-cell">Until</th></tr></thead>
                <tbody>
                    @forelse($user->availablemusicians as $musician)
                    <tr>
                        <td><a href="{{ route('availablemusicians.show', $musician->id) }}" class="text-indigo-400 hover:text-indigo-300">{{ $musician->instrument->name }}</a></td>
                        <td class="hidden sm:table-cell text-white/60">{{ $musician->genre->name }}</td>
                        <td class="hidden md:table-cell text-white/60">{{ Str::limit($musician->description, 30) }}</td>
                        <td class="hidden lg:table-cell text-white/40 text-xs">{{ $musician->available_from }}</td>
                        <td class="hidden lg:table-cell text-white/40 text-xs">{{ $musician->available_until }}</td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-white/30 text-center py-4">No listings found</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="flex justify-end">
        <a href="{{ url()->previous() }}" class="bm-btn bm-btn-secondary bm-btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
    </div>

</div>
@endsection