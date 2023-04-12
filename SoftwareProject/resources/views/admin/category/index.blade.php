<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Clothing Categories') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>
            <a href="{{ route('admin.category.create') }}" class="btn-link btn-lg mb-2">Add a Category</a>
            @forelse ($category as $category)

            <a href="{{ route('admin.category.show', $category) }}">
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <p class="font-bold text-2xl">
                    <h2> <strong> Category Title -</strong>
                        {{$category->name}}
                    </h2>
                    </p>    
                </div>
            </a>

            @empty
            <p>No Categories Found</p>
            @endforelse
        </div>
    </div>
</x-app-layout>