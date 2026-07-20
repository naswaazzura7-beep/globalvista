<x-app-layout>

<x-slot name="header">

<h2 class="text-3xl font-bold">
✏️ Edit Port
</h2>

</x-slot>


<div class="py-8">

<div class="max-w-3xl mx-auto px-6">

<div class="bg-white shadow rounded-xl p-6">


<form action="{{ route('ports.update',$port->id) }}" method="POST">

@csrf
@method('PUT')


<label class="font-semibold">
Port Name
</label>

<input type="text"
name="name"
value="{{ $port->name }}"
class="w-full border rounded-lg p-3 mb-4">



<label class="font-semibold">
Country
</label>

<input type="text"
name="country"
value="{{ $port->country }}"
class="w-full border rounded-lg p-3 mb-4">



<label class="font-semibold">
City
</label>

<input type="text"
name="city"
value="{{ $port->city }}"
class="w-full border rounded-lg p-3 mb-4">



<label class="font-semibold">
Type
</label>

<input type="text"
name="type"
value="{{ $port->type }}"
class="w-full border rounded-lg p-3 mb-4">



<label class="font-semibold">
Capacity
</label>

<input type="number"
name="capacity"
value="{{ $port->capacity }}"
class="w-full border rounded-lg p-3 mb-4">



<button
class="bg-yellow-500 text-white px-5 py-2 rounded-lg">

Update Port

</button>


</form>


</div>

</div>

</div>


</x-app-layout>