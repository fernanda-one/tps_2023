@extends('layouts.template')
@section('title', 'Pemilih')
@section('judul1', 'Home')
@section('judul2', 'Pemilih')
@section('body')
    <header class="flex-col">
        <p class="text-2xl">Pemilih</p>
        <div class="flex justify-between my-4">
            <form action="/pemilih" method="get" enctype="multipart/form-data">
                <div class="relative">
                    <input type="search" name="search" value="{{ request('search') != '' ? request('search') : '' }}" class="block w-[392px] p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search">
                </div>
            </form>

            <!-- Tambah toggle -->
            <button data-modal-target="add-modal" data-modal-toggle="add-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Add Voter
            </button>

            <!-- Tambah modal -->
            <div id="add-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-[50%] max-h-full">
                    <!-- Tambah content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="add-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="px-6 py-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Add Voter</h3>
                            <div class="border border-gray-300 my-6"></div>
                            <form class="space-y-6" action="/pemilih-tambah" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="grid md:grid-cols-2 md:gap-6">
                                    <div class="relative z-0 w-full mb-4 group">
                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                        <input type="text" name="name" id="f-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required>
                                    </div>
                                    <div class="relative z-0 w-full mb-4 group">
                                        <label for="nik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK</label>
                                        <input type="number" name="nik" id="l-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required>
                                    </div>
                                </div>
                                <div class="grid md:grid-cols-2 md:gap-6">
                                    <div class="relative z-0 w-full mb-4 group">
                                        <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                        <input type="text" name="alamat" id="f-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required>
                                    </div>
                                    <div class="grid md:grid-cols-3 md:gap-6">
                                        <div class="relative z-0 w-full mb-4 group">
                                            <label for="rt" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">RT</label>
                                            <input type="number" name="rt" id="l-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required>
                                        </div>
                                        <div class="relative z-0 w-full mb-4 group">
                                            <label for="rw" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">RW</label>
                                            <input type="number" name="rw" id="l-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required>
                                        </div>
                                        <div class="relative z-0 w-full mb-4 group">
                                            <label for="lokasi_tps" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No TPS/Lok TPS</label>
                                            <input type="text" name="lokasi_tps" id="l-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid md:grid-cols-3 md:gap-6">
                                    <div class="relative z-0 w-full mb-4 group">
                                        <label for="kelurahan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelurahan</label>
                                        <input type="text" name="kelurahan" id="f-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required>
                                    </div>
                                    <div class="relative z-0 w-full mb-4 group">
                                        <label for="kecamatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan</label>
                                        <input type="text" name="kecamatan" id="f-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required>
                                    </div>
                                    <div class="relative z-0 w-full mb-4 group">
                                        <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No HP</label>
                                        <input type="number" name="phone_number" id="f-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required>
                                    </div>
                                </div>
                                <div class="grid md:grid-cols-1 md:gap-6">
                                    <div class="relative z-0 w-full mb-4 group">
                                        <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                                        <textarea type="text" name="keterangan" id="f-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required></textarea>
                                    </div>
                                <div>
                                <button type="submit" class="w-[18%] text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

        @if ($errors->any())
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-100 dark:bg-gray-800 dark:text-red-400 text-center" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li><span class="font-medium">{{ $error }}</span></li>
                    @endforeach
                </ul>
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
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($voters as $voter)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $voter->name }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                @if($voter->status == 'approved')
                                    <div class="bg-green-500 rounded-full w-2 h-2"></div>
                                    <p class="ml-2">Active</p>
                                @elseif($voter->status == 'rejected')
                                    <div class="bg-red-500 rounded-full w-2 h-2"></div>
                                    <p class="ml-2">InActive</p>
                                @elseif($voter->status == 'pending')
                                    <div class="bg-yellow-400 rounded-full w-2 h-2"></div>
                                    <p class="ml-2">InActive</p>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <!-- Edit toggle -->
                            <button data-modal-target="edit-modal" data-modal-toggle="edit-modal-{{$voter->id}}" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                                Update Voter
                            </button>
                        </td>
                    </tr>
                @endforeach
                @foreach($voters as $voter)
                    <!-- Edit modal -->
                    <div id="edit-modal-{{$voter->id}}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-[50%] max-h-full">
                            <!-- Edit content -->
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="edit-modal-{{$voter->id}}">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="px-6 py-6 lg:px-8">
                                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Update Voter</h3>
                                    <div class="border border-gray-300 my-6"></div>
                                    <form class="space-y-6" action="/pemilih-edit/{{$voter->id}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="grid md:grid-cols-2 md:gap-6">
                                            <div class="relative z-0 w-full mb-4 group">
                                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                                <input value="{{ $voter->name }}" type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required>
                                            </div>
                                            <div class="relative z-0 w-full mb-4 group">
                                                <label for="nik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK</label>
                                                <input value="{{ $voter->nik }}" type="number" name="nik" id="nik" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="grid md:grid-cols-2 md:gap-6">
                                            <div class="relative z-0 w-full mb-4 group">
                                                <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                                <input value="{{ $voter->alamat }}" type="text" name="alamat" id="alamat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required>
                                            </div>
                                            <div class="grid md:grid-cols-3 md:gap-6">
                                                <div class="relative z-0 w-full mb-4 group">
                                                    <label for="rt" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">RT</label>
                                                    <input value="{{ $voter->rt }}" type="number" name="rt" id="rt" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required>
                                                </div>
                                                <div class="relative z-0 w-full mb-4 group">
                                                    <label for="rw" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">RW</label>
                                                    <input value="{{ $voter->rw }}" type="number" name="rw" id="rw" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required>
                                                </div>
                                                <div class="relative z-0 w-full mb-4 group">
                                                    <label for="lokasi_tps" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No TPS/Lok TPS</label>
                                                    <input value="{{ $voter->lokasi_tps }}" type="text" name="lokasi_tps" id="lokasi_tps" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid md:grid-cols-3 md:gap-6">
                                            <div class="relative z-0 w-full mb-4 group">
                                                <label for="kelurahan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelurahan</label>
                                                <input value="{{ $voter->kelurahan }}" type="text" name="kelurahan" id="kelurahan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required>
                                            </div>
                                            <div class="relative z-0 w-full mb-4 group">
                                                <label for="kecamatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan</label>
                                                <input value="{{ $voter->kecamatan }}" type="text" name="kecamatan" id="kecamatan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required>
                                            </div>
                                            <div class="relative z-0 w-full mb-4 group">
                                                <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No HP</label>
                                                <input value="{{ $voter->phone_number }}" type="number" name="phone_number" id="phone_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="grid md:grid-cols-1 md:gap-6">
                                            <div class="relative z-0 w-full mb-4 group">
                                                <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                                                <input value="{{ $voter->keterangan }}" type="text" name="keterangan" id="keterangan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="" required></input>
                                            </div>
                                            <div>
                                                <button type="submit" class="w-[18%] text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="flex mt-[32px] justify-between">
        <div>
            <span class="text-sm text-gray-700 dark:text-gray-400">
                Showing <span class="font-semibold text-gray-900 dark:text-white">1</span> to <span class="font-semibold text-gray-900 dark:text-white">{{ $voters->count() }}</span> of <span class="font-semibold text-gray-900 dark:text-white">{{ $voters->total() }}</span>
            </span>
        </div>
        <div class="flex">
            @if ($voters->onFirstPage())
                <button type="button" class="flex items-center justify-center px-3 h-8 mr-3 text-sm font-medium text-white bg-blue-400 dark:bg-blue-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center" disabled>
                    <svg class="w-2.5 h-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                    Previous
                </button>
            @else
                <a href="{{ $voters->previousPageUrl() }}" class="flex items-center justify-center px-3 h-8 mr-3 text-sm font-medium text-white bg-blue-600 border border-blue-300 rounded-lg hover:bg-blue-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <svg class="w-2.5 h-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                    Previous
                </a>
            @endif

            @if ($voters->hasMorePages())
                <a href="{{ $voters->nextPageUrl() }}" class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-blue-600 border border-blue-300 rounded-lg hover:bg-blue-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
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
