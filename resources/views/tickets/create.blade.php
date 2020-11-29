@extends('layouts.app')
@section('title', 'Open Ticket')
@section('content')
    <div class="max-w-2xl bg-white py-5 px-5 m-auto w-full mt-10">

        <div class="text-3xl mb-3 text-center ">
            Abrir un Nuevo Ticket
        </div>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="form mt-4 p-6 flex flex-col justify-center">
            {!! csrf_field() !!}

            <div class="flex flex-col mt-2"{{ $errors->has('title') ? ' has-error' : '' }}">
            <p class="flex flex-col mt-2 justify-center sm:text-base text-center text-black ">Titulo </p>

        <label for="title" class="hidden">Titulo</label><p class="flex flex-col mt-2 text-center text-gray-400 ">Escriba un un breve titulo para su ticket </p>
        <input id= "title" type="text" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 font-semibold focus:border-indigo-500 focus:outline-none" placeholder="Titulo" name="title" value="{{ old('title') }}"/>
        @if ($errors->has('title'))
            <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
        @endif
    </div>


    <div class="flex flex-col mt-2">
        <div class="options md:flex md:space-x-6 text-sm items-center w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 font-semibold focus:border-indigo-500 focus:outline-none">
            <p class="flex flex-col mt-2 text-gray-400 ">Seleccione una Categoria </p>
            <select class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 font-semibold focus:border-indigo-500 focus:outline-none">
                <option value="select" selected></option>
                <option value="bug">report a bug</option>
                <option value="feature">Request a feature</option>
                <option value="feedback">Feedback</option>
            </select>
            <p class="flex flex-col mt-2 text-gray-400 font-semibold">Indique la Prioridad </p>
            <select class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 font-semibold focus:border-indigo-500 focus:outline-none">
                <option value="select" selected></option>
                <option value="bug">Low</option>
                <option value="feature">Medium</option>
                <option value="feedback">High</option>
            </select>
        </div>
    </div>

    {{--<div class="flex flex-col mt-2">
        <input type="text" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 font-semibold focus:border-indigo-500 focus:outline-none" placeholder="Email Address"/>
    </div>--}}

    <div class="col-span-2">
        <textarea cols="68" rows="10" class="w-100 mt-2 py-3 px-3 rounded-lg bg-white dark:bg-gray-800 border border-gray-400 dark:border-gray-700 text-gray-800 font-semibold focus:border-indigo-500 focus:outline-none" placeholder="Message"></textarea>
    </div>

    <div class="col-span-2 text-right">
        <button class="py-3 px-6 bg-green-500 text-white font-bold w-full sm:w-32">
            Submit
        </button>
    </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Open New Ticket</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form class="p-6 flex flex-col justify-center" role="form" method="POST">
                        {!! csrf_field() !!}
                        <div class="flex flex-col{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="sm:hover:border-white">title</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label for="category" class="col-md-4 control-label">Category</label>
                            <div class="col-md-6">
                                <select id="category" type="category" class="form-control" name="category">
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
                        </div>
                        <div class="form-group{{ $errors->has('priority') ? ' has-error' : '' }}">
                            <label for="priority" class="col-md-4 control-label">Priority</label>
                            <div class="col-md-6">
                                <select id="priority" type="" class="form-control" name="priority">
                                    <option value="">Select Priority</option>
                                    <option value="low">Low</option>
                                    <option value="medium">Medium</option>
                                    <option value="high">High</option>
                                </select>
                                @if ($errors->has('priority'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('priority') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                            <label for="message" class="col-md-4 control-label">Message</label>
                            <div class="col-md-6">
                                <textarea rows="10" id="message" class="form-control" name="message"></textarea>
                                @if ($errors->has('message'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-ticket"></i> Open Ticket
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
