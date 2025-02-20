<div>
    <select wire:model="property_id">
        <option value="">Sélectionner un bien</option>
        @foreach($properties as $property)
            <option value="{{ $property->id }}">{{ $property->name }}</option>
        @endforeach
    </select>

    <input type="date" wire:model="start_date">
    <input type="date" wire:model="end_date">

    <button wire:click="book" class="bg-blue-500 text-white p-2">Réserver</button>

    @if (session()->has('message'))
        <p class="text-green-500">{{ session('message') }}</p>
    @endif
</div>
