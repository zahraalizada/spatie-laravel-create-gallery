<x-app-layout>
    <x-slot name="header"> {{$album->title}}</x-slot>

    <div class="container mx-auto mt-6 p-4 bg-white shadow-md rounded-lg">
        <div class="space-y-8 divide-y divide-gray-200 w-1/2  ">
            <form  method="POST" action="{{route('albums.upload',$album->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="sm:col-span-6">
                    <label for="title" class="block text-sm font-medium text-gray-700"> Album Image </label>
                    <div class="mt-1">
                        <input type="file" id="image" name="image"
                               class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5"/>
                    </div>
                </div>
                <div class="sm:col-span-6 pt-5">
                    <button class="bg-red-500 py-2 px-2 rounded-lg text-white font-semibold">Upload</button>
                </div>
            </form>
        </div>
        <div class="mt-4">
            <div class="grid md:grid-cols-2 gap-4">
                @foreach($photos as $photo)
                    <div class="hover:bg-gray-100 rounded">
                        <a class="block relative h-56 rounded overflow-hidden">
                            <img
                                alt="gallery"
                                src="{{$photo->getUrl('thumb')}}">
                        </a>
                        <div class="flex justify-between items-center">
                            <a class="mt-2 p-2 bg-gray-500 hover:bg-gray-700 text-white rounded"
                               href="{{route('album.image.show', [$album->id, $photo->id])}}">
                                Full image
                            </a>
                            <form method="POST" action="{{route('album.image.destroy',[$album->id,$photo->id])}}">
                                @csrf
                                @method('DELETE')
                                <button href="{{route('albums.destroy',$album->id)}}" class="bg-red-700 hover:bg-red-500 py-1 px-2 text-white rounded-lg">Delete</button>

                            </form>
                        </div>

                    </div>

                @endforeach
            </div>
        </div>

    </div>
</x-app-layout>
