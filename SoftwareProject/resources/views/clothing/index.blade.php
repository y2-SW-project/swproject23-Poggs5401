<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clothing') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('clothing.create') }}" class="btn-link btn-lg mb-2">Add a Piece of Clothing</a>
            @forelse ($clothing as $clothes)
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">

                    <h2 class="font-bold text-2xl">
                        <a href="{{ route('clothing.show', $clothes) }}">{{ $clothes->title }}</a>
                    </h2>
                    <p class="mt-2">
                        {{ $clothes->description }}
                        {{ $clothes->price }}
                    </p>

                </div>
            @empty
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">

                    <p>No Clothing.</p>

                </div>
            @endforelse
            <!-- This line of code simply adds the links for Pagination-->
            {{ $clothing->links() }}
        </div>
    </div>
</x-app-layout>
