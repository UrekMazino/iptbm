<div>
    <x-pop-modal static="true" name="addAccount" modal-title="Add new Users Account" class="max-w-xl">
        <form class="space-y-4" wire:submit.prevent="saveForm">
            <div class="space-y-2">
                <div>
                    <x-input-label for="agency" value="Agency"/>
                    <x-text-input wire:model.lazy="agencyModel" class="w-full" type="search" list="agencyList"
                                  id="agency" placeholder="select agency"/>
                    <x-data-list id="agencyList" :data="$agencies"/>
                    <x-input-error :messages="$errors->get('agencyModel')"/>
                </div>
                <div>
                    <x-input-label for="name" value="Full name"/>
                    <x-text-input wire:model.lazy="fullname" class="w-full" id="name" placeholder="enter text here"/>
                    <x-input-error :messages="$errors->get('fullname')"/>
                </div>
                <div>
                    <x-input-label for="email" value="Email Address"/>
                    <x-text-input wire:model.lazy="email" autocomplete="off" class="w-full" id="email"
                                  placeholder="enter text here"/>
                    <x-input-error :messages="$errors->get('email')"/>
                </div>
                @if(session()->has('message'))
                    <div>
                        <x-alert-success :message="session('message')"/>
                    </div>
                    <div>
                        <x-alert-success
                            message="The 8 characters password will be sent to the registered users email address."/>
                    </div>
                @endif


            </div>

            <x-submit-button wire:loading wire:target="saveForm">
                Processing..
            </x-submit-button>

            <x-submit-button type="submit" wire:loading.remove wire:target="saveForm">
                Submit
            </x-submit-button>
        </form>
    </x-pop-modal>
</div>
