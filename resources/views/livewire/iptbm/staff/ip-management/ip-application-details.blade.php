<div class="px-4 mt-4">
    <div class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-5">
        <div class="col-span-3">
           <x-card class="shadow-lg">
               <h1 class="text-gray-700 dark:text-gray-300 font-medium text-lg">
                   <div class="flex justify-between mb-4">
                       <x-item-header>
                           Abstract
                       </x-item-header>
                       <x-pop-modal static="true" class="max-w-2xl" name="updateAbstract" modal-title="Update Abstract">
                           <form wire:submit.prevent="saveAbstract">
                               <div class="mb-6">
                                   <x-text-box rows="3"  wire:model.lazy="abstractModel"  placeholder="Enter text  here..."  />
                                   <div wire:loading wire:target="saveAbstract" class="text-blue-600 font-medium">
                                       Loading...
                                   </div>
                                   <x-input-error :messages="$errors->get('abstractModel')"/>
                                   @if(session()->has('abstractModel'))
                                       <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                                           <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                               <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                           </svg>
                                           <span class="sr-only">Info</span>
                                           <div>
                                               <span class="font-medium">{{session('abstractModel')}}!</span>
                                           </div>
                                       </div>
                                   @endif

                               </div>
                               <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                           </form>
                       </x-pop-modal>
                       <x-secondary-button data-modal-toggle="updateAbstract" class="text-sky-600 dark:text-sky-600">
                           <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                               <path d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                               <path d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                           </svg>
                           Update
                       </x-secondary-button>
                       {{-----
                         @if($showAbstractEditor)

                             <button wire:click.prevent="toggleShowAbstractEditor" class="text-red-500 hover:text-red-700 dark:text-red-600 dark:hover:text-red-400 transition duration-300">
                                 <span class="fa-solid fa-close"></span>
                             </button>
                         @else

                             <button wire:click.prevent="toggleShowAbstractEditor" class="text-blue-500 hover:text-blue-700 dark:text-blue-600 dark:hover:text-blue-400 transition duration-300">
                                 <span class="fa-solid fa-edit"></span>
                             </button>
                         @endif
                       ---}}

                   </div>
                   <div>
                       <x-sub-label class="text-xs">
                           " a brief summary of your invention, and should include all the most important technical features of your invention"
                       </x-sub-label>
                   </div>
               </h1>
               <div class="mt-3">
                   <div wire:loading wire:target="abstractModel" class="text-blue-600 font-medium">
                       Loading...
                   </div>
                   <div wire:loading wire:target="showAbstractEditor" class="text-blue-600 font-medium">
                       Loading...
                   </div>
                   @if($showAbstractEditor)

                       <form wire:submit.prevent="saveAbstract">
                           <div class="mb-6">
                               <textarea wire:model="abstractModel" id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-100 rounded-lg border--l border-r border-t border-b border-gray-400 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800  dark:placeholder-gray-400 dark:text-gray-50 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter text  here..."></textarea>
                               <div wire:loading wire:target="saveAbstract" class="text-blue-600 font-medium">
                                   Loading...
                               </div>
                               @if(session()->has('abstractModel'))
                                   <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                                       <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                           <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                       </svg>
                                       <span class="sr-only">Info</span>
                                       <div>
                                           <span class="font-medium">{{session('abstractModel')}}!</span>
                                       </div>
                                   </div>
                               @endif
                               @error('abstractModel')
                               <div  id="alert-border-2" class="flex items-center p-4 mb-4 text-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2" role="alert">
                                   <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                       <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                   </svg>
                                   <div class="ml-3 text-sm font-medium">
                                       {{$message}}
                                   </div>
                               </div>
                               @enderror
                           </div>
                           <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                       </form>

                   @else
                       @if($ipAlert->abstract)
                           <div class="text-base  text-gray-600 dark:text-gray-400">
                               <p class="text-justify">
                                   {{$ipAlert->abstract}}
                               </p>

                           </div>
                       @else
                           <div class="text-xl font-medium text-gray-600 dark:text-gray-400">
                               No data available
                           </div>
                       @endif
                   @endif
               </div>
           </x-card>

        </div>
        <div class="col-span-2 space-y-4">

          <x-card class="shadow-lg">
              <div class="flex justify-between items-center">
                  <x-item-header >
                      Total Cost of IP application service
                  </x-item-header>

                  <x-secondary-button wire:click.prevent="toggleShwExpenseModelForm" class="text-sky-600  dark:text-sky-600 ">
                      <div class="m-auto text-center flex justify-center items-center">
                          @if($showExpenseModelForm)
                              <svg class="w-[19px] h-[19px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
                              </svg>
                              <div class="m-auto ms-2">
                                  Close
                              </div>
                          @else
                              <svg class="w-[19px] h-[19px] " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                  <path d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                                  <path d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                              </svg>
                              <div class="m-auto ms-2">
                                  Edit
                              </div>
                          @endif

                      </div>
                  </x-secondary-button>

              </div>
              <x-input-label wire:loading wire:target="toggleShwExpenseModelForm">
                  Loading...
              </x-input-label>
              @if($showExpenseModelForm)
                  <form wire:submit.prevent="saveExpense">
                      <div class="rounded-lg space-y-2 mt-3 border border-gray-400 dark:border-gray-600 p-4">
                          <x-input-label>
                              <div>
                                  Enter Amount
                              </div>
                              <x-text-input wire:model.lazy="expenseModel" placeholder="00.00" type="number" step="any" class="w-full" />
                              @error('expenseModel')
                              <x-input-error :messages="$message" />
                              @enderror
                          </x-input-label>
                          <x-input-label>
                              <div>
                                  Description
                              </div>
                              <textarea wire:model.lazy="descriptionModel" rows="5" placeholder="enter text here" class="'border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 w-full focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm'"></textarea>
                              @error('descriptionModel')
                              <x-input-error :messages="$message" />
                              @enderror
                          </x-input-label>
                          <x-secondary-button wire:loading wire:target="saveExpense"  class="text-sky-600  dark:text-sky-600 ">
                              <div class="m-auto text-center flex justify-center items-center">
                                  <div class="m-auto ms-2">
                                      Processing...
                                  </div>
                              </div>
                          </x-secondary-button>

                          <x-secondary-button wire:loading.remove wire:target="saveExpense" type="submit"  class="text-sky-600  dark:text-sky-600 ">
                              <div class="m-auto text-center flex justify-center items-center">
                                  <div class="m-auto ms-2">
                                      Submit
                                  </div>
                              </div>
                          </x-secondary-button>
                      </div>
                  </form>

              @endif
              <div class="mt-2">
                  <ul class="list-none divide-y divide-gray-400 dark:divide-gray-600">
                      @foreach($ipAlert->expenses as $expenses)
                          <li class="py-3">
                              <div>
                                  <div>
                                      <x-input-label>
                                          {{$expenses->description}}
                                      </x-input-label>
                                  </div>
                                  <div>
                                      <x-input-label>
                                          Amount: <span class="fa-solid ms-2 fa-peso-sign"></span><span class="font-thin"> {{number_format($expenses->amount,2)}}</span>
                                      </x-input-label>
                                  </div>
                              </div>

                          </li>
                      @endforeach
                      <li class="py-2">
                          <x-input-label class="text-xl">
                              Total: <span class="fa-solid ms-2 fa-peso-sign"></span> {{number_format($ipAlert->expenses->sum('amount'),2)}}
                          </x-input-label>

                      </li>
                  </ul>
              </div>
          </x-card>

          <x-card class="shadow-lg">
              <div class="flex justify-between items-center">
                  <x-item-header >
                      Status of Protection
                  </x-item-header>
                  <x-pop-modal static="true" class="max-w-md" name="updateProtect" modal-title="Update Status of Protection">
                      <form wire:submit.prevent="saveProtectionStatus">
                          <div class="mb-6">
                              <label for="statusPro" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                              <select wire:model="protectionStatusModel" id="statusPro" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                  <option value="" selected>Select Technology Status</option>
                                  @foreach($techProtectionStatus as $status)
                                      <option value="{{$status->id}}">
                                          {{$status->protection_status}}
                                      </option>
                                  @endforeach
                              </select>
                              @if(session()->has('protectionStatusModel'))
                                  <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                                      <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                      </svg>
                                      <span class="sr-only">Info</span>
                                      <div>
                                          <span class="font-medium">{{session('protectionStatusModel')}}!</span>
                                      </div>
                                  </div>
                              @endif
                              @error('protectionStatusModel')
                              <div  id="alert-border-2" class="flex items-center p-4 mb-4 text-red-800 border-t border-b border-l border-r border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800 rounded-lg mt-2" role="alert">
                                  <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                  </svg>
                                  <div class="ml-3 text-sm font-medium">
                                      {{$message}}
                                  </div>
                              </div>
                              @enderror
                          </div>
                          <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                      </form>
                  </x-pop-modal>
                  <x-secondary-button data-modal-toggle="updateProtect" class="text-sky-600 dark:text-sky-600">
                      <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                          <path d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z"/>
                          <path d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z"/>
                      </svg>
                      Update
                  </x-secondary-button>
              </div>

              <div class="mt-3">
                  @if($ipAlert->protectionStatus)
                      <div class="text-xl font-medium text-gray-600 dark:text-gray-400">
                          {{$ipAlert->protectionStatus->protection_status}}
                      </div>
                  @else
                      <div class="text-xl font-medium text-gray-600 dark:text-gray-400">
                          No data available
                      </div>
                  @endif
              </div>
          </x-card>
            <livewire:iptbm.staff.ip-management.paten-agent :ipAlert="$ipAlert" />
        </div>
    </div>

</div>
