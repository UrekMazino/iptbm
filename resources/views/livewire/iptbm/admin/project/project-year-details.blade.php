<div>
    <div class="text-lg text-gray-700 dark:text-gray-400 font-medium">
        Year {{$yearLabel}}
    </div>

    <div class="ms-5">
        <div class="flex justify-start items-center">
            <x-input-label class="me-2" value="Duration : "/>
            <span class="font-medium text-lg text-gray-700 dark:text-white ">
                {{$duration}} months
            </span>
            @if($projectYearDetails->extended_duration)
                <span class="hidden md:block text-sm ms-4 text-sky-600 dark:text-sky-300">
                    ( Including {{$projectYearDetails->extended_duration}} months extension )
                </span>
            @endif

        </div>
        <div class="flex justify-start items-center">
            <x-input-label class="me-2" value="Budget : "/>
            <span class="font-medium text-lg text-gray-700 dark:text-white">
                <span class="fa-solid fa-peso-sign">

                </span>
                {{number_format($projectYearDetails->year_budget,2)}}
            </span>

        </div>
    </div>
</div>
