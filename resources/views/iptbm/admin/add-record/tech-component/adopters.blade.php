@extends('iptbm.admin.add-record.index')

@section('sub-content')
    <div class="w-full">
        <h1 class="mt-3">Technology Adopters</h1>
        <div
            class="max-w-4xl m-auto p-6 bg-white-0 border-l border-r border-t border-b border-opacity-0 dark:border-opacity-75 border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-blue-700">


            @foreach($adopters as $adopter)
                <div
                    class="grid grid-cols-6 text-gray-500 p-4 hover:bg-gray-300  rounded-lg dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:bg-opacity-80">
                    <div class="col-start-1 col-end-3 ">
                        {{$adopter->name}}
                    </div>
                    <div class="col-start-4 col-end-6 d-flex">


                        <button type="button"
                                class="text-white bg-gray-600 hover:bg-[#333333]/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#3b5998]/55 mr-2 mb-2">
                            <span class="fa-solid fa-edit me-2"></span>Edit
                        </button>
                        <button type="button"
                                class="text-white bg-red-600 hover:bg-[#880000]/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#3b5998]/55 mr-2 mb-2">
                            <span class="fa-solid fa-trash me-2"></span>delete
                        </button>

                    </div>
                </div>
            @endforeach
            <div class="my-4">
                @if(Session::has('adopter-success'))
                    <div class="alert alert-success">
                        {{Session::get('adopter-success')}}
                    </div>
                @endif
                <form method="post" action="{{route("iptbm.addrecord.tech-component.add-adopter")}}">
                    @csrf

                    <div class="mb-6">
                        <label for="email"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Adopter</label>
                        <input name="adopter" aria-describedby="outlined_error_help" type="text" id="email"
                               class="bg-gray-50 border  @error('adopter') is-invalid @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="new Adopter">
                        @error('adopter')
                        <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                            {{$message}}
                        </p>
                        @enderror
                    </div>
                    <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Submit
                    </button>
                </form>

            </div>
        </div>

    </div>
@endsection
