@extends('layouts.app')
<link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clothing') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('admin.clothing.create') }}" class="btn-link btn-lg mb-2">Add a Piece of Clothing</a>
            @forelse ($clothing as $clothes)
            <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                <td rowspan="6">
                    <img src="{{ asset('storage/images/' . $clothes->clothing_image) }}" width="150" />
                </td>
                <h2 class="font-bold text-2xl">
                    <a href="{{ route('admin.clothing.show', $clothes) }}">{{ $clothes->title }}</a>
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
    @endsection