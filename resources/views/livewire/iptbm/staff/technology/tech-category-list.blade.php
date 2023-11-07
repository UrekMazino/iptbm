<div>
    <div wire:loading>
        <span class="text-blue-700 font-bold">
            Loading...
        </span>
    </div>
    <div class="flex justify-between">
        <div class="text-gray-700 dark:text-gray-300">
            {{$category->category}}
        </div>
        <div>
            <button wire:ignore.self wire:click.prevent="deleteCategory({{$category->id}})" class="text-red-400 hover:text-red-700 transition duration-300">
                <span class="fa-solid fa-trash-can"></span>
            </button>
        </div>
    </div>
</div>
