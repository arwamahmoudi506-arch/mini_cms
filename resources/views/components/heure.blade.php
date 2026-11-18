<x-layout>
    <x-slot:title>Heure</x-slot:title>

    <h1>Page Heure</h1>

    <p>Nous sommes le {{ now()->format('d/m/Y') }}</p>

    <p>Il est {{ now()->format('H:i:s') }}</p>
</x-layout>