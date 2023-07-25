<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Course') }}
        </h2>
    </x-slot>

    <div class="m-5 p-5 bg-white rounded shadow-lg">
        <form action="{{route("course.store")}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="relative z-0 w-full mb-6 group">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Image</label>
                <input name="image" required class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="image" type="file">
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Course Name</label>
                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=" " required />
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <label for="max" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Maximum Number Of Students</label>
                <input type="number" name="max" id="max" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=" " required />
            </div>
            <div class="relative z-0 w-full mb-6 group">
            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
            <select required id="category" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="" selected>Choose a Category</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tuition</label>
                <input type="text" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=" " required />
            </div>

            <button type="submit" class="text-white bg-green-800 hover:bg-green-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </div>


</x-app-layout>
