<x-layout :title="$pageTitle">

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap -m-4">
                <a href="/tag/create" class="text-blue-500 hover:text-blue-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6m3.75-9h10.5a2.25 2.25 0 012.25 2.25v12a2.25 2.25 0 01-2.25 2.25H8.25A2.25 2.25 0 016 18V6.75A2.25 2.25 0 018.25 4.5z" />
                    </svg>
                    Create Tag
                </a>
                @foreach ($tags as $tag)
                    <div class="xl:w-1/3 md:w-1/2 p-4">

                        <div class="border border-gray-200 p-6 rounded-lg">
                            <a href="/blog/{{ $tag->id }}">
                                <h2 class="text-lg text-gray-900 font-medium title-font mb-2">{{ $tag->title }}</h2>
                            </a>
                            <form action="/tag/delete/{{ $tag->id }}" method="POST" class="mb-4">
                                @csrf
                                <button type="submit" class="text-red-500 hover:text-red-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6 18.75a2.25 2.25 0 002.25 2.25h7.5a2.25 2.25 0 002.25-2.25V6.75a2.25 2.25 0 00-2.25-2.25H8.25A2.25 2.25 0 006 6.75v12zm3-9v6m3-6v6m-6-9h10.5m-10.5 0l-.75-.75m11.25 0l-.75-.75M9 11h6" />
                                    </svg>
                                    Delete
                                </button>
                            </form>
                            {{-- <a href="" class="">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 6.75h10.5m-10.5 0a2.25 2.25 0 012.25-2.25h7.5a2.25 2.25 0 012.25 2.25m-10.5 0v12a2.25 2.25 0 002.25 2.25h7.5a2.25 2.25 0 002.25-2.25V6.75m-10.5 0h10.5m-10.5 0L6 4.5m12 .75l-.75-.75m-11.25 0L6 4.5m12 .75l-.75-.75M9 11v6m3-6v6" />
                                </svg>

                            </a> --}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</x-layout>
