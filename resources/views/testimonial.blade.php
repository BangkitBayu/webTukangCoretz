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

        <div class="max-w-7xl mx-auto px-3 lg:px-8 flex flex-col items-center justify-center">

            <x-primary-button class=" flex items-center justify-center self-end" x-data
                @click="$store.formTestimonial.toggle(), $store.formTestimonial.isEdit = false">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M11 13H6q-.425 0-.712-.288T5 12t.288-.712T6 11h5V6q0-.425.288-.712T12 5t.713.288T13 6v5h5q.425 0 .713.288T19 12t-.288.713T18 13h-5v5q0 .425-.288.713T12 19t-.712-.288T11 18z" />
                </svg>
                <p class=" text-sm ml-3">New testimonial</p>
            </x-primary-button>

            <p class=" mb-3 mt-4 text-neutral-300 text-sm self-start">Kelola testimoni yang tampil di website Tukang Coretz.</p>
            <x-stats.stats-overview
                class=" flex items-center justify-center flex-col lg:flex-row space-y-2 space-x-0 lg:space-x-3 lg:space-y-0 mb-3">
                <x-slot:content>
                    <x-stats.stats-card id="count-testimonial-stats"
                        class=" flex items-center justify-start border border-gray-700">
                        <x-slot:content>
                            <div class=" rounded-md bg-green-500 p-2 ml-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    class=" text-white" viewBox="0 0 48 48">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="4"
                                        d="M44 6H4v30h9v5l10-5h21zM14 19.5v3m10-3v3m10-3v3" />
                                </svg>
                            </div>
                            <div class=" flex flex-col items-start justify-center ml-4">
                                <p class=" text-sm text-neutral-300">Total Testimoni</p>
                                <span class=" text-xl text-white font-semibold">25</span>
                            </div>
                        </x-slot:content>
                    </x-stats.stats-card>
                    <x-stats.stats-card id="count-active-testimonial-stats"
                        class=" flex items-center justify-start border border-gray-700">
                        <x-slot:content>
                            <div class=" rounded-md bg-blue-500 p-2 ml-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    class=" text-white" viewBox="0 0 24 24">
                                    <g fill="currentColor" fill-rule="evenodd" clip-rule="evenodd">
                                        <path
                                            d="M12 8.25a3.75 3.75 0 1 0 0 7.5a3.75 3.75 0 0 0 0-7.5M9.75 12a2.25 2.25 0 1 1 4.5 0a2.25 2.25 0 0 1-4.5 0" />
                                        <path
                                            d="M12 3.25c-4.514 0-7.555 2.704-9.32 4.997l-.031.041c-.4.519-.767.996-1.016 1.56c-.267.605-.383 1.264-.383 2.152s.116 1.547.383 2.152c.25.564.617 1.042 1.016 1.56l.032.041C4.445 18.046 7.486 20.75 12 20.75s7.555-2.704 9.32-4.997l.031-.041c.4-.518.767-.996 1.016-1.56c.267-.605.383-1.264.383-2.152s-.116-1.547-.383-2.152c-.25-.564-.617-1.041-1.016-1.56l-.032-.041C19.555 5.954 16.514 3.25 12 3.25M3.87 9.162C5.498 7.045 8.15 4.75 12 4.75s6.501 2.295 8.13 4.412c.44.57.696.91.865 1.292c.158.358.255.795.255 1.546s-.097 1.188-.255 1.546c-.169.382-.426.722-.864 1.292C18.5 16.955 15.85 19.25 12 19.25s-6.501-2.295-8.13-4.412c-.44-.57-.696-.91-.865-1.292c-.158-.358-.255-.795-.255-1.546s.097-1.188.255-1.546c.169-.382.426-.722.864-1.292" />
                                    </g>
                                </svg>

                            </div>
                            <div class=" flex flex-col items-start justify-center ml-4">
                                <p class=" text-sm text-neutral-300">Ditampilkan</p>
                                <span class=" text-xl text-white font-semibold">25/25</span>
                            </div>
                        </x-slot:content>
                    </x-stats.stats-card>
                </x-slot:content>
            </x-stats.stats-overview>
            <div class=" relative w-full overflow-x-auto py-4 border border-gray-700 rounded-md">
                <x-table>
                    <x-slot name="tableHead">

                        <tr>
                            <x-table-head class=" p-2">
                                Customer
                            </x-table-head>
                            <x-table-head class=" p-2">
                                Work
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
                                            method="POST" class="flex flex-wrap items-center justify-center gap-12">
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
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                    viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M3 21v-4.25L16.2 3.575q.3-.275.663-.425t.762-.15t.775.15t.65.45L20.425 5q.3.275.438.65T21 6.4q0 .4-.137.763t-.438.662L7.25 21zM17.6 7.8L19 6.4L17.6 5l-1.4 1.4z" />
                                                </svg>
                                            </x-primary-button>


                                            <form x-data
                                                action="{{ route('testimonial.destroy', ['id' => $data->id]) }}"
                                                method="POST">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <x-primary-button id="deleteBtn" type="submit"
                                                    class=" bg-red-500 hover:bg-red-600 transition-colors duration-200 lg:ml-3 lg:mt-0 mt-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                                        height="1em" viewBox="0 0 24 24">
                                                        <path fill="currentColor"
                                                            d="M19 4h-3.5l-1-1h-5l-1 1H5v2h14M6 19a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7H6z" />
                                                    </svg>
                                                </x-primary-button>
                                            </form>
                                            </a>
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

        <div x-data x-show="$store.formTestimonial.show" x-transition>
            <x-form-testimonial :routeStore="route('testimonial.store')"></x-form-testimonial>
        </div>
    </div>
</x-app-layout>
