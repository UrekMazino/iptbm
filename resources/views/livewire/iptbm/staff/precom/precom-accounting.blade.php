<x-card-panel title="Other Details" >
    <div class="space-y-2 ">
        <div class="py-2">
            {{-----------------
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
            --------------------}}
            <div class="border rounded border-gray-200 space-y-4  dark:border-gray-600 p-2">
                <div class="font-medium">
                    Starting Capital
                </div>
                <div>
                    @if($capitalModel)
                        <div>
                            <span class="fa-solid fa-peso-sign dark:text-gray-50 text-gray-700"></span>
                            <span class="text-gray-600 text-lg font-medium dark:text-gray-200">
                                   {{number_format($capitalModel, 2, ".", ",")}}
                        </span>
                        </div>
                    @else
                        <div class="text-gray-600 dark:text-gray-400  m-auto">
                            No data Available
                        </div>
                    @endif
                </div>
            </div>

        </div>

        <div class="py-2">
            <div class="border rounded border-gray-200 space-y-4  dark:border-gray-600 p-2">
                <div class="font-medium">
                    Estimated Cost
                </div>
                <div>
                    @if($costModel)
                        <div>
                            <span class="fa-solid fa-peso-sign dark:text-gray-50 text-gray-700"></span>
                            <span class="text-gray-600 text-lg font-medium dark:text-gray-200">
                                   {{number_format($costModel, 2, ".", ",")}}
                        </span>
                        </div>
                    @else
                        <div class="text-gray-600 dark:text-gray-400  m-auto">
                            No data Available
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="py-2">


            <div class="border rounded border-gray-200 space-y-4  dark:border-gray-600 p-2">
                <div class="font-medium">
                    Income Generated
                </div>
                <div>
                    @if($incomeModel)
                        <div>
                            <span class="fa-solid fa-peso-sign dark:text-gray-50 text-gray-700"></span>
                            <span class="text-gray-600 text-lg font-medium dark:text-gray-200">
                                   {{number_format($incomeModel, 2, ".", ",")}}
                        </span>
                        </div>
                    @else
                        <div class="text-gray-600 dark:text-gray-400  m-auto">
                            No data Available
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="py-2">


            <div class="border rounded border-gray-200 space-y-4  dark:border-gray-600 p-2">
                <div class="font-medium">
                    Return of Investment
                </div>
                <div>
                    @if($investmentModel)
                        <div>
                            <span class="fa-solid fa-peso-sign dark:text-gray-50 text-gray-700"></span>
                            <span class="text-gray-600 text-lg font-medium dark:text-gray-200">
                                   {{number_format($investmentModel, 2, ".", ",")}}
                        </span>
                        </div>
                    @else
                        <div class="text-gray-600 dark:text-gray-400  m-auto">
                            No data Available
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="py-2">

            <div class="border rounded border-gray-200 space-y-4  dark:border-gray-600 p-2">
                <div class="font-medium">
                    Break Even
                </div>
                <div>
                    @if($breakevenModel)
                        <div>
                            <span class="fa-solid fa-peso-sign dark:text-gray-50 text-gray-700"></span>
                            <span class="text-gray-600 text-lg font-medium dark:text-gray-200">
                                   {{number_format($breakevenModel, 2, ".", ",")}}
                        </span>
                        </div>
                    @else
                        <div class="text-gray-600 dark:text-gray-400  m-auto">
                            No data Available
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="py-2">

            <div class="border rounded border-gray-200 space-y-4  dark:border-gray-600 p-2">
                <div class="font-medium">
                    Mode Applicable :
                </div>
                <div>
                    <ul class="mt-4 divide-y divide-gray-400 dark:divide-gray-600">

                        @forelse($precom->modes as $mode)
                                <li class="py-2">
                                    <div class="text-gray-700 dark:text-white">
                                        {{$mode->commercialization_mode}}
                                    </div>
                                </li>
                            @empty
                            No data available
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>

</x-card-panel>
