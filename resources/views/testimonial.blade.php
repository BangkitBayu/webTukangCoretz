<x-app-layout>
    <x-slot:pageName>{{ $pageName }}</x-slot:pageName>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Testimonial') }}
        </h2>

    </x-slot>
    <div class="py-12 relative" x-data="testimonialForm">
        @if (session('success'))
            <x-alert :status="__('success')" :message="session('success')" x-transition></x-alert>
        @elseif (session('error'))
            <x-alert :status="__('error')" :message="session('error')" x-transition></x-alert>
        @endif

        <div class="max-w-7xl mx-auto px-3 lg:px-8 flex flex-col items-center justify-center">

            <x-primary-button class=" flex items-center justify-center self-end bg-white hover:bg-white/80"
                @click="$dispatch('open-modal' , 'testimonial-modal')">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                    class=" text-black">
                    <path fill="currentColor"
                        d="M11 13H6q-.425 0-.712-.288T5 12t.288-.712T6 11h5V6q0-.425.288-.712T12 5t.713.288T13 6v5h5q.425 0 .713.288T19 12t-.288.713T18 13h-5v5q0 .425-.288.713T12 19t-.712-.288T11 18z" />
                </svg>
                <p class=" text-sm ml-3 text-black">Testimoni Baru</p>
            </x-primary-button>

            <p class=" mb-3 mt-4 text-neutral-300 text-sm self-start">Kelola testimoni yang tampil di website Tukang
                Coretz.</p>
            <x-stats.stats-overview
                class=" flex items-center justify-center flex-col lg:flex-row space-y-2 space-x-0 lg:space-x-3 lg:space-y-0 mb-3">
                <x-slot:content>
                    <x-stats.stats-card id="count-testimonial-stats"
                        class=" flex items-center justify-start border border-gray-700">
                        <x-slot:content>
                            <div class=" rounded-md bg-slate-800 border border-gray-700 p-3 ml-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    class=" text-white" viewBox="0 0 48 48">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="4"
                                        d="M44 6H4v30h9v5l10-5h21zM14 19.5v3m10-3v3m10-3v3" />
                                </svg>
                            </div>
                            <div class=" flex flex-col items-start justify-center ml-4">
                                <p class=" text-sm text-neutral-300">Total Testimoni</p>
                                <span class=" text-xl text-white font-semibold">{{ $testimonials_count }}</span>
                            </div>
                        </x-slot:content>
                    </x-stats.stats-card>
                    <x-stats.stats-card id="count-active-testimonial-stats"
                        class=" flex items-center justify-start border border-gray-700">
                        <x-slot:content>
                            <div class=" rounded-md bg-slate-800 border border-gray-700 p-3 ml-1">
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
                                <span
                                    class=" text-xl text-white font-semibold">{{ $active_testimonials_count }}/25</span>
                            </div>
                        </x-slot:content>
                    </x-stats.stats-card>
                </x-slot:content>
            </x-stats.stats-overview>
            <div class=" relative w-full overflow-x-auto py-4 border border-gray-700 rounded-md">
                <x-table>
                    <x-slot name="tableHead">

                        <tr>
                            <x-table-head class=" px-4 py-2 text-left">
                                Pelanggan
                            </x-table-head>
                            <x-table-head class=" py-2 px-2 text-left">
                                Pekerjaan
                            </x-table-head>
                            <x-table-head class=" py-2 px-2 text-left">
                                Testimoni
                            </x-table-head>
                            <x-table-head class=" py-2 px-2 text-left">
                                Rating
                            </x-table-head>
                            <x-table-head class=" py-2 px-2 text-left">
                                Ditampilkan?
                            </x-table-head>
                            <x-table-head class=" py-2 px-2 text-center">
                                Aksi
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
                                <tr id="{{ $data->id }}"
                                    class="text-sm text-white/80 text-center border-b border-white/10">
                                    <td class="px-4 py-2 align-middle">
                                        <div class="flex items-center justify-start">
                                            <div
                                                class="rounded-full w-8 h-8 flex items-center justify-center text-sm text-black font-semibold bg-white mr-3 flex-shrink-0">
                                                <p>{{ Str::substr($data->name, 0, 1) }}</p>
                                            </div>
                                            <p class=" text-white">{{ $data->name }}</p>
                                        </div>
                                    </td>
                                    <td class=" py-2 px-2 text-left">
                                        {{ $data->occupation }}
                                    </td>
                                    <td class=" py-2 px-2 whitespace-normal text-left">
                                        {{ $data->feedback }}
                                    </td>
                                    <td class=" py-2 px-2 align-middle">
                                        <div class="flex items-center justify-start">
                                            @if ($data->rating === 0)
                                                <p>Belum ada rating</p>
                                            @elseif (5 - $data->rating === 0)
                                                @for ($n = 0; $n < 5; $n++)
                                                    <x-rating.star filled="true"></x-rating.st>
                                                @endfor
                                            @else
                                                @for ($n = 0; $n < $data->rating; $n++)
                                                    <x-rating.star filled="true"></x-rating.star>
                                                @endfor
                                                @for ($n = 0; $n < 5 - $data->rating; $n++)
                                                    <x-rating.star filled="false"></x-rating.star>
                                                @endfor
                                            @endif
                                        </div>
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
                                            <button id="editBtn" type="submit"
                                                @click="$dispatch('open-modal' , 'testimonial-modal'), isEdit=true, fetchAndEdit({{ $data->id }})"
                                                class=" bg-transparent hover:bg-slate-800 transition-colors duration-200 p-3 rounded-md">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                    viewBox="0 0 24 24">
                                                    <path fill="currentColor" fill-rule="evenodd"
                                                        d="M14.757 2.621a4.682 4.682 0 0 1 6.622 6.622l-9.486 9.486c-.542.542-.86.86-1.216 1.137q-.628.492-1.35.835c-.406.193-.834.336-1.56.578l-3.332 1.11l-.802.268a1.81 1.81 0 0 1-2.29-2.29l1.378-4.133c.242-.727.385-1.155.578-1.562q.344-.72.835-1.35c.276-.354.595-.673 1.137-1.215zM4.4 20.821l2.841-.948c.791-.264 1.127-.377 1.44-.526q.572-.274 1.073-.663c.273-.214.525-.463 1.115-1.053l7.57-7.57a7.36 7.36 0 0 1-2.757-1.744A7.36 7.36 0 0 1 13.94 5.56l-7.57 7.57c-.59.589-.84.84-1.053 1.114q-.39.5-.663 1.073c-.149.313-.262.649-.526 1.44L3.18 19.6zM15.155 4.343c.035.175.092.413.189.69a5.86 5.86 0 0 0 1.4 2.222a5.86 5.86 0 0 0 2.221 1.4c.278.097.516.154.691.189l.662-.662a3.182 3.182 0 0 0-4.5-4.5z"
                                                        clip-rule="evenodd" />
                                                </svg>

                                            </button>


                                            <form x-data
                                                action="{{ route('testimonial.destroy', ['id' => $data->id]) }}"
                                                method="POST">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button id="deleteBtn" type="submit"
                                                    class=" bg-transparent hover:bg-slate-800 transition-colors duration-200 p-3 rounded-md lg:ml-3 lg:mt-0 mt-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                        height="18" viewBox="0 0 512 512">
                                                        <path fill="none" stroke="currentColor"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="32"
                                                            d="m112 112l20 320c.95 18.49 14.4 32 32 32h184c17.67 0 30.87-13.51 32-32l20-320" />
                                                        <path fill="currentColor" stroke="currentColor"
                                                            stroke-linecap="round" stroke-miterlimit="10"
                                                            stroke-width="32" d="M80 112h352" />
                                                        <path fill="none" stroke="currentColor"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="32"
                                                            d="M192 112V72h0a23.93 23.93 0 0 1 24-24h80a23.93 23.93 0 0 1 24 24h0v40m-64 64v224m-72-224l8 224m136-224l-8 224" />
                                                    </svg>

                                                </button>
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

        {{-- Testimonial Modal --}}
        <x-modal name="testimonial-modal" maxWidth="lg" class=" bg-white h-auto">
            <x-slot:header>
                <div class=" align-middle px-6 py-3 border-b border-gray-200 ">
                    <h3 class=" text-lg text-black text-center md:text-left  "
                        x-text="isEdit ? 'Edit Testimoni' : 'Tambah Testimoni'">
                    </h3>
                    <h4 class=" text-sm text-gray-700 text-center md:text-left "
                        x-text="isEdit ? 'Ubah data pelanggan dan komentar mereka.' : ' Isi data pelanggan dan komentar mereka.'">
                    </h4>
                </div>
            </x-slot>
            <x-slot:content>
                <form
                    :action="isEdit ?
                        '{{ route('testimonial.update', ['id' => 'ID']) }}'.replace('ID', form.id) :
                        '{{ route('testimonial.store') }}'"
                    class=" flex flex-col overflow-y-auto h-60 py-3" @submit="isLoading = true" id="testimonial-form"
                    method="POST">
                    @csrf

                    <input type="hidden" name="_method" :value="isEdit ? 'PUT' : 'POST'">


                    <div class=" flex flex-col items-center justify-center md:flex-row px-6 mb-2">
                        <div class=" flex flex-col justify-start mb-2 w-full md:mr-2">
                            <x-input-label :value="__('Nama Pelanggan')"
                                class=" mb-1 after:content-['*'] after:text-red-600 "></x-input-label>
                            <x-text-input id="name" name="name" class=" w-full" placeholder="mis. John Doe"
                                autofocus required x-model="form.name"></x-text-input>

                            @error('name')
                                <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class=" flex flex-col justify-start mb-2 w-full ">
                            <x-input-label :value="__('Pekerjaan')"
                                class=" mb-1 after:content-['*'] after:text-red-600 "></x-input-label>
                            <x-text-input id="occupation" name="occupation" class=" w-full"
                                placeholder="mis. Owner Coffe Shop" required x-model="form.occupation"></x-text-input>

                            @error('occupation')
                                <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class=" flex flex-col justify-start mb-2 w-full px-6">
                        <x-input-label :value="__('Testimoni')"
                            class=" mb-1 after:content-['*'] after:text-red-600 "></x-input-label>
                        <x-textarea class=" mb-1" id="feedback" name="feedback"
                            placeholder="Masukkan testimoni pelanggan" required x-model="form.feedback"
                            maxlength="300"></x-textarea>
                        <p class=" text-sm text-gray-500">Maksimal 300 karakter</p>
                        @error('feedback')
                            <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class=" flex flex-col justify-start mb-4 w-full px-6">
                        <x-input-label :value="__('Rating')"
                            class=" mb-1 after:content-['*'] after:text-red-600 "></x-input-label>

                        <div class="star-rating flex items-center justify-start gap-1">
                            @for ($i = 0; $i < 5; $i++)
                                <input type="radio" name="rating" id="star{{ $i + 1 }}"
                                    value="{{ $i + 1 }}" x-model="form.rating">
                                <x-rating.star filled="true" class=" text-xl"></x-rating.star>
                            @endfor
                        </div>

                        @error('rating')
                            <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class=" mb-2 w-full px-6">
                        <div class="p-3 rounded-md border border-gray-300 flex items-center justify-between">
                            <div class=" block">
                                <x-input-label :value="__('Tampilkan di Website')"></x-input-label>
                                <p class=" text-sm text-gray-500">Nonaktifkan untuk menyimpan tanpa menampilkan.</p>
                            </div>

                            <label class="relative inline-flex items-center cursor-pointer text-gray-900 gap-3">

                                <input type="checkbox" class="sr-only peer" name="is_visible" value="1"
                                    :checked="form.is_visible == 1" />

                                <div
                                    class="w-12 h-6 bg-black rounded-full peer peer-checked:bg-black transition-colors duration-200">
                                </div>
                                <span
                                    class="dot absolute left-1 top-1 w-4 h-4 bg-white rounded-full transition-transform duration-200 ease-in-out peer-checked:translate-x-6"></span>
                            </label>

                            @error('is_visible')
                                <p class="text-sm text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>


                </form>
            </x-slot:content>
            <x-slot:footer>
                <div
                    class=" flex flex-col-reverse items-center justify-center  md:justify-end md:flex-row px-6 py-3 border-t border-gray-200">
                    <x-primary-button type="button"
                        class=" w-full bg-white hover:bg-gray-50 border border-gray-100 shadow-sm  md:w-auto transition-colors duration-200 ease-in-out">
                        <p class=" text-black text-sm font-bold text-center"
                            @click="$dispatch('close-modal' , 'testimonial-modal'),  resetForm()">
                            Batal</p>
                    </x-primary-button>

                    <x-primary-button :class="{ '!bg-gray-700': isLoading, '!bg-black hover:!bg-gray-800': !isLoading }"
                        class=" mb-2 ml-0 md:mb-0 md:ml-2 w-full !bg-black hover:!bg-gray-800  md:w-auto transition-colors duration-200 ease-in-out"
                        x-bind:disabled="isLoading" form="testimonial-form">
                        <template x-if="isLoading">
                            <div class="flex items-center justify-center">
                                <svg class="w-5 h-5 animate-spin border-4 rounded-full border-white/70 mr-3 border-t-transparent"
                                    viewBox="0 0 24 24"></svg>
                                {{ __('Tunggu sebentar...') }}
                            </div>
                        </template>

                        <template x-if="!isLoading">
                            <p class=" text-white text-sm font-bold text-center">Simpan Testimoni</p>
                        </template>
                    </x-primary-button>
                </div>
            </x-slot:footer>
        </x-modal>


    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('testimonialForm', () => ({
                isEdit: false,
                isLoading: false,

                // State utama form dikelompokkan di sini
                form: {
                    id: null,
                    name: '',
                    occupation: '',
                    feedback: '',
                    rating: 1,
                    is_visible: 1
                },

                // Mengambil data dari server saat Edit
                async fetchAndEdit(id) {
                    this.isLoading = true;
                    this.isEdit = true;
                    try {
                        const response = await fetch(`/testimonial/${id}`);
                        if (!response.ok) throw new Error('Gagal mengambil data');

                        const res = await response.json();
                        this.form = res.data; // Isi state form otomatis
                        // console.log(this.form)
                    } catch (error) {
                        console.error(error.message);
                        this.resetForm();
                    } finally {
                        this.isLoading = false;
                    }
                },

                // Reset form ke kondisi semula (Tambah Data)
                resetForm() {
                    this.isEdit = false;
                    this.form = {
                        id: null,
                        name: '',
                        occupation: '',
                        feedback: '',
                        rating: 1,
                        is_visible: 1
                    };
                }
            }));
        });
    </script>
</x-app-layout>
