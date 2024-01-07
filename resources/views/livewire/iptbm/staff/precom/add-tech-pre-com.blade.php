
<x-pop-modal  name="addPrecomBot" class="max-w-xl" modal-title="Pre-Commercialization" static="true">
    <form class="space-y-6" wire:submit.prevent="savePrecomTech">
        <div class="space-y-4">
            <div>
                <x-input-label for="techModel" value="Technology"/>
                <x-text-input class="w-full" wire:model.lazy="techModel" list="techList" type="search" placeholder="enter technology name" required/>
                <x-data-list id="techList">
                    @foreach($technologies as $technology)
                        <option value="{{$technology->title}}">

                        </option>
                    @endforeach
                </x-data-list>
                <x-input-error :messages="$errors->get('Technology')"/>
                <x-input-error :messages="$errors->get('techModel')"/>
            </div>
            <div>
                <label for="techNewName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"></label>
                <x-input-label for="techNewName" value="Additional Technology name (Optional)"/>
                <x-text-box wire:model.lazy="techNewName" rows="5" placeholder="Enter text here..."  />
                <x-input-error :messages="$errors->get('techNewName')"/>
                <x-input-error :messages="$errors->get('techId')"/>
            </div>
        </div>
        <div>
            <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="savePrecomTech">
                <div class="w-full text-center p-2" wire:loading.remove wire:target="savePrecomTech">
                    Submit
                </div>
                <div class="w-full text-center p-2" wire:loading wire:target="savePrecomTech">
                    Processing...
                </div>
            </x-submit-button>
        </div>

    </form>
</x-pop-modal>




