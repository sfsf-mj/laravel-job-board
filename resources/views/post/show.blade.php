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

                        @if ($post->tags->count() > 0)
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
                    </div>

                    <div class="mt-4 flex items-center justify-around">
                        <div class="mt-4">
                            <form action="/blog/{{ $post->id }}" method="POST" class="mb-4 confirm-dialog-form"
                                data-confirm-message="Are you sure you want to delete this post?">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring ring-indigo-200 disabled:opacity-25 transition ease-in-out duration-150">
                                    Delete
                                </button>
                            </form>
                        </div>

                        <a href="/blog/{{ $post->id }}/edit/"
                            class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring ring-indigo-200 disabled:opacity-25 transition ease-in-out duration-150">
                            Edit
                        </a>

                        <a href="/blog"
                            class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 active:bg-gray-700 focus:outline-none focus:border-gray-700 focus:ring ring-gray-200 disabled:opacity-25 transition ease-in-out duration-150">
                            Back to posts
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Display comments --}}
        <div class="container mx-auto mt-8 p-8 rounded-lg bg-white">
            <h2 class="text-2xl font-semibold mb-4">Comments ({{ $post->comments->count() }})</h2>
            @if ($post->comments->count() > 0)
                <ul class="space-y-4">
                    @foreach ($post->comments as $comment)
                        <li class="flex items-start p-4">
                            <div
                                class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4 mr-4 min-w-10">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                                    <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </div>
                            <div class="p-4 border border-gray-200 rounded-lg w-max max-w-fit">
                                <div class="flex items-around mb-2 gap-6">
                                    <div class="flex items-center">
                                        <span class="font-semibold">{{ $comment->author }}</span>
                                        <span
                                            class="text-xs text-gray-500 ml-2">{{ $comment->created_at->diffForHumans() }}</span>
                                    </div>

                                    <!-- ثلاث نقاط -->
                                    <div class="ml-auto relative">
                                        <button onclick="toggleDropdown(this)"
                                            class="text-gray-600 hover:cursor-pointer hover:text-black font-black focus:outline-none">
                                            &#x22EE; <!-- رمز الثلاث نقاط الرأسية -->
                                        </button>

                                        <!-- القائمة المنسدلة -->
                                        <div
                                            class="dropdown-menu absolute right-0 mt-2 w-28 bg-white border border-gray-200 rounded shadow-lg hidden z-50">
                                            {{-- Add a delete button for the comment --}}
                                            <form action="/comment/{{ $comment->id }}" method="POST"
                                                class="mt-2 confirm-dialog-form"
                                                data-confirm-message="Are you sure you want to delete this comment?">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100">Delete</button>
                                            </form>
                                            <a href="/comment/{{ $comment->id }}/edit"
                                                class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-100">Edit</a>
                                        </div>
                                    </div>

                                    {{-- The script of toggleDropdown in the end of this file --}}

                                </div>
                                <p class="text-gray-700">{{ $comment->content }}</p>

                            </div>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-500">No comments yet. Be the first to comment!</p>
            @endif
        </div>

        {{-- Add a comment form --}}
        <div class="container mx-auto mt-24">
            <h2 class="text-2xl font-semibold mb-4">Add a Comment</h2>
            <form action="/comment" method="POST" class="confirm-dialog-form"
                data-confirm-message="Are you sure you want to add this comment?">
                @csrf

                <input type="hidden" name="post_id" value="{{ $post->id }}">

                <div class="mb-4">
                    <label for="author" class="block text-sm font-medium text-gray-700">Your Name</label>
                    <input type="text" name="author" id="author" value="{{ old('author') }}"
                        class="{{ $errors->has('author') ? ' border-red-300' : 'border-gray-300' }} mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('author')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="content" class="block text-sm font-medium text-gray-700">Comment</label>
                    <textarea name="content" id="content" rows="4"
                        class="{{ $errors->has('content') ? ' border-red-300' : 'border-gray-300' }} mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        {{ old('content') }}</textarea>
                    </textarea>
                    @error('content')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring ring-indigo-200 disabled:opacity-25 transition ease-in-out duration-150">
                    Submit Comment
                </button>
            </form>
        </div>
    </section>

    {{-- This is the confirm dialog component --}}
    <x-confirm-dialog />

    {{-- This is script of toggleDropdown --}}
    <script>
        function toggleDropdown(button) {
            const menu = button.nextElementSibling;
            const isHidden = menu.classList.contains('hidden');

            // إغلاق كل القوائم المفتوحة أولًا
            document.querySelectorAll('.dropdown-menu').forEach(el => el.classList.add('hidden'));

            // إظهار القائمة الحالية فقط إذا كانت مخفية
            if (isHidden) {
                menu.classList.remove('hidden');
            }
        }

        // إخفاء القائمة عند النقر خارجها
        window.addEventListener('click', function(e) {
            if (!e.target.closest('.dropdown-menu') && !e.target.closest('button')) {
                document.querySelectorAll('.dropdown-menu').forEach(el => el.classList.add('hidden'));
            }
        });
    </script>


</x-layout>
