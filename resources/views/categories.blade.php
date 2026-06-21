<x-app-layout>
    <x-slot:pageName>{{ $pageName }}</x-slot:pageName>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Categories') }}
        </h2>
    </x-slot>

    <div class="py-12 relative" x-data="{ isEdit: false, isLoading: false }">
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
                        <x-slot name="clearInput">
                            <button x-show="$store.categories.searchCategory.length > 0" x-transition
                                class="cursor-pointer" @click="$store.categories.searchCategory = ''">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class=" text-red-300 text-xl mr-3 ml-3 transition-transform ease-in duration-200"
                                    width="1em" height="1em" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12z" />
                                </svg>
                            </button>
                        </x-slot>
                    </x-search-bar>
                    <x-primary-button class=" flex items-center justify-center ml-2 whitespace-nowrap" type="button"
                        @click="$dispatch('open-modal' , 'storeCategoryForm')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M11 13H6q-.425 0-.712-.288T5 12t.288-.712T6 11h5V6q0-.425.288-.712T12 5t.713.288T13 6v5h5q.425 0 .713.288T19 12t-.288.713T18 13h-5v5q0 .425-.288.713T12 19t-.712-.288T11 18z" />
                        </svg>
                        <p class=" text-sm ml-3">New category</p>
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
                                    <td class=" p-2" x-text="value.project_count"></td>
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

            <x-modal name="storeCategoryForm">
                <x-slot:header>
                    <div class=" p-3 m-auto">
                        <h3 class=" text-lg text-white/80 font-semibold text-center"
                            x-text="isEdit ? 'Edit Category' : 'Add Category'"></h3>
                    </div>
                </x-slot:header>

                <x-slot:content>
                    <form
                        :action="isEdit ? '{{ route('categories.update', ['id' => 'ID']) }}' : '{{ route('categories.store') }}'"
                        class=" flex flex-col p-3" @submit="isLoading = true">
                        @csrf
                        <input type="hidden" name="_method" :value="isEdit ? 'PUT' : 'POST'">

                        <div class="flex flex-col justify-start">
                            <x-input-label :value="__('Category Name')"
                                class=" mb-1 after:content-['*'] after:text-red-600"></x-input-label>
                            <x-text-input
                                class=" outline-none w-full p-2 bg-gray-600 text-white/80 border-gray-600 mb-1"
                                autofocus placeholder="Enter new category name" required></x-text-input>
                            <p class=" text-sm text-gray-500">e.g., Renovasi rumah, Restaurant, and Hotel</p>
                        </div>
                    </form>
                </x-slot:content>

                <x-slot:footer>
                    <div class=" flex p-3">
                        <x-primary-button type="button" class=" w-2/4 bg-gray-700 hover:bg-gray-600" x-data
                            @click="$dispatch('close-modal' , 'storeCategoryForm')">
                            <p class=" text-white/80 text-sm font-bold text-center">
                                Close</p>
                        </x-primary-button>

                        <x-primary-button class="ml-2 w-2/4">
                            <template x-if="isLoading">
                                <div class="flex items-center justify-center">
                                    <svg class="w-5 h-5 animate-spin border-4 rounded-full border-white/70 mr-3 border-t-transparent"
                                        viewBox="0 0 24 24"></svg>
                                    {{ __('Please wait...') }}
                                </div>
                            </template>

                            <template x-if="!isLoading">
                                <p class=" text-white/80 text-sm font-bold text-center" x-data
                                    x-text="isEdit ? 'Save changes' : 'Add Category'">
                            </template>
                        </x-primary-button>
                    </div>
                </x-slot:footer>
            </x-modal>
        </div>

    </div>
</x-app-layout>
