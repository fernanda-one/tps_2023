@extends('layouts.template')
@section('title', 'Dashboard')
@section('judul1', 'Home')
@section('judul2', 'Dashboard')

@section('body')
    <header class="flex justify-between">
        <p class="text-2xl">All Users</p>
        <form action="/dashboard" method="get" enctype="multipart/form-data">
            <div class="relative">
                <input type="search" name="search" value="{{ request('search') != '' ? request('search') : '' }}" class="block w-[392px] p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search">
            </div>
        </form>
    </header>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-[35px]">
        @if ($message = session('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-100 dark:bg-gray-800 dark:text-green-400 text-center" role="alert">
            <span class="font-medium">{{ $message }}</span>
        </div>
        @elseif ($message = session('error'))
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-100 dark:bg-gray-800 dark:text-red-400 text-center" role="alert">
            <span class="font-medium">{{ $message }}</span>
        </div>
        @endif

        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No
                </th>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Telephone
                </th>
                <th scope="col" class="px-6 py-3">
                    NIK
                </th>
                <th scope="col" class="px-6 py-3">
                    Alamat
                </th>
                <th scope="col" class="px-6 py-3">
                    RT
                </th>
                <th scope="col" class="px-6 py-3">
                    RW
                </th>
                <th scope="col" class="px-6 py-3">
                    Kelurahan
                </th>
                <th scope="col" class="px-6 py-3">
                    Kecamatan
                </th>
                <th scope="col" class="px-6 py-3">
                    Lokasi TPS
                </th>
                <th scope="col" class="px-6 py-3">
                    Keterangan
                </th>
                <th scope="col" class="px-6 py-3">
                    Created by
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
            </thead>
            <tbody>
                @foreach ($data as $value)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $value->name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $value->phone_number }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $value->nik }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $value->alamat }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $value->rt }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $value->rw }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $value->kelurahan }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $value->kecamatan }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $value->lokasi_tps }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $value->keterangan }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $value->created_by }}
                        </td>
                        <td class="px-6 py-4">

                            <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" type="button">
                                <img src="assets/dashboard/detail_pemilih.png" alt="detail_pemilih">
                            </button>

                            <div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-10 text-center">
                                            <div class="flex justify-between">
                                                <a href="/dashboard-edit/{{$value->id}}/?status=rejected" class="w-full text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm  items-center px-5 py-2.5 text-center mr-2">
                                                    <button data-modal-hide="popup-modal" type="button">
                                                        Reject
                                                    </button>
                                                </a>
                                                <a href="/dashboard-edit/{{$value->id}}/?status=approved" class="w-full text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm items-center px-5 py-2.5 text-center mr-2">
                                                    <button data-modal-hide="popup-modal" type="button">
                                                            Approve
                                                    </button>
                                                </a>
                                            </div>
                                            <button data-modal-hide="popup-modal" type="button" class="w-full mt-[21px] text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                cancel
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="flex mt-[32px] justify-between">
        <div>
            <span class="text-sm text-gray-700 dark:text-gray-400">
                Showing <span class="font-semibold text-gray-900 dark:text-white">1</span> to <span class="font-semibold text-gray-900 dark:text-white">{{ $data->count() }}</span> of <span class="font-semibold text-gray-900 dark:text-white">{{ $data->total() }}</span>
            </span>
        </div>
        <div class="flex">
            @if ($data->onFirstPage())
            <button type="button" class="flex items-center justify-center px-3 h-8 mr-3 text-sm font-medium text-white bg-blue-400 dark:bg-blue-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center" disabled>
                <svg class="w-2.5 h-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
                Previous
            </button>
            @else
            <a href="{{ $data->previousPageUrl() }}" class="flex items-center justify-center px-3 h-8 mr-3 text-sm font-medium text-white bg-blue-600 border border-blue-300 rounded-lg hover:bg-blue-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                <svg class="w-2.5 h-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
                Previous
            </a>
            @endif

            @if ($data->hasMorePages())
            <a href="{{ $data->nextPageUrl() }}" class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-blue-600 border border-blue-300 rounded-lg hover:bg-blue-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                Next
                <svg class="w-2.5 h-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
            </a>
            @else
            <button type="button" class="flex items-center justify-center px-3 h-8 mr-3 text-sm font-medium text-white bg-blue-400 dark:bg-blue-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center" disabled>
                Next
                <svg class="w-2.5 h-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
            </button>
            @endif
        </div>
    </div>
@endsection
