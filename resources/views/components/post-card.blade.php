@props(['post'])
<div class="rounded overflow-hidden shadow-lg">
    <a href="/posts/{{ $post->slug }}">

        <img class="w-full" src="{{ asset('storage/' . $post->thumbnail) }}" alt="Mountain">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">{{ $post->title }}</div>
            <span class="mt-2 block text-gray-400 text-xs">
                published <time>{{ $post->created_at->diffForHumans() }}</time>
            </span>
            <p class="text-gray-700 text-sm mt-2">
                {{ $post->excerpt }} </p>
        </div>
        {{-- <div class="hidden lg:block">
        <a href="/posts/{{ $post->slug }}" class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8">
        Read More</a>
    </div> --}}
    </a>
</div>
