<div class="mx-4 px-4">
   <h1 class="text-xl font-bold text-gray-600 dark:text-gray-400">
       Add new IP-TBM Technology
   </h1>

    <form  wire:submit.prevent="submit">
        <div class="w-full   mt-4 mb-3 rounded-lg p-4 shadow-lg border-l relative border-r border-t border-b border-gray-200 bg-white  shadow-black shadow-md dark:bg-gray-800 dark:border-gray-600">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="justify-center items-center ">
                    <div class="m-auto w-full mb-4">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            <h1 class="text-xl text-gray-600 dark:text-gray-300 ">
                                 Title
                            </h1>
                        </label>
                        <textarea wire:model="title" id="title" rows="5" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border-l  border-r border-t border-b border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                  placeholder="Enter technology title here..."></textarea>
                        @error('title')
                        <div id="alert-border-2" class="flex items-center p-4 mb-4 text-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2" role="alert">
                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <div class="ml-3 text-sm font-medium">
                                {{$message}}
                            </div>
                        </div>
                        @enderror
                    </div>
                    <div class="m-auto w-full">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            <h1 class="text-xl text-gray-600 dark:text-gray-300 ">
                                 Description
                            </h1>
                        </label>
                        <textarea wire:model="description" id="description" rows="10" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border-l  border-r border-t border-b border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                  placeholder="Enter your text here..."></textarea>
                        @error('description')
                        <div id="alert-border-2" class="flex items-center p-4 mb-4 text-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2" role="alert">
                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <div class="ml-3 text-sm font-medium">
                                {{$message}}
                            </div>
                        </div>
                        @enderror
                    </div>
                </div>
                <div>
                    <div class="justify-center items-center">
                        <div   class="m-auto  aspect-square max-w-lg border-l border-r border-t border-b border-opacity-50 rounded-lg p-4 shadow-lg">
                            <label wire:loading.class="blur" wire:target="photo" for="dropzone-file" class="flex flex-col items-center justify-center w-full h-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                @if($photo)

                                    <img
                                        class="  rounded-lg object-contain w-full h-full m-auto"
                                        src="{{$photo->temporaryUrl()}}" alt="image description">
                                @else
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG  (MAX. 800x400px)</p>
                                    </div>
                                @endif

                                <input wire:model="photo" id="dropzone-file" type="file" accept="image/jpeg,image/png" class="hidden"/>
                            </label>
                            @error('photo')

                            <div id="alert-border-2" class="flex items-center p-4 mb-4 text-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2" role="alert">
                                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                </svg>
                                <div class="ml-3 text-sm font-medium">
                                    {{$message}}
                                </div>
                            </div>
                            @enderror
                        </div>
                        <label  class="block text-center mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            <h1 class="text-xl text-gray-600 dark:text-gray-300 ">
                                Technology Photo
                            </h1>
                        </label>

                    </div>
                </div>
            </div>
            <hr class="h-px my-8 bg-gray-700 border-0 dark:bg-gray-200">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <div>
                    <div class="mb-6">
                        <label for="datepicker" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Year Developed</label>
                        <input
                            type="number"
                            min="1900"
                            max="2099"
                            step="1"
                            wire:model="yearDeveloped"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="YYYY"
                        />
                       @error('yearDeveloped')
                        <div id="alert-border-2" class="flex items-center p-4 mb-4 text-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2" role="alert">
                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <div class="ml-3 text-sm font-medium">
                                {{$message}}
                            </div>
                        </div>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="agency" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Tech Owner ( agencies )</label>
                        <select wire:model="techAgency" id="agency" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value=""  selected> - - Select Agency - - </option>
                            @foreach($agencies as $agency)
                                <option value="{{$agency->id}}">
                                    {{$agency->name}}
                                </option>
                            @endforeach
                        </select>
                        @error('techAgency')
                        <div id="alert-border-2" class="flex items-center p-4 mb-4 text-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2" role="alert">
                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <div class="ml-3 text-sm font-medium">
                                {{$message}}
                            </div>
                        </div>
                        @enderror
                    </div>
                </div>
                <div>
                    <div class="mb-6">
                        <label for="industry" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Tech Industry</label>
                        <select wire:model="techIndustry" id="industry" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value=""   selected> - - Select Industry - - </option>
                            @foreach($industries as $industry)
                                <option value="{{$industry->id}}">
                                    {{$industry->name}}
                                </option>
                            @endforeach
                        </select>
                        @error('techIndustry')
                        <div id="alert-border-2" class="flex items-center p-4 mb-4 text-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2" role="alert">
                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <div class="ml-3 text-sm font-medium">
                                {{$message}}
                            </div>
                        </div>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="techStatus" class="block mb-2 text-base font-medium text-gray-900 dark:text-white">Tech Status ( <span class="text-sm">Readiness</span> )</label>
                        <select wire:model="techStatus" id="techStatus" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value=""  selected>- - Select - -</option>
                            <option>
                                Laboratory experiment stage / Lab testing / Greenhouse testing
                            </option>
                            <option>
                                Pilot Testing stage
                            </option>
                            <option>
                                Upscaled Testing stage
                            </option>
                            <option>
                                Commercial scale testing stage
                            </option>
                            <option>
                                Technology ready for commercialization
                            </option>
                            <option>
                                Commercialized technology
                            </option>
                        </select>
                        @error('techStatus')
                        <div id="alert-border-2" class="flex items-center p-4 mb-4 text-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2" role="alert">
                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <div class="ml-3 text-sm font-medium">
                                {{$message}}
                            </div>
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            @if(session()->has('techno'))
                <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                    <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">{{session('techno')}}</span>
                    </div>
                </div>
            @endif
            <div class="my-4 w-full ">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    Submit
                </button>
            </div>
            <div wire:loading wire:target="submit"  class="absolute left-0 top-0 w-full h-full flex justify-items-center items-center bg-gray-300 dark:bg-gray-400 bg-opacity-50 dark:bg-opacity-50">
                <div class="w-20 h-20 m-auto aspect-square animate-spin">
                    <img src="{{asset("/assets/logo/img.png")}}" alt="loading...">
                </div>
            </div>
        </div>
    </form>

</div>
@push('scripts')
    <script type="text/javascript">
        $(function () {
            $(document).ready(function(){
                $("#datepicker").datepicker({
                    format: "yyyy",
                    viewMode: "years",
                    minViewMode: "years",
                    autoclose: true //to close picker once year is selected
                });
            })
        });

    </script>
@endpush
