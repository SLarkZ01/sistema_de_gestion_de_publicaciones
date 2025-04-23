<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Mis Publicaciones') }}
            </h2>
            <a href="{{ route('posts.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Nueva Publicación
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    {{ session('status') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if($publicaciones->isEmpty())
                        <p class="text-gray-500">No tienes publicaciones aún.</p>
                    @else
                        <div class="space-y-4">
                            @foreach($publicaciones as $publicacion)
                                <div class="border-b pb-4">
                                    <h3 class="text-lg font-semibold">{{ $publicacion->titulo }}</h3>
                                    <p class="text-gray-600 mt-2">{{ Str::limit($publicacion->contenido, 200) }}</p>
                                    <div class="mt-4 flex space-x-4">
                                        <a href="{{ route('posts.show', ['post' => $publicacion->id]) }}" class="text-blue-600 hover:text-blue-800">Ver</a>
                                        <a href="{{ route('posts.edit', ['post' => $publicacion->id]) }}" class="text-yellow-600 hover:text-yellow-800">Editar</a>
                                        <form action="{{ route('posts.destroy', ['post' => $publicacion->id]) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('¿Estás seguro?')">
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>