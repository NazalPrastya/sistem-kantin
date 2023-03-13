@extends('layout.main')
@section('content')
<div class="title w-full border-b-4 rounded-b-sm border-b-[#0F4061]">
    <h2 class="font-bold text-2xl inline ml-14"><i class="bx bx-store text-2xl text-blue-800"></i> Daftar Admin</h2>
</div>

<div class="container mt-5">
    <a href="{{ route('tAdmin') }}" class="px-5 py-2 mt-3 bg-blue-600 rounded-md hover:bg-blue-800 transition-all duration-300 text-white font-semibold">Tambah Admin</a>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                       No Hp
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as $admin)              
                    <tr class="border-b border-gray-200 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                            {{ $loop->iteration }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $admin->email }}
                        </td>  
                        <td class="px-6 py-4">
                            {{ $admin->no_hp }}
                        </td> 
                        <td class="px-6 py-4">
                           <form action="{{ route('delete-admin', $admin->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="bg-red-700 hover:bg-red-900 py-2 px-5 rounded-md text-white font-semibold duration-200">Delete</button>
                           </form>
                        </td>  
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection