@props(['routeStore', 'routeEdit'])

<div :class="$store.formTestimonial.show === false ? 'hidden' : 'flex'"
    class="fixed inset-0 z-50 bg-black/50 items-center justify-center" {{ $attributes->merge(['class' => '']) }}>
    <div class="w-auto h-2/4 lg:w-2/6 px-3 py-4 bg-gray-800 border border-gray-600 rounded-md flex flex-col overflow-y-auto"
        style="scrollbar-width:thin; scrollbar-color: #374151 #f3f4f6;">
        <h3 class=" text-white/80 text-lg font-bold text-center mb-2"
            x-text="isEdit ? 'Edit Testimonial' : 'Create New Testimonial'">
        </h3>
        <p class="text-sm text-white/60 text-center mb-3"
            x-text="isEdit ? '' : 'Ask for feedback from customers on your work, then fill in the data below!'"></p>
        <hr class="border-white/10 border mb-2">
        <form :action="isEdit ? '{{ $routeStore }}' : '{{ $routeEdit }}'" class="flex flex-col"
            x-data="{ isLoading: false }" @submit="isLoading = true">
            @csrf
            <div class=" flex flex-col justify-start mb-2">
                <x-input-label :value="'Name'"></x-input-label>
                <x-text-input class=" outline-none w-full p-2 mt-2 bg-gray-700 text-white/80 border-gray-600"
                    placeholder="Enter the customer name"></x-text-input>

                {{-- <x-input-error></x-input-error> --}}
            </div>
            <div class=" flex flex-col justify-start mb-2">
                <x-input-label :value="'Position'"></x-input-label>
                <x-text-input class=" outline-none w-full p-2 mt-2 bg-gray-700 text-white/80 border-gray-600"
                    placeholder="Enter the customer's job position, e.g., Karyawan"></x-text-input>
            </div>
            <div class=" flex flex-col justify-start mb-2">
                <x-input-label :value="'Comment'"></x-input-label>
                <x-textarea placeholder="Enter the customer feedback"
                    class=" mt-2 bg-gray-700 text-white/80 border-gray-600"></x-textarea>
            </div>

            <div class=" flex flex-col justify-start mb-2">
                <x-input-label :value="'Rating'"></x-input-label>
                <p class="text-sm mt-1 text-white/60">Customer rating at 1-5.</p>
                <x-text-input type="number" max="5" min="0"
                    class=" outline-none w-full p-2 mt-2 bg-gray-700 text-white/80 border-gray-600"></x-text-input>
            </div>

            <div class=" flex flex-col justify-start mb-4">
                <x-input-label :value="'Is Show?'"></x-input-label>
                <p class="text-sm mt-1 text-white/60">Select the option to display your testimonial or not.</p>
                <x-select-input class=" mt-2 text-white/80 bg-gray-700 border-gray-600">
                    <option value="0">False</option>
                    <option value="1">True</option>
                </x-select-input>
            </div>

            <div class="flex items-center justify-center w-full">
                <x-primary-button type="button" class=" w-2/4 bg-gray-700 hover:bg-gray-600">
                    <p class=" text-white/80 text-sm font-bold text-center" @click="$store.formTestimonial.toggle()">
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
                        <p class=" text-white/80 text-sm font-bold text-center"
                            x-text="isEdit ? 'Save changes' : 'Add testimonials'">
                    </template>
                </x-primary-button>
            </div>
        </form>
    </div>
</div>
