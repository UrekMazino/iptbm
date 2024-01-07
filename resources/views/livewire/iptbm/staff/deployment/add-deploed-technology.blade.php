
<x-pop-modal modal-title="Technologies for Deployment" static="true" class="max-w-xl" name="addDeployedTech">

    <form class="space-y-6" wire:submit.prevent="saveForm">
        <div>
            <x-input-label for="searchTech" value="Technology"/>
            <x-text-input class="w-full"  wire:model.lazy="technology" autocomplete="off" type="search" list="techList" id="searchTech" placeholder="enter text here" required/>
            <datalist id="techList">
                @foreach($technologies as $technology)
                    <option class="block" value="{{$technology->title}}" data-tech-id="{{$technology->id}}">
                        @if($technology->techgenerators->first())
                            {{$technology->techgenerators->first()->inventor->name}}
                        @endif

                    </option>
                @endforeach
            </datalist>
            <x-input-error :messages="$errors->get('technology')"/>
            <x-input-error :messages="$errors->get('techId')"/>
        </div>
        <div>
            <x-input-label for="adoptorName" value="Name of Adopter"/>
            <x-text-input class="w-full" wire:ignore.self wire:model.lazy="adopter" type="text" id="adoptorName" placeholder="enter name" required />
            <x-input-error :messages="$errors->get('adopter')"/>
        </div>
        <div>
            <x-input-label for="adoptorAddress" value="Address"/>
            <x-text-input class="w-full" wire:ignore.self wire:model.lazy="address" type="text" id="adoptorAddress" placeholder="enter address" required />
            <x-input-error :messages="$errors->get('address')"/>
        </div>
        <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="saveForm">
            <div class="p-2 w-full text-center" wire:loading.remove wire:target="saveForm">
                Submit
            </div>
            <div class="p-2 w-full text-center" wire:loading wire:target="saveForm">
                Processing...
            </div>
        </x-submit-button>



    </form>
</x-pop-modal>
