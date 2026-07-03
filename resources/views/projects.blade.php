<x-app-layout>
    <x-slot:pageName>{{ $pageName }}</x-slot:pageName>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All Projects') }}
        </h2>
    </x-slot>

    <div class="py-12 relative" x-data>

        @if (session('success'))
            <x-alert :status="__('success')" :message="session('success')" x-transition></x-alert>
        @elseif (session('error'))
            <x-alert :status="__('error')" :message="session('error')" x-transition></x-alert>
        @endif

        <div class="max-w-7xl mx-auto px-3 lg:px-8 flex flex-col items-center justify-center" x-data="$store.categories.collection = @js($categories)">
            <x-primary-button class=" flex items-center justify-center self-end bg-white hover:bg-white/80"
                @click="$store.formProject.toggle()">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                    class=" text-black">
                    <path fill="currentColor"
                        d="M11 13H6q-.425 0-.712-.288T5 12t.288-.712T6 11h5V6q0-.425.288-.712T12 5t.713.288T13 6v5h5q.425 0 .713.288T19 12t-.288.713T18 13h-5v5q0 .425-.288.713T12 19t-.712-.288T11 18z" />
                </svg>
                <p class=" text-sm ml-3 text-black">Proyek Baru</p>
            </x-primary-button>

            <p class=" mb-3 mt-4 text-neutral-300 text-sm self-start">Kelola proyek yang tampil di website Tukang
                Coretz.</p>
            <x-stats.stats-overview
                class=" flex items-center justify-center flex-col lg:flex-row space-y-2 space-x-0 lg:space-x-3 lg:space-y-0 mb-3">
                <x-slot:content>
                    <x-stats.stats-card id="count-projects-stats"
                        class=" flex items-center justify-start border border-gray-700">
                        <x-slot:content>
                            <div class=" rounded-md bg-slate-800 border border-gray-700 p-3 ml-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="text-white"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M7.308 19q-.671 0-1.143-.472q-.473-.472-.473-1.144V9.947L3 11.952q-.177.115-.365.097q-.189-.018-.323-.195q-.135-.177-.114-.365q.021-.189.198-.324l8.629-6.451q.217-.162.463-.233T12 4.409t.513.072t.462.232l3.371 2.51v-1.28q0-.395.274-.669T17.288 5t.669.274t.274.668v2.696l3.392 2.528q.171.134.195.323t-.11.365t-.323.195t-.366-.097l-2.692-2.006v7.439q0 .67-.472 1.143q-.472.472-1.143.472h-1.866q-.671 0-1.143-.472t-.472-1.144v-3q0-.269-.173-.442t-.442-.173h-1.231q-.27 0-.443.173t-.173.442v3q0 .672-.472 1.144T9.154 19zm0-1h1.846q.269 0 .442-.173t.173-.442v-3q0-.671.472-1.144q.473-.472 1.144-.472h1.23q.672 0 1.144.472q.472.473.472 1.144v3q0 .269.173.442t.442.173h1.866q.269 0 .442-.173t.173-.442V9.21l-4.962-3.685Q12.213 5.41 12 5.41t-.365.115L6.692 9.21v8.175q0 .269.174.442q.173.173.442.173m2.884-7.994h3.616q0-.704-.542-1.159q-.543-.455-1.266-.455t-1.265.455t-.543 1.159M9.154 18q.269 0 .442-.173t.173-.442v-3q0-.671.472-1.144q.473-.472 1.144-.472h1.23q.672 0 1.144.472q.472.473.472 1.144v3q0 .269.173.442t.442.173q-.269 0-.442-.173t-.173-.442v-3q0-.671-.472-1.144t-1.143-.472h-1.231q-.671 0-1.144.472q-.472.473-.472 1.144v3q0 .269-.173.442T9.154 18" />
                                </svg>

                            </div>
                            <div class=" flex flex-col items-start justify-center ml-4">
                                <p class=" text-sm text-neutral-300">Total Proyek</p>
                                <span class=" text-xl text-white font-semibold">1</span>
                            </div>
                        </x-slot:content>
                    </x-stats.stats-card>
                    <x-stats.stats-card id="count-active-project-stats"
                        class=" flex items-center justify-start border border-gray-700">
                        <x-slot:content>
                            <div class=" rounded-md bg-slate-800 border border-gray-700 p-3 ml-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
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
                                <span class=" text-xl text-white font-semibold">1</span>
                            </div>
                        </x-slot:content>
                    </x-stats.stats-card>
                </x-slot:content>
            </x-stats.stats-overview>
            <div class="  w-full overflow-x-auto border border-gray-700 rounded-md">
                <x-table>
                    <x-slot name="tableHead">
                        <tr>
                            <x-table-head class=" px-4 py-2 text-left">
                                Proyek
                            </x-table-head>
                            <x-table-head class=" p-2 text-left">
                                Kategori
                            </x-table-head>
                            <x-table-head class=" p-2 text-left">
                                Ditampilkan?
                            </x-table-head>
                            <x-table-head class=" p-2 text-center">
                                Aksi
                            </x-table-head>
                        </tr>

                    </x-slot>
                    <x-slot name="tableBody">
                        @if ($projects->isEmpty())
                            <tr>
                                <td colspan="8" class=" py-8">
                                    <div class=" flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            class="mr-2 text-red-500" viewBox="0 0 24 24">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="1.5"
                                                d="M12 8v4m0 4.01l.01-.011M9 3H4v3m0 5v2m16-2v2M15 3h5v3M9 21H4v-3m11 3h5v-3" />
                                        </svg>
                                        <p class=" text-sm text-gray-200 font-thin text-center">Proyek masih kosong,
                                            silahkan tambah proyek baru!</p>
                                    </div>
                                </td>
                            </tr>
                        @else
                            @foreach ($projects as $data)
                                <tr id="{{ $data->id }}" class="  border-t border-gray-700 text-gray-400 text-sm">
                                    <td class="p-4 align-middle">
                                        <div class="flex items-center justify-start gap-3">
                                            @if ($data->hasMedia('thumbnail'))
                                                <img src="{{ $data->getFirstMediaUrl('thumbnail', 'webp') }}"
                                                    alt="{{ $data->name }}"
                                                    class="w-20 h-20 aspect-video max-w-xs object-cover rounded-md shadow-md">
                                            @endif

                                            <div class="flex flex-col items-start justify-center">
                                                <h3 class="text-lg font-semibold text-white">{{ $data->name }}</h3>
                                                <p class=" text-sm">{{ $data->description }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class=" p-2 text-left">
                                        @if ($data->category)
                                            {{ $data->category->name }}
                                        @else
                                            <p class=" text-white font-semibold">Kategori tidak ada</p>
                                        @endif
                                    </td>

                                    <td class="p-2 align-middle">
                                        <form x-data x-ref="formChangeStatus"
                                            action="{{ route('testimonial.update-visibility', ['id' => $data->id]) }}"
                                            method="POST" class="flex flex-wrap items-center justify-start">
                                            @csrf

                                            @method('PATCH')
                                            <label
                                                class="relative inline-flex items-center cursor-pointer text-gray-900 gap-3">
                                                <input type="checkbox" class="sr-only peer" name="is_visible"
                                                    value="1" {{ (int) $data->is_visible === 1 ? 'checked' : '' }}
                                                    @change="$refs.formChangeStatus.submit()" />
                                                <div
                                                    class="w-12 h-6 bg-white rounded-full peer peer-checked:bg-white transition-colors duration-200">
                                                </div>
                                                <span
                                                    class="dot absolute left-1 top-1 w-4 h-4 bg-gray-600 rounded-full transition-transform duration-200 ease-in-out peer-checked:translate-x-6"></span>
                                            </label>
                                        </form>
                                    </td>
                                    <td class="p-2 align-middle">
                                        <div class=" flex items-center justify-center ">

                                            {{-- Edit testimonial button --}}
                                            <x-primary-button id="editBtn" type="button"
                                                @click="$dispatch('open-modal' , 'testimonial-modal'), isEdit=true, fetchTestimonialById({{ $data->id }})"
                                                class=" bg-transparent hover:!bg-slate-800 transition-colors duration-200 p-3 rounded-md">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                    viewBox="0 0 24 24">
                                                    <path fill="currentColor" fill-rule="evenodd"
                                                        d="M14.757 2.621a4.682 4.682 0 0 1 6.622 6.622l-9.486 9.486c-.542.542-.86.86-1.216 1.137q-.628.492-1.35.835c-.406.193-.834.336-1.56.578l-3.332 1.11l-.802.268a1.81 1.81 0 0 1-2.29-2.29l1.378-4.133c.242-.727.385-1.155.578-1.562q.344-.72.835-1.35c.276-.354.595-.673 1.137-1.215zM4.4 20.821l2.841-.948c.791-.264 1.127-.377 1.44-.526q.572-.274 1.073-.663c.273-.214.525-.463 1.115-1.053l7.57-7.57a7.36 7.36 0 0 1-2.757-1.744A7.36 7.36 0 0 1 13.94 5.56l-7.57 7.57c-.59.589-.84.84-1.053 1.114q-.39.5-.663 1.073c-.149.313-.262.649-.526 1.44L3.18 19.6zM15.155 4.343c.035.175.092.413.189.69a5.86 5.86 0 0 0 1.4 2.222a5.86 5.86 0 0 0 2.221 1.4c.278.097.516.154.691.189l.662-.662a3.182 3.182 0 0 0-4.5-4.5z"
                                                        clip-rule="evenodd" />
                                                </svg>

                                            </x-primary-button>


                                            {{-- Delete testimonial form --}}
                                            <x-primary-button id="deleteBtn" type="button"
                                                @click="$dispatch('open-modal' , 'confirm-delete'), fetchTestimonialById({{ $data->id }})"
                                                class=" bg-transparent hover:!bg-slate-800 transition-colors duration-200 p-3 rounded-md lg:ml-3 lg:mt-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                    viewBox="0 0 512 512">
                                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="32"
                                                        d="m112 112l20 320c.95 18.49 14.4 32 32 32h184c17.67 0 30.87-13.51 32-32l20-320" />
                                                    <path fill="currentColor" stroke="currentColor"
                                                        stroke-linecap="round" stroke-miterlimit="10"
                                                        stroke-width="32" d="M80 112h352" />
                                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="32"
                                                        d="M192 112V72h0a23.93 23.93 0 0 1 24-24h80a23.93 23.93 0 0 1 24 24h0v40m-64 64v224m-72-224l8 224m136-224l-8 224" />
                                                </svg>

                                            </x-primary-button>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                    </x-slot>
                </x-table>
                <div class=" pagination my-2">
                    {{ $projects->links() }}
                </div>
            </div>
        </div>

        <div x-data x-show="$store.formProject.openForm" x-transition>
            <x-form-project :routeStore="route('projects.store')"></x-form-project>
        </div>
    </div>
</x-app-layout>
