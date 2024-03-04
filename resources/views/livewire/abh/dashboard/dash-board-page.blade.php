<div class=" md:px-4 space-y-4">
    <x-header-label class="mt-10">
        ABH Dashboard
    </x-header-label>
    <x-grid col="2" gap="4">
        <div >
            <livewire:abh.dashboard.calendar/>
        </div>
        <div >
            <livewire:abh.dashboard.recent-profile/>
        </div>
    </x-grid>
    <x-grid col="2" gap="4">
        <div>
            <livewire:abh.dashboard.abh-profiles/>
        </div>
        <div>
            <livewire:abh.dashboard.abh-technologies/>
        </div>
       {{---

        <div>
            <livewire:abh.dashboard.tech-trans-place/>
        </div>

        -----}}
    </x-grid>
    <div>
        <livewire:abh.dashboard.abh-istablish/>
    </div>
    <div>
        <livewire:abh.dashboard.abh-map/>
    </div>
</div>
