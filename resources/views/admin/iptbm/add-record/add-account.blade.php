@extends('admin.iptbm.layout.app')

@section('title')
    {{"| admin: add account"}}
@endsection

@section('content')
    <div class="w-full pb-10">
        <nav class="bg-white border-b border-gray-200  sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">

            <nav class="bg-white border-gray-200 dark:bg-gray-900">
                <div class="max-w-screen-xl flex flex-wrap items-center justify-end mx-auto p-4">
                    <a href="{{route("iptbm.admin.addrecord.account")}}" class="nav-link active"><i class="fa-solid fa-circle-arrow-left me-2" style="scale: 1.5"></i> Accounts</a>

                </div>
            </nav>
        </nav>

        <div class="my-4 border bg-white dark:bg-gray-800 border-blue-700 border-opacity-20 dark:border-gray-500 dark:border-opacity-20 w-1/2 mx-auto p-4 rounded-lg">
            <h1 class="text-xl text-gray-700 dark:text-white mb-5">Add new Account</h1>
            <livewire:iptbm.admin.add-account>

            </livewire:iptbm.admin.add-account>
        </div>

    </div>
@endsection
@section('script')

    <script>
        $(document).ready(function() {
            $('#account_password').on('input', function() {
                var password = $(this).val();
                var result = zxcvbn(password);
                var score = result.score;
                var meter = $('#password-strength-bar');
                var text = $('#password-strength-text');

                meter.removeClass().addClass('progress-bar');

                if (password.length === 0) {
                    meter.css('width', '0%');
                    text.text('');
                } else {
                    meter.css('width', (score * 25) + '%');

                    if (score === 0) {
                        meter.addClass('bg-danger');
                        text.text('Weak');
                    } else if (score === 1) {
                        meter.addClass('bg-warning');
                        text.text('Fair');
                    } else if (score === 2) {
                        meter.addClass('bg-info');
                        text.text('Good');
                    } else if (score === 3) {
                        meter.addClass('bg-primary');
                        text.text('Strong');
                    } else if (score === 4) {
                        meter.addClass('bg-success');
                        text.text('Very Strong');
                    }
                }
            });
        });
    </script>

@endsection

