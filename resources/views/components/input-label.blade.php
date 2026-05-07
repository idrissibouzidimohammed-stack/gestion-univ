@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-semibold text-xs uppercase tracking-wider text-slate-400 mb-2']) }}>
    {{ $value ?? $slot }}
</label>
