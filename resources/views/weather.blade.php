<x-app-layout>

<div class="p-8">

<div class="max-w-7xl mx-auto">

<div class="flex justify-between items-center mb-8">

<div>

<h1 class="text-4xl font-bold text-indigo-700">
🌦 Weather Information
</h1>

<p class="text-gray-500 mt-2">
Weather overview by country
</p>

</div>

<form method="GET">

<input
type="text"
name="search"
value="{{ $search }}"
placeholder="🔍 Search Country..."
class="w-80 rounded-xl border border-gray-300 px-5 py-3 shadow-sm">

</form>

</div>

<div class="bg-white rounded-2xl shadow-lg overflow-hidden">

<table class="w-full">

<thead class="bg-gradient-to-r from-cyan-600 to-blue-600 text-white">

<tr>

<th class="py-4">No</th>
<th>Flag</th>
<th class="text-left">Country</th>
<th>Capital</th>
<th>Region</th>
<th>Temperature</th>
<th>Status</th>

</tr>

</thead>

<tbody>

@forelse($countries as $index=>$country)

<tr class="border-b hover:bg-cyan-50">

<td class="text-center py-4">
{{ $countries->firstItem()+$index }}
</td>

<td class="text-center">
<img src="{{ $country->flag }}" class="w-12 h-8 rounded shadow mx-auto">
</td>

<td class="font-semibold">
{{ $country->name }}
</td>

<td>
{{ $country->capital }}
</td>

<td>
{{ $country->region }}
</td>

<td class="text-center">
{{ rand(18,35) }} °C
</td>

<td class="text-center">

@if(rand(1,3)==1)

<span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">
Sunny ☀️
</span>

@elseif(rand(1,2)==1)

<span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full">
Rain 🌧
</span>

@else

<span class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full">
Cloudy ☁️
</span>

@endif

</td>

</tr>

@empty

<tr>

<td colspan="7" class="text-center py-8">

No Data

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

<div class="mt-6 flex justify-between">

<p>

Total Countries :
<strong>{{ $countries->total() }}</strong>

</p>

{{ $countries->withQueryString()->links() }}

</div>

</div>

</div>

</x-app-layout>