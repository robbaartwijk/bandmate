@if ($errors->has($field))
    <p class="mt-1 text-xs text-red-400">{{ $errors->first($field) }}</p>
@endif