@component('mail::message')
    Welcome to IP-TBM MS!

    Dear {{ $fullName }},

    Your account has been created successfully. Here are your login credentials:

    Username: {{ $username }}
    Password: {{ $password }}

    Please keep your login credentials secure and do not share them with anyone.

    If you have any questions or need assistance, please feel free to contact us.

    Thank you and have a great day!

    ({{ $url }})
@endcomponent
