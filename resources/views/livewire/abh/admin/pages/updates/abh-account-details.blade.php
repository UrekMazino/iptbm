<div class="w-full">
    <nav wire:ignore
         class="bg-white border-b border-gray-200 shadow-lg  dark:shadow-black sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">

        <nav class="bg-white border-gray-200 dark:bg-gray-900">
            <div class="block md:flex justify-between items-center">
                <div class="ps-4 py-3">
                    <x-link-button :url="route('abh.admin.all_accounts')">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
                        </svg>
                        Back to Users account
                    </x-link-button>
                </div>

            </div>

        </nav>

    </nav>
    <div class=" md:px-4 mt-10">
       <div class="space-y-5">
           <x-card-panel title="Users Account Information">
               <div class="space-y-10">
                   <div class="border md:w-3/4 border-gray-200 dark:border-gray-600 rounded p-4 relative">
                       <div>
                           Full name
                       </div>
                       <div class="text-gray-900 dark:text-white text-lg">
                           {{$user->name}}
                       </div>
                       <x-pop-modal name="updateName" class="max-w-xl" static="true" modal-title="Update Full name">
                           <form class="space-y-5" wire:submit.prevent="save_name">
                               <div>
                                   <x-input-label value="full name"/>
                                   <x-text-input wire:model.lazy="user_full_name" required placeholder="enter text here" class="w-full"/>
                                   <x-input-error :messages="$errors->get('user_full_name')"/>
                               </div>
                               <div>
                                   <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="save_name">
                                       <div class="text-center p-2 w-full" wire:loading.remove wire:target="save_name">
                                           Submit
                                       </div>
                                       <div class="text-center p-2 w-full" wire:loading wire:target="save_name">
                                           Processing...
                                       </div>
                                   </x-submit-button>
                               </div>
                           </form>
                       </x-pop-modal>
                       <x-secondary-button data-modal-toggle="updateName" class="absolute top-2 right-2">
                           Update
                       </x-secondary-button>
                   </div>
                   <div class="border md:w-3/4 border-gray-200 dark:border-gray-600 rounded p-4 relative">
                       <div>
                           Agency
                       </div>
                       <div class="text-gray-900 dark:text-white text-lg">
                           {{$user->abh_profile->agency->name}}
                       </div>
                   </div>
                   <div class="border md:w-3/4 border-gray-200 dark:border-gray-600 rounded p-4 relative">
                       <div>
                           Email
                       </div>
                       <div class="text-gray-900 dark:text-white text-lg">
                           {{$user->email}}
                       </div>
                       <x-pop-modal name="updateEmail" class="max-w-xl" static="true" modal-title="Update Email address">
                           <form class="space-y-5" wire:submit.prevent="save_email">
                               <div>
                                   <x-input-label value="Email address"/>
                                   <x-text-input type="email" wire:model.lazy="user_email" required placeholder="enter text here" class="w-full"/>
                                   <x-input-error :messages="$errors->get('user_email')"/>
                               </div>
                               <div>
                                   <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="save_email">
                                       <div class="text-center p-2 w-full" wire:loading.remove wire:target="save_email">
                                           Submit
                                       </div>
                                       <div class="text-center p-2 w-full" wire:loading wire:target="save_email">
                                           Processing...
                                       </div>
                                   </x-submit-button>
                               </div>
                           </form>
                       </x-pop-modal>
                       <x-secondary-button data-modal-toggle="updateEmail" class="absolute top-2 right-2">
                           Update
                       </x-secondary-button>
                   </div>
                   <div class="border md:w-3/4 border-gray-200 dark:border-gray-600 rounded p-4 relative">

                       <div class="text-gray-900 dark:text-white text-lg">
                           <x-pop-modal modal-title="Update Password" class="max-w-lg" static="true" name="updatePassword">
                               <form class="space-y-6" wire:submit.prevent="save_password">
                                   <div class="space-y-4">
                                       <div>
                                           <x-input-label value="New Password"/>

                                           <div class="font-normal flex pe-4 gap-2 justify-center items-center text-base border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                               <input  type="{{$show_password? 'text':'password'}}" wire:model.lazy="user_password" class="border-0 outline-0 ring-0 focus:ring-0 bg-transparent w-full">
                                               <button wire:click.prevent="eye_toggle">
                                                   @if($show_password)
                                                       <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                           <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4 6-9 6s-9-4.8-9-6c0-1.2 4-6 9-6s9 4.8 9 6Z"/>
                                                           <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                                       </svg>
                                                   @else

                                                       <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                           <path d="m4 15.6 3-3V12a5 5 0 0 1 5-5h.5l1.8-1.7A9 9 0 0 0 12 5C6.6 5 2 10.3 2 12c.3 1.4 1 2.7 2 3.6Z"/>
                                                           <path d="m14.7 10.7 5-5a1 1 0 1 0-1.4-1.4l-5 5A3 3 0 0 0 9 12.7l.2.6-5 5a1 1 0 1 0 1.4 1.4l5-5 .6.2a3 3 0 0 0 3.6-3.6 3 3 0 0 0-.2-.6Z"/>
                                                           <path d="M19.8 8.6 17 11.5a5 5 0 0 1-5.6 5.5l-1.7 1.8 2.3.2c6.5 0 10-5.2 10-7 0-1.2-1.6-2.9-2.2-3.4Z"/>
                                                       </svg>
                                                   @endif

                                               </button>
                                           </div>
                                           <x-input-error :messages="$errors->get('user_password')"/>

                                       </div>
                                       <div>
                                           <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Password requirements:</h2>
                                           <ul class="max-w-md  text-gray-500 list-disc list-inside dark:text-gray-400">
                                               <li>

                                                   Minimum of 8 characters
                                               </li>
                                               <li>
                                                   Contains At least one numeric
                                               </li>
                                           </ul>
                                       </div>
                                       <div>
                                           <x-input-label value="Confirm Password"/>
                                           <x-text-input type="password" required wire:model.lazy="confirm_password" class="w-full"/>
                                           <x-input-error :messages="$errors->get('confirm_password')"/>
                                       </div>
                                   </div>

                                   <x-alert-success :message="session('password_change')"/>

                                   <div>
                                       <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="save_password">
                                           <div class="p-2 w-full text-center" wire:loading.remove wire:target="save_password">
                                               Submit
                                           </div>
                                           <div class="p-2 w-full text-center" wire:loading wire:target="save_password">
                                               Processing...
                                           </div>
                                       </x-submit-button>
                                   </div>
                               </form>
                           </x-pop-modal>
                           <x-secondary-button class="text-sky-500 dark:text-sky-500" data-modal-toggle="updatePassword">
                               Change Password?
                           </x-secondary-button>
                       </div>
                   </div>
               </div>
           </x-card-panel>
           <x-card-panel title="Account Status">
              <div class="space-y-5">
                  <div class="border md:w-3/4 border-gray-200 dark:border-gray-600 rounded p-4 relative">

                      <div class="text-gray-900 dark:text-white text-lg">
                          @if($user->deleted_at)
                              Disabled
                          @else
                              Active
                          @endif
                      </div>
                      <x-pop-modal name="enAbleAccount" class="max-w-md">
                          <div class="text-center">
                              <svg class="w-11 h-11 text-gray-800 dark:text-white mx-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m16 10 3-3m0 0-3-3m3 3H5v3m3 4-3 3m0 0 3 3m-3-3h14v-3"/>
                              </svg>
                              <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to enable this account?</p>
                              <div class="flex justify-center items-center space-x-4">
                                  <button data-modal-toggle="enAbleAccount" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                      No, cancel
                                  </button>
                                  <button type="submit" wire:click.prevent="enable_account" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                      Yes, I'm sure
                                  </button>
                              </div>
                          </div>
                      </x-pop-modal>
                      <x-pop-modal name="DisAbleAccount" class="max-w-md">
                          <div class="text-center">
                              <svg class="w-11 h-11 mx-auto text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                              </svg>
                              <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to disable this account?</p>
                              <x-sub-label class="font-light text-xs">
                                  <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg  bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
                                      This account will not be accessible to the user.
                                  </div>
                              </x-sub-label>
                              <div class="flex justify-center items-center space-x-4">
                                  <button data-modal-toggle="DisAbleAccount" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                      No, cancel
                                  </button>
                                  <button type="submit" wire:click.prevent="disable_account" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                      Yes, I'm sure
                                  </button>
                              </div>
                          </div>
                      </x-pop-modal>
                      @if($user->deleted_at)
                          <x-secondary-button data-modal-toggle="enAbleAccount" class="absolute top-2 right-2 text-sky-500 dark:text-sky-500">
                              Enable
                          </x-secondary-button>
                      @else
                          <x-danger-button data-modal-toggle="DisAbleAccount" class="absolute top-2 right-2">
                              Disable
                          </x-danger-button>
                      @endif

                  </div>
                  <x-pop-modal name="confirmAdminPass" class="max-w-md" modal-title="Admin Password Confirmation">
                     <form class="space-y-5" >
                         <div>
                             <x-input-label value="Admin Password"/>
                             <x-text-input type="password" required placeholder="enter admin password"/>
                         </div>
                         <div>
                             <x-submit-button>
                                 <div>
                                     Confirm
                                 </div>
                             </x-submit-button>
                         </div>
                     </form>
                  </x-pop-modal>
                  <x-pop-modal name="deleteAccount" class="max-w-2xl">
                      <form wire:submit.prevent="distroy_account">
                          <p class=" text-gray-500 dark:text-gray-100 text-xl font-medium">Are you sure you want to delete your account?</p>
                          <x-sub-label class="font-light text-xs">
                              <div class=" mb-4 text-sm text-gray-600 rounded-lg  dark:text-gray-400" role="alert">
                                  Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.
                              </div>
                          </x-sub-label>
                          <div class="py-4">
                              <x-text-input wire:model="confirm_admin_password" class="md:w-3/4" type="password" placeholder="Admin password" required/>
                          </div>
                          <div class="animate-pulse" wire:loading wire:target="distroy_account">
                              Verifying...
                          </div>
                          <div wire:loading.remove wire:target="distroy_account">
                              @if(session()->has('error_delete_admin'))
                                  <x-input-error :messages="session('error_delete_admin')"/>
                              @endif
                          </div>

                          <div class="flex justify-end items-center gap-4">
                              <x-secondary-button>
                                  Cancel
                              </x-secondary-button>
                              <x-danger-button wire:loading.attr="disabled">
                                  Delete Account
                              </x-danger-button>
                          </div>
                      </form>
                  </x-pop-modal>
                  <div class="border md:w-3/4 border-gray-200 dark:border-gray-600 rounded p-4 ">
                      <x-danger-button data-modal-toggle="deleteAccount">
                          Delete this account?
                      </x-danger-button>
                  </div>
              </div>
           </x-card-panel>

       </div>
    </div>

</div>
