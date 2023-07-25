<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>StriveForAPlus</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-gray-200">
    <div class=" flex justify-between gap-2 py-5 pr-5">
        <div class="text-3xl font-bold text-green-800 py-2 px-4 rounded-lg">
            Strive<span class="text-red-600">For</span><span class="text-green-600">A</span><span class="text-yellow-600">Plus</span>
        </div>
        <div class="flex justify-end gap-4">
            <div>
                <a href="{{ route('login') }}" class="text-gray-900  font-xl rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Login</a>
            </div>
            <diiv>
                <a href="{{ route('register') }}" class="focus:outline-none text-gray-900 font-xl rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Register</a>
            </diiv>
        </div>
    </div>
    <div class="mx-20">
        <form action="{{route("filtered")}}" method="GET">
            @csrf
            <div class="flex gap-3 justify-start">
                <div>
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 ">Category</label>
                    <select id="countries" name="category_id" class="bg-gray-50 w-52 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" selected>Choose a Category</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900">Tutor</label>
                    <select id="countries" name="user_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-52 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" selected>Choose a Tutor</option>
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="countries" class="block mb-2 text-sm font-medium text-gray-900">Sort By</label>
                    <select id="countries" name="orderBy" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-52 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="desc" selected> Latest</option>
                        <option value="asc">Oldest</option>
                    </select>
                </div>

                <div class="flex items-end">
                    <button type="submit" class="text-white bg-green-800 hover:bg-green-900 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Filter</button>
                    <a href="{{route("/")}}" class="text-white bg-green-800 hover:bg-green-900 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Clear</a>
                </div>
            </div>
        </form>
    </div>

<div class="grid grid-cols-3 m-20">

    @foreach($courses as $course)
        <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow-md p-6">
            <img class="mx-auto h-32 w-32 rounded-full mb-4" alt="Course Image" src="{{ asset("storage/images/".$course->image) }}">
            <div class="text-center">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ $course->name }}</h2>
                <p class="text-gray-600 mb-2">Category: {{ $course->category->name }}</p>
                <p class="text-gray-600 mb-2">Size: {{ $course->max }}</p>
                <p class="text-gray-600 mb-2">Tutor: {{ $course->user->name }}</p>
                <p class="text-2xl font-bold text-gray-800 mb-4">${{ $course->price }}</p>
            </div>
        </div>
    @endforeach
</div>


    </body>
</html>
