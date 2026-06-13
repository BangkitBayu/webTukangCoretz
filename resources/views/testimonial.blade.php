<x-app-layout>
    <x-slot:pageName>{{ $pageName }}</x-slot:pageName>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Testimonial') }}
        </h2>

    </x-slot>
    <div class="py-12 relative">
        @if (session('success'))
            <x-alert :status="__('success')" :message="session('success')" x-transition></x-alert>
        @elseif (session('error'))
            <x-alert :status="__('error')" :message="session('error')" x-transition></x-alert>
        @endif

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg space-y-2">
                <div class=" flex items-center justify-between py-4 px-6">
                    <h3 class="text-lg text-white/80">All testimonial</h3>
                    <x-primary-button class=" flex items-center justify-center" x-data
                        @click="$store.formTestimonial.toggle(), $store.formTestimonial.isEdit = false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M11 13H6q-.425 0-.712-.288T5 12t.288-.712T6 11h5V6q0-.425.288-.712T12 5t.713.288T13 6v5h5q.425 0 .713.288T19 12t-.288.713T18 13h-5v5q0 .425-.288.713T12 19t-.712-.288T11 18z" />
                        </svg>
                        <p class=" text-sm ml-3">New testimonial</p>
                    </x-primary-button>
                </div>
                <div class=" relative w-full overflow-x-auto py-4 lg:px-3 px-0">
                    <x-table>
                        <x-slot name="tableHead">

                            <tr>
                                <x-table-head class=" p-2">
                                    Avatar
                                </x-table-head>
                                <x-table-head class=" p-2">
                                    Name
                                </x-table-head>
                                <x-table-head class=" p-2">
                                    Position
                                </x-table-head>
                                <x-table-head class=" p-2">
                                    Comment
                                </x-table-head>
                                <x-table-head class=" p-2">
                                    Rating
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
                            @if ($testimonials->isEmpty())
                                <tr>
                                    <td colspan="8">
                                        <p class=" text-sm text-white/80 font-thin text-center my-2">Ups, data not
                                            available</p>
                                    </td>
                                </tr>
                            @else
                                @foreach ($testimonials as $data)
                                    <tr :id="$data->id"
                                        class="text-sm text-white/70 text-center border-b border-white/10">
                                        <td class=" p-2 ">
                                            {{ $data->id }}
                                        </td>
                                        <td class=" p-2 ">
                                            {{ $data->name }}
                                        </td>
                                        <td class=" p-2 ">
                                            {{ $data->position }}
                                        </td>
                                        <td class=" p-2 whitespace-normal text-justify">
                                            {{ $data->comment }}
                                        </td>
                                        <td class=" p-2">
                                            {{ $data->rating }}/5
                                        </td>
                                        <td class="p-2">
                                            <form x-data x-ref="formChangeStatus"
                                                action="{{ route('testimonial.active-status', ['id' => $data->id]) }}"
                                                method="POST"
                                                class="flex flex-wrap items-center justify-center gap-12">
                                                @csrf

                                                <input type="hidden" name="_method" value="PUT">
                                                <label
                                                    class="relative inline-flex items-center cursor-pointer text-gray-900 gap-3">
                                                    <input type="checkbox" class="sr-only peer" name="isShow"
                                                        {{ (int) $data->isShow === 1 ? 'checked' : '' }}
                                                        @change="$refs.formChangeStatus.submit()" />
                                                    <div
                                                        class="w-12 h-6 bg-gray-600 rounded-full peer peer-checked:bg-blue-500 transition-colors duration-200">
                                                    </div>
                                                    <span
                                                        class="dot absolute left-1 top-1 w-4 h-4 bg-white/80 rounded-full transition-transform duration-200 ease-in-out peer-checked:translate-x-6"></span>
                                                </label>
                                            </form>
                                        </td>
                                        <td class="p-4">
                                            <div class=" flex items-center justify-center lg:flex-row flex-col">

                                                <x-primary-button id="editBtn" type="submit" x-data
                                                    @click="$store.formTestimonial.openFormEdit({{ $data->id }})"
                                                    class=" bg-blue-500 hover:bg-blue-600 transition-colors duration-200">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                        height="1em" viewBox="0 0 24 24">
                                                        <path fill="currentColor"
                                                            d="M3 21v-4.25L16.2 3.575q.3-.275.663-.425t.762-.15t.775.15t.65.45L20.425 5q.3.275.438.65T21 6.4q0 .4-.137.763t-.438.662L7.25 21zM17.6 7.8L19 6.4L17.6 5l-1.4 1.4z" />
                                                    </svg>
                                                </x-primary-button>

                                                <x-primary-button id="deleteBtn" type="submit"
                                                    class=" bg-red-500 hover:bg-red-600 transition-colors duration-200 lg:ml-3 lg:mt-0 mt-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                        height="1em" viewBox="0 0 24 24">
                                                        <path fill="currentColor"
                                                            d="M19 4h-3.5l-1-1h-5l-1 1H5v2h14M6 19a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7H6z" />
                                                    </svg>
                                                </x-primary-button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                            <div class=" pagination my-2">
                                {{ $testimonials->links() }}
                            </div>
                        </x-slot>
                    </x-table>
                </div>
            </div>
        </div>

        <div x-data x-show="$store.formTestimonial.show" x-transition>
            <x-form-testimonial :routeStore="route('testimonial.store')"></x-form-testimonial>
        </div>
    </div>
</x-app-layout>
