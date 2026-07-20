<x-app-layout>

    <div class="p-8">

        <div class="max-w-7xl mx-auto">

            <div class="flex justify-between items-center mb-8">

                <div>
                    <h1 class="text-4xl font-bold text-blue-700">
                        📰 Global News
                    </h1>

                    <p class="text-gray-500 mt-2">
                        Latest news from around the world
                    </p>
                </div>

                <form method="GET">

                    <input
                        type="text"
                        name="search"
                        value="{{ $search }}"
                        placeholder="Search Country..."
                        class="w-80 rounded-xl border border-gray-300 px-5 py-3 shadow">

                </form>

            </div>

            @if(count($articles))

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach($articles as $article)

                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

                    @if(isset($article['image']))

                    <img src="{{ $article['image'] }}"
                        class="w-full h-52 object-cover">

                    @endif

                    <div class="p-5">

                        <h2 class="font-bold text-lg mb-3">
                            {{ $article['title'] }}
                        </h2>

                        <p class="text-gray-600 text-sm mb-4">
                            {{ $article['description'] }}
                        </p>

                        <a href="{{ $article['url'] }}"
                            target="_blank"
                            class="text-blue-600 font-semibold">

                            Read More →

                        </a>

                    </div>

                </div>

                @endforeach

            </div>

            @else

            <div class="bg-white rounded-xl p-10 text-center shadow">

                <h2 class="text-2xl font-bold text-gray-600">

                    No News Found

                </h2>

            </div>

            @endif

        </div>

    </div>

</x-app-layout>