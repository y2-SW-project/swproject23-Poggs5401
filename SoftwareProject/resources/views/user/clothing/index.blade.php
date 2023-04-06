<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clothing') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @forelse ($clothing as $clothes)
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <td rowspan="6">
                    <!-- use the asset function, access the file $book->book_image in the folder storage/images -->
                    <img src="{{ asset('storage/images/' . $clothes->clothing_image) }}" width="150" />
                </td>
                <h2 class="font-bold text-2xl">
                    <a href="{{ route('user.clothing.show', $clothes) }}">{{ $clothes->title }}</a>
                </h2>
                <p class="mt-2">

                <h3 class="font-bold text-1xl">
                    {{$clothes->category->name}}
                </h3>

                {{ $clothes->description }}
                {{ $clothes->price }}
                </p>

            </div>
            @empty
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">

                <p>No Clothing.</p>

            </div>
            @endforelse
        </div>
    </div>
</x-app-layout>