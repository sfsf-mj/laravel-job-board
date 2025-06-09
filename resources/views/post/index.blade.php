<x-layout :title="$pageTitle">
    @if (session('message'))
        <div class="bg-green-50 border-l-4 border-green-400 p-4 mb-4">
            {{-- <h3 class="text-sm/6 font-medium text-green-800">Success!</h3> --}}
            <p class="mt-2 text-sm/6 text-green-700">{{ session('message') }}</p>
        </div>
    @endif

    <div class="mt-6 flex items-center justify-end gap-x-6">
        <a href="/blog/create"
            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create</a>
    </div>

    {{-- Adding post via PostController@factoryCreate --}}
    {{-- <div class="mt-4">
        <form action="/blog" method="POST">
            @csrf
            <button type="submit"
                class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring ring-indigo-200 disabled:opacity-25 transition ease-in-out duration-150">
                Add Post
            </button>
        </form>
    </div> --}}

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap -m-4">
                @foreach ($posts as $post)
                    <div class="xl:w-1/3 md:w-1/2 p-4">
                        <div class="border border-gray-200 p-6 rounded-lg">
                            <a href="/blog/{{ $post->id }}">
                                <div
                                    class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                </div>
                                <span class="ml-1 mb-1">{{ $post->author }}</span>
                                <h2 class="text-lg text-gray-900 font-medium title-font mb-2">{{ $post->title }}</h2>
                            </a>
                            {{-- <p class="leading-relaxed text-base">{{ $post->body }}</p> --}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{ $posts->links() }}
    </section>

</x-layout>
