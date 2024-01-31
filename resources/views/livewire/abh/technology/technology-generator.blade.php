<x-card-panel title="Technology Generator">
    <x-slot:button>
        <x-pop-modal name="updateTechGen" class="max-w-md" modal-title="Update Technology Generators">
            <form class="space-y-5">
                <div>
                    <x-input-label value="Generator/Inventor"/>
                    <x-text-input class="w-full" placeholder="enter text here"/>
                </div>
                <div>
                    <x-submit-button>
                        <div>
                            Submit
                        </div>
                    </x-submit-button>
                </div>
            </form>
        </x-pop-modal>

        <x-secondary-button data-modal-toggle="updateTechGen" data-modal-target="updateTechGen">
            Update
        </x-secondary-button>
    </x-slot:button>
</x-card-panel>
