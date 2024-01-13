<div {{$attributes->merge([
    'class' => 'p-3 w-full shadow-lg bg-white dark:bg-gray-900  dark:shadow-black sticky top-0 left-0 z-30  border-b border-gray-200 dark:border-gray-600'
])}}>
    @if(isset($left_nav)&&isset($right_nav))
        <div class="w-full h-fit flex justify-between">
            {{$left_nav}}
            {{$right_nav}}
        </div>
    @else
        @if(isset($left_nav))
            <div class="flex justify-start items-center">
                {{$left_nav}}
            </div>
        @endif
        @if(isset($right_nav))
            <div class="flex justify-end items-center">
                {{$right_nav}}
            </div>
        @endif
    @endif



</div>
