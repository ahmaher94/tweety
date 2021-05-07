<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form method="POST" action="/tweets">
        @csrf

        <textarea name="body" class="w-full" required></textarea>
        <hr class="mb-4">

        <footer class="flex justify-between">
            <img src="{{ auth()->user()->avatar }}" alt="" class="rounded-full mr-2" width="40px" height="40px">
            <button type="submit" class="bg-blue-500 rounded-lg shadow py-2 px-2 text-white">Tweet</button>
        </footer>
    </form>

    @error('body')
    <p class="text-red-500 text-sm mt-50">{{ $message }}</p>
    @enderror
</div>