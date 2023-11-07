@extends('layouts.iptbm.staff')

@section('title')
    {{"| additional-details"}}
@endsection

@section('content')
    <div class="w-full">

        <nav class="bg-white border-b border-gray-200  sticky top-0 left-0 z-30  dark:bg-gray-800 dark:border-gray-700 ">

            <nav class="bg-white border-gray-200 dark:bg-gray-900">
                <div class="max-w-screen-xl flex flex-wrap items-center justify-start mx-auto p-4">

                    <div class=" w-full flex justify-between items-center " id="navbar-default">
                        <div class=" text-gray-700 dark:text-gray-400">
                            <a href="{{route("iptbm.staff.technology")}}" >
                                <i class="fa-solid fa-house scale-125 me-2 text-blue-500"></i> My Technologies
                            </a>
                        </div>



                    </div>
                </div>
            </nav>

        </nav>
        <div class="px-4 mt-4">
          <livewire:iptbm.staff.technology.add-technology :profile="$profile" />
        </div>

    </div>
@endsection
@section('script')
    <script>
        $(function () {
            $(document).ready(function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $("#datepicker").datepicker({
                    format: "yyyy",
                    viewMode: "years",
                    minViewMode: "years",
                    autoclose: true //to close picker once year is selected
                });
                $('#myTech').DataTable({
                    // serverSide: true,
                    stateSave: true,
                    pagingType: 'full_numbers',
                    horizontalScroll:true
                });
                $("#industry").change(function(eve){

                    const form= new FormData();
                    form.append('id',this.value);
                    $.ajax({
                        url:"{{route('technology.commodity')}}",
                        method:'POST',
                        dataType: 'json',
                        data:form,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(response){
                            $('#como').empty();
                            $("#techCat").empty();
                            console.log(response);
                            response.data.commodities.forEach(function(item){

                                $('#como').append($('<option>', {
                                    value: item.id,
                                    text: item.name
                                }))
                            })
                            response.data.techcategory.forEach(function(item){

                                $('#techCat').append($('<option>', {
                                    value: item.id,
                                    text: item.name
                                }))
                            })
                        }
                    })
                })

            })

        });
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('is-valid')
                }, false)
            })
        })()
    </script>
@endsection
