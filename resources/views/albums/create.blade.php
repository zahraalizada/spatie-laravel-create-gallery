<x-app-layout>
    <x-slot name="header"> Create Post</x-slot>

    <div class="container mx-auto mt-6 p-4 bg-white shadow-md rounded-lg">

        <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10 ">
            <form method="post" action="{{route('albums.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="sm:col-span-6">
                    <label for="title" class="block text-sm font-medium text-gray-700"> Post Title </label>
                    <div class="mt-1">
                        <input type="text" id="title" wire:model.lazy="title" name="title"
                               class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5"/>
                    </div>
                </div>

                <div class="sm:col-span-6 pt-5">
                    <button type="submit" class="bg-gray-800 text-white rounded-lg px-2 py-1 mt-2">
                        CREATE
                    </button>
                </div>
            </form>
        </div>


    </div>
</x-app-layout>
