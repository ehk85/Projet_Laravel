@extends('layouts.app')

@section('title', 'Liste des Propriétés')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Propriétés disponibles</h1>
    <div class="grid grid-cols-3 gap-4">
        @foreach($properties as $property)
            <div class="p-4 bg-white shadow rounded">
                <h2 class="text-lg font-semibold">{{ $property->name }}</h2>
                <p class="text-gray-600">{{ $property->price_per_night }} € / nuit</p>
                <a href="{{ route('properties.show', $property) }}" class="text-blue-500">Voir</a>
            </div>
        @endforeach
    </div>
@endsection
