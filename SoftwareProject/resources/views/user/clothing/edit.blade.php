<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Clothing') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <!-- The route is books.update, this route defined in web.php calls BookController:update() function -->
                <form action="{{ route('clothing.update', $clothing) }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <x-text-input
                    type="text"
                    name="title"
                    field="title"
                    placeholder="Title..."
                    class="w-full"
                    :value="@old('title', $clothing->title)">
                   ></x-text-input>

                <x-text-input
                    type="text"
                    name="category"
                    field="category"
                    placeholder="Category..."
                    class="w-full mt-6"
                    :value="@old('category', $clothing->category)"></x-text-input>

                <x-textarea
                    name="description"
                    rows="10"
                    field="description"
                    placeholder="Description..."
                    class="w-full mt-6"
                    :value="@old('description', $clothing->description)"></x-textarea>

                <x-text-input
                    type="text"
                    name="price"
                    field="price"
                    placeholder="Price..."
                    class="w-full mt-6"
                    :value="@old('price',$clothing->price)"></x-text-input>

                <x-file-input
                    type="file"
                    name="clothing_image"
                    placeholder="Clothing"
                    class="w-full mt-6"
                    field="clothing_image">
                    :value="@old('clothing_image', $clothing->clothing_image)">
                </x-file-input>
               <x-primary-button class="mt-6">Update This Piece of Clothing</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
