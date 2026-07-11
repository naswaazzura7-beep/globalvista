<x-app-layout>

    <div class="p-8">

        <div class="max-w-7xl mx-auto">

            <!-- Header -->
            <div class="flex justify-between items-center mb-8">

                <div>

                    <h1 class="text-4xl font-bold text-indigo-700">
                        🌍 Countries Database
                    </h1>

                    <p class="text-gray-500 mt-2">
                        Explore {{ $countries->total() }} countries around the world.
                    </p>

                </div>

                <form method="GET">

                    <input
                        type="text"
                        name="search"
                        value="{{ $search }}"
                        placeholder="🔍 Search country..."
                        class="w-80 rounded-xl border border-gray-300 px-5 py-3 shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">

                </form>

            </div>


            <!-- Table -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

                <table class="w-full">

                    <thead class="bg-gradient-to-r from-indigo-600 to-blue-600 text-white">

                        <tr>

                            <th class="py-4 px-4">No</th>
                            <th class="py-4 px-4">Flag</th>
                            <th class="py-4 px-4 text-left">Country</th>
                            <th class="py-4 px-4 text-left">Capital</th>
                            <th class="py-4 px-4">Region</th>
                            <th class="py-4 px-4">Currency</th>
                            <th class="py-4 px-4">Population</th>
                            <th class="py-4 px-4">Risk</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($countries as $index => $country)

                        <tr class="border-b hover:bg-indigo-50 transition">

                            <td class="text-center py-4">

                                {{ $countries->firstItem()+$index }}

                            </td>

                            <td class="text-center">

                                <img src="{{ $country->flag }}"
                                    class="w-12 h-8 rounded shadow mx-auto">

                            </td>

                            <td class="font-semibold">

                                {{ $country->name }}

                            </td>

                            <td>

                                {{ $country->capital }}

                            </td>

                            <td class="text-center">

                                {{ $country->region }}

                            </td>

                            <td class="text-center">

                                {{ $country->currency }}

                            </td>

                            <td class="text-right pr-6">

                                {{ number_format($country->population) }}

                            </td>

                            <td class="text-center">

                                @if($country->risk_score>=70)

                                    <span class="bg-red-100 text-red-600 px-3 py-1 rounded-full font-semibold text-sm">
                                        High
                                    </span>

                                @elseif($country->risk_score>=40)

                                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full font-semibold text-sm">
                                        Medium
                                    </span>

                                @else

                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full font-semibold text-sm">
                                        Low
                                    </span>

                                @endif

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="8" class="py-10 text-center text-gray-500">

                                Country not found.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-6 flex justify-between items-center">

                <span class="text-gray-500">

                    Showing {{ $countries->firstItem() }} - {{ $countries->lastItem() }}
                    of {{ $countries->total() }} countries

                </span>

                {{ $countries->withQueryString()->links() }}

            </div>

        </div>

    </div>

</x-app-layout>