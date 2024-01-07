<x-card class="shadow-lg mt-5">
    <div class="divide-y divide-gray-200 space-y-2 dark:divide-gray-600">
        <div class="py-2">

            <x-pop-modal modal-title="Update Starting Capital" name="authentication-modal-capital" class="max-w-md" static="true" >
                <form class="space-y-6" wire:submit.prevent="saveCapitalModel">
                    <div class="space-y-4">
                        <x-input-label value="Amount" for="file_input"/>
                        <x-text-input class="w-full" wire:model.lazy="capitalModel" type="number" step="any" placeholder="0.00"/>
                        <x-input-error :messages="$errors->get('capitalModel')"/>
                        <x-alert-success :message="session('capitalModel')"/>

                    </div>
                    <div>
                        <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveCapitalModel">
                            <div class="w-full text-center p-2" wire:loading.remove wire:target="saveCapitalModel">
                                Submit
                            </div>
                            <div class="w-full text-center p-2" wire:loading wire:target="saveCapitalModel">
                                Processing...
                            </div>
                        </x-submit-button>
                    </div>
                </form>
            </x-pop-modal>
            <div class="justify-between flex items-center">
                <x-item-header value="Starting Capital"/>
                <x-secondary-button class="text-sky-600 dark:text-sky-600"
                                    data-modal-target="authentication-modal-capital"
                                    data-modal-toggle="authentication-modal-capital">
                    <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                         viewBox="0 0 20 20">
                        <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z"/>
                        <path
                            d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z"/>
                        <path
                            d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z"/>
                    </svg>
                </x-secondary-button>
            </div>
            <div class="justify-between mt-4 flex items-center">
                @if($capitalModel)
                    <div>
                        <span class="fa-solid fa-peso-sign dark:text-gray-50 text-gray-700"></span>
                        <span class="text-gray-600 text-lg font-medium dark:text-gray-200">
                                   {{number_format($capitalModel, 2, ".", ",")}}
                        </span>
                    </div>
                @else
                    <div class="text-gray-600 dark:text-gray-400 text-center m-auto">
                        No data Available
                    </div>

                @endif

            </div>
        </div>

        <div class="py-2">
            <div class="justify-between flex items-center">
                <!-- Main modal -->
                <x-pop-modal modal-title="Update cost of ownership" name="authentication-modal-cost" class="max-w-md" static="true" >
                    <form class="space-y-6" wire:submit.prevent="saveCostModel">
                        <div class="space-y-4">
                            <x-input-label value="Estimated Cost" />
                            <x-text-input wire:model.lazy="costModel" required class="w-full" placeholder="0.00"/>
                            <x-input-error :messages="$errors->get('costModel')"/>
                            <x-alert-success :message="session('costModel')"/>
                        </div>
                        <div>
                            <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveCostModel">
                                <div class="w-full text-center p-2" wire:loading.remove wire:target="saveCostModel">
                                    Submit
                                </div>
                                <div class="w-full text-center p-2" wire:loading wire:target="saveCostModel">
                                    Processing...
                                </div>
                            </x-submit-button>
                        </div>


                    </form>
                </x-pop-modal>

                <x-item-header value="Estimated cost of ownership"/>
                <x-secondary-button class="text-sky-600 dark:text-sky-600" data-modal-target="authentication-modal-cost"
                                    data-modal-toggle="authentication-modal-cost">
                    <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                         viewBox="0 0 20 20">
                        <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z"/>
                        <path
                            d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z"/>
                        <path
                            d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z"/>
                    </svg>
                </x-secondary-button>
            </div>
            <div class="justify-between mt-4 flex items-center">
                @if($costModel)
                    <div>
                        <span class="fa-solid fa-peso-sign dark:text-gray-50 text-gray-700"></span>
                        <span class="text-gray-600 text-lg font-medium dark:text-gray-200">
                                   {{number_format($costModel, 2, ".", ",")}}
                               </span>
                    </div>
                @else
                    <div class="text-gray-600 dark:text-gray-400 w-full m-auto">
                        No data Available
                    </div>

                @endif

            </div>
        </div>

        <div class="py-2">
            <div class="justify-between flex items-center">

                <x-pop-modal modal-title="Update income generated" name="authentication-modal-income" class="max-w-md" static="true" >
                    <form class="space-y-6" wire:submit.prevent="saveIncomeModel">
                        <div class="space-y-4">
                            <x-input-label value="Income" />
                            <x-text-input wire:model.lazy="incomeModel" required class="w-full" placeholder="0.00"/>
                            <x-input-error :messages="$errors->get('incomeModel')"/>
                            <x-alert-success :message="session('incomeModel')"/>
                        </div>
                        <div>
                            <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveIncomeModel">
                                <div class="w-full text-center p-2" wire:loading.remove wire:target="saveIncomeModel">
                                    Submit
                                </div>
                                <div class="w-full text-center p-2" wire:loading wire:target="saveIncomeModel">
                                    Processing...
                                </div>
                            </x-submit-button>
                        </div>


                    </form>
                </x-pop-modal>

                <x-item-header value="Incom Generated"/>
                <x-secondary-button class="text-sky-600 dark:text-sky-600"
                                    data-modal-target="authentication-modal-income"
                                    data-modal-toggle="authentication-modal-income">
                    <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                         viewBox="0 0 20 20">
                        <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z"/>
                        <path
                            d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z"/>
                        <path
                            d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z"/>
                    </svg>
                </x-secondary-button>
            </div>
            <div class="justify-between mt-4 flex items-center">
                @if($incomeModel)
                    <div>
                        <span class="fa-solid fa-peso-sign dark:text-gray-50 text-gray-700"></span>
                        <span class="text-gray-600 text-lg font-medium dark:text-gray-200">
                                   {{number_format($incomeModel, 2, ".", ",")}}
                               </span>
                    </div>
                @else
                    <div class="text-gray-600 dark:text-gray-400 w-full m-auto">
                        No data Available
                    </div>

                @endif

            </div>
        </div>

        <div class="py-2">
            <div class="justify-between flex items-center">

                <x-pop-modal modal-title="Return of Investment" name="authentication-modal-investment" class="max-w-md" static="true" >
                    <form class="space-y-6" wire:submit.prevent="saveInvestmentModel">
                        <div class="space-y-4">
                            <x-input-label value="Amount" />
                            <x-text-input wire:model.lazy="investmentModel" required class="w-full" placeholder="0.00"/>
                            <x-input-error :messages="$errors->get('investmentModel')"/>
                            <x-alert-success :message="session('investmentModel')"/>
                        </div>
                        <div>
                            <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveInvestmentModel">
                                <div class="w-full text-center p-2" wire:loading.remove wire:target="saveInvestmentModel">
                                    Submit
                                </div>
                                <div class="w-full text-center p-2" wire:loading wire:target="saveInvestmentModel">
                                    Processing...
                                </div>
                            </x-submit-button>
                        </div>


                    </form>
                </x-pop-modal>

                <x-item-header value="Return of Investment "/>
                <x-secondary-button class="text-sky-600 dark:text-sky-600"
                                    data-modal-target="authentication-modal-investment"
                                    data-modal-toggle="authentication-modal-investment">
                    <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                         viewBox="0 0 20 20">
                        <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z"/>
                        <path
                            d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z"/>
                        <path
                            d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z"/>
                    </svg>
                </x-secondary-button>
            </div>
            <div class="justify-between mt-4 flex items-center">
                @if($investmentModel)

                    <div>
                        <span class="text-gray-600 text-lg font-medium dark:text-gray-200">
                                   {{$investmentModel}}
                        </span>
                    </div>
                @else
                    <div class="text-gray-600 dark:text-gray-400 w-full  m-auto">
                        No data Available
                    </div>

                @endif

            </div>
        </div>
        <div class="py-2">
            <div class="justify-between flex items-center">

                <x-pop-modal modal-title="break Even" name="authentication-modal-breakeven" class="max-w-md" static="true" >

                    <form class="space-y-6" wire:submit.prevent="saveBreakevenModel">
                        <div class="space-y-4">
                            <x-input-label value="Amount" />
                            <x-text-input wire:model.lazy="breakevenModel" required class="w-full" placeholder="0.00"/>
                            <x-input-error :messages="$errors->get('breakevenModel')"/>
                            <x-alert-success :message="session('breakevenModel')"/>
                        </div>
                        <div>
                            <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveBreakevenModel">
                                <div class="w-full text-center p-2" wire:loading.remove wire:target="saveBreakevenModel">
                                    Submit
                                </div>
                                <div class="w-full text-center p-2" wire:loading wire:target="saveBreakevenModel">
                                    Processing...
                                </div>
                            </x-submit-button>
                        </div>


                    </form>
                </x-pop-modal>

                <x-item-header value="Break Even"/>
                <x-secondary-button class="text-sky-600 dark:text-sky-600"
                                    data-modal-target="authentication-modal-breakeven"
                                    data-modal-toggle="authentication-modal-breakeven">
                    <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                         viewBox="0 0 20 20">
                        <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z"/>
                        <path
                            d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z"/>
                        <path
                            d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z"/>
                    </svg>
                </x-secondary-button>
            </div>
            <div class="justify-between mt-4 flex items-center">
                @if($breakevenModel)

                    <div class="text-gray-600 text-lg  flex justify-center items-center font-medium dark:text-gray-200">
                        {{$breakevenModel}}
                        <i class="fa-sharp fa-light ms-2 fa-percent"></i>

                    </div>
                @else
                    <div class="text-gray-600 dark:text-gray-400  m-auto">
                        No data Available
                    </div>

                @endif

            </div>
        </div>

    </div>

    <hr class="h-px my-8 bg-gray-400 border-0 dark:bg-gray-600">
    <div class="justify-between flex items-center">
        <h1 class="text-gray-600 my-auto text-base md:text-lg dark:text-gray-400 font-medium">
            Mode Applicable :
        </h1>

        <x-pop-modal modal-title="break Even" name="authentication-modal-comMode" class="max-w-md" static="true" >

            <form class="space-y-6" wire:submit.prevent="saveCommercializationModeModel">
                <div class="space-y-4">
                    <x-input-label value="Select Mode" />
                    <x-input-select  wire:model="commercializationModeModel" >
                        <option value="" selected>Select Mode</option>
                        <option value="Licensing Agreement/s">Licensing Agreement/s</option>
                        <option value="Outright sale">Outright sale</option>
                        <option value="Joint venture">Joint venture</option>
                        <option value="Start-up">Start-up</option>
                        <option value="Spin-off">Spin-off</option>
                    </x-input-select>

                    <x-input-error :messages="$errors->get('commercializationModeModel')"/>
                    <x-alert-success :message="session('commercializationModeModel')"/>
                </div>
                <div>
                    <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveCommercializationModeModel">
                        <div class="w-full text-center p-2" wire:loading.remove wire:target="saveCommercializationModeModel">
                            Submit
                        </div>
                        <div class="w-full text-center p-2" wire:loading wire:target="saveCommercializationModeModel">
                            Processing...
                        </div>
                    </x-submit-button>
                </div>


            </form>
        </x-pop-modal>

        <x-secondary-button class="text-sky-600 dark:text-sky-600" data-modal-target="authentication-modal-comMode"
                            data-modal-toggle="authentication-modal-comMode">
            <svg class="w-4 h-4 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                 viewBox="0 0 20 20">
                <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z"/>
                <path
                    d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z"/>
                <path
                    d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z"/>
            </svg>
        </x-secondary-button>
    </div>

    <ul class="mt-4 divide-y divide-gray-400 dark:divide-gray-600">
        @foreach($precom->modes as $mode)
            <li class="py-2">
                <div class="justify-between flex items-center">
                    <x-input-label value="{{$mode->commercialization_mode}}"/>

                    <div wire:ignore.self id="popup-modal-deleteMode{{$mode->id}}" tabindex="-1"
                         class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button"
                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-hide="popup-modal-deleteMode{{$mode->id}}">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                         fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="p-6 text-center">
                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                         aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                         viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                    </svg>
                                    <div class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                        {{$mode->commercialization_mode}}
                                    </div>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure
                                        you want to delete this product?</h3>
                                    <button data-modal-hide="popup-modal" wire:click.prevent="deleteMode({{$mode->id}})"
                                            type="button"
                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                        <div wire:loading wire:target="deleteMode">
                                            Processing...
                                        </div>
                                        <div wire:loading.remove wire:target="deleteMode">
                                            Yes, I'm sure
                                        </div>
                                    </button>
                                    <button data-modal-hide="popup-modal-deleteMode{{$mode->id}}" type="button"
                                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                        No, cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <x-secondary-button data-modal-target="popup-modal-deleteMode{{$mode->id}}"
                                        data-modal-toggle="popup-modal-deleteMode{{$mode->id}}"
                                        class="text-red-600 dark:text-red-600 p-0">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 18 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z"/>
                        </svg>
                    </x-secondary-button>
                </div>

            </li>
        @endforeach
    </ul>
</x-card>
