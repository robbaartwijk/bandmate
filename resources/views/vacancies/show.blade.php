@extends('layouts.app', ['page' => __('vacancies.title'), 'pageSlug' => 'vacancies'])
@section('content')
<div class="bm-card">
    <div class="bm-card-header">
        <h2 class="bm-card-title">{{ __('vacancies.title') }}</h2>
    </div>
    <div class="bm-card-body">
        <table class="bm-table">
            <tbody>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('common.col_act') }}</th>
                    <td>
                        @if($vacancy->act)
                        <a href="{{ route('acts.show', $vacancy->act->id) }}"
                           class="text-indigo-400 hover:text-indigo-300">
                            {{ $vacancy->act->name }}
                        </a>
                        @else
                        -
                        @endif
                    </td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('common.col_genre') }}</th>
                    <td>
                        @if($vacancy->act?->genre)
                        <div class="flex items-center gap-2 flex-wrap">
                            <span class="text-white/80 text-sm">{{ $vacancy->act->genre->name }}</span>
                            <x-genre-badge :group="$vacancy->act->genre->group" />
                        </div>
                        @else
                        -
                        @endif
                    </td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('common.col_instrument') }}</th>
                    <td>{{ $vacancy->instrument->name ?? '-' }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('vacancies.description') }}</th>
                    <td>{{ $vacancy->description ?? '-' }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('common.col_city') }}</th>
                    <td>{{ $vacancy->city ?? '-' }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('common.col_country') }}</th>
                    <td>{{ $vacancy->country ?? '-' }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('common.col_added') }}</th>
                    <td>{{ $vacancy->created_at->format('Y-m-d H:i:s') }}</td>
                </tr>
                <tr>
                    <th class="text-white/60 font-medium">{{ __('common.col_updated') }}</th>
                    <td>{{ $vacancy->updated_at->format('Y-m-d H:i:s') }}</td>
                </tr>
            </tbody>
        </table>
        <div class="flex gap-2 mt-6">
            <a href="{{ route('vacancies.edit', $vacancy->id) }}" class="bm-btn bm-btn-primary"><i class="fas fa-pencil-alt"></i> {{ __('common.edit') }}</a>
            <form action="{{ route('vacancies.destroy', $vacancy->id) }}" method="post" class="inline">
                @csrf @method('delete')
                <button type="button" class="bm-btn bm-btn-danger"
                        onclick="if(confirm('{{ __('vacancies.delete_confirm') }}')) this.closest('form').submit()">
                    <i class="fas fa-trash"></i> {{ __('common.delete') }}
                </button>
            </form>
            <a href="{{ route('vacancies.index') }}" class="bm-btn bm-btn-secondary">{{ __('common.back') }}</a>
        </div>
    </div>
</div>
@endsection