<x-app-layout>
    <x-slot name="header"> {{$video->title}}</x-slot>

    <div class="container mx-auto mt-6 p-4 bg-white shadow-md rounded-lg">
        <div class="space-y-8 divide-y divide-gray-200 w-1/2  ">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$video->video_url}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>









    </div>
</x-app-layout>
