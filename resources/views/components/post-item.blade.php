<div class="flex bg-neutral-primary-soft block border border-default rounded-base shadow-xs mb-8">
    <div class="flex-1 p-5">
        <a href="{{ route('posts.show', $post) }}">
            <h5 class="mt-6 mb-2 text-2xl font-semibold tracking-tight text-heading">
                {{ $post->title }}
            </h5>
        </a>
        <p class="mb-2 text-sm text-gray-600">
            By <span class="font-semibold">{{ $post->user->name }}</span> | {{ $post->category->name }}
        </p>
        <p class="mb-6 text-body">{{ Str::words($post->content, 20)}}</p>
        <div class="flex gap-2">
            <a href="{{ route('posts.show', $post) }}"
                class="inline-flex items-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                Read more
                <svg class="w-4 h-4 ms-1.5 rtl:rotate-180 -me-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 12H 5m14 0-4 4m4-4-4-4" />
                </svg>
            </a>
            @if (auth()->check() && auth()->user()->id === $post->user_id)
                <a href="{{ route('posts.edit', $post) }}"
                    class="inline-flex items-center text-blue-600 hover:text-blue-800 text-sm px-4 py-2">
                    Edit
                </a>
                <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Delete this post?')" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:text-red-800 text-sm px-4 py-2">Delete</button>
                </form>
            @endif
        </div>
    </div>
    @if ($post->image)
        <a href="{{ route('posts.show', $post) }}">
            <img class="w-48 h-full rounded-base object-cover" src="{{ $post->image }}" alt="{{ $post->title }}" />
        </a>
    @endif
</div>