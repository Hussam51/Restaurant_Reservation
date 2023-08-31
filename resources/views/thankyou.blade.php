<x-guest-layout>
    <div class="container w-full px-5 py-6 mx-auto">
        <h1>Thank you</h1>
        <p>You reservation is ready.</p>
        <a href="{{ route('welcome') }}">
            <div class="mt-6 p-4">
                <button  type="submit"
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">
                    Return Home
                </button>
            </div>
        </a>
    </div>
</x-guest-layout>
