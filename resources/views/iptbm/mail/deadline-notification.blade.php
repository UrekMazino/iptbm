
@component('mail::message')
    # Deadline Notification

    Hello,

    This is a reminder that the deadline for your task is approaching. Here are the details:


    **Technology:** {{$technologyname}}
    **IP Protection Application:** {{ $iptype }}
    **Application number:** {{$applicationnumber}}
    **Task:** {{ $task }}
    **Stage:** {{ $stage }}
    **Deadline:** {{ $deadline }}

    Please make sure to complete the task before the deadline to avoid any delays.

    Thank you for your attention.

    Regards,
    Your Team

    If you're having trouble with the button above, copy and paste the URL below into your web browser:

   ({{ $url }})
@endcomponent
