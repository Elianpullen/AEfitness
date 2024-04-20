<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Weight graph') }}
        </h2>
    </x-slot>

    @php
        $weightDate = [];
        $weightData = [];
        $bodyfatData = [];
        $bodyfatDate = [];
    @endphp

    @if($weights->isEmpty())
        {{ $weight = App\Models\weightData::where('user_id', 0)->first() }}
    @else
        @foreach($weights as $weight)
            @php
                // Convert string time to carbon
                $date = \Carbon\Carbon::parse($weight->date);
                $weightDate[] = $date->format('d/m/Y');
                $weightData[] = $weight->weight;
                if (!empty($weight->bodyfat)) {
                    $bodyfatData[] = $weight->bodyfat;
                    $bodyfatDate[] = $date->format('d/m/Y');
                }
            @endphp
        @endforeach
    @endif

    <script>
        var weightDate = {!! json_encode($weightDate) !!};
        var weightData = {!! json_encode($weightData) !!};
        var bodyfatData = {!! json_encode($bodyfatData) !!};
        var bodyfatDate = {!! json_encode($bodyfatDate) !!};
    </script>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="shadow-lg rounded-lg overflow-hidden">
                    <div class="py-3 px-5 bg-gray-600">Weight(KG)</div>
                    <canvas class="p-10" id="weightChartLine"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="shadow-lg rounded-lg overflow-hidden">
                    <div class="py-3 px-5 bg-gray-600">Bodyfat(%)</div>
                    <canvas class="p-10" id="bodyfatChartLine"></canvas>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
