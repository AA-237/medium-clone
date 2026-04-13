<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <h1 class="text-4xl font-bold mb-2">{{ $post->title }}</h1>
                            <div class="text-gray-600">
                                <p>By <span class="font-semibold">{{ $post->user->name }}</span></p>
                                <p class="text-sm">{{ $post->created_at->format('M d, Y') }}</p>
                                <p class="text-sm text-blue-600">{{ $post->category->name }}</p>
                            </div>
                        </div>

                        @if (auth()->check() && auth()->user()->id === $post->user_id)
                            <div class="flex gap-2">
                                <a 
                                    href="{{ route('posts.edit', $post) }}" 
                                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
                                >
                                    Edit
                                </a>
                                <form 
                                    action="{{ route('posts.destroy', $post) }}" 
                                    method="POST" 
                                    onsubmit="return confirm('Are you sure you want to delete this post?')"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button 
                                        type="submit" 
                                        class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700"
                                    >
                                        Delete
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>

                    <div class="prose max-w-none">
                        {!! nl2br(e($post->content)) !!}
                    </div>

                    <div class="mt-8 pt-4 border-t border-gray-300">
                        <a 
                            href="{{ route('dashboard') }}" 
                            class="text-blue-600 hover:text-blue-800"
                        >
                            ← Back to Posts
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
