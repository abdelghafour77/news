<x-layout>

    @if ($posts->count())
        <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-5">
            @foreach ($posts as $post)
                <x-post-card :post="$post" />
            @endforeach
        </div>
        {{ $posts->links() }}
        <br>
        <br>
    @else
        <p>No Post Yet!</p>
    @endif
    </div>

</x-layout>
