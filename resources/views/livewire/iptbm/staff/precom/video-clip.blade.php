<x-card-panel title="Technology Video Clips">

{{---------------

    <div class="mt-4  space-y-2">
        <div>
            <x-pop-modal modal-title="Upload local video clip" static="true" name="authentication-modal-localVid" class="max-w-lg">
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

            <x-secondary-button data-modal-target="authentication-modal-localVid"
                                data-modal-toggle="authentication-modal-localVid"
                                class="text-sky-600 dark:text-sky-600">
                <svg class="text-sky-600 dark:text-sky-600 h-5 me-2" xmlns="http://www.w3.org/2000/svg"
                     fill="currentColor" viewBox="0 0 512 512">
                    <path
                        d="M0 96C0 60.7 28.7 32 64 32H448c35.3 0 64 28.7 64 64V280.4c-17-15.2-39.4-24.4-64-24.4H64c-24.6 0-47 9.2-64 24.4V96zM64 288H448c35.3 0 64 28.7 64 64v64c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V352c0-35.3 28.7-64 64-64zM320 416a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm128-32a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"/>
                </svg>

                Upload local video
            </x-secondary-button>

        </div>
        <div>
            <div wire:ignore.self data-modal-backdrop="static" id="authentication-modal-onlineVid" tabindex="-1"
                 aria-hidden="true"
                 class="fixed top-0 backdrop-blur-sm left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-3xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-gray-50 rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="authentication-modal-onlineVid">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="px-6 py-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Upload Embed Video
                                clip</h3>
                            <form class="space-y-6" wire:submit.prevent="uploadVideo">
                                <div>
                                    <x-input-label class="mb-3">
                                        <div>
                                            Video Description
                                        </div>
                                        <textarea placeholder="enter text here" wire:model.lazy="description"
                                                  class="border-gray-300 w-full dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"></textarea>
                                        <p class="text-sm font-normal text-gray-500 dark:text-gray-300"
                                           id="file_input_help">
                                            Max of 50 characters only
                                        </p>
                                        @error('description')
                                        <x-input-error :messages="$message"/>
                                        @enderror
                                    </x-input-label>
                                    <!-- File Input -->
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
                                        <x-text-input wire:model="onlineVideo" type="text"
                                                      placeholder="https://embedscript/sampleId" class="w-full"/>
                                    </x-input-label>
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">

                                        Please use the embed script of Youtube or Google Drive video
                                    </p>
                                    @error('onlineVideo')
                                    <div id="alert-border-2"
                                         class="flex items-center p-4 mb-4 text-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2"
                                         role="alert">
                                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                             viewBox="0 0 20 20">
                                            <path
                                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                        </svg>
                                        <div class="ml-3 text-sm font-medium">
                                            {{$message}}
                                        </div>
                                    </div>

                                    @enderror
                                    <div wire:loading wire:target="onlineVideo">
                                        <div x-show="isUploading">
                                            <progress max="100" x-bind:value="progress"></progress>
                                        </div>
                                    </div>


                                </div>
                                <button wire:loading wire:target="onlineVideo"
                                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Processing...
                                </button>
                                <button wire:loading.remove wire:target="onlineVideo" type="submit"
                                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Upload video
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <x-secondary-button data-modal-target="authentication-modal-onlineVid"
                                data-modal-toggle="authentication-modal-onlineVid"
                                class="flex justify-start item-center md:justify-center text-sky-600  dark:text-sky-600">
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
            </x-secondary-button>

        </div>
    </div>
----------------}}

    <ul class="divide-y divide-gray-400 dark:divide-gray-600 mt-10 ">
        @foreach($precom->video as $key=>$video)

            <!-- Main modal -->

            <li >
               <div class="py-4">
                   <div class="aspect-video flex text-white justify-center items-center group bg-gray-900 dark:bg-gray-950 rounded relative">
                       <div class="space-y-3 hidden group-hover:block">
                           <a href="{{route('rtms.file.viewer.iptbm',[
                                                'type'=>$video->type,
                                                'file'=>$video->url,
                                                'home'=>route('iptbm.staff.precom.details',['id'=>$precom->id]),
                                                ])}}">
                               <div class="border text-center hover:scale-110 transition duration-300 justify-center items-center flex gap-1 w-full rounded-full px-2 py-1 border-gray-200 dark:border-gray-700">
                                   <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                       <path fill-rule="evenodd" d="M8.6 5.2A1 1 0 0 0 7 6v12a1 1 0 0 0 1.6.8l8-6a1 1 0 0 0 0-1.6l-8-6Z" clip-rule="evenodd"/>
                                   </svg>

                                   <div>
                                       Play video
                                   </div>
                               </div>
                           </a>

                       </div>
                       <div class="rounded-full group-hover:hidden flex justify-center items-center border border-gray-200 dark:border-gray-700 border-white  px-4 py-1">
                           @if($video->type==='local')
                               <svg class="w-6 h-6 me-2 text-sky-600 dark:text-sky-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                   <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M10 3v4c0 .6-.4 1-1 1H5m14-4v16c0 .6-.4 1-1 1H6a1 1 0 0 1-1-1V8c0-.4.1-.6.3-.8l4-4 .6-.2H18c.6 0 1 .4 1 1ZM9 12h2c.6 0 1 .4 1 1v2c0 .6-.4 1-1 1H9a1 1 0 0 1-1-1v-2c0-.6.4-1 1-1Zm5.7 2.4v-.7l1.3-1.3v3l-1.3-1Z"/>
                               </svg>
                               <div>
                                   Local video
                               </div>
                           @else
                               @if(parse_url($video->url)['host']==='www.youtube.com')
                                   <svg class="w-6 h-6 me-2 text-red-500 dark:text-red-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                       <path fill-rule="evenodd" d="M21.7 8c0-.7-.4-1.3-.8-2-.5-.5-1.2-.8-2-.8C16.2 5 12 5 12 5s-4.2 0-7 .2c-.7 0-1.4.3-2 .9-.3.6-.6 1.2-.7 2l-.2 3.1v1.5c0 1.1 0 2.2.2 3.3 0 .7.4 1.3.8 2 .6.5 1.4.8 2.2.8l6.7.2s4.2 0 7-.2c.7 0 1.4-.3 2-.9.3-.5.6-1.2.7-2l.2-3.1v-1.6c0-1 0-2.1-.2-3.2ZM10 14.6V9l5.4 2.8-5.4 2.8Z" clip-rule="evenodd"/>
                                   </svg>
                               @else
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
                               @endif
                               <div>
                                   Online video
                               </div>
                           @endif
                       </div>
                   </div>

                   <div class=" pt-2">
                       {{$video->description}}
                   </div>
               </div>
            </li>

        @endforeach
    </ul>
</x-card-panel>


@push('scripts')
    <script type="text/javascript">
        document.addEventListener('livewire:load', function () {
            let precom =@json($precom['video']);
            precom.forEach(val => {
                let video = document.getElementById('video' + val.id)
                let videoIframe = document.getElementById('videoIframe' + val.id)
                document.getElementById('botVideo' + val.id).addEventListener('click', function () {


                    if (videoIframe) {

                        videoIframe.src = videoIframe.src + '?mute=1'
                    }
                    if (video) {
                        video.pause();
                    }

                })
            })
        });
    </script>
@endpush
