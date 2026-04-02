@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')

{{-- Hero --}}
<div class="bm-card mb-6 overflow-hidden">

    {{-- Banner image with gradient overlay --}}
    <div class="relative px-6 py-12 md:py-16"
         style="background:
                linear-gradient(135deg, rgba(28,28,85,0.88) 0%, rgba(49,27,100,0.80) 100%),
                url('{{ asset('images/welcomebanner.png') }}') center/cover no-repeat;">

        {{-- Subtle bottom fade so the card body blends in smoothly --}}
        <div class="absolute inset-x-0 bottom-0 h-16"
             style="background: linear-gradient(to bottom, transparent, rgba(15,15,30,0.60));"></div>

        <div class="relative z-10 flex flex-col md:flex-row items-start md:items-center gap-6">
            <img src="{{ asset('images/Logo2.jpg') }}" alt="Bandmate"
                 class="h-20 w-auto rounded-lg border border-white/20 flex-shrink-0 shadow-lg">
            <div>
                <h1 class="text-white text-3xl font-semibold mb-3" style="font-family:'DM Sans',sans-serif;">
                    Welcome to Bandmate
                </h1>
                <p class="text-white/70 text-sm leading-relaxed max-w-2xl mb-2">
                    The best place to find your bandmates, rehearsal rooms, agencies and venues.
                    Use the menu to browse all available information and add your own.
                    You can edit information you entered yourself, but only browse other users' entries.
                </p>
                <p class="text-white/55 text-sm leading-relaxed max-w-2xl mb-2">
                    This website is a labour of love and is not sponsored by anyone. Your data is used only
                    to make the platform work and will never be shared with any other person or organisation.
                    The site is meant for musicians — not the music business.
                </p>
                <p class="text-white/55 text-sm leading-relaxed max-w-2xl">
                    If you'd like to support the hosting costs, a donation via PayPal is always appreciated.
                </p>
            </div>
        </div>

        {{-- PayPal donate button --}}
        <div class="relative z-10 mt-8 flex justify-center md:justify-start">
            <form action="https://www.paypal.com/donate" method="post" target="_top">
                <input type="hidden" name="business" value="48VGHAS7GVRPW">
                <input type="hidden" name="no_recurring" value="0">
                <input type="hidden" name="item_name" value="These donations help keep the website online. Thank you!">
                <input type="hidden" name="currency_code" value="EUR">
                <input type="image"
                       src="https://www.paypalobjects.com/en_US/NL/i/btn/btn_donateCC_LG.gif"
                       border="0" name="submit"
                       title="PayPal - The safer, easier way to pay online!"
                       alt="Donate with PayPal button"
                       class="rounded">
            </form>
        </div>
    </div>

    <div class="bm-card-body">
        <ul class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-sm text-white/60">
            <li class="flex items-start gap-2"><i class="fas fa-circle text-indigo-400 mt-1" style="font-size:6px;"></i> An <strong class="text-white/80">act</strong> is a band or solo artist — register your own.</li>
            <li class="flex items-start gap-2"><i class="fas fa-circle text-indigo-400 mt-1" style="font-size:6px;"></i> A <strong class="text-white/80">vacancy</strong> is an opening in a band, linked to acts you own.</li>
            <li class="flex items-start gap-2"><i class="fas fa-circle text-indigo-400 mt-1" style="font-size:6px;"></i> <strong class="text-white/80">Rehearsal rooms</strong> — add yours if you own one.</li>
            <li class="flex items-start gap-2"><i class="fas fa-circle text-indigo-400 mt-1" style="font-size:6px;"></i> <strong class="text-white/80">Agencies & venues</strong> — list your business for artists to find.</li>
        </ul>
    </div>
</div>

