<x-abh.abh-layout>
    <div class=" md:px-4">
        <x-header-label class="mt-10 mb-4">
            Profile Informations
        </x-header-label>

        <livewire:abh.profile.profile-tag-n-logo :profile="$profile"/>
        <div class="mt-10">

            <x-grid col="2" gap="4">
                <div class="space-y-4">
                    <div>
                        <livewire:abh.profile.profile-details :profile="$profile" />
                    </div>
                    <div>
                        <livewire:abh.profile.region-details :profile="$profile"/>
                    </div>
                    <div>
                        <livewire:abh.profile.agency-details :agency="$profile->agency"/>
                    </div>

                </div>
                <div class="space-y-4">
                   <livewire:abh.profile.abh-profile-project :profile="$profile" />
                </div>
            </x-grid>
        </div>

    </div>
</x-abh.abh-layout>
