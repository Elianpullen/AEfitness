<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Track weight') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl rounded-t-lg">
                <p class="px-3 py-2 font-bold text-gray-500 dark:text-gray-400 leading-relaxed">Last record:</p>
                <p class="px-3 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                    Date: {{$date}}</p>
                <p class="px-3 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                    Weight: {{$weight}}kg</p>
                <p class="px-3 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                    Bodyfat: {{$bodyfat}}%</p>
            </div>

            <div class="bg-white dark:bg-gray-800 text-white overflow-hidden shadow-xl rounded-b-lg">
                <form action="{{ url('/weight/create') }}" method="POST" class="w-full max-w-lg p-4">
                    @csrf
                    <div class="flex-wrap -mx-3 mb-6 grid">
                        {{--                        Date--}}
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label
                                class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-2 dark:text-gray-400 leading-relaxed"
                                for="grid-date">Date
                                <input
                                    class="appearance-none block w-full bg-white dark:bg-gray-800 text-white border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-900"
                                    id="date" name="date" type="date">
                            </label>
                        </div>
                        {{--                        Bodyweight(kg)--}}
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label
                                class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-2 dark:text-gray-400 leading-relaxed"
                                for="grid-bodyweight">Bodyweight(kg)
                                <input
                                    class="appearance-none block w-full bg-white dark:bg-gray-800 text-white border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-gray-900"
                                    id="grid-first-name" name="weight" type="text" placeholder="0">
                            </label>
                        </div>
                        {{--                        Bodyfat(%)--}}
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <label
                                class="block uppercase tracking-wide text-gray-500 text-xs font-bold mb-2 dark:text-gray-400 leading-relaxed"
                                for="grid-last-name">
                                Bodyfat(%)
                                <input
                                    class="appearance-none block w-full bg-white dark:bg-gray-800 text-white border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-gray-900"
                                    id="grid-bodyfat" name="bodyfat" type="text" placeholder="0">
                            </label>
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
