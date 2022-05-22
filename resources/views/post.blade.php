<x-layout>


    <!--Container-->
	<div class="container w-full md:max-w-3xl mx-auto pt-20">

		<div class="w-full px-4 md:px-6 text-xl text-gray-800 leading-normal" style="font-family:Georgia,serif;">

			<!--Title-->
			<div class="font-sans">
				<p class="text-base md:text-sm text-green-500 font-bold">&lt;
                    <a href="/" class="text-base md:text-sm text-green-500 font-bold no-underline hover:underline">BACK TO HOME</a>
                </p>
				<h1 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-2 text-3xl md:text-4xl">{{ $post->title }}</h1>
				<p class="text-sm md:text-base font-normal text-gray-600 pb-5">Published {{ $post->created_at->diffForHumans() }}</p>
                <img class="w-full" src="/images/news.jpg" alt="Mountain">
			</div>

			<!--Post Content-->

			<!--Lead Para-->
			<p class="py-6">
                {!!$post->body!!}</p>

			<!--/ Post Content-->

		</div>






		<!--Divider-->
		<hr class="border-b-2 border-gray-400 mb-8 mx-4">

		<!--Next & Prev Links-->
		{{-- <div class="font-sans flex justify-between content-center px-4 pb-12">
			<div class="text-left">
				<span class="text-xs md:text-sm font-normal text-gray-600">&lt; Previous Post</span><br>
				<p><a href="#" class="break-normal text-base md:text-sm text-green-500 font-bold no-underline hover:underline">Blog title</a></p>
			</div>
			<div class="text-right">
				<span class="text-xs md:text-sm font-normal text-gray-600">Next Post &gt;</span><br>
				<p><a href="#" class="break-normal text-base md:text-sm text-green-500 font-bold no-underline hover:underline">Blog title</a></p>
			</div>
		</div> --}}
		<!--/Next & Prev Links-->

	</div>

</x-layout>
