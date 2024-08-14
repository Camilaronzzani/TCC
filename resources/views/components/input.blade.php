@props([
    'type' => 'text',
    'name',
    'displayName' => null,
    'placeholder' => null,
    'value' => null,
    'cols' => 4,
    'labelCol' => 2,
    'noLabel' => false,
])

@if (!$noLabel)
    <label for="{{ $name }}" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
        {{ $displayName ?? \Illuminate\Support\Str::title(str_replace('_', ' ', $name)) }}
    </label>
@endif

<div class="form-group col-md-{{ $cols }}">
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ $value }}"
        placeholder="{{ $placeholder ?? 'Digite ' . ($displayName ?? \Illuminate\Support\Str::title(str_replace('_', ' ', $name))) }}"
        {{ $attributes->merge(['class' => 'appearance-none focus:border-red-300 block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white']) }} />
</div>
