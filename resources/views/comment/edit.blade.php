<x-layout :title="$pageTitle">

    {{-- This component is used to display error messages --}}
    <x-error-alert />

    <form method="POST" action="{{ route('comment.update', $comment->id) }}" class="confirm-dialog-form"
        data-confirm-message="Are you sure you want to edit this comment?">
        @csrf
        @method('PATCH')

        {{-- This filed is required in Comment Request Validation Rule --}}
        <input type="hidden" name="post_id" value="{{ $comment->post_id }}">

        <div class="mb-4">
            <label for="author" class="block text-sm font-medium text-gray-700">Your Name</label>
            <input type="text" name="author" id="author" value="{{ old('author', $comment->author) }}"
                class="{{ $errors->has('author') ? ' border-red-300' : 'border-gray-300' }} mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('author')
                <span class="text-sm text-red-600">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="content" class="block text-sm font-medium text-gray-700">Comment</label>
            <textarea name="content" id="content" rows="4"
                class="{{ $errors->has('content') ? ' border-red-300' : 'border-gray-300' }} mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        {{ old('content', $comment->content) }}</textarea>
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

    {{-- This is the confirm dialog component --}}
    <x-confirm-dialog />
</x-layout>
