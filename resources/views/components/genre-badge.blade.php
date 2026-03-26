@php
/**
 * Genre group badge component.
 *
 * Usage:
 *   <x-genre-badge :group="$genre->group" />
 *   <x-genre-badge :group="$act->genre->group ?? null" />
 *
 * Props:
 *   $group  – the genre group string (e.g. "Rock", "Jazz")
 */
$colours = [
    'Rock'        => '#f97316',   // orange
    'Alternative' => '#8b5cf6',   // violet
    'Jazz'        => '#ca8a04',   // dark yellow
    'Blues'       => '#3b82f6',   // blue
    'Classical'   => '#a855f7',   // purple
    'Pop'         => '#ec4899',   // pink
    'Country'     => '#d97706',   // amber
    'Hip Hop'     => '#65a30d',   // lime
    'Electronic'  => '#0891b2',   // cyan
];
$bg = $colours[$group ?? ''] ?? '#6b7280'; // neutral gray as fallback
@endphp
@if(!empty($group))
<span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold text-white whitespace-nowrap"
      style="background-color: {{ $bg }};">
    {{ $group }}
</span>
@endif