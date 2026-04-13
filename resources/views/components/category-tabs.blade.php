{{--Directives: are special key word that provide certain task "iteration, and many others " --}}
<ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 dark:text-gray-400 text-body justify-center">
    <li class="me-2">
        <a href="#" class="inline-block px-4 py-2 rounded-base hover:text-heading hover:bg-neutral-secondary-soft">
            All</a>
    </li>
    @foreach ($categories as $category)
        <li class="me-2">
            <a href="#"
                class="inline-block px-4 py-2 rounded-base hover:text-heading hover:bg-neutral-secondary-soft">{{ $category->name }}</a>
        </li>
    @endforeach

</ul>