<x-layout :title="$pageTitle">

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap -m-4">
                <div class="xl:w-1/3 md:w-1/2 p-4">
                    <div class="border border-gray-200 p-6 rounded-lg">
                        <div
                            class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                                <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                        <span class="ml-1 mb-1">{{ $post->author }}</span>
                        <h2 class="text-lg text-gray-900 font-medium title-font mb-2">{{ $post->title }}</h2>
                        <p class="leading-relaxed text-base">{{ $post->body }}</p>
                        @if ($post->comments->count() > 0)
                            <div class="mt-4">
                                <h3 class="text-sm font-semibold">Comments:</h3>
                                <ul class="list-disc pl-5">
                                    @foreach ($post->comments as $comment)
                                        <li class="text-gray-600">
                                            {{ $comment->content }}
                                            <span class="text-xs text-gray-500">by {{ $comment->author }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if ($post->tags != null)
                            <div class="mt-4">
                                <h3 class="text-sm font-semibold">Tags:</h3>
                                <ul class="list-disc pl-5">
                                    @foreach ($post->tags as $tag)
                                        <li class="text-gray-600">
                                            <span class="text-xs text-gray-500">by {{ $tag->title }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="mt-4">
                            <form action="/comment/create/{{ $post->id }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring ring-indigo-200 disabled:opacity-25 transition ease-in-out duration-150">
                                    Add comment
                                </button>
                            </form>
                        </div>
                        <div class="mt-4">
                            <form action="/blog/delete/{{ $post->id }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring ring-indigo-200 disabled:opacity-25 transition ease-in-out duration-150">
                                    Delete post
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layout>
