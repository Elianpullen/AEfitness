<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Graph(s)') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                @php
                    $labels = [];
                    $data = [];
                @endphp

                @foreach($weights as $weight)
                    @php
                        // Convert string time to carbon
                        $date = \Carbon\Carbon::parse($weight->date);
                        $labels[] = $date->format('d/m/Y');
                        $data[] = $weight->weight;
                    @endphp

                @endforeach

                <div class="shadow-lg rounded-lg overflow-hidden">
                    <div class="py-3 px-5 bg-gray-50">Weight(KG)</div>
                    <canvas class="p-10" id="chartLine"></canvas>
                </div>

                <!-- Required chart.js -->
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                <!-- Chart line -->
                <script>
                    const labels = @json($labels);
                    const data = {
                        labels: labels,
                        datasets: [
                            {
                                label: "Weight(KG)",
                                backgroundColor: "hsl(252, 82.9%, 67.8%)",
                                borderColor: "hsl(252, 82.9%, 67.8%)",
                                data: @json($data),
                            },
                        ],
                    };

                    const configLineChart = {
                        type: "line",
                        data,
                        options: {},
                    };

                    var chartLine = new Chart(
                        document.getElementById("chartLine"),
                        configLineChart
                    );
                </script>


            </div>

        </div>
    </div>
</x-app-layout>
