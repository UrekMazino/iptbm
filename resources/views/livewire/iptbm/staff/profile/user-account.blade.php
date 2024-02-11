<x-card-panel title="User Accounts">


    <ul class="w-full divide-y divide-gray-200 dark:divide-gray-700">
        @forelse($profile->users as $user)
            <li class="pb-3 sm:pb-4">
                <div class="flex items-center space-x-4 rtl:space-x-reverse">
                    <div class="flex-shrink-0">
                        <img class="w-14 h-14 rounded-full" src="{{asset('assets/icon/profile-blank.png')}}" alt="Neil image">
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                            {{$user->name}}
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            {{$user->email}}
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            {{$user->created_at->format('F-d-Y')}}
                        </p>
                    </div>
                    <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                        <x-pop-modal  class="max-w-md" name="disableAccount-{{$user->id}}">
                            <div class="text-center">
                                <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to disable this account?</p>
                                <x-sub-label class="font-light text-xs">
                                    <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
                                         This account will be disabled only and still visible to the system administrator.
                                    </div>


                                </x-sub-label>
                                <div class="flex justify-center items-center space-x-4">
                                    <button data-modal-toggle="disableAccount-{{$user->id}}" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                        No, cancel
                                    </button>
                                    <button type="submit" wire:click.prevent="disable_account('{{$user->id}}')" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                        Yes, I'm sure
                                    </button>
                                </div>
                            </div>
                        </x-pop-modal>
                        <x-secondary-button data-modal-toggle="disableAccount-{{$user->id}}">
                            Disable
                        </x-secondary-button>
                    </div>
                </div>
            </li>
        @empty
            No other accounts are connected to this profile
        @endforelse


    </ul>

</x-card-panel>
