<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Weights') }}
        </h2>
    </x-slot>
    {{--All weights--}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900">
                <div class="mx-auto max-w-7xl">
                    <div class="bg-gray-800 py-10 rounded-lg">
                        <div class="px-4 sm:px-6 lg:px-8">
                            <div class="sm:flex sm:items-center">
                                <div class="sm:flex-auto">
                                    <h1 class="text-base font-semibold leading-6 text-white">All weights</h1>
                                    <p class="mt-2 text-sm text-gray-300">A list of all your weights.</p>
                                </div>
                                <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none text-white">
                                    <a href="{{ route('weight.create') }}"
                                       class="bg-green-600 hover:bg-green-500 text-white font-bold py-2 px-4 rounded-full">Create</a>
                                </div>
                            </div>
                            <div class="mt-8 flow-root">
                                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                        <table class="min-w-full divide-y divide-gray-700">
                                            <thead>
                                            <tr>
                                                <th scope="col"
                                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">
                                                    Date
                                                </th>
                                                <th scope="col"
                                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">
                                                    Weight
                                                </th>
                                                <th scope="col"
                                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">
                                                    Bodyfat
                                                </th>
                                                <th scope="col"
                                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">
                                                    Action
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-800">
                                            @if ($weights->count() == 0)
                                                <tr>
                                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-0">
                                                        You haven't created a weight yet.
                                                    </td>
                                                </tr>
                                            @else
                                                @foreach ($weights as $weight)
                                                    <tr>
                                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-0">
                                                            {{Carbon\Carbon::parse($weight->date)->format('l j F Y')}}</td>
                                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-0">
                                                            {{$weight->weight}}kg
                                                        </td>
                                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-0">
                                                            {{$weight->bodyfat}}%
                                                        </td>
                                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-0">
                                                            <a href="{{ url('/weight/' . $weight->id . '/edit') }}"
                                                               class="bg-orange-600 hover:bg-orange-500 text-white font-bold py-2 px-4 rounded-full">Edit</a>
                                                            <a
                                                                href="{{ url('/weight/' . $weight->id . '/destroy') }}"
                                                                class="bg-red-600 hover:bg-red-500 text-white font-bold py-2 px-4 rounded-full">Delete</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
