<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $publicacion->titulo }}
            </h2>
            <div class="flex space-x-4">
                <a href="{{ route('posts.edit', ['post' => $publicacion->id]) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                    Editar
                </a>
                <form action="{{ route('posts.destroy', ['post' => $publicacion->id]) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('¿Estás seguro?')">
                        Eliminar
                    </button>
                </form>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <div class="text-sm text-gray-500">
                            Publicado {{ $publicacion->created_at->diffForHumans() }}
                        </div>
                        <div class="mt-4 whitespace-pre-wrap">
                            {{ $publicacion->contenido }}
                        </div>
                    </div>
                    
                    <div class="mt-6">
                        <a href="{{ route('posts.index') }}" class="text-blue-600 hover:text-blue-800">
                            ← Volver a publicaciones
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>