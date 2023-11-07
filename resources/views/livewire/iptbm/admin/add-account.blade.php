<form wire:submit.prevent="save">
    <div class="mb-6">
        <label for="agency" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
        <select required wire:model="agency_id" id="agency" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
            <option  selected value="">
                - - Select Agency - -
            </option>
            @foreach($agencies as $agen)
                <option value="{{$agen->id}}" >
                    {{ $agen->name}}
                </option>
            @endforeach
        </select>
        @error('agency_id')
        <div class="text-red-500">
            {{$message}}
        </div>
        @enderror
    </div>

    <div class="mb-6">
        <label for="fullname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full name</label>
        <input wire:model="fullName" type="text" id="fullname" value="{{old('fullName')}}"
               class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
               placeholder="enter full name" required>
        @error('fullName')
        <div class="text-red-500">
            {{$message}}
        </div>
        @enderror
    </div>

    <div class="mb-6">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
        <input name="" autocomplete="off"  wire:model="email" type="text" id="email" value="{{old('email')}}"
               class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
               placeholder="sample@gmail.com" required>
        @error('email')
        <div class="text-red-500">
            {{$message}}
        </div>
        @enderror
    </div>

    <div class="mb-6">
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
        <input wire:model="password" type="password" id="password"
               class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
               required>
        <label for="password" class="font-bold text-lg text-gray-600 dark:text-gray-400 block mb-2">Password Requirements:</label>
        <ul class="list-disc list-inside text-sm text-gray-500 dark:text-gray-400">
            <li>Minimum 8 characters</li>
            <li>At least 1 uppercase letter</li>
            <li>At least 1 lowercase letter</li>
            <li>At least 1 number</li>
        </ul>
        @error('password')
        <div class="text-red-500">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="mb-6">
        <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Repeat
            password</label>
        <input wire:model="password_confirmation"  type="password" id="repeat-password"
               class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
               required>
        @error('password_confirmation')
        <div class="text-red-500">
            {{$message}}
        </div>
        @enderror
    </div>

    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Register new account
    </button>


</form>
@push('scripts')
    <script>
        document.addEventListener("livewire:load", function() {
            var input = document.querySelector('input[autocomplete="off"]');
            if (input) {
                input.setAttribute('readonly', '');
                input.addEventListener('focus', function() {
                    this.removeAttribute('readonly');
                });
            }
        });
    </script>
@endpush
