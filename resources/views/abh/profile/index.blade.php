<x-abh.abh-layout>
    <div class=" md:px-4">
        <x-header-label class="mt-10 mb-4">
            Profile Informations
        </x-header-label>

        <livewire:abh.profile.profile-tag-n-logo :profile="$profile" />
        <div class="mt-10">

            <x-grid col="2" gap="4">
               <div class="space-y-4">
                   <div>
                       <livewire:abh.profile.region-details :profile="$profile"/>
                   </div>
                   <div>
                       <livewire:abh.profile.agency-details/>
                   </div>
                   <div>
                       <x-card-panel title="Region Details">
                           sdjhasbdn
                       </x-card-panel>
                   </div>
               </div>
                <div class="space-y-4">
                    <x-card>
                        asdmnb
                    </x-card>
                </div>
            </x-grid>
        </div>

    </div>
</x-abh.abh-layout>
