<div class=" bg-gray-50 rounded-lg shadow dark:bg-gray-800">

    <div class="w-full h-75  p-4 md:p-6">
        <div class="flex justify-between mb-5">
            <div class="my-3 text-gray-600 dark:text-gray-200 text-2xl font-bold">
                Established IPTBMs
            </div>
            <div>

                <div id="lastDaysdropdown" class="z-10 hidden bg-gray-50 divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                        @foreach($countPerYear as $year)

                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{$year['year']}}</a>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
        <div id="line-chart"></div>
        <div class="my-4 text-sm font-medium text-gray-500">
            The quantity of ticks (Y-axis) on the line graph adjusts according to the maximum count of established IP-TBMs.
        </div>
    </div>



</div>
@push('scripts')
    <script>
        document.addEventListener('livewire:load', function () {
            let total=@this.countPerYear.map(function (d) {
                return d.total
            })

            let max=Math.max.apply(null, total);
            let year=@this.countPerYear.map(function (d) {
                return d.year
            })
            let options = {
                chart: {
                    height: "50%",
                    maxWidth: "100%",
                    type: "line",
                    fontFamily: "Inter, sans-serif",
                    dropShadow: {
                        enabled: false,
                    },
                    toolbar: {
                        show: true,
                        offsetX: 0,
                        offsetY: 0,
                    },
                    export: {
                        csv: {
                            filename: undefined,
                            columnDelimiter: ',',
                            headerCategory: 'category',
                            headerValue: 'value',
                            dateFormatter(timestamp) {
                                return new Date(timestamp).toDateString()
                            }
                        },
                        svg: {
                            filename: undefined,
                        },
                        png: {
                            filename: undefined,
                        }


                    },
                },
                tooltip: {
                    enabled: true,
                    x: {
                        show: false,
                    },
                },
                dataLabels: {
                    enabled: true,
                    enabledOnSeries: [1]
                },
                stroke: {
                    width: 6,
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shade: 'dark',
                        type: "horizontal",
                        shadeIntensity: 0.5,
                        gradientToColors: undefined, // optional, if not defined - uses the shades of same color in series
                        inverseColors: true,
                        opacityFrom: 1,
                        opacityTo: 1,
                        stops: [0, 50, 100],
                        colorStops: []
                    }
                },
                grid: {
                    show: true,
                    strokeDashArray: 6,
                    borderColor: '#58585e',

                    padding: {
                        left: 2,
                        right: 2,
                        top: -15
                    },
                },
                series: [
                    {
                        name: "Total of IPTBMs established  ",
                        data: total,
                        color: "#00eeff",
                    },

                ],
                legend: {
                    show: false
                },
                stroke: {
                    curve: 'straight'
                },
                markers: {
                    size: 5,

                },
                xaxis: {
                    categories: year,
                    labels: {
                        show: true,
                        style: {
                            fontFamily: "Inter, sans-serif",
                            cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                        },
                    },
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: true,
                    },
                },
                yaxis: {
                    show: true,
                    labels: {
                        show: true,
                        style: {
                            fontFamily: "Inter, sans-serif",
                            cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                        },
                        formatter: function(value) {
                            return Math.round(value); // Rounds the label value to the nearest whole number
                        }
                    },
                    type: 'category', // Specify that the X-axis type is "category"
                    min:0,
                    max:max+2,
                    tickAmount: max+2, // Number of ticks on the X-axis
                    tickPlacement: 'on', // Places ticks between the bars/columns
                },
                subtitle: {
                    text: "Total number of established IP-TBMs annually.",
                    align: 'left',
                    margin: 10,
                    offsetX: 0,
                    offsetY: 0,
                    floating: false,
                    style: {
                        fontSize:  '12px',
                        fontWeight:  'normal',
                        fontFamily:  undefined,
                        color:  '#9699a2'
                    },
                }

            }


            if (document.getElementById("line-chart") && typeof ApexCharts !== 'undefined') {
                const chart = new ApexCharts(document.getElementById("line-chart"), options);
                chart.render();
            }
        })

    </script>
@endpush
