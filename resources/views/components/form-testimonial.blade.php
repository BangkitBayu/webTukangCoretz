@props(['routeStore'])

@php
    $routeUpdate = route('testimonial.update', ['id' => 'ID']);
@endphp

<div :class="$store.formTestimonial.show === false ? 'hidden' : 'flex'" x-data="{ isLoading: false }"
    class="fixed inset-0 z-50 bg-black/50 flex items-center justify-center" {{ $attributes->merge(['class' => '']) }}>
    <div class="w-auto h-2/4 lg:w-2/6 px-3 py-4 bg-gray-800 border border-gray-600 rounded-md flex flex-col overflow-y-auto"
        style="scrollbar-width:thin; scrollbar-color: #374151 #f3f4f6;">
        <h3 class=" text-white/80 text-lg font-bold text-center mb-2" x-data
            x-text="$store.formTestimonial.isEdit ? 'Edit Testimonial' : 'Create New Testimonial'">
        </h3>
        <p class="text-sm text-white/60 text-center mb-3" x-data
            x-text="$store.formTestimonial.isEdit ? 'Update your testimonial data' : 'Ask for feedback from customers on your work, then fill in the data below!'">
        </p>
        <hr class="border-white/10 border mb-2">
        <form method="POST" @submit="isLoading = true"
            :action="$store.formTestimonial.isEdit ?
                '{{ $routeUpdate }}'.replace('ID', $store.formTestimonial.formData.id) :
                '{{ $routeStore }}'"
            class="flex flex-col">

            @csrf
            <input type="hidden" name="_method" :value="$store.formTestimonial.isEdit ? 'PUT' : 'POST'">
            <div class=" flex flex-col justify-start mb-2">
                <x-input-label :value="'Name'"></x-input-label>
                <x-text-input id="name" name="name"
                    class=" outline-none w-full p-2 mt-2 bg-gray-700 text-white/80 border-gray-600"
                    placeholder="Enter the customer name" autofocus required
                    x-model="$store.formTestimonial.formData.name"></x-text-input>

                @error('name')
                    <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class=" flex flex-col justify-start mb-2">
                <x-input-label :value="'Position'"></x-input-label>
                <x-text-input id="position" name="position"
                    class=" outline-none w-full p-2 mt-2 bg-gray-700 text-white/80 border-gray-600"
                    placeholder="Enter the customer's job position, e.g., Karyawan" required
                    x-model="$store.formTestimonial.formData.position"></x-text-input>
                @error('position')
                    <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class=" flex flex-col justify-start mb-2">
                <x-input-label :value="'Comment'"></x-input-label>
                <x-textarea id="comment" name="comment" placeholder="Enter the customer feedback"
                    class=" mt-2 bg-gray-700 text-white/80 border-gray-600"
                    x-model="$store.formTestimonial.formData.comment" required></x-textarea>
                @error('comment')
                    <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class=" flex flex-col justify-start mb-2">
                <x-input-label :value="'Rating'"></x-input-label>
                <p class="text-sm mt-1 text-white/60">Customer rating at 0-5.</p>
                <x-text-input id="rating" name="rating" type="number" max="5" min="0"
                    class=" outline-none w-full p-2 mt-2 bg-gray-700 text-white/80 border-gray-600" required
                    x-model="$store.formTestimonial.formData.rating"></x-text-input>

                @error('rating')
                    <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class=" flex flex-col justify-start mb-4">
                <x-input-label :value="'Is Show?'"></x-input-label>
                <p class="text-sm mt-1 text-white/60">Select the option to display your testimonial or not.</p>
                <x-select-input id="isShow" name="isShow" class=" mt-2 text-white/80 bg-gray-700 border-gray-600"
                    required x-model="$store.formTestimonial.formData.isShow">
                    <option value="0">False</option>
                    <option value="1">True</option>
                </x-select-input>

                @error('isShow')
                    <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-center w-full">
                <x-primary-button type="button" class=" w-2/4 bg-gray-700 hover:bg-gray-600">
                    <p class=" text-white/80 text-sm font-bold text-center" x-data
                        @click="$store.formTestimonial.closeFormEdit()">
                        Cancel</p>
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
                            x-text="$store.formTestimonial.isEdit ? 'Save changes' : 'Add testimonials'">
                    </template>
                </x-primary-button>
            </div>
        </form>
    </div>
</div>
