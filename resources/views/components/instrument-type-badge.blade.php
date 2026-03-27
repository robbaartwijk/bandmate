@php
$typeValue = isset($type) ? (string) $type : '';

$colours = [
    'String'                => '#a855f7',
    'Strings'               => '#a855f7',
    'Drums and Percussion'  => '#3b82f6',
    'Wind'                  => '#10b981',
    'Brass'                 => '#3b82f6',
    'Keyboards'             => '#65a30d',
    'Electronic'            => '#0891b2',
    'Other'                 => '#ec4899',
    'Vocals'                => '#d97706',
];

$bg = $colours[$typeValue] ?? '#6b7280';
@endphp

@if($typeValue !== '')
<span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold text-white whitespace-nowrap"
      style="background-color: {{ $bg }};">
    {{ $typeValue }}
</span>
@endif