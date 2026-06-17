<div class=" flex items-center justify-between relative">
    <input type="date"
        {{ $attributes->merge([
            'class' => ' rounded-md p-2   [&::-webkit-calendar-picker-indicator]:bg-transparent
                   [&::-webkit-calendar-picker-indicator]:absolute
                   [&::-webkit-calendar-picker-indicator]:inset-0
                   [&::-webkit-calendar-picker-indicator]:w-full
                   [&::-webkit-calendar-picker-indicator]:h-full
                   [&::-webkit-calendar-picker-indicator]:cursor-pointer
                   [&::-webkit-calendar-picker-indicator]:z-10
                   [&::-webkit-calendar-picker-indicator]:opacity-0

                   [&::-moz-calendar-picker-indicator]:opacity-0
                   [&::-moz-calendar-picker-indicator]:absolute
                   [&::-moz-calendar-picker-indicator]:inset-0
                   [&::-moz-calendar-picker-indicator]:w-full
                   [&::-moz-calendar-picker-indicator]:h-full
                   [&::-moz-calendar-picker-indicator]:cursor-pointer',
        ]) }} required>

    <svg class=" absolute w-4 h-4 right-3 top-1/2 -translate-y-1/3 text-white/80 z-0" xmlns="http://www.w3.org/2000/svg"
        width="1em" height="1em" viewBox="0 0 1024 1024">
        <path fill="currentColor"
            d="m960 95.888l-256.224.001V32.113c0-17.68-14.32-32-32-32s-32 14.32-32 32v63.76h-256v-63.76c0-17.68-14.32-32-32-32s-32 14.32-32 32v63.76H64c-35.344 0-64 28.656-64 64v800c0 35.343 28.656 64 64 64h896c35.344 0 64-28.657 64-64v-800c0-35.329-28.656-63.985-64-63.985m0 863.985H64v-800h255.776v32.24c0 17.679 14.32 32 32 32s32-14.321 32-32v-32.224h256v32.24c0 17.68 14.32 32 32 32s32-14.32 32-32v-32.24H960zM736 511.888h64c17.664 0 32-14.336 32-32v-64c0-17.664-14.336-32-32-32h-64c-17.664 0-32 14.336-32 32v64c0 17.664 14.336 32 32 32m0 255.984h64c17.664 0 32-14.32 32-32v-64c0-17.664-14.336-32-32-32h-64c-17.664 0-32 14.336-32 32v64c0 17.696 14.336 32 32 32m-192-128h-64c-17.664 0-32 14.336-32 32v64c0 17.68 14.336 32 32 32h64c17.664 0 32-14.32 32-32v-64c0-17.648-14.336-32-32-32m0-255.984h-64c-17.664 0-32 14.336-32 32v64c0 17.664 14.336 32 32 32h64c17.664 0 32-14.336 32-32v-64c0-17.68-14.336-32-32-32m-256 0h-64c-17.664 0-32 14.336-32 32v64c0 17.664 14.336 32 32 32h64c17.664 0 32-14.336 32-32v-64c0-17.68-14.336-32-32-32m0 255.984h-64c-17.664 0-32 14.336-32 32v64c0 17.68 14.336 32 32 32h64c17.664 0 32-14.32 32-32v-64c0-17.648-14.336-32-32-32" />
    </svg>

</div>
