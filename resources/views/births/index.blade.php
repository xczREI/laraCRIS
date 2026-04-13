@extends('layouts.app')

@section('header', 'Birth Registry')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Birth Certificates</h2>
        <a href="{{ route('births.create') }}" class="bg-blue-600 text-white font-bold px-5 py-2 rounded shadow hover:bg-blue-700 transition">
            + New Record
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm">
            <p class="font-bold">Success</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <div class="bg-white rounded-lg shadow overflow-x-auto border-t-4 border-blue-600">
        <table class="min-w-full leading-normal">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-5 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Registry No.</th>
                    <th class="px-5 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Full Name</th>
                    <th class="px-5 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Encoded By</th>
                    <th class="px-5 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Date Added</th>
                    <th class="px-5 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Last Updated</th>
                    <th class="px-5 py-3 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($births as $birth)
                <tr class="hover:bg-gray-50 transition border-b border-gray-100">
                    <td class="px-5 py-4 text-sm font-bold">{{ $birth->registry_number }}</td>
                    <td class="px-5 py-4 text-sm">{{ $birth->first_name }} {{ $birth->last_name }}</td>

                    <td class="px-5 py-4 text-sm text-gray-600">
                        <span class="bg-gray-200 text-gray-800 py-1 px-2 rounded text-xs font-bold">
                            {{ $birth->staff->name ?? 'System Admin' }}
                        </span>
                    </td>

                    <td class="px-5 py-4 text-sm text-gray-600">
                        {{ $birth->created_at->format('M d, Y h:i A') }}
                    </td>

                    <td class="px-5 py-4 text-sm text-gray-500 italic">
                        {{ $birth->updated_at->diffForHumans() }}
                    </td>

                    <td class="px-5 py-4 text-sm font-medium">
                        <button class="text-blue-600 hover:text-blue-900 mr-3">View</button>
                        <button class="text-red-600 hover:text-red-900 font-bold border border-red-600 px-2 py-1 rounded hover:bg-red-50 text-xs">Print Form 102</button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-5 py-8 text-center text-gray-500 font-medium">No birth records found. Click "+ New Record" to add one.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
