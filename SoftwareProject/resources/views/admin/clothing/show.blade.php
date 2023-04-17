@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Clothing Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!--alert-success is a component which I created using php artisan make:component alert-success
            have a look at the code in views/components/alert-success.blade.php -->
            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>

            <div class="flex">

                <a href="{{ route('admin.clothing.edit', $clothing) }}" class="btn-link ml-auto">Edit</a>
                <form action="{{ route('admin.clothing.destroy', $clothing) }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger ml-4" onclick="return confirm('Are you sure you want to delete?')">Delete </button>
            </div>
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td rowspan="6">
                                <!-- use the asset function, access the file $book->book_image in the folder storage/images -->
                                <img src="{{asset('storage/images/' . $clothing->clothing_image) }}" width="150" />
                            </td>
                        </tr>
                        <tr>
                            <td class="font-bold ">Title </td>
                            <td>{{ $clothing->title }}</td>
                        </tr>
                        @foreach ($clothing->colour as $colour)
                            <tr>
                                <td class="font-bold ">Colour </td>
                                <td> {{$colour->title }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="font-bold ">Category </td>
                            <td>{{ $clothing->category->name }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold ">Price </td>
                            <td>{{ $clothing->price }}</td>
                        </tr>
                        <tr>
                            <td class="font-bold">Description </td>
                            <td>{{ $clothing->description }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection