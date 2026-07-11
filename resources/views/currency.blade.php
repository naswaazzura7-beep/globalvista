<x-app-layout>

<div class="p-8">

<div class="max-w-7xl mx-auto">

<div class="flex justify-between items-center mb-8">

<div>

<h1 class="text-4xl font-bold text-indigo-700">
💱 Currency Exchange
</h1>

<p class="text-gray-500 mt-2">
Live Exchange Rate by Country
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

<thead class="bg-gradient-to-r from-indigo-600 to-blue-600 text-white">

<tr>

<th class="py-4">No</th>
<th>Flag</th>
<th class="text-left">Country</th>
<th>Currency</th>
<th>Exchange Rate (USD)</th>

</tr>

</thead>

<tbody>

@forelse($countries as $index=>$country)

<tr class="border-b hover:bg-indigo-50">

<td class="text-center py-4">

{{ $countries->firstItem()+$index }}

</td>

<td class="text-center">

<img src="{{ $country->flag }}"
class="w-12 h-8 rounded mx-auto shadow">

</td>

<td class="font-semibold">

{{ $country->name }}

</td>

<td class="text-center">

{{ $country->currency }}

</td>

<td class="text-center">

{{ isset($rates[$country->currency]) ? number_format($rates[$country->currency],2) : '-' }}

</td>

</tr>

@empty

<tr>

<td colspan="5" class="text-center py-10">

No Data

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

<div class="mt-6 flex justify-between items-center">

<p>

Total Countries :
<strong>{{ $countries->total() }}</strong>

</p>

{{ $countries->withQueryString()->links() }}

</div>

</div>

</div>

</x-app-layout>