<div class="w-full">
    <div class="pt-5 px-2">
        <x-header-label>
            ABH Dashboard
        </x-header-label>
    </div>
    <div class=" md:px-4 space-y-10">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <x-dash-board-counter-card class=" bg-gradient-to-tr from-sky-700 to-sky-300 0 ">
                <livewire:abh.admin.counter.total-abh   modal_id="totalAbh" />
                <x-slot:button>
                    <a data-modal-toggle="totalAbh" class="text-white cursor-pointer hover:scale-110 transition duration-300 flex justify-center items-center gap-2">
                        <span>
                            View List
                        </span>
                        <svg class="w-4 h-4 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </x-slot:button>
            </x-dash-board-counter-card>
            <x-dash-board-counter-card class="bg-gradient-to-tr from-emerald-700 to-emerald-300  ">
                <livewire:abh.admin.counter.total-technologies modal_id="totslPrecomTech"  />
                <x-slot:button>
                    <a data-modal-toggle="totslPrecomTech" class="text-white cursor-pointer hover:scale-110 transition duration-300 flex justify-center items-center gap-2">
                        <span>
                            View List
                        </span>
                        <svg class="w-4 h-4 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </x-slot:button>
            </x-dash-board-counter-card>
           {{--------------
            <x-dash-board-counter-card class="bg-gradient-to-tr from-yellow-700 to-yellow-300 ">
                <livewire:abh.admin.counter.total-tech-trans  modal_id="totalTechTrans"  />
                <x-slot:button>
                    <a  data-modal-toggle="totalTechTrans" class="text-white hover:scale-110 transition duration-300 flex justify-center items-center gap-2">
                        <span>
                            View List
                        </span>
                        <svg class="w-4 h-4 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </x-slot:button>
            </x-dash-board-counter-card>
           -------------}}
        </div>
        <livewire:abh.admin.component.dashboard.abh-admin-line-graph />
        <livewire:abh.admin.component.dashboard.abh-admin-map />


    </div>
</div>
