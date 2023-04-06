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
            @forelse ($categories as $category)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class="font-bold text-2xl">
                    <a href="{{ route('user.category.show', $category) }}"> <strong> Category ID </strong> {{ $category->id }}</a>
                    </h2>
                    <p class="mt-2">

                        <h3> <strong> Category Title </strong>
                        {{$category->name}} </h3>

                    </p>
                </div>
            @empty
            <p>No Categories Found</p>
            @endforelse
        </div>
    </div>
</x-app-layout>