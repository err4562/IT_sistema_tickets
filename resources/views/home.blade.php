@extends('layouts.app')

@section('content')
<div class="bg-gray-50">
    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8 lg:flex lg:items-center lg:justify-between">
        <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
            <span class="block">Panel de Control</span>
            <span class="block text-indigo-600">Bienvenido {{Auth::user()->name}}</span>
        </h2>
        <div class="mt-8 lex lg:mt-0 lg:flex-shrink-0">
            @if(Auth::user()->is_admin)
            <div class="inline-flex rounded-md shadow">
                <a href="{{ url('admin/new-ticket') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                    Crear un nuevo ticket
                </a>
            </div>
            <div class="inline-flex rounded-md shadow">
                <a href="{{ url('admin/tickets') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                    See all tickets
                </a>
            </div>
            <div class="ml-3 inline-flex rounded-md shadow">
                <div class="ml-3 inline-flex rounded-md shadow">
                    <a href="{{ url('my_tickets') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50">
                        See your tickets
                    </a>
                </div>
            </div>
            @else
                <div class="inline-flex rounded-md shadow">
                    <a href="{{ url('new-ticket') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                        Crear un nuevo ticket
                    </a>
                </div>
                <div class="ml-3 inline-flex rounded-md shadow">
                    <a href="{{ url('my_tickets') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50">
                        See your tickets
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection
