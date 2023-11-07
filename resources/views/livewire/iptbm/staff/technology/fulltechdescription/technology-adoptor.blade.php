<div class="flex flex-col pb-3 ms-4 py-2">
    <div wire:loading wire:target="deleteAdoptor" class="text-blue-600 font-medium">
        Loading...
    </div>
    <div class="flex justify-between">
        <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400"> {{$techAdoptor->adoptor_name}}</dt>
        <button wire:click.prevent="deleteAdoptor">
            <span class="fa-solid fa-trash-can text-red-600"></span>
        </button>
    </div>
</div>
