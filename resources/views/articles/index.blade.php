@extends('articles.layouts.app')

@section('content')
    <div class="w-4/5 pt-20 mx-auto space-y-2 xl:items-baseline xl:space-y-0 sm:w-3/5">
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

        <div class="pt-10 pb-10 border-b-2 border-neutral-700 sm:pt-20">
            @forelse($articles as $article)
                <span class="float-left text-gray-400 sm:float-right sm:pt-20">
                    {{ $article->created_at->format('M jS Y') }}
                    , by {{ $article->user->name }}
                </span>

                <a href="{{ route('articles.show', $article->slug) }}">
                    <h2
                        class="block w-full pt-10 text-3xl font-bold text-white transition-all hover:text-red-700 sm:w-3/5 sm:pt-0 sm:text-4xl sm:pb-2 sm:pt-10">
                        {{ $article->title }}
                    </h2>
                </a>

                <p class="w-full py-6 text-lg leading-8 text-gray-400 sm:w-3/5">
                    {{ $article->excerpt }}
                </p>

                @foreach ($article->tags as $tag)
                    <span
                        class="block inline pr-2 text-xs font-bold text-white uppercase transition-all hover:text-gray-100">
                        <a href="/" class="px-3 py-1 bg-red-700 rounded-md">
                            {{ $tag->name }}
                        </a>
                    </span>
                @endforeach

            @empty
                <h2
                    class="block w-full pt-10 text-3xl font-bold text-white transition-all hover:text-red-700 sm:w-3/5 sm:pt-0 sm:text-4xl sm:pb-2">
                    Unfortunately, we have not found any articles...
                </h2>
            @endforelse

            <div class="py-20">
                {{ $articles->links() }}
            </div>
        </div>
    </div>
@endsection
