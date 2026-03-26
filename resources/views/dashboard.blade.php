@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')

@if (session('status'))
<div id="status-alert" class="bm-alert bm-alert-success">
    <i class="fas fa-check-circle"></i> {{ session('status') }}
</div>
<script>
    setTimeout(function() {
        document.getElementById('status-alert').style.display = 'none';
    }, 2000);
</script>
@endif

{{-- Welcome card --}}
<div class="bm-card mb-6">
    <div class="bm-card-body">
        <div class="flex flex-col md:flex-row items-start gap-6">
            <div class="flex-shrink-0">
                <img src="{{ asset('images/Logo2.jpg') }}" alt="Bandmate"
                     class="rounded-lg border border-white/20" style="max-width: 160px;">
            </div>
            <div>
                <h1 class="text-2xl font-bold text-white mb-4">{{ __('dashboard.welcome') }}</h1>
                <p class="text-white/90 text-sm leading-relaxed mb-3">
                    {{ __('dashboard.intro_1') }}
                </p>
                <p class="text-white/90 text-sm leading-relaxed mb-3">
                    {{ __('dashboard.intro_2') }}
                </p>
                <p class="text-white/90 text-sm leading-relaxed">
                    {{ __('dashboard.intro_3') }}
                </p>
            </div>
        </div>

        {{-- Donate button --}}
        <div class="mt-6 text-center">
            <form action="https://www.paypal.com/donate" method="post" target="_blank" class="inline-block">
                <input type="hidden" name="business" value="rob.baartwijk@gmail.com" />
                <input type="hidden" name="currency_code" value="EUR" />
                <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif"
                       border="0" name="submit" title="{{ __('dashboard.paypal_title') }}"
                       alt="{{ __('dashboard.paypal_alt') }}" />
            </form>
        </div>

        {{-- Quick reference --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mt-6 pt-6 border-t border-white/10 text-center">
            <div class="px-4 py-3 rounded-lg bg-white/5">
                <p class="text-white/70 text-sm">{!! __('dashboard.tip_act') !!}</p>
            </div>
            <div class="px-4 py-3 rounded-lg bg-white/5">
                <p class="text-white/70 text-sm">{!! __('dashboard.tip_vacancy') !!}</p>
            </div>
            <div class="px-4 py-3 rounded-lg bg-white/5">
                <p class="text-white/70 text-sm">{!! __('dashboard.tip_rehearsal') !!}</p>
            </div>
            <div class="px-4 py-3 rounded-lg bg-white/5">
                <p class="text-white/70 text-sm">{!! __('dashboard.tip_agencies') !!}</p>
            </div>
        </div>
    </div>
</div>

{{-- Recently added --}}
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">{{ __('dashboard.recently_added') }}</h2>
        <a href="{{ route('acts.index') }}" class="bm-btn bm-btn-secondary bm-btn-sm">{{ __('dashboard.view_all') }}</a>
    </div>
    <div class="bm-card-body space-y-8">

        {{-- Acts --}}
        <div>
            <h3 class="text-white font-semibold text-sm mb-3">{{ __('dashboard.section_acts') }}</h3>
            <div class="overflow-x-auto">
                <table class="bm-table">
                    <thead>
                        <tr>
                            <th>{{ __('common.col_name') }}</th>
                            <th class="hidden md:table-cell">{{ __('common.col_genre') }}</th>
                            <th class="hidden md:table-cell">{{ __('common.col_members') }}</th>
                            <th class="hidden lg:table-cell">{{ __('common.col_description') }}</th>
                            <th class="hidden lg:table-cell">{{ __('common.col_added') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ((!isSet($recentActs) || ($recentActs->isEmpty())))
                        <tr><td colspan="5" class="text-white/40">{{ __('dashboard.no_acts') }}</td></tr>
                        @else
                        @foreach ($recentActs as $act)
                        <tr>
                            <td><a href="{{ route('acts.show', $act->id) }}" class="text-indigo-400 hover:text-indigo-300">{{ $act->name }}</a></td>
                            <td class="hidden md:table-cell">{{ $act->genre->name }}</td>
                            <td class="hidden md:table-cell">{{ $act->number_of_members }}</td>
                            <td class="hidden lg:table-cell text-white/60 text-sm">{{ Str::limit($act->description, 41) }}</td>
                            <td class="hidden lg:table-cell text-white/40 text-xs">{{ $act->created_at->format('Y-m-d') }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Vacancies --}}
        <div>
            <h3 class="text-white font-semibold text-sm mb-3">{{ __('dashboard.section_vacancies') }}</h3>
            <div class="overflow-x-auto">
                <table class="bm-table">
                    <thead>
                        <tr>
                            <th>{{ __('common.col_act') }}</th>
                            <th class="hidden md:table-cell">{{ __('common.col_genre') }}</th>
                            <th class="hidden md:table-cell">{{ __('common.col_instrument') }}</th>
                            <th class="hidden lg:table-cell">{{ __('common.col_description') }}</th>
                            <th class="hidden lg:table-cell">{{ __('common.col_added') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ((!isSet($recentVacancies) || ($recentVacancies->isEmpty())))
                        <tr><td colspan="5" class="text-white/40">{{ __('dashboard.no_vacancies') }}</td></tr>
                        @else
                        @foreach ($recentVacancies as $vacancy)
                        <tr>
                            <td><a href="{{ route('vacancies.show', $vacancy->id) }}" class="text-indigo-400 hover:text-indigo-300">{{ $vacancy->act->name ?? '' }}</a></td>
                            <td class="hidden md:table-cell">{{ $vacancy->genre_name }}</td>
                            <td class="hidden md:table-cell">{{ $vacancy->instrument->name }}</td>
                            <td class="hidden lg:table-cell text-white/60 text-sm"><a href="{{ route('vacancies.show', $vacancy->id) }}" class="text-indigo-400 hover:text-indigo-300">{{ Str::limit($vacancy->description, 42) }}</a></td>
                            <td class="hidden lg:table-cell text-white/40 text-xs">{{ $vacancy->created_at->format('Y-m-d') }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Available musicians --}}
        <div>
            <h3 class="text-white font-semibold text-sm mb-3">{{ __('dashboard.section_musicians') }}</h3>
            <div class="overflow-x-auto">
                <table class="bm-table">
                    <thead>
                        <tr>
                            <th>{{ __('common.col_name') }}</th>
                            <th class="hidden md:table-cell">{{ __('common.col_genre') }}</th>
                            <th class="hidden md:table-cell">{{ __('common.col_instrument') }}</th>
                            <th class="hidden lg:table-cell">{{ __('common.col_description') }}</th>
                            <th class="hidden lg:table-cell">{{ __('common.col_added') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ((!isSet($recentAvailablemusicians) || ($recentAvailablemusicians->isEmpty())))
                        <tr><td colspan="5" class="text-white/40">{{ __('dashboard.no_musicians') }}</td></tr>
                        @else
                        @foreach ($recentAvailablemusicians as $recentAvailablemusician)
                        <tr>
                            <td>{{ $recentAvailablemusician->user->name }}</td>
                            <td class="hidden md:table-cell">{{ $recentAvailablemusician->genre->name }}</td>
                            <td class="hidden md:table-cell">{{ $recentAvailablemusician->instrument->name }}</td>
                            <td class="hidden lg:table-cell text-white/60 text-sm"><a href="{{ route('availablemusicians.show', $recentAvailablemusician->id) }}" class="text-indigo-400 hover:text-indigo-300">{{ Str::limit($recentAvailablemusician->description, 35) }}</a></td>
                            <td class="hidden lg:table-cell text-white/40 text-xs">{{ $recentAvailablemusician->created_at->format('Y-m-d') }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Rehearsal rooms --}}
        <div>
            <h3 class="text-white font-semibold text-sm mb-3">{{ __('dashboard.section_rehearsal') }}</h3>
            <div class="overflow-x-auto">
                <table class="bm-table">
                    <thead>
                        <tr>
                            <th>{{ __('common.col_name') }}</th>
                            <th class="hidden md:table-cell">{{ __('common.col_city') }}</th>
                            <th class="hidden md:table-cell">{{ __('common.col_country') }}</th>
                            <th class="hidden lg:table-cell">{{ __('common.col_description') }}</th>
                            <th class="hidden lg:table-cell">{{ __('common.col_added') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ((!isSet($recentRehearsalrooms) || ($recentRehearsalrooms->isEmpty())))
                        <tr><td colspan="5" class="text-white/40">{{ __('dashboard.no_rehearsal') }}</td></tr>
                        @else
                        @foreach ($recentRehearsalrooms as $recentRehearsalroom)
                        <tr>
                            <td>{{ $recentRehearsalroom->name }}</td>
                            <td class="hidden md:table-cell">{{ $recentRehearsalroom->city }}</td>
                            <td class="hidden md:table-cell">{{ $recentRehearsalroom->country }}</td>
                            <td class="hidden lg:table-cell text-white/60 text-sm"><a href="{{ route('rehearsalrooms.show', $recentRehearsalroom->id) }}" class="text-indigo-400 hover:text-indigo-300">{{ Str::limit($recentRehearsalroom->description, 30) }}</a></td>
                            <td class="hidden lg:table-cell text-white/40 text-xs">{{ $recentRehearsalroom->created_at->format('Y-m-d') }}</td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

@endsection
