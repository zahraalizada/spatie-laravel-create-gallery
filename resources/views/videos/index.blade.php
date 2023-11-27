<x-app-layout>
    <x-slot name="header"> Video</x-slot>

    <div class="container mx-auto mt-6 p-4">
        <div class="w-full m-2 p-2">
            <a href="{{route('videos.create')}}" class="font-semibold text-white bg-gray-500 rounded-lg p-2">Create </a>
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
                                class="p-4 text-start text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                Video
                            </th>
                            <th scope="col"
                                class="p-4 text-right text-xs font-medium text-gray-500 dark:text-gray-200 uppercase tracking-wider">
                                Manage
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($videos as $video)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{$video->id}}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a class="text-indigo-700 font-semibold hover:text-gray-500 videoPopup"
                                       data-video-url="{{$video->video_url}}"
                                       href="">{{$video->title}}</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div>
                                        <img style="width: 250px; height: 150px" src="http://img.youtube.com/vi/{{$video->video_url}}/mqdefault.jpg" />
                                    </div>
                                </td>

                                <td class="px-6 py-4 text-right text-sm">
                                    <div class="flex justify-end items-center">
                                        <a href="{{route('videos.show',$video->id)}}"
                                           class="bg-gray-500 hover:bg-gray-700 py-1 px-2 mr-1 text-white rounded-lg">Show</a>
                                        <a href="{{route('videos.edit',$video->id)}}"
                                           class="bg-gray-500 hover:bg-gray-700 py-1 px-2 mr-1 text-white rounded-lg">Edit</a>
                                        <form method="POST" action="{{route('videos.destroy',$video->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <button href="{{route('videos.destroy',$video->id)}}"
                                                    class="bg-red-600 hover:bg-red-500  py-1 px-2 text-white rounded-lg">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="m-2 p-2">Pagination</div>
                </div>
            </div>
        </div>


    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body videoModal">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $( document ).ready(function() {


                $('.videoPopup').on('click',function (e){
                    e.preventDefault();
                    var videoId = $(this).data('video-url');
                    var iframeUrl = "https://www.youtube.com/embed/"+videoId;
                    console.log(videoId,iframeUrl)
                    $('#videoIframe').attr('src',iframeUrl);

                    $(".videoModal iframe").remove();
                    $('<iframe width="420" height="315" frameborder="0" allowfullscreen></iframe>')
                        .attr("src", "http://www.youtube.com/embed/" + videoId)
                        .appendTo(".videoModal");

                    $("#exampleModal").modal('show')
                })
            });
        </script>


    @endpush
</x-app-layout>
