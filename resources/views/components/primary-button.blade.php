<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn-premium w-full !px-4 !py-3 text-sm uppercase tracking-widest']) }}>
    {{ $slot }}
</button>
