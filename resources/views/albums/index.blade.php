<x-app-layout>
    <x-slot name="header"> Albums</x-slot>

    <div class="container mx-auto mt-6 p-4">
        <div class="w-full m-2 p-2">
            <a href="{{route('albums.create')}}" class="font-semibold text-white bg-gray-500 rounded-lg p-2">Create </a>
        </div>

        <div class="-my-2 overflow-x-auto sm:-mx-12 lg:-mx-8">
            <div class="py-2 align-middle inline-block w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50 dark:bg-gray-600 dark:text-gray-200">
                        <tr>
                            <th scope="col"
                                class="p-4 text-start text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                Id
                            </th>
                            <th scope="col"
                                class="p-4 text-start text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                Title
                            </th>
                            <th scope="col"
                                class="p-4 text-right text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                Manage
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($albums as $album)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{$album->id}}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{route('albums.show', $album->id) }}" class="text-indigo-700 font-semibold hover:text-gray-500">{{$album->title}}</a>
                                </td>
                                <td class="px-6 py-4 text-right text-sm">
                                    <div class="flex justify-end items-center">
                                        <a href="{{route('albums.edit',$album->id)}}" class="bg-gray-500 hover:bg-gray-700 py-1 px-2 mr-1 text-white rounded-lg">Edit</a>
                                        <form method="POST" action="{{route('albums.destroy',$album->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button href="{{route('albums.destroy',$album->id)}}" class="bg-red-600 hover:bg-red-500  py-1 px-2 text-white rounded-lg">Delete</button>

                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        <!-- More items... -->
                        </tbody>
                    </table>
                    <div class="m-2 p-2">Pagination</div>
                </div>
            </div>
        </div>


    </div>
</x-app-layout>
