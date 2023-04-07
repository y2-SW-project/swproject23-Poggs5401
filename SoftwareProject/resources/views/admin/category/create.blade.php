<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add a Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <x-text-input type="text" name="name" field="name" placeholder="Name..." class="w-full" autocomplete="off" :value="@old('name')"></x-text-input>

                    <x-textarea name="description" rows="10" field="description" placeholder="Description..." class="w-full mt-6" :value="@old('description')">
                    </x-textarea>

                    <x-file-input type="file" name="category_image" placeholder="Category Image..." class="w-full mt-6" field="category_image">
                    </x-file-input>
                    <x-primary-button class="mt-6">Save this Category</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>