<x-app-layout>


    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900 flex justify-between items-center">
                  <x-category-tabs />
                  <a href="{{ route('posts.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                      Create Post
                  </a>
                </div>
            </div>
            {{-- --}}
            <div class="mt-8">
                <div class="p-4 max-w-5xl">
                    @forelse ($posts as $post)
                      <x-post-item :post="$post"/>
                    @empty
                        <div>
                            <p class="text-center text-gray-600 py-16">No Posts Found..</p>
                        </div>
                    @endforelse
                </div>
                {{ $posts->onEachSide(1)->links() }}
            </div>
        </div>
    </div>
</x-app-layout>