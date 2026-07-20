<x-app-layout>

<x-slot name="header">

<h2 class="text-3xl font-bold text-gray-800">
🚢 Manage Ports
</h2>

</x-slot>


<div class="py-8">

<div class="max-w-7xl mx-auto px-6">


<div class="bg-white rounded-2xl shadow-xl p-8">


<div class="flex justify-between items-center mb-6">

<div>

<h1 class="text-2xl font-bold">
Port Management
</h1>

<p class="text-gray-500">
Manage global port information
</p>

</div>


<a href="{{ route('ports.create') }}"
class="bg-green-600 text-white px-5 py-3 rounded-xl">

+ Add Port

</a>


</div>




<table class="w-full">


<thead>

<tr class="bg-slate-800 text-white">


<th class="p-4 text-left">
Port Name
</th>

<th class="p-4">
Country
</th>

<th class="p-4">
City
</th>

<th class="p-4">
Type
</th>

<th class="p-4">
Action
</th>


</tr>

</thead>



<tbody>


@foreach($ports as $port)


<tr class="border-b hover:bg-gray-50">


<td class="p-4 font-semibold">
🚢 {{ $port->name }}
</td>


<td>
{{ $port->country }}
</td>


<td>
{{ $port->city }}
</td>


<td>
{{ $port->type ?? '-' }}
</td>



<td class="flex gap-2 p-4">


<a href="{{ route('ports.edit',$port->id) }}"
class="bg-yellow-500 text-white px-4 py-2 rounded-lg">

✏️ Edit

</a>



<form action="{{ route('ports.destroy',$port->id) }}"
method="POST">

@csrf
@method('DELETE')


<button
onclick="return confirm('Delete this port?')"
class="bg-red-500 text-white px-4 py-2 rounded-lg">

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


</x-app-layout>