{{-- Recently added --}}
<div class="space-y-4">

    <div class="bm-card">
        <div class="bm-card-header">
            <h3 class="bm-card-title">Recently added acts</h3>
            <a href="{{ route('acts.index') }}" class="bm-btn bm-btn-secondary bm-btn-sm">View all</a>
        </div>
        <div class="bm-card-body p-0">
            <table class="bm-table">
                <thead><tr>
                    <th>Name</th><th>Genre</th>
                    <th class="hidden sm:table-cell">Members</th>
                    <th class="hidden md:table-cell">Description</th>
                    <th class="hidden lg:table-cell">Added</th>
                </tr></thead>
                <tbody>
                    @forelse($recentActs as $act)
                    <tr>
                        <td><a href="{{ route('acts.show', $act->id) }}" class="text-indigo-400 hover:text-indigo-300">{{ $act->name }}</a></td>
                        <td class="text-white/60">{{ $act->genre?->name ?? '-' }}</td>
                        <td class="hidden sm:table-cell text-white/60">{{ $act->number_of_members }}</td>
                        <td class="hidden md:table-cell text-white/50 text-xs">{{ Str::limit($act->description, 41) }}</td>
                        <td class="hidden lg:table-cell text-white/40 text-xs">{{ $act->created_at }}</td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-white/30 text-center py-4">No acts found</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="bm-card">
        <div class="bm-card-header">
            <h3 class="bm-card-title">Recently added vacancies</h3>
            <a href="{{ route('vacancies.index') }}" class="bm-btn bm-btn-secondary bm-btn-sm">View all</a>
        </div>
        <div class="bm-card-body p-0">
            <table class="bm-table">
                <thead><tr>
                    <th>Act</th>
                    <th class="hidden sm:table-cell">Instrument</th>
                    <th class="hidden md:table-cell">Description</th>
                    <th class="hidden lg:table-cell">Added</th>
                </tr></thead>
                <tbody>
                    @forelse($recentVacancies as $vacancy)
                    <tr>
                        <td>
                            @if($vacancy->act)
                            <a href="{{ route('acts.show', $vacancy->act->id) }}" class="text-indigo-400 hover:text-indigo-300">{{ $vacancy->act->name }}</a>
                            @else
                            -
                            @endif
                        </td>
                        <td class="hidden sm:table-cell text-white/60">{{ $vacancy->instrument?->name ?? '-' }}</td>
                        <td class="hidden md:table-cell">
                            <a href="{{ route('vacancies.show', $vacancy->id) }}" class="text-indigo-400 hover:text-indigo-300">{{ Str::limit($vacancy->description, 42) }}</a>
                        </td>
                        <td class="hidden lg:table-cell text-white/40 text-xs">{{ $vacancy->created_at }}</td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="text-white/30 text-center py-4">No vacancies found</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="bm-card">
        <div class="bm-card-header">
            <h3 class="bm-card-title">Recently available musicians</h3>
            <a href="{{ route('availablemusicians.index') }}" class="bm-btn bm-btn-secondary bm-btn-sm">View all</a>
        </div>
        <div class="bm-card-body p-0">
            <table class="bm-table">
                <thead><tr>
                    <th>Name</th><th>Genre</th>
                    <th class="hidden sm:table-cell">Instrument</th>
                    <th class="hidden md:table-cell">Description</th>
                    <th class="hidden lg:table-cell">Added</th>
                </tr></thead>
                <tbody>
                    @forelse($recentAvailablemusicians as $musician)
                    <tr>
                        <td class="text-white/80">{{ $musician->user->name }}</td>
                        <td class="text-white/60">{{ $musician->genre?->name ?? '-' }}</td>
                        <td class="hidden sm:table-cell text-white/60">{{ $musician->instrument?->name ?? '-' }}</td>
                        <td class="hidden md:table-cell">
                            <a href="{{ route('availablemusicians.show', $musician->id) }}" class="text-indigo-400 hover:text-indigo-300">{{ Str::limit($musician->description, 35) }}</a>
                        </td>
                        <td class="hidden lg:table-cell text-white/40 text-xs">{{ $musician->created_at }}</td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-white/30 text-center py-4">No available musicians found</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="bm-card">
        <div class="bm-card-header">
            <h3 class="bm-card-title">Recently added rehearsal rooms</h3>
            <a href="{{ route('rehearsalrooms.index') }}" class="bm-btn bm-btn-secondary bm-btn-sm">View all</a>
        </div>
        <div class="bm-card-body p-0">
            <table class="bm-table">
                <thead><tr>
                    <th>Name</th><th>City</th>
                    <th class="hidden sm:table-cell">Country</th>
                    <th class="hidden md:table-cell">Description</th>
                    <th class="hidden lg:table-cell">Added</th>
                </tr></thead>
                <tbody>
                    @forelse($recentRehearsalrooms as $room)
                    <tr>
                        <td><a href="{{ route('rehearsalrooms.show', $room->id) }}" class="text-indigo-400 hover:text-indigo-300">{{ $room->name }}</a></td>
                        <td class="text-white/60">{{ $room->city }}</td>
                        <td class="hidden sm:table-cell text-white/60">{{ $room->country }}</td>
                        <td class="hidden md:table-cell">
                            <a href="{{ route('rehearsalrooms.show', $room->id) }}" class="text-indigo-400 hover:text-indigo-300">{{ Str::limit($room->description, 30) }}</a>
                        </td>
                        <td class="hidden lg:table-cell text-white/40 text-xs">{{ $room->created_at }}</td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-white/30 text-center py-4">No rehearsal rooms found</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection