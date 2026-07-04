{{-- resources/views/projects/partials/thumbnail-upload.blade.php --}}

<div x-data="thumbnailUpload()" x-init="init()" class="w-full">
    {{-- Label --}}

    {{-- Drop Zone --}}
    <div @dragover.prevent="onDragOver" @dragleave.prevent="onDragLeave" @drop.prevent="onDrop"
        @click="!preview && $refs.fileInput.click()"
        :class="{
            'border-blue-500 bg-indigo-50': isDragging,
            'border-gray-300 bg-gray-50 hover:border-blue-400 hover:bg-gray-100 cursor-pointer': !isDragging && !
                preview,
            'border-transparent bg-transparent': preview
        }"
        class="relative w-full border-2 border-dashed rounded-xl transition-all duration-200">
        {{-- State: Belum Ada Gambar --}}
        <div x-show="!preview" class="flex flex-col items-center justify-center py-12 px-6 text-center">
            {{-- Icon Upload --}}
            <svg class="w-12 h-12 text-gray-400 mb-4 transition-colors duration-200"
                :class="{ 'text-blue-400': isDragging }" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M13.5 12h.008v.008H13.5V12zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H16.5m-7.5 3.75h9M3.75 19.5h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5z" />
            </svg>

            <p class="text-sm font-medium text-gray-700">
                <span class="text-blue-600" :class="{ 'text-blue-700': isDragging }">
                    Klik untuk upload
                </span>
                atau seret file ke sini
            </p>
            <p class="text-xs text-gray-500 mt-1">
                PNG, JPG, JPEG, WEBP — Maksimal 2MB
            </p>
        </div>

        {{-- State: Preview Gambar --}}
        <div x-show="preview" class="relative group rounded-xl overflow-hidden">
            {{-- Gambar Preview --}}
            <img :src="preview" alt="Preview thumbnail" class="w-full h-56 object-cover rounded-xl" />

            {{-- Overlay Aksi --}}
            <div
                class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100
                        transition-opacity duration-200 flex items-center justify-center gap-3 rounded-xl">

                {{-- Tombol Ganti --}}
                <button type="button" @click.stop="$refs.fileInput.click()"
                    class="flex items-center gap-1.5 px-3 py-1.5 bg-white text-gray-800
                           text-xs font-medium rounded-lg hover:bg-gray-100 transition-colors">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                    </svg>
                    Ganti
                </button>

                {{-- Tombol Hapus --}}
                <button type="button" @click.stop="removeImage()"
                    class="flex items-center gap-1.5 px-3 py-1.5 bg-red-500 text-white
                           text-xs font-medium rounded-lg hover:bg-red-600 transition-colors">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>
                    Hapus
                </button>
            </div>
        </div>
    </div>

    {{-- Pesan Error --}}
    <p x-show="errorMessage" x-text="errorMessage" class="mt-2 text-sm text-red-600"></p>

    {{-- Info File Terpilih --}}
    <p x-show="fileName && !errorMessage" x-text="'File: ' + fileName" class="mt-2 text-xs text-gray-500"></p>

    {{-- Input File (tersembunyi) --}}
    <input x-ref="fileInput" type="file" name="thumbnail" accept="image/png,image/jpeg,image/webp" class="hidden"
        @change="onFileChange" />

    <p x-show="isEdit" class=" text-sm mt-2 text-yellow-400 font-semibold">Note: lewati unggahan foto jika tidak ada perubahan.</p>

    {{-- Error dari server (Blade) --}}
    @error('thumbnail')
        <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
    @enderror
</div>

{{-- Alpine.js Script --}}
<script>
    function thumbnailUpload() {
        return {
            preview: null,
            fileName: '',
            errorMessage: '',
            isDragging: false,

            // Batas ukuran: 2MB dalam bytes
            maxSizeBytes: 2 * 1024 * 1024,

            // Tipe file yang diizinkan
            allowedTypes: ['image/jpeg', 'image/png', 'image/webp'],

            init() {
                // Jika ada gambar yang sudah tersimpan (mode edit), tampilkan preview
                const existing = this.$el.dataset.existingImage;
                if (existing) {
                    this.preview = existing;
                    this.fileName = existing.split('/').pop();
                }
            },

            // Handler: file dipilih via tombol
            onFileChange(event) {
                const file = event.target.files[0];
                if (file) {
                    this.processFile(file);
                }
            },

            // Handler: drag over drop zone
            onDragOver() {
                this.isDragging = true;
            },

            // Handler: drag meninggalkan drop zone
            onDragLeave() {
                this.isDragging = false;
            },

            // Handler: file di-drop
            onDrop(event) {
                this.isDragging = false;
                const file = event.dataTransfer.files[0];
                if (file) {
                    this.processFile(file);
                    // Sync ke input file agar ikut terkirim saat form submit
                    const dt = new DataTransfer();
                    dt.items.add(file);
                    this.$refs.fileInput.files = dt.files;
                }
            },

            // Proses dan validasi file
            processFile(file) {
                this.errorMessage = '';

                // Validasi tipe file
                if (!this.allowedTypes.includes(file.type)) {
                    this.errorMessage = 'Format file not supported. Use PNG, JPG or WEBP';
                    this.clearPreview();
                    return;
                }

                // Validasi ukuran file
                if (file.size > this.maxSizeBytes) {
                    const sizeMB = (file.size / 1024 / 1024).toFixed(1);
                    this.errorMessage =
                        `Size file (${sizeMB}MB) over limit 2MB. \n Tip: Compress your file before upload at ${'https://www.iloveimg.com/id/kompres-gambar'}`;
                    this.clearPreview();
                    return;
                }

                // Baca dan tampilkan preview
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.preview = e.target.result;
                    this.fileName = file.name;
                };
                reader.readAsDataURL(file);
            },

            // Hapus gambar yang dipilih
            removeImage() {
                this.clearPreview();
                this.$refs.fileInput.value = '';
            },

            // Reset state preview
            clearPreview() {
                this.preview = null;
                this.fileName = '';
            }
        }
    }
</script>
