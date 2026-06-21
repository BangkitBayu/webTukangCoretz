@props(['name' => 'default', 'maxWidth' => 'auto'])

@php
    $maxWidthClass =
        [
            'sm' => 'max-w-sm',
            'md' => 'max-w-md',
            'lg' => 'max-w-lg',
            'xl' => 'max-w-xl',
            '2xl' => 'max-w-2xl',
        ][$maxWidth] ?? 'max-w-md';
@endphp

<div x-cloak x-data="{
    open: false,
    modelName: '{{ $name }}',
    init() {
        window.addEventListener('open-modal', (e) => {
            if (e.detail == this.modelName) {
                this.open = true
                alert('gg')
            }
        });

        window.addEventListener('close-modal', (e) => {
            if (e.detail == this.modelName) {
                this.open = false
            }
        });
    }
}" x-show="open == true" x-transition
    {{ $attributes->merge(['class' => 'fixed inset-0 z-50 bg-black/50 flex items-center justify-center']) }}>
    <div class="{{ $maxWidthClass }} w-full h-auto bg-gray-800 border border-gray-600 rounded-md flex flex-col overflow-y-auto"
        style="scrollbar-width:thin; scrollbar-color: #374151 #f3f4f6;">
        @isset($header)
            {{ $header }}
        @endisset
        <hr class="border-white/10 border my-1">

        {{ $content }}

        <hr class="border-white/10 border my-1">
        @isset($footer)
            {{ $footer }}
        @endisset
    </div>
</div>
