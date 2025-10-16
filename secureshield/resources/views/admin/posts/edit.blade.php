<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Title -->
                        <div class="mb-6">
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Título *</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                required>
                            @error('title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Content -->
                        <div class="mb-6">
                            <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Contenido *</label>
                            <textarea name="content" id="content" rows="12"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                required>{{ old('content', $post->content) }}</textarea>
                            @error('content')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Current Image -->
                        @if($post->image)
                        <div class="mb-6">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Imagen actual</label>
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="max-w-xs rounded-lg shadow-md">
                        </div>
                        @endif

                        <!-- Image Upload -->
                        <div class="mb-6">
                            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ $post->image ? 'Cambiar imagen (opcional)' : 'Subir imagen (opcional)' }}
                            </label>
                            <input type="file" name="image" id="image" accept="image/*"
                                class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            <p class="mt-1 text-sm text-gray-500">Formatos permitidos: JPG, PNG, GIF. Máximo 2MB.</p>
                            @error('image')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Image Preview -->
                        <div class="mb-6" id="imagePreview" style="display: none;">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nueva imagen (vista previa)</label>
                            <img id="preview" src="" alt="Preview" class="max-w-xs rounded-lg shadow-md">
                        </div>

                        <!-- Is Published -->
                        <div class="mb-6">
                            <label class="flex items-center">
                                <input type="checkbox" name="is_published" value="1"
                                    {{ old('is_published', $post->is_published) ? 'checked' : '' }}
                                    class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <span class="ml-2 text-sm text-gray-700">Publicado</span>
                            </label>
                        </div>

                        <!-- Post Info -->
                        <div class="mb-6 p-4 bg-gray-50 rounded-lg">
                            <p class="text-sm text-gray-600">
                                <strong>Autor:</strong> {{ $post->author->name }}<br>
                                <strong>Creado:</strong> {{ $post->created_at->format('d/m/Y H:i') }}<br>
                                @if($post->published_at)
                                <strong>Publicado:</strong> {{ $post->published_at->format('d/m/Y H:i') }}
                                @endif
                            </p>
                        </div>

                        <!-- Buttons -->
                        <div class="flex gap-4">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded">
                                Actualizar Post
                            </button>
                            <a href="{{ route('admin.posts.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-6 rounded">
                                Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // Image preview
        document.getElementById('image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview').src = e.target.result;
                    document.getElementById('imagePreview').style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
    @endpush
</x-app-layout>
