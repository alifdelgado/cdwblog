@extends('articles.layouts.app')

@section('content')
    <div class="w-4/5 py-40 mx-auto space-y-2 xl:space-y-0 sm:w-2/5">
        <h2 class="pb-4 text-3xl font-bold text-gray-100 sm:text-5xl">
            {{ $article->title }}
        </h2>

        <span class="py-8 text-sm text-white">
            {{ $article->user->name }} · {{ $article->created_at->format('M jS Y') }} ·
            <a href="" class="pb-1 transition-all border-b-2 border-red-500 hover:text-red-500">
                {{ $article->category->name }}
            </a>
        </span>

        <div>
            <p class="pt-10 font-bold text-white text-md">
                {{ $article->excerpt }}
            </p>

            <p class="pt-4 font-normal text-left text-white whitespace-pre-line text-md">
                {{ $article->description }}
            </p>

            <ul class="pt-10">
                @foreach ($article->tags as $tag)
                    <li class="inline">
                        <a href=""
                            class="inline px-2 py-1 mr-4 text-sm font-semibold text-white bg-red-700 rounded-md hover:text-gray-900 dark:text-white dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                            #{{ $tag->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="pt-10">
            <div class="border-t-2 border-red-900">
                <h3 class="pt-10 font-bold text-white">
                    {{ $article->category->name }}
                </h3>
                <p class="pt-2 text-sm font-normal text-white">
                    {{ $article->category->description }}
                </p>
            </div>
        </div>
    </div>
@endsection
