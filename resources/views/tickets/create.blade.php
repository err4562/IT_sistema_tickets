@extends('layouts.app')
@section('title', 'Open Ticket')
@section('content')
    <div class="max-w-2xl bg-white py-5 px-5 m-auto w-full mt-10">

        <div class="text-3xl mb-3 text-center">
            Abrir un Nuevo Ticket
        </div>

        @if (session('status'))
            <div class="w-full bg-green-500 text-white">
                <div class="flex justify-between items-center container mx-auto py-4 px-6">
                    <div class="flex">
                        <svg viewBox="0 0 40 40" class="h-6 w-6 fill-current">
                            <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z"></path>
                        </svg>
                        <p class="mx-3">{{ session('status') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <form class="form mt-4 p-6 flex flex-col justify-center" role="form" method="POST">
            {!! csrf_field() !!}

            <div class="flex flex-col mt-2"{{ $errors->has('title') ? ' has-error' : '' }}">
                <p class="flex flex-col mt-2 justify-center sm:text-base text-center text-black ">Titulo </p>

            <label for="title" class="hidden">Titulo</label>
                <p class="flex flex-col mt-2 text-center text-gray-400 ">Escriba un un breve titulo para su ticket </p>
            <input id= "title" type="text" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 font-semibold focus:border-indigo-500 focus:outline-none" placeholder="Titulo" name="title" value="{{ old('title') }}"/>
            @if ($errors->has('title'))
                <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
            @endif
                <div class="flex flex-col mt-2 ">
                    <form class="options md:flex md:space-x-6 text-sm items-center w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 font-semibold focus:border-indigo-500 focus:outline-none">
                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                        <p class="flex flex-col mt-2 text-gray-400 ">Seleccione una Categoria </p>
                        <select id="category" type="category" name="category" class="w-full mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 font-semibold focus:border-indigo-500 focus:outline-none">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('category'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                        @endif
                        </div>
                        <div class="{{ $errors->has('priority') ? ' has-error' : '' }}">
                        <p class="flex flex-col mt-2 text-gray-400 font-semibold">Indique la Prioridad </p>
                        <select id="priority" type="" name="priority" class="w-full mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 font-semibold focus:border-indigo-500 focus:outline-none">
                            <option value="">Seleccione la Prioridad</option>
                            <option value="low">Baja</option>
                            <option value="medium">Media</option>
                            <option value="high">Alta</option>
                        </select>
                            @if ($errors->has('priority'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('priority') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </form>
                </div>
                <div class="col-span-2 {{ $errors->has('message') ? ' has-error' : '' }}">
                    <textarea cols="68" rows="10" id="message" name="message" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 font-semibold focus:border-indigo-500 focus:outline-none" placeholder="Message"></textarea>
                    @if ($errors->has('message'))
                        <span class="help-block">
                            <strong>{{ $errors->first('message') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-span-2 text-right">
                    <button type="submit" class="py-3 px-6 bg-green-500 text-white font-bold w-full sm:w-62">
                        Crear Ticket
                    </button>
                </div>
        </form>
    </div>
@endsection
