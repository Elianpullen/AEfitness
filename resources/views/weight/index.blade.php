<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Track weight') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl">
                <p class="font-bold px-3">Last record:</p>
                <p class="px-3">Date {{$date->format('d F Y')}}</p>
                <p class="px-3">Weight(kg) {{$weight->weight}}</p>
                <p class="px-3">Bodyfat(%) {{$weight->bodyfat}}</p>
            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ url('/weight/create') }}" method="POST" class="w-full max-w-lg p-4">
                    @csrf
                    <div class="flex-wrap -mx-3 mb-6 grid">
                        {{--Date--}}
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="grid-date">Date
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="date" name="date" type="date">
                        </div>
                        {{--Bodyweight(kg)--}}
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="grid-bodyweight">Bodyweight(kg)
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                id="grid-first-name" name="weight" type="text" placeholder="0">
                        </div>
                        {{--Bodyfat(%)--}}
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="grid-last-name">
                                Bodyfat(%)
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-bodyfat" name="bodyfat" type="text" placeholder="0">
                        </div>
                    </div>
                    <button
                        class="bg-blue-700 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit" value="submit">
                        Submit
                    </button>

                </form>

            </div>
        </div>
    </div>


</x-app-layout>
