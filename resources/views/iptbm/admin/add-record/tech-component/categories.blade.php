@extends('iptbm.admin.add-record.index')

@section('sub-content')
    <div class="container-fluid  p-0">


        <ul class="hidden text-xl font-medium text-center  text-gray-500 divide-x divide-gray-200 rounded-lg shadow sm:flex dark:divide-gray-700 dark:text-gray-400 justify-center items-center">
            @foreach($industries as $key=>$industry)
                @if ($key < 5)
                    <li class="w-full">
                        <a class="inline-block w-full text-xl py-2  duration-300 transition  text-gray-900 bg-gray-100    dark:bg-gray-700 dark:text-white dark:hover:bg-blue-700 hover:text-blue-500 "
                           aria-current="page" href="#nav{{$industry->id}}">
                            <small>{{ Str::title(Str::lower(Str::limit($industry->name, 20, '...'))) }}</small>
                        </a>
                    </li>
                @endif
            @endforeach
            @if (count($industries) > 5)
                <li class="w-full">

                    <a id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                       class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                       type="button">Dropdown button
                        <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </a>

                    <div id="dropdown"
                         class="z-10 hidden bg-gray-50 border-gray-900 divide-y divide-gray-100 rounded-lg shadow w-auto dark:bg-gray-700 dark:border-gray-400">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownDefaultButton">
                            @foreach ($industries as $key=>$industry)
                                @if ($key >= 5)
                                    <li>
                                        <a class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                           href="#nav{{$industry->id}}">
                                            <small>{{ Str::title(Str::lower($industry->name)) }}</small>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </li>
            @endif
        </ul>
        <div class="my-3 mt-5">
            <h5 class="text-2xl mx-4">Categories</h5>
        </div>
        <div id="accordion-collapse" class="mx-4" data-accordion="open">
            @foreach($industries as $key=>$industry)
                <h2 id="nav{{$industry->id}}">
                    <button type="button"
                            class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border-l border-r border-t border-b border-gray-200 @if($key==0) rounded-t-xl @endif focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                            data-accordion-target="#accordion-collapse-body-{{$industry->id}}" aria-expanded="true"
                            aria-controls="accordion-collapse-body-{{$industry->id}}">
                        <span>{{ Str::title($industry->name) }}</span>
                        <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0" fill="currentColor"
                             viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </h2>
                <div id="accordion-collapse-body-{{$industry->id}}" class="hidden"
                     aria-labelledby="accordion-collapse-heading-{{$key}}">
                    <div
                        class="p-5 border-l border-r border-t border-b border-gray-200 dark:border-gray-700 dark:bg-gray-900">

                        <table
                            class="w-75 m-auto text-sm text-left text-gray-500 dark:text-gray-400 bg-gray-50 dark:bg-gray-800"
                            id="table{{$industry->id}}">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 columns-9 py-3">
                                    Names
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($industry->techcategory as $keyA=>$techcategory)
                                <tr class="hover:bg-gray-300 dark:hover:bg-gray-900 transition duration-300">
                                    <td id="#navCom{{$techcategory->id}}" class="px-6 py-2 ">
                                        <span class="text-base">
                                            {{$techcategory->name}}
                                        </span>
                                    </td>
                                    <td class="py-2">
                                        <div class="commodity-actions">

                                            <a href="#">
                                                <button type="button"
                                                        class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-2 py-2 mr-2  dark:bg-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            </a>
                                            <a href="#">

                                                <button type="button"
                                                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-2 py-2 mr-2  dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </a>

                                        </div>
                                    </td>
                                </tr>

                            @endforeach

                            </tbody>

                        </table>

                        <div
                            class="commodity-item w-75 mt-5 m-auto bg-gray-200 dark:bg-gray-800 text-gray-700  dark:text-blue-500">
                            <div class="text-center m-auto">
                                <a href="#" class="text-xl"><i class="fas fa-arrow-left"></i> Return</a>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>

        <!-- Add more industry sections here -->
        <div class="mx-3">
            <form id="addCommodityForm">
                <div class="mb-3">
                    <label for="industry" class="form-label">Industry:</label>
                    <input type="text" class="form-control" id="industry" required>
                </div>
                <div class="mb-3">
                    <label for="commodity" class="form-label">Commodity:</label>
                    <input type="text" class="form-control" id="commodity" required>
                </div>
                <button type="submit" class="btn btn-success">Add Commodity</button>
            </form>
        </div>

    </div>
@endsection
