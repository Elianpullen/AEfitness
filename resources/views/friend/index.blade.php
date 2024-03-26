<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Friends') }}
        </h2>
    </x-slot>
    {{--All users--}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 py-10 rounded-lg">
                <div class="mx-auto max-w-7xl">
                    <div class="px-4 sm:px-6 lg:px-8">
                        <div class="sm:flex sm:items-center">
                            <div class="sm:flex-auto">
                                <h1 class="text-base font-semibold leading-6 text-white">Users</h1>
                                <p class="mt-2 text-sm text-gray-300">A list of all your users</p>
                            </div>
                            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            </div>
                        </div>
                        <div class="mt-8 flow-root">
                            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                    <table class="min-w-full divide-y divide-gray-700">
                                        <thead>
                                        <tr>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-white">Name
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-white">Email
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-white">Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-800">
                                        @foreach($users as $user)
                                            <tr>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300">
                                                    {{ $user->name }}
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300">
                                                    {{ $user->email }}
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300">
{{--                                                    <a href="{{ url('/friend/' . $user->id . '/reject') }}"--}}
{{--                                                       class="bg-red-600 hover:bg-red-500 text-white font-bold py-2 px-4 rounded-full">Reject</a>--}}
                                                </td>
                                            </tr>
                                        @endforeach
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
    {{--All friends--}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 py-10 rounded-lg">
                <div class="mx-auto max-w-7xl">
                    <div class="px-4 sm:px-6 lg:px-8">
                        <div class="sm:flex sm:items-center">
                            <div class="sm:flex-auto">
                                <h1 class="text-base font-semibold leading-6 text-white">Friends</h1>
                                <p class="mt-2 text-sm text-gray-300">A list of all the friends</p>
                            </div>
                            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
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
                                                #
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-white">User#
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-white">Friend#
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-800">
                                        @dd($friends)
                                        @foreach($friends as $friend)
                                            @dd($friend)
                                            <tr>
                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-0">
                                                    {{ $friend->id }}
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300">
                                                    {{ $friend->user_id }}
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300">
                                                    {{ $friend->friend_id }}
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300">
                                                    <a href="{{ url('/friend/' . $friend->id . '/reject') }}"
                                                       class="bg-red-600 hover:bg-red-500 text-white font-bold py-2 px-4 rounded-full">Reject</a>
                                                </td>
                                            </tr>
                                        @endforeach
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
    {{--Received friend requests--}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 py-10 rounded-lg">
                <div class="mx-auto max-w-7xl">
                    <div class="px-4 sm:px-6 lg:px-8">
                        <div class="sm:flex sm:items-center">
                            <div class="sm:flex-auto">
                                <h1 class="text-base font-semibold leading-6 text-white">Received friend requests</h1>
                                <p class="mt-2 text-sm text-gray-300">A list of all received friend requests</p>
                            </div>
                            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
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
                                                #
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-white">Name
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-white">Email
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-white">Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-800">
                                        @php
                                            $receivedPendingRequests = auth()->user()->receivedFriendRequests()
                                            ->where('status', 'pending')
                                            ->where('sender_id', '!=', auth()->user()->id)
                                            ->where('receiver_id', '=', auth()->user()->id)
                                            ->get();
                                        @endphp
                                        @foreach($receivedPendingRequests as $receivedPendingRequest)
                                            <tr>
                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-0">
                                                    {{ $receivedPendingRequest->id }}
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300">
                                                    {{ $receivedPendingRequest->name }}
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300">
                                                    {{ $receivedPendingRequest->email }}
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300">
                                                    <a href="{{ url('/friend/' . $receivedPendingRequest->id . '/accept') }}"
                                                       class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full">Accept</a>
                                                    <a href="{{ url('/friend/' . $receivedPendingRequest->id . '/reject') }}"
                                                       class="bg-red-600 hover:bg-red-500 text-white font-bold py-2 px-4 rounded-full">Reject</a>
                                                </td>
                                            </tr>
                                        @endforeach
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
    {{--Sent friend requests--}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 py-10 rounded-lg">
                <div class="mx-auto max-w-7xl">
                    <div class="px-4 sm:px-6 lg:px-8">
                        <div class="sm:flex sm:items-center">
                            <div class="sm:flex-auto">
                                <h1 class="text-base font-semibold leading-6 text-white">Sent friend requests</h1>
                                <p class="mt-2 text-sm text-gray-300">A list of all sent friend requests</p>
                            </div>
                            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            </div>
                        </div>
                        <div class="mt-8 flow-root">
                            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                    <table class="min-w-full divide-y divide-gray-700">
                                        <thead>
                                        <tr>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-white">Name
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-white">Email
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-white">Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-800">
                                        @php
                                            $sendPendingRequests = auth()->user()->sentFriendRequests()
                                            ->where('status', 'pending')
                                            ->where('sender_id', '=', auth()->user()->id)
                                            ->where('receiver_id', '!=', auth()->user()->id)
                                            ->get();
                                        @endphp
                                        @foreach($sendPendingRequests as $sendPendingRequest)
                                            <tr>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300">
                                                    {{ $sendPendingRequest->name }}
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300">
                                                    {{ $sendPendingRequest->email }}
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300">
                                                    <a href="{{ url('/friend/' . $sendPendingRequest->id . '/cancel') }}"
                                                       class="bg-red-600 hover:bg-red-500 text-white font-bold py-2 px-4 rounded-full">Cancel</a>
                                                </td>
                                            </tr>
                                        @endforeach
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
</x-app-layout>
