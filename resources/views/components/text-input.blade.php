@props(['disabled' => false])

<input @disabled($disabled)
    {{ $attributes->merge(['class' => ' focus:outline-[2px] focus:outline-blue-300 rounded-md focus:border focus:border-blue-600']) }}>
