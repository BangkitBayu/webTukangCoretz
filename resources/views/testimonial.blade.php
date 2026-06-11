<x-app-layout>
    <x-slot:pageName>{{ $pageName }}</x-slot:pageName>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Testimonial') }}
        </h2>

    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg space-y-2">
                <div class=" flex items-center justify-between py-4 px-6">
                    <h3 class="text-lg text-white/80">All testimonial</h3>
                    <x-primary-button class=" flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M11 13H6q-.425 0-.712-.288T5 12t.288-.712T6 11h5V6q0-.425.288-.712T12 5t.713.288T13 6v5h5q.425 0 .713.288T19 12t-.288.713T18 13h-5v5q0 .425-.288.713T12 19t-.712-.288T11 18z" />
                        </svg>
                        <p class=" text-sm ml-3">New testimonial</p>
                    </x-primary-button>
                </div>
                <div class=" relative w-full overflow-x-auto py-4 lg:px-3 px-0">
                    <x-table class="border-b border-t border-white/10">
                        <x-slot name="tableHead">
                            <thead>
                                <tr>
                                    <x-table-head class=" py-2">
                                        ID
                                    </x-table-head>
                                    <x-table-head class=" py-2">
                                        Avatar
                                    </x-table-head>
                                    <x-table-head class=" py-2">
                                        Name
                                    </x-table-head>
                                    <x-table-head class=" py-2">
                                        Position
                                    </x-table-head>
                                    <x-table-head class=" py-2">
                                        Comment
                                    </x-table-head>
                                    <x-table-head class=" py-2">
                                        Rating
                                    </x-table-head>
                                    <x-table-head class=" py-2">
                                        Show
                                    </x-table-head>
                                    <x-table-head class=" py-2">
                                        Action
                                    </x-table-head>
                                </tr>
                            </thead>
                        </x-slot>
                        <x-slot name="tableBody">

                        </x-slot>
                    </x-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
