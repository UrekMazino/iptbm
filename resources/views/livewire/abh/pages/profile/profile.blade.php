<div class=" md:px-4">
    <x-header-label class="mt-10 mb-4">
        Profile Information
    </x-header-label>
    <livewire:abh.profile.profile-tag-n-logo :profile="$profile"/>
    <div class="mt-16">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-14">
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
                <livewire:abh.profile.ip-techtrans :profile="$profile" />
                <livewire:abh.profile.abh-contact :profile="$profile"/>
            </div>
        </div>

    </div>

</div>
