<x-card-panel title="Technology Video Clips">
    <div class="space-y-2">
        <div>

            <x-pop-modal modal-title="Upload local video clip" static="true" name="localVidUpload" class="max-w-lg">
                <form class="space-y-6" wire:submit.prevent="saveLocalVideo">
                    <div class="space-y-4">
                        <div>
                            <x-input-label value="Video description"/>
                            <x-text-box wire:model.lazy="description" placeholder="enter text here"/>
                            <p class="text-sm font-normal text-gray-500 dark:text-gray-300"
                               id="file_input_help">
                                Max of 50 characters only
                            </p>
                            <x-input-error :messages="$errors->get('description')"/>
                        </div>
                        <div>


                            <div
                                x-data="{ isUploading: false, progress: 0 }"
                                x-on:livewire-upload-start="isUploading = true"
                                x-on:livewire-upload-finish="isUploading = false"
                                x-on:livewire-upload-error="isUploading = false"
                                x-on:livewire-upload-progress="progress = $event.detail.progress"
                            >
                                <!-- File Input -->
                                <x-input-label value="Upload file"/>
                                <x-text-input wire:model="localVideo" type="file" class="w-full"
                                              accept="video/mp4,avi,mov" max="2000"/>
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300"
                                   id="file_input_help">
                                    MP4,AVI,MOV (MAX. 20mb).</p>
                                <x-input-error :messages="$errors->get('localVideo')"/>
                                <div wire:loading wire:target="localVideo">
                                    <div x-show="isUploading">
                                        <progress max="100" x-bind:value="progress"></progress>
                                    </div>
                                </div>
                                <!-- Progress Bar -->

                            </div>

                        </div>
                    </div>
                    <div>
                        <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveLocalVideo">
                            <div class="w-full p-2 text-center" wire:loading.remove wire:target="saveLocalVideo">
                                Upload video
                            </div>
                            <div class="w-full p-2 text-center" wire:loading wire:target="saveLocalVideo">
                                Processing...
                            </div>
                        </x-submit-button>
                    </div>
                </form>
            </x-pop-modal>
            <button data-modal-toggle="localVidUpload" class="w-full hover:bg-gray-200 hover:dark:bg-gray-900 transition duration-300 border rounded-full px-4 flex justify-center items-center py-2 border-gray-200 dark:border-gray-700">
                <svg class="text-sky-600 dark:text-sky-600 h-5 me-2" xmlns="http://www.w3.org/2000/svg"
                     fill="currentColor" viewBox="0 0 512 512">
                    <path
                        d="M0 96C0 60.7 28.7 32 64 32H448c35.3 0 64 28.7 64 64V280.4c-17-15.2-39.4-24.4-64-24.4H64c-24.6 0-47 9.2-64 24.4V96zM64 288H448c35.3 0 64 28.7 64 64v64c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V352c0-35.3 28.7-64 64-64zM320 416a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm128-32a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"/>
                </svg>

                Upload local video
            </button>
        </div>
        <div>
            <x-pop-modal modal-title="Upload Embed videos" static="true" name="onlineVideo" class="max-w-2xl">
                <form class="space-y-6" wire:submit.prevent="uploadVideo">
                    <div class="space-y-4">
                        <div>
                            <x-input-label value="Video Description"/>
                            <x-text-box required placeholder="enter text here" wire:model.lazy="description" />
                            <x-sub-label>
                                Max of 50 characters only
                            </x-sub-label>
                            <x-input-error :messages="$errors->get('description')"/>
                        </div>
                       <div>
                           <x-input-label>
                               <div class="justify-start mb-1 w-fit flex items-center">
                                   <svg class="w-6 h-6 m-auto" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 461.001 461.001" xml:space="preserve"><g>
                                           <path style="fill:#F61C0D;"
                                                 d="M365.257,67.393H95.744C42.866,67.393,0,110.259,0,163.137v134.728c0,52.878,42.866,95.744,95.744,95.744h269.513c52.878,0,95.744-42.866,95.744-95.744V163.137C461.001,110.259,418.135,67.393,365.257,67.393z M300.506,237.056l-126.06,60.123c-3.359,1.602-7.239-0.847-7.239-4.568V168.607c0-3.774,3.982-6.22,7.348-4.514l126.06,63.881C304.363,229.873,304.298,235.248,300.506,237.056z"/>
                                       </g></svg>
                                   <svg class="w-6 m-auto h-6 mx-2" viewBox="0 -3 48 48" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg"
                                   >

                                       <title>drive-color</title>
                                       <desc>Created with Sketch.</desc>
                                       <defs>

                                       </defs>
                                       <g id="Icons" stroke="none" stroke-width="1" fill="none"
                                          fill-rule="evenodd">
                                           <g id="Color-" transform="translate(-601.000000, -955.000000)">
                                               <g id="drive" transform="translate(601.000000, 955.000000)">
                                                   <polygon id="Shape" fill="#3777E3"
                                                            points="8.00048064 42 15.9998798 28 48 28 39.9998798 42">

                                                   </polygon>
                                                   <polygon id="Shape" fill="#FFCF63"
                                                            points="32.0004806 28 48 28 32.0004806 0 15.9998798 0">

                                                   </polygon>
                                                   <polygon id="Shape" fill="#11A861"
                                                            points="0 28 8.00048064 42 24 14 15.9998798 0">

                                                   </polygon>
                                               </g>
                                           </g>
                                       </g>
                                   </svg>
                               </div>
                           </x-input-label>
                           <x-text-input wire:model="onlineVideo" type="text" class="w-full"  placeholder="https://embedscript/sampleId"/>
                           <x-sub-label>
                               Please use the embed script of YouTube or Google Drive videos
                           </x-sub-label>
                           <x-input-error :messages="$errors->get('onlineVideo')"/>
                       </div>

                    </div>
                    <div>
                        <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="onlineVideo">
                            <div class="p-2 w-full text-center" wire:loading.remove wire:target="onlineVideo">
                                Save video
                            </div>
                            <div class="p-2 w-full text-center" wire:loading wire:target="onlineVideo">
                                Processing
                            </div>
                        </x-submit-button>
                    </div>


                </form>
            </x-pop-modal>
            <button data-modal-toggle="onlineVideo" class="w-full hover:bg-gray-200 hover:dark:bg-gray-900 transition duration-300 border rounded-full px-4 flex justify-center items-center py-2 border-gray-200 dark:border-gray-700">
                <svg class="w-5 h-5 " id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 461.001 461.001" xml:space="preserve">
                        <g>
                            <path style="fill:#F61C0D;"
                                  d="M365.257,67.393H95.744C42.866,67.393,0,110.259,0,163.137v134.728c0,52.878,42.866,95.744,95.744,95.744h269.513c52.878,0,95.744-42.866,95.744-95.744V163.137C461.001,110.259,418.135,67.393,365.257,67.393z M300.506,237.056l-126.06,60.123c-3.359,1.602-7.239-0.847-7.239-4.568V168.607c0-3.774,3.982-6.22,7.348-4.514l126.06,63.881C304.363,229.873,304.298,235.248,300.506,237.056z"/>
                        </g>
                    </svg>
                <svg class="w-5 h-5 mx-2" viewBox="0 -3 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg">

                    <title>drive-color</title>
                    <desc>Created with Sketch.</desc>
                    <defs>

                    </defs>
                    <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Color-" transform="translate(-601.000000, -955.000000)">
                            <g id="drive" transform="translate(601.000000, 955.000000)">
                                <polygon id="Shape" fill="#3777E3"
                                         points="8.00048064 42 15.9998798 28 48 28 39.9998798 42">

                                </polygon>
                                <polygon id="Shape" fill="#FFCF63"
                                         points="32.0004806 28 48 28 32.0004806 0 15.9998798 0">

                                </polygon>
                                <polygon id="Shape" fill="#11A861" points="0 28 8.00048064 42 24 14 15.9998798 0">

                                </polygon>
                            </g>
                        </g>
                    </g>
                </svg>

                Upload embed url
            </button>
        </div>
    </div>
    <div class="mt-10">
        <label class="font-medium">
            Uploaded videos
        </label>
        <ul class="mt-2 divide-y divide-gray-200 dark:divide-gray-600" >
            @forelse($precom->video as $video)
                <li>
                    <div class="p-2 ">

                        <div class="w-full aspect-video bg-gray-950 rounded-lg flex justify-center items-center group">
                            <div class="border rounded-full px-4 py-2  group-hover:hidden transition duration-300">

                                <div class="flex justify-center items-center gap-2">
                                    @if($video->type==='local')
                                        <div>
                                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 4H5a1 1 0 0 0-1 1v14c0 .6.4 1 1 1h14c.6 0 1-.4 1-1V5c0-.6-.4-1-1-1Zm0 0-4 4m5 0H4m1 0 4-4m1 4 4-4m-4 7v6l4-3-4-3Z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            Local video
                                        </div>
                                    @else
                                        <div class="flex gap-1">
                                            <svg class="w-5 h-5 " id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                                 viewBox="0 0 461.001 461.001" xml:space="preserve">
                        <g>
                            <path style="fill:#F61C0D;"
                                  d="M365.257,67.393H95.744C42.866,67.393,0,110.259,0,163.137v134.728c0,52.878,42.866,95.744,95.744,95.744h269.513c52.878,0,95.744-42.866,95.744-95.744V163.137C461.001,110.259,418.135,67.393,365.257,67.393z M300.506,237.056l-126.06,60.123c-3.359,1.602-7.239-0.847-7.239-4.568V168.607c0-3.774,3.982-6.22,7.348-4.514l126.06,63.881C304.363,229.873,304.298,235.248,300.506,237.056z"/>
                        </g>
                    </svg>
                                            <svg class="w-5 h-5 mx-2" viewBox="0 -3 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg">

                                                <title>drive-color</title>
                                                <desc>Created with Sketch.</desc>
                                                <defs>

                                                </defs>
                                                <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g id="Color-" transform="translate(-601.000000, -955.000000)">
                                                        <g id="drive" transform="translate(601.000000, 955.000000)">
                                                            <polygon id="Shape" fill="#3777E3"
                                                                     points="8.00048064 42 15.9998798 28 48 28 39.9998798 42">

                                                            </polygon>
                                                            <polygon id="Shape" fill="#FFCF63"
                                                                     points="32.0004806 28 48 28 32.0004806 0 15.9998798 0">

                                                            </polygon>
                                                            <polygon id="Shape" fill="#11A861" points="0 28 8.00048064 42 24 14 15.9998798 0">

                                                            </polygon>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                        <div>
                                            Embed/Online video
                                        </div>
                                    @endif

                                </div>
                            </div>
                            <div class="hidden text-lg space-y-4 font-medium group-hover:block transition duration-300">
                                <a href="{{route('rtms.file.viewer',[
                                                'type'=>$video->type,
                                                'file'=>$video->url,
                                                'home'=>route('abh.staff.commercialization.precom.details',['precom'=>$precom->id]),
                                                'base_layout'=>\App\View\Components\abh\AbhLayout::class
                                                ])}}"  class="flex hover:scale-110 transition duration-300 hover:text-white">
                                    <div class="flex gap-2">

                                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M8.6 5.2A1 1 0 0 0 7 6v12a1 1 0 0 0 1.6.8l8-6a1 1 0 0 0 0-1.6l-8-6Z" clip-rule="evenodd"/>
                                        </svg>

                                        Play Video
                                    </div>
                                </a>
                                <div class=" gap-2">
                                    <x-pop-modal class="max-w-md" :with-close="false" name="deleteVid-{{$video->id}}">
                                        <div class="text-center">
                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                 aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                 viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                      stroke-width="2"
                                                      d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                            </svg>

                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you
                                                sure you want to delete this video?</h3>
                                            <button wire:loading.remove wire:target="deleteVideo"
                                                    wire:click.prevent="deleteVideo({{$video}})" type="button"
                                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                Yes, I'm sure
                                            </button>
                                            <button wire:loading wire:target="deleteVideo" type="button"
                                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                Processing...
                                            </button>
                                            <button data-modal-hide="deleteVid-{{$video->id}}" type="button"
                                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                No, cancel
                                            </button>
                                        </div>
                                    </x-pop-modal>
                                    <button data-modal-toggle="deleteVid-{{$video->id}}" class="hover:scale-110 hover:text-red-600 transition flex duration-300">
                                        <svg class="w-6 h-6 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                        </svg>
                                        Delete Video
                                    </button>

                                </div>

                            </div>
                        </div>
                        <div class="mt-2 font-medium mb-4">
                            {{$video->description}}
                        </div>


                    </div>

                </li>
            @empty
                <li>
                    No videos uploaded
                </li>
            @endforelse


        </ul>
    </div>
</x-card-panel>
