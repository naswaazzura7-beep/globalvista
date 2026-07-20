<x-app-layout>

<x-slot name="header">

<h2 class="text-3xl font-bold text-gray-800">
🌍 Manage Countries
</h2>

</x-slot>


<div class="py-8">

<div class="max-w-7xl mx-auto px-6">


<div class="bg-white rounded-2xl shadow-xl p-8">


<div class="flex justify-between items-center mb-6">


<div>

<h1 class="text-2xl font-bold">
Country Management
</h1>

<p class="text-gray-500">
Manage global country information
</p>

</div>


<a href="{{ route('countries.create') }}"
class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-xl shadow">

+ Add Country

</a>


</div>





<div class="overflow-x-auto">


<table class="w-full">


<thead>

<tr class="bg-slate-800 text-white">


<th class="p-4 text-left rounded-tl-xl">
Country
</th>


<th class="p-4">
Capital
</th>


<th class="p-4">
Region
</th>


<th class="p-4">
Action
</th>


</tr>

</thead>



<tbody>


@foreach($countries as $country)


<tr class="border-b hover:bg-gray-50 transition">


<td class="p-4 font-semibold">

🌍 {{ $country->name }}

</td>


<td class="p-4">

{{ $country->capital }}

</td>


<td class="p-4">

<span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">

{{ $country->region }}

</span>

</td>



<td class="p-4 flex gap-2">


<a href="{{ route('countries.edit',$country->id) }}"

class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg">

✏️ Edit

</a>




<form action="{{ route('countries.destroy',$country->id) }}"

method="POST">

@csrf
@method('DELETE')


<button

onclick="return confirm('Hapus data negara ini?')"

class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg">

🗑 Delete

</button>


</form>


</td>


</tr>


@endforeach


</tbody>


</table>


</div>


</div>


</div>


</div>


</x-app-layout>