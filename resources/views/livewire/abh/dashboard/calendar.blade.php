<x-card class="shadow-lg">
    <div id="calendar">

    </div>
</x-card>
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {


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
                events: [],

                buttonText: {
                    listMonth: 'Active Task', // Customize the button text for listMonth
                },
            });


            calendar.render();
        })
    </script>
@endpush

