<x-app-layout>
    <x-slot name="header">
        <h2 class="flex justify-between items-center font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List Of Courses') }}
            <a href="{{route("course.create")}}" class="text-white bg-green-800 hover:bg-green-900 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create Course</a>
        </h2>
    </x-slot>

    <div class="m-5 p-5 shadow-lg rounded-lg bg-white">
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Course name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Max Number Of Students
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Image
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tuition
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($courses as $course)
                    <tr class="bg-white dark:bg-gray-800">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$course->name}}
                        </th>
                        <td class="px-6 py-4">
                            {{$course->max}}
                        </td>
                        <td class="px-6 py-4">
                            <img alt="image" width="100" src="{{asset("storage/images/".$course->image)}}">
                        </td>
                        <td class="px-6 py-4">
                            {{$course->category->name}}
                        </td>
                        <td class="px-6 py-4">
                            ${{$course->price}}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{route("course.edit",$course->id)}}" class="font-medium bg-green-800 hover:bg-green-900 px-4 py-2 rounded  text-white dark:text-blue-500 ">Edit</a>                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
