<div>
    <x-pop-modal modal-title="Add new Contact details" static="true" name="addMobile-{{$contact_type}}" class="max-w-md">
        <form class="space-y-5" wire:submit.prevent="save_contact">
            <div>
                @if($contact_type==='mobile')
                    <x-input-label value="Mobile number"/>
                    <x-text-input wire:model.lazy="contact" type="number" class="w-full" required placeholder="09xx xxx xxxx"/>
                    <x-input-error :messages="$errors->get('contact')"/>
                @endif
                @if($contact_type==='phone')
                        <x-input-label value="Phone number"/>
                        <x-text-input wire:model.lazy="contact" type="tel" class="w-full" required placeholder="(036|02)-7 digit number"/>
                        <x-input-error :messages="$errors->get('contact')"/>
                @endif
                @if($contact_type==='fax')
                        <x-input-label value="fax number"/>
                        <x-text-input wire:model.lazy="contact" type="text" class="w-full" required placeholder="(area code)-7 digit number"/>
                        <x-input-error :messages="$errors->get('contact')"/>
                @endif
                @if($contact_type==='email')
                        <x-input-label value="Email address"/>
                        <x-text-input wire:model.lazy="contact" type="email" class="w-full" required placeholder="sample@mail.com"/>
                        <x-input-error :messages="$errors->get('contact')"/>
                @endif

            </div>
            <x-alert-success :message="session('contact_success')"/>
            <div>
                <x-submit-button class="min-w-full" wire:loading.attr="disabled" wire:target="save_mobile">
                    <div class="p-2 w-full text-center" wire:loading.remove wire:target="save_mobile">
                        Submit
                    </div>
                    <div class="p-2 w-full text-center" wire:loading wire:target="save_mobile">
                        Processing...
                    </div>
                </x-submit-button>
            </div>
        </form>
    </x-pop-modal>
    <x-secondary-button data-modal-toggle="addMobile-{{$contact_type}}">
        Add Contact
    </x-secondary-button>
</div>
