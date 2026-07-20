<x-app-layout>

<x-slot name="header">

<h2 class="text-3xl font-bold">
🚢 Add Port
</h2>

</x-slot>


<div class="py-8">

<div class="max-w-3xl mx-auto px-6">

<div class="bg-white shadow rounded-xl p-6">


<form action="{{ route('ports.store') }}" method="POST">

@csrf


<label class="font-semibold">
Port Name
</label>

<input type="text"
name="name"
class="w-full border rounded-lg p-3 mb-4">



<label class="font-semibold">
Country
</label>

<input type="text"
name="country"
class="w-full border rounded-lg p-3 mb-4">



<label class="font-semibold">
City
</label>

<input type="text"
name="city"
class="w-full border rounded-lg p-3 mb-4">



<label class="font-semibold">
Type
</label>

<input type="text"
name="type"
class="w-full border rounded-lg p-3 mb-4">



<label class="font-semibold">
Capacity
</label>

<input type="number"
name="capacity"
class="w-full border rounded-lg p-3 mb-4">



<button
class="bg-green-600 text-white px-5 py-2 rounded-lg">

Save Port

</button>


</form>


</div>

</div>

</div>


</x-app-layout>