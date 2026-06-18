<x-app-layout>
    <x-slot:pageName>{{ $pageName }}</x-slot:pageName>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Categories') }}
        </h2>
    </x-slot>

    <div class="py-12 relative" x-data>
        @if (session('success'))
            <x-alert :status="__('success')" :message="session('success')" x-transition></x-alert>
        @elseif (session('error'))
            <x-alert :status="__('error')" :message="session('error')" x-transition></x-alert>
        @endif

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" x-data="$store.categories.collectionWithCount = @js($categories), console.log($store.categories.collectionWithCount)">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg py-4">
                <h3 class="text-lg text-white/80 px-6">All categories</h3>
                <div class=" flex items-center justify-between w-full mt-3 px-6">
                    <x-search-bar>
                        <x-slot name="input">
                            <x-text-input
                                class=" w-full bg-transparent text-sm text-white/80 text-pretty border-none p-2 outline-none"
                                placeholder="Search categories here"
                                x-model="$store.categories.searchCategory"></x-text-input>
                        </x-slot>
                    </x-search-bar>
                    <x-primary-button class=" flex items-center justify-center ml-2 whitespace-nowrap" type="button"
                        x-data @click="$store.formProject.toggle()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M11 13H6q-.425 0-.712-.288T5 12t.288-.712T6 11h5V6q0-.425.288-.712T12 5t.713.288T13 6v5h5q.425 0 .713.288T19 12t-.288.713T18 13h-5v5q0 .425-.288.713T12 19t-.712-.288T11 18z" />
                        </svg>
                        <p class=" text-sm ml-3">New project</p>
                    </x-primary-button>
                </div>

                <div class=" relative w-full overflow-x-auto py-4 lg:px-6 px-0 mt-1">
                    <x-table>
                        <x-slot name="tableHead">
                            <tr>
                                <x-table-head class=" p-2 text-left">
                                    Name
                                </x-table-head>
                                <x-table-head class=" p-2">
                                    Total project
                                </x-table-head>
                                <x-table-head class=" p-2">
                                    Action
                                </x-table-head>
                            </tr>
                        </x-slot>
                        <x-slot name="tableBody">
                            <template x-for="(value, index) in $store.categories.filteredCategory()">
                                <tr :key="value.id"
                                    class="text-sm text-white/70 text-center border-b border-white/10">
                                    <td class=" p-2 text-left" x-text="value.name"></td>
                                    <td class=" p-2" x-text="value.name"></td>
                                    <td class=" p-2 flex items-center justify-center lg:flex-row flex-col">
                                        <x-primary-button id="editBtn" type="submit" x-data {{-- @click="$store.formProject.openFormEdit ({{ $data->id }})" --}}
                                            class=" bg-blue-500 hover:bg-blue-600 transition-colors duration-200">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M3 21v-4.25L16.2 3.575q.3-.275.663-.425t.762-.15t.775.15t.65.45L20.425 5q.3.275.438.65T21 6.4q0 .4-.137.763t-.438.662L7.25 21zM17.6 7.8L19 6.4L17.6 5l-1.4 1.4z" />
                                            </svg>
                                        </x-primary-button>

                                        <form x-data {{-- action="{{ route('projects.destroy', ['id' => $data->id]) }}" --}} method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <x-primary-button id="deleteBtn" type="submit"
                                                class=" bg-red-500 hover:bg-red-600 transition-colors duration-200 lg:ml-3 lg:mt-0 mt-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                    viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M19 4h-3.5l-1-1h-5l-1 1H5v2h14M6 19a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7H6z" />
                                                </svg>
                                            </x-primary-button>
                                        </form>
                                    </td>
                                </tr>
                            </template>

                            <tr x-show="$store.categories.filteredCategory().length === 0">
                                <td colspan="8" class=" p-2 my-3 text-sm font-semibold text-white/80 text-center">
                                    Ups, data not
                                    available</td>
                            </tr>
                        </x-slot>
                    </x-table>
                </div>
            </div>

        </div>
</x-app-layout>
