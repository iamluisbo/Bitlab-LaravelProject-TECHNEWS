@extends('layouts.dashboard.adminDashboard')

@section('title','Noticias')
@section('h1','Noticias:')


@section('content')
    <div class="flex justify-center mt-8">
        @include('partials.ui.linkButton', ['label' => 'Crear Noticia', 'url' => route('admin.news.create')])
    </div>
    @if (count($news) == 0)
        <div class="flex justify-center mt-8">
            <div class="block">
                <div class="flex justify-center">
                    <img class="block w-12 text-center" src="img/icons/alert.svg" alt="Alert!">
                </div>
                <p class="block text-white text-xl">¡No hay noticias creadas!</p>
            </div>
        </div>
    @else
        @foreach($news as $item)
            {{-- <div class="md:flex md:justify-center p-2">
                    <a href="{{ route('admin.news.show', $item->id) }}" 
                        class="flex items-center bg-white p-4 w-full md:w-1/2 rounded 
                                hover:bg-blue-800 hover:text-white">
                    <img src="{{ asset('img/logo/TechNewsLogo-Brujula.png') }}" alt="Tech News Logo" class="w-8 rounded-full">
                        <span class="font-bold ml-2">{{ $item->title }} </span>
                        <span class="ml-2">Descrición: {{ $item->description }} </span>
                    </a>
            </div> --}}
            <div class="md:flex md:justify-center p-2">
            <div class="w-full md:w-1/2">
                <a href="{{ route('admin.news.show', $item->id) }}" 
                    class="block items-center bg-white p-4 w-full h-full rounded 
                            hover:bg-blue-800 hover:text-white">
                    <div class="flex justify-center mb-2 w-full">
                        @if (!is_null($item->image))
                            <img src="{{ asset("storage/news-images/{$item->image}")}}" alt="" class="w-full h-64 object-cover rounded">
                        @else
                            <img src="{{ asset('img/logo/TechNewsLogo-Brujula.png') }}" alt="Tech News Logo" class="h-64 ">
                        @endif
                    </div>
                    <h2 class="font-bold">{{ \Illuminate\Support\Str::limit($item->title, 40)}} </h2>
                    <div class="md:h-20">
                        <p class="mb-2">
                            Descripción: {{ \Illuminate\Support\Str::limit($item->description, 110) }}
                        </p>
                    </div>
                    <div class="flex font-bold px-4 py-1 border-2 border-solid rounded mr-4 bg-white">
                        <div class="p-1 mr-1">
                            <img src="{{ asset('img/icons/liked0.svg') }}" alt="Likes-Icon" class="w-4 h-4">
                        </div>
                        <div class="flex items-center text-black">
                            {{ $item->reading_histories_count }} 
                        </div>
                        <div class="p-1 ml-2 mr-1">
                            <img src="{{ asset('img/icons/commentBlack.svg') }}" alt="Comments-Icon" class="w-4 h-4">
                        </div>
                        <div class="flex items-center text-black">
                            {{ $item->comments_count }} 
                        </div>
                        <div class="flex items-center ml-2 text-black">
                            <span class="mr-2 font-normal">Escritor:</span>
                            <div class="flex items-center">
                                {{ $item->user->user_name }} 
                                @if (!is_null($item->user->image))
                                    <div class="w-6 ml-1">
                                        <img src="{{ asset("storage/users-profilePicture/{$item->user->image}")}}" alt="" class="h-6 w-full object-cover rounded-full bg-white">
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            </div>
        @endforeach
    @endif
@endsection