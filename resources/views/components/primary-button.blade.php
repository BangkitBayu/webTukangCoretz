<button {{ $attributes->merge(['type' => 'submit', 'class' => 'text-center py-2 rounded-md bg-blue-500 hover:bg-blue-600 text-white']) }}>
    {{ $slot }}
</button>
