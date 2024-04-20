<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Weights') }}
        </h2>
    </x-slot>
    {{--All users--}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900">
                <div class="mx-auto max-w-7xl">
                    <div class="bg-gray-800 py-10 rounded-lg">
                        <div class="px-4 sm:px-6 lg:px-8">
                            <div class="sm:flex sm:items-center">
                                <div class="sm:flex-auto">
                                    <h1 class="text-base font-semibold leading-6 text-white">All weight</h1>
                                    <p class="mt-2 text-sm text-gray-300">A list of all the weights.</p>
                                </div>
                                <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none text-white">
                                    <p>test</p>
                                </div>
                            </div>
                            <div class="mt-8 flow-root">
                                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
{{--                                        <table class="min-w-full divide-y divide-gray-700">--}}
{{--                                            <thead>--}}

{{--                                            <tr>--}}
{{--                                                <th scope="col"--}}
{{--                                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">--}}
{{--                                                    #--}}
{{--                                                </th>--}}
{{--                                                <th scope="col"--}}
{{--                                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">--}}
{{--                                                    Name--}}
{{--                                                </th>--}}
{{--                                                <th scope="col"--}}
{{--                                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">--}}
{{--                                                    Email--}}
{{--                                                </th>--}}
{{--                                                <th scope="col"--}}
{{--                                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">--}}
{{--                                                    Created_at--}}
{{--                                                </th>--}}
{{--                                                <th scope="col"--}}
{{--                                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">--}}
{{--                                                    Updated_at--}}
{{--                                                </th>--}}
{{--                                            </tr>--}}
{{--                                            </thead>--}}
{{--                                            <tbody class="divide-y divide-gray-800">--}}
{{--                                            @if ($users->count() == 0)--}}
{{--                                                <tr>--}}
{{--                                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-0">--}}
{{--                                                        There are no others.--}}
{{--                                                    </td>--}}
{{--                                                </tr>--}}
{{--                                            @else--}}
{{--                                                @foreach ($users as $user)--}}
{{--                                                    <tr>--}}
{{--                                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-0">{{$user->id}}</td>--}}
{{--                                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-0">{{$user->name}}</td>--}}
{{--                                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-0">{{$user->email}}</td>--}}
{{--                                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-0">{{$user->created_at}}</td>--}}
{{--                                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-0">{{$user->updated_at}}</td>--}}
{{--                                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-0">--}}
{{--                                                            <a href="{{ url('/friend/' . $user->id . '/request') }}"--}}
{{--                                                               class="bg-orange-600 hover:bg-orange-500 text-white font-bold py-2 px-4 rounded-full">Friend--}}
{{--                                                                request</a></td>--}}
{{--                                                    </tr>--}}
{{--                                                @endforeach--}}
{{--                                            @endif--}}
{{--                                            </tbody>--}}
{{--                                        </table>--}}
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
