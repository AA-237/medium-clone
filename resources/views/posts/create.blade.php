<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-3xl font-bold mb-6">Create New Post</h1>

                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('posts.store') }}" method="POST" class="space-y-4">
                        @csrf

                        <div>
                            <label for="title" class="block text-sm font-medium mb-2">Title</label>
                            <input 
                                type="text" 
                                name="title" 
                                id="title" 
                                class="w-full border border-gray-300 rounded px-3 py-2"
                                value="{{ old('title') }}"
                                required
                            >
                        </div>

                        <div>
                            <label for="category_id" class="block text-sm font-medium mb-2">Category</label>
                            <select 
                                name="category_id" 
                                id="category_id" 
                                class="w-full border border-gray-300 rounded px-3 py-2"
                                required
                            >
                                <option value="">Select a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="image" class="block text-sm font-medium mb-2">Image URL</label>
                            <input 
                                type="text" 
                                name="image" 
                                id="image" 
                                class="w-full border border-gray-300 rounded px-3 py-2"
                                placeholder="https://example.com/image.jpg"
                                value="{{ old('image') }}"
                            >
                        </div>

                        <div>
                            <label for="content" class="block text-sm font-medium mb-2">Content</label>
                            <textarea 
                                name="content" 
                                id="content" 
                                rows="10" 
                                class="w-full border border-gray-300 rounded px-3 py-2"
                                required
                            >{{ old('content') }}</textarea>
                        </div>

                        <div class="flex gap-4">
                            <button 
                                type="submit" 
                                class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700"
                            >
                                Create Post
                            </button>
                            <a 
                                href="{{ route('dashboard') }}" 
                                class="bg-gray-300 text-gray-700 px-6 py-2 rounded hover:bg-gray-400"
                            >
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
