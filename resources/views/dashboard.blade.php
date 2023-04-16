<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="w-full mx-auto mb-10">
                <span class="block inline font-bold text-white uppercase transition-all text-md hover:text-gray-100">
                    <a href="{{ route('articles.create') }}" class="px-5 py-3 bg-red-700 rounded-md">
                        Create Article
                    </a>
                </span>
            </div>

            @if (session('message'))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                    role="alert">
                    <span class="font-medium">
                        Success alert!
                    </span>
                    {{ session('message') }}
                </div>
            @endif

            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-xl font-bold">
                        Here's a list of your articles {{ auth()->user()->name }}
                    </h2>

                    <div class="pt-4">
                        @forelse($articles as $article)
                            <div>
                                <a href="{{ route('articles.edit', $article->slug) }}"
                                    class="inline-flex items-center float-right py-2 pt-8 pb-6 font-medium leading-4 text-orange-400 transition duration-150 ease-in-out rounded-md text-md hover:text-orange-300 focus:outline-none">
                                    Update
                                </a>
                                <form action="{{ route('articles.destroy', $article->slug) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="inline-flex float-right py-2 pt-8 pb-6 pr-3 font-medium leading-4 text-red-400 transition ease-in-out text-md hover:text-red-300 duration 150">
                                        Destroy
                                    </button>
                                </form>
                            </div>
                            <div>
                                <a href="{{ route('articles.show', $article->slug) }}">
                                    <h2
                                        class="inline-flex items-center py-2 pt-8 pb-6 text-lg font-medium leading-4 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-300 focus:outline-none">
                                        {{ $article->title }}

                                        <span class="pl-2 text-sm italic text-gray-600">
                                            Created on {{ $article->created_at->format('M jS Y') }}
                                        </span>
                                    </h2>
                                </a>

                                <hr class="border border-gray-700 border-b-1">
                            </div>
                        @empty
                            <p>
                                You have not yet created any new posts.
                            </p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
