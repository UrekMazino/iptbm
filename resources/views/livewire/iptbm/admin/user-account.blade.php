<div class="mx-4">

    <x-card class="shadow-lg">
        <x-header-label>
            User Details
        </x-header-label>
        <x-card class="max-w-3xl m-auto dark:bg-gray-800">
            <div class="mb-3">
                <h1 class="text-gray-500 font-medium">
                    Full name
                </h1>
                @if($showUserModel)
                    <div
                        class="border-l border-r border-t border-b border-gray-400 dark:border-gray-600 rounded-lg  p-2">
                        <div class="justify-content-end flex">
                            <button wire:click.prevent="toggleShowUserNameModel">
                                <svg class="w-[14px] h-[14px] text-gray-800 dark:text-white" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="1.6" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </button>
                        </div>

                        <form wire:submit.prevent="saveName">
                            <div class="mb-6">
                                <label for="fullname"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User
                                    Name</label>
                                <input wire:model.lazy="userNameModel" type="text" id="fullname"
                                       class="bg-gray-50 border-l border-r border-t border-b border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                       placeholder="full name" required>
                                <div wire:loading wire:target="userNameModel"
                                     wire:dirty.class="text-blue-500 font-medium">
                                    Loading...
                                </div>
                                @if(session()->has('userNameModel'))
                                    <div
                                        class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
                                        role="alert">
                                        <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                        </svg>
                                        <span class="sr-only">Info</span>
                                        <div>
                                            <span class="font-medium">{{session('userNameModel')}}</span>
                                        </div>
                                    </div>
                                @endif
                                @error('userNameModel')

                                <div id="alert-border-2"
                                     class="flex items-center p-4 mb-4 text-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2"
                                     role="alert">
                                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true"
                                         xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                    </svg>
                                    <div class="ml-3 text-sm font-medium">
                                        {{$message}}
                                    </div>
                                </div>

                                @enderror
                            </div>
                            <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Submit
                            </button>
                        </form>

                    </div>
                @else
                    <div class="border-b border-gray-400 dark:border-gray-600 flex justify-between items-center">
                        <div class="text-gray-600 dark:text-gray-400">
                            {{$userNameModel}}
                        </div>
                        <button wire:click.prevent="toggleShowUserNameModel">
                            <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                <path
                                    d="M6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9Zm-1.391 7.361.707-3.535a3 3 0 0 1 .82-1.533L7.929 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h4.259a2.975 2.975 0 0 1-.15-1.639ZM8.05 17.95a1 1 0 0 1-.981-1.2l.708-3.536a1 1 0 0 1 .274-.511l6.363-6.364a3.007 3.007 0 0 1 4.243 0 3.007 3.007 0 0 1 0 4.243l-6.365 6.363a1 1 0 0 1-.511.274l-3.536.708a1.07 1.07 0 0 1-.195.023Z"/>
                            </svg>
                        </button>
                    </div>
                @endif

            </div>
            <div class="mb-3">
                <h1 class="text-gray-500 font-medium">
                    Agency
                </h1>
                <div class="border-b border-gray-400 dark:border-gray-600 flex justify-between items-center">
                    <div class="text-gray-600 dark:text-gray-400">

                        <a href="{{route("iptbm.admin.view-agency",['agency'=>$user->profile->agency->id])}}"
                           class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                            {{$user->profile->agency->name}}
                        </a>
                    </div>
                </div>
                <div class="text-sm text-gray-500">
                    Users agency cannot be changed. Users' account must be deleted first and create a new one.
                </div>

            </div>
            <div class="mb-3">
                <h1 class="text-gray-500 font-medium">
                    Email Address
                </h1>
                @if($showEmailModel)
                    <div
                        class="border-l border-r border-t border-b border-gray-400 dark:border-gray-600 rounded-lg  p-2">
                        <div class="justify-content-end flex">
                            <button wire:click.prevent="toggleShowEmailModel">
                                <svg class="w-[14px] h-[14px] text-gray-800 dark:text-white" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="1.6" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </button>
                        </div>

                        <form wire:submit.prevent="saveEmail">
                            <div class="mb-6">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Email Address</label>
                                <input wire:model.lazy="emailModel" type="email" id="email"
                                       class="bg-gray-50 border-l border-r border-t border-b border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                       placeholder="example@mail.com" required>
                                <div wire:loading wire:target="emailModel" wire:dirty.class="text-blue-500 font-medium">
                                    Loading...
                                </div>
                                @if(session()->has('emailModel'))
                                    <div
                                        class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
                                        role="alert">
                                        <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                        </svg>
                                        <span class="sr-only">Info</span>
                                        <div>
                                            <span class="font-medium">{{session('emailModel')}}</span>
                                        </div>
                                    </div>
                                @endif
                                @error('emailModel')

                                <div id="alert-border-2"
                                     class="flex items-center p-4 mb-4 text-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2"
                                     role="alert">
                                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true"
                                         xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                    </svg>
                                    <div class="ml-3 text-sm font-medium">
                                        {{$message}}
                                    </div>
                                </div>

                                @enderror
                            </div>
                            <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Submit
                            </button>
                        </form>

                    </div>
                @else
                    <div class="border-b border-gray-400 dark:border-gray-600 flex justify-between items-center">
                        <div class="text-gray-600 dark:text-gray-400">
                            {{$emailModel}}
                        </div>
                        <button wire:click.prevent="toggleShowEmailModel">

                            <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                <path
                                    d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                                <path
                                    d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                            </svg>
                        </button>
                    </div>
                @endif

            </div>
            <div class="mb-3">


                <!-- Main modal -->
                <div wire:ignore.self id="authentication-modal-changesPass" data-modal-backdrop="static" tabindex="-1"
                     aria-hidden="true"
                     class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-md max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-gray-50 rounded-lg shadow dark:bg-gray-700">
                            <button type="button"
                                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="authentication-modal-changesPass">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="px-6 py-6 lg:px-8">

                            </div>
                        </div>
                    </div>
                </div>

                <button wire:click.prevent="tooggleShowPassword" class="text-blue-700 font-medium dark:text-blue-500">
                    Edit Password
                    <span class="fa-solid fa-key"></span>
                </button>
                <div wire:loading wire:target="tooggleShowPassword" class="text-blue-500">
                    Loading...
                </div>
                @if($showPasswordForm)
                    <div
                        class="mt-2 w-full p-2 border-l border-r border-t border-b rounded-lg border-gray-400 dark:border-gray-600">
                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Change Password</h3>
                        @if(session()->has('passwordModel'))
                            <div
                                class="flex items-center p-4 mt-4 mb-2 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
                                role="alert">
                                <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                </svg>
                                <span class="sr-only">Info</span>
                                <div>
                                    <span class="font-medium">{{session('passwordModel')}}</span>
                                </div>
                            </div>
                        @endif
                        <form wire:submit.prevent="savePassword">

                            <div class="mt-4">
                                <label for="password"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New
                                    password</label>
                                <input wire:model.lazy="passwordModel" type="{{$showPassword? "text":"password"}}"
                                       id="password" placeholder="••••••••"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                       required>
                                <div wire:loading wire:target="passwordModel"
                                     wire:dirty.class="text-blue-500 font-medium">
                                    Loading...
                                </div>


                                @error('passwordModel')

                                <div id="alert-border-2"
                                     class="flex items-center p-4 mb-2 text-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2"
                                     role="alert">
                                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true"
                                         xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                    </svg>
                                    <div class="ml-3 text-sm font-medium">
                                        {{$message}}
                                    </div>
                                </div>

                                @enderror
                                <div class=" items-center mb-4 mt-2">
                                    <input wire:model="showPassword" id="default-checkbox" type="checkbox" value="1"
                                           class="w-4 h-4 text-blue-600 border-l border-r border-t border-b bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-checkbox"
                                           class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        Show password
                                        <span wire:loading wire:target="showPassword" class="text-blue-500 font-medium">Loading...</span>
                                    </label>
                                </div>
                                <div class="mb-4 mt-4">
                                    <label for="confirm"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm
                                        password</label>
                                    <input wire:model.lazy="passwordConfirmationModel" type="password" name="password"
                                           id="confirm" placeholder="••••••••"
                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                           required>
                                    <div wire:loading wire:target="passwordConfirmationModel"
                                         wire:dirty.class="text-blue-500 font-medium">
                                        Loading...
                                    </div>
                                    @error('passwordConfirmationModel')
                                    <div id="alert-border-2"
                                         class="flex items-center p-4 mb-2 text-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2"
                                         role="alert">
                                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true"
                                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                        </svg>
                                        <div class="ml-3 text-sm font-medium">
                                            {{$message}}
                                        </div>
                                    </div>
                                    @enderror
                                </div>
                                <div>

                                    <div class=" items-center mb-4 mt-2">
                                        <label for="password"
                                               class="font-bold text-lg text-gray-600 dark:text-gray-400 block mb-2">Password
                                            Requirements:</label>
                                        <ul class="list-disc list-inside text-sm text-gray-500 dark:text-gray-400">
                                            <li>Minimum of 8 characters</li>
                                            <li>Contains At least one numeric</li>
                                        </ul>
                                    </div>

                                </div>
                            </div>


                            <button type="submit"
                                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Save
                            </button>

                        </form>
                    </div>
                @endif

            </div>
        </x-card>
        <div class="w-3/4 m-auto mt-4 flex">


            <div wire:ignore.self id="popup-modal" tabindex="-1"
                 class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-md max-h-full">
                    <div class="relative bg-gray-50 rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="popup-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-6 text-center">
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want
                                to delete this Account?</h3>


                            <!-- Main modal -->
                            <div wire:ignore.self id="authentication-modal" tabindex="-1" aria-hidden="true"
                                 class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-md max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative bg-gray-50 rounded-lg shadow dark:bg-gray-700">
                                        <button type="button"
                                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-hide="authentication-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                 fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                      stroke-linejoin="round" stroke-width="2"
                                                      d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="px-6 py-6 lg:px-8">
                                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Admin
                                                Password</h3>
                                            <form class="space-y-6" wire:submit.prevent="deleteAccount">

                                                <div>
                                                    <label for="password"
                                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter
                                                        Admin Password</label>
                                                    <input wire:model.lazy="adminPassword" type="password"
                                                           name="password" id="password" placeholder="••••••••"
                                                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                           required>
                                                    <div wire:loading wire:target="adminPassword"
                                                         wire:dirty.class="text-blue-500 font-medium">
                                                        Loading...
                                                    </div>
                                                    @if(session()->has('error'))
                                                        <div id="alert-border-2"
                                                             class="flex items-center p-4 mb-2 text-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2"
                                                             role="alert">
                                                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true"
                                                                 xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                                 viewBox="0 0 20 20">
                                                                <path
                                                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                                            </svg>
                                                            <div class="ml-3 text-sm font-medium">
                                                                {{session('error')}}
                                                            </div>
                                                        </div>
                                                    @endif


                                                    @error('adminPassword')

                                                    <div id="alert-border-2"
                                                         class="flex items-center p-4 mb-2 text-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2"
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
                                                </div>
                                                <button type="submit"
                                                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    Proceed
                                                </button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                                    type="button"
                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                Yes, I'm sure
                            </button>
                            <button data-modal-hide="popup-modal" type="button"
                                    class="text-gray-500 bg-gray-50 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                No, cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" type="button"
                    class=" ms-auto me-0 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                <div class="flex justify-content-center items-center">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                        <path
                            d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h1v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2ZM7 2h4v2H7V2Zm1 14a1 1 0 1 1-2 0V8a1 1 0 0 1 2 0v8Zm4 0a1 1 0 0 1-2 0V8a1 1 0 0 1 2 0v8Z"/>
                    </svg>
                    Delete Account?
                </div>
            </button>
        </div>
    </x-card>

</div>
