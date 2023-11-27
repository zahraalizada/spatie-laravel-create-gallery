<x-app-layout>
    <x-slot name="header"> {{$album->title}}</x-slot>

    <div class="container flex justify-between mx-auto mt-6 p-4 bg-white shadow-md rounded-lg">
        <div>
            <img src="{{$image->getUrl()}}">
        </div>
        <div class="mt-2 mb-4 p-2">
            <ul>
                <li>Collection Name: {{$image->collection_name}}</li>
                <li>Name: {{$image->name}}</li>
                <li>Mime type: {{$image->mime_type}}</li>
                <li>Size: {{$image->human_readable_size}}</li>
            </ul>

        </div>
    </div>

</x-app-layout>
