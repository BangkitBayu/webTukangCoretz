<x-app-layout>
    <x-slot:pageName>{{ $pageName }}</x-slot:pageName>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="py-12 relative" x-data>

        @if (session('success'))
            <x-alert :status="__('success')" :message="session('success')" x-transition></x-alert>
        @elseif (session('error'))
            <x-alert :status="__('error')" :message="session('error')" x-transition></x-alert>
        @endif
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg space-y-2">
            <div class=" flex items-center justify-between py-4 px-6">
                <h3 class="text-lg text-white/80">All projects</h3>
                <x-primary-button class=" flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M11 13H6q-.425 0-.712-.288T5 12t.288-.712T6 11h5V6q0-.425.288-.712T12 5t.713.288T13 6v5h5q.425 0 .713.288T19 12t-.288.713T18 13h-5v5q0 .425-.288.713T12 19t-.712-.288T11 18z" />
                    </svg>
                    <p class=" text-sm ml-3">New project</p>
                </x-primary-button>
            </div>
            <div class=" relative w-full overflow-x-auto py-4 lg:px-3 px-0">
                <x-table>
                    <x-slot name="tableHead">
                        <tr>
                            <x-table-head class=" p-2">
                                Thumbnail
                            </x-table-head>
                            <x-table-head class=" p-2">
                                Name
                            </x-table-head>
                            <x-table-head class=" p-2">
                                Category
                            </x-table-head>
                            <x-table-head class=" p-2">
                                Description
                            </x-table-head>
                            <x-table-head class=" p-2">
                                Start date
                            </x-table-head>
                            <x-table-head class=" p-2">
                                End date
                            </x-table-head>
                            <x-table-head class=" p-2">
                                Is show?
                            </x-table-head>
                            <x-table-head class=" p-2">
                                Action
                            </x-table-head>
                        </tr>

                    </x-slot>
                    <x-slot name="tableBody">
                        @if ($projects->isEmpty())
                            <tr>
                                <td colspan="8">
                                    <p class=" text-sm text-white/80 font-thin text-center my-3">Ups, data not
                                        available</p>
                                </td>
                            </tr>
                        @else
                        @endif
                    </x-slot>
                </x-table>
            </div>
        </div>
    </div>
</x-app-layout>
