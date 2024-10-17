@props(['name', 'displayName', 'data', 'placeholder', 'value' => null, 'cols', 'noLabel', 'labelCol'])

@if (!isset($noLabel))
    <label for="{{ $name }}" class="block text-gray-700 font-medium">{{ $displayName ?? $name }}</label>
@endif

<div class="mb-4 col-md-{{ $cols ?? 4 }}">
    <select id="{{ $name }}" name="{{ $name }}"
        class="appearance-none focus:border-red-300 block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
        placeholder="{{ $placeholder ?? 'Selecione ' . $name }}">
        <option value="" disabled selected>{{ $placeholder ?? 'Selecione ' . $name }}</option>

        @foreach ($data ?? [] as $key => $option)
            <option value="{{ $key }}" @if ($key == old($name, $value)) selected @endif>{{ $option }}</option>
        @endforeach
    </select>
    <p class="error-{{ $name }} text-center alert alert-danger mt-2" hidden></p>
</div>
