@props(['routeStore'])

@php
    $routeUpdate = route('projects.update', ['id' => 'ID']);
@endphp

<div x-show="$store.formProject.openForm" x-data="{ isLoading: false }"
    class="fixed inset-0 z-50 bg-black/50 flex items-center justify-center" {{ $attributes->merge(['class' => '']) }}>
    <div class="w-auto h-2/4 lg:w-2/6 px-3 py-4 bg-gray-800 border border-gray-600 rounded-md flex flex-col overflow-y-auto"
        style="scrollbar-width:thin; scrollbar-color: #374151 #f3f4f6;">
        <h3 class=" text-white/80 text-lg font-bold text-center mb-2" x-data
            x-text="$store.formProject.isEdit ? 'Edit Project' : 'Upload Your Project'">
        </h3>
        <p class="text-sm text-white/60 text-center mb-3" x-data
            x-text="$store.formProject.isEdit ? 'Update your project data.' : 'Upload your project and show up to your customer.'">
        </p>
        <hr class="border-white/10 border mb-2">
        <form method="POST" @submit="isLoading = true"
            :action="$store.formProject.isEdit ?
                '{{ $routeUpdate }}'.replace('ID', $store.formProject.formData.id) :
                '{{ $routeStore }}'"
            class="flex flex-col">

            @csrf
            <input type="hidden" name="_method" :value="$store.formProject.isEdit ? 'PUT' : 'POST'">

            <div class=" flex flex-col justify-start mb-2">
                <x-input-label value="Name"></x-input-label>
                <x-text-input id="name" name="name"
                    class=" outline-none w-full p-2 mt-2 bg-gray-700 text-white/80 border-gray-600"
                    placeholder="Enter the project name" autofocus required
                    x-model="$store.formProject.formData.name"></x-text-input>

                @error('name')
                    <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class=" flex flex-col justify-start mb-2">
                <x-input-label value="Description"></x-input-label>
                <x-textarea id="description" name="description" placeholder="Tell about your project!"
                    class=" mt-2 bg-gray-700 text-white/80 border-gray-600"
                    x-model="$store.formProject.formData.description" required></x-textarea>
                @error('description')
                    <p class="text-sm text-red-400 mt-1">{{ $message }}</p>
                @enderror
            </div>


            <div class="flex flex-col justify-start mb-2 select-text">
                <x-input-label value="Upload your project thumbnail" class=" mb-2"></x-input-label>

                <x-upload-thumbnail></x-upload-thumbnail>
            </div>


            <div class=" flex flex-col justify-start mb-2">
                <x-input-label value="Start date"></x-input-label>
                <p class="text-sm  text-white/60">Enter date where you receive this project.</p>

                <x-input-date type="date" name="start_date" id="startDate"
                    class="outline-none w-full mt-2 bg-gray-700 text-white/80 border-gray-600"></x-input-date>
            </div>

            <div class=" flex flex-col justify-start mb-2">
                <x-input-label value="End date"></x-input-label>
                <p class="text-sm  text-white/60">Enter date where you completed this project.</p>

                <x-input-date type="date" name="end_date" id="endDate"
                    class="outline-none w-full mt-2 bg-gray-700 text-white/80 border-gray-600"></x-input-date>
            </div>
            <div class=" flex flex-col justify-start mb-2">

                <x-input-label value="Is show?"></x-input-label>
                <p class="text-sm  text-white/60">Select the option to display your project or not.</p>
                <x-select-input id="isShow" name="is_show" class=" mt-2 text-white/80 bg-gray-700 border-gray-600"
                    required>
                    <option value="0">False</option>
                    <option value="1">True</option>
                </x-select-input>
            </div>

            <div class=" flex flex-col justify-start mb-3">

                <x-input-label value="Category project"></x-input-label>
                {{-- <p class="text-sm  text-white/60">Choose your category project</p> --}}
                <x-select-input id="category" name="category_id"
                    class=" mt-2 text-white/80 bg-gray-700 border-gray-600" required>
                    <option>Choose your category project</option>
                    <template x-for="(value, index) in $store.categories.collection">
                        <option :value="value.id" x-text="value.name"></option>
                    </template>
                </x-select-input>
            </div>
            <div class="flex items-center justify-center w-full">
                <x-primary-button type="button" class=" w-2/4 bg-gray-700 hover:bg-gray-600">
                    <p class=" text-white/80 text-sm font-bold text-center" x-data
                        @click="$store.formProject.closeFormEdit()">
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
                            x-text="$store.formProject.isEdit ? 'Save changes' : 'Add project'">
                    </template>
                </x-primary-button>
            </div>
        </form>
    </div>
</div>
