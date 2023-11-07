<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf


        <div class="mb-6">
            <input name="email" value="{{old('email')}}" type="email"  class="rounded-full px-5 bg-gray-500 bg-opacity-50  text-gray-300  border-0  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-base  placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Email" required>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div class="mb-6">
            <input name="password" value="{{old('Password')}}" type="password"  class="rounded-full px-5 bg-gray-500 bg-opacity-50  text-gray-300  border-0  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-base  placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Password" required>
            <x-input-error :messages="$errors->get('Password')" class="mt-2" />
        </div>


        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-300 hover:text-blue-500 ">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-300 hover:text-blue-500  rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
