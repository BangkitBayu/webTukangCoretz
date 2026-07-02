@props(['disabled' => false])

<input @disabled($disabled)
    {{ $attributes->merge(['class' => 'text-sm border-gray-300 focus:outline-[2px] focus:outline-blue-300 rounded-md focus:border focus:border-blue-600 w-full']) }}>
