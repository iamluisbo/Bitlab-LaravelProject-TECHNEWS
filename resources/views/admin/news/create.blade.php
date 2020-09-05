@extends('layouts.dashboard.dashboard')

@section('title','Crear Noticia')

@section('h1','Crear Noticia:')

@section('content')
    <div class="flex justify-center mt-8">
        <div class="block">
            @if ($errors->any())
                <div class="flex justify-center">
                    <img class="block w-12 text-center" src="{{ asset('img/icons/alert.svg') }}" alt="Alert!">
                </div>
                <p class="block text-red-800 text-center text-xl">Por favor completa correctamente el formulario</p>
            @endif
            <form action="{{ route('admin.news.store') }}" method="POST">
                @csrf
                <div class="flex justify-center mb-4">
                    <div class="block">
                        <div class="flex justify-center">
                            <label for="title" class="font-bold text-white">Título de la noticia:</label><br>
                        </div>
                        <div class="flex justify-center">
                            <input type="text" name="title" value="{{ old('title')}}"
                                class=" bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold mt-2">
                        </div>
                        @error('title')
                            <div class="text-red-800 text-center">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-center mb-4">
                    <div class="block">
                        <div class="flex justify-center">
                            <label for="description" class="font-bold text-white mb-2">Descripción de la noticia:</label><br>
                        </div>
                        <textarea name="description" rows="4" cols="75" value="{{ old('description')}}"
                        class="bg-white px-4 py-1 border-2 border-black border-solid rounded"></textarea>
                        @error('description')
                            <div class="text-red-800 text-center">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-center mb-4">
                    <div class="block">
                        <div class="flex justify-center">
                            <label for="article" class="font-bold text-white mb-2">Artículo:</label><br>
                        </div>
                        <textarea name="article" rows="25" cols="75" value="{{ old('article')}}"
                        class="bg-white px-4 py-1 border-2 border-black border-solid rounded"></textarea>
                        @error('article')
                            <div class="text-red-800 text-center">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-center mb-4">
                    <div class="block">
                        <div class="flex justify-center">
                            <label for="publication_date" class="font-bold text-white">Fecha a publicar</label><br>
                        </div>
                        <div class="flex justify-center">
                            <input type="text" name="publication_date" id="publication_date" value="{{ old('publication_date') }}"
                                class="bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold mt-2" 
                                placeholder="Seleccione una fecha">
                        </div>
                        @error('publication_date')
                            <div class="text-red-800 text-center">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-center mb-4">
                    <div class="block">
                        <div class="flex justify-center">
                            <label for="article" class="font-bold text-white mb-2">Categoría:</label><br>
                        </div>
                        <div class="flex justify-center">
                            <select name="category_id" id="" class=" bg-white px-4 py-1 border-2 border-black border-solid rounded font-bold mt-2">
                                <option value="">Seleccione una categoría</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('category_id')
                            <div class="text-red-800 text-center">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-center">
                    @include('partials.ui.redButton', ['label' => 'Guardar'])
                </div>
            </form>
            <div class="flex justify-center mt-4">
                <a href="{{ route('admin.news.index') }}" class="text-white hover:text-red-800 underline">← Regresar</a>
            </div>
        </div>
    </div>
    
@endsection