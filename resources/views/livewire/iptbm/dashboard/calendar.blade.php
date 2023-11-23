<div>

    <x-card class="shadow-lg">
        <div id="calendar">

        </div>
    </x-card>

</div>
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {


            let events =@this.
            task.map(val => {

// options with default values


                return {
                    id: val.id,
                    title: `${val.ip_alert.technology.title} : ` + val.stage.stage_name,
                    start: "{{\Carbon\Carbon::make(now())->format('Y-m-d')}}",
                    end: val.deadline.split(' ')[0],
                    url: val.url,


                }
            })


            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',

                headerToolbar: {
                    left: 'prev,next,today',
                    center: 'title',
                    right: 'dayGridMonth,listMonth'
                },
                initialDate: "{{now()}}",
                selectable: true,
                selectMirror: true,
                dayMaxEvents: true,
                events: events,

                buttonText: {
                    listMonth: 'List in Months', // Customize the button text for listMonth
                },
            });


            calendar.render();
        })
    </script>
@endpush
