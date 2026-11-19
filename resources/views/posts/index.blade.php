<x-layout>
    <x-slot:title>{{ $heading }} - Mini-CMS</x-slot:title>

    <h1 class="text-3xl font-bold">{{ $heading }}</h1>

    <ul class="mt-6 space-y-4">
        @foreach ($posts as $slug => $post)
            <li class="rounded border border-gray-200 bg-white p-4">
                <p class="text-xl font-medium">{{ $post['title'] }}</p>
                <p class="mt-1 text-sm text-gray-500">Publié en {{ $post['year'] }}</p>
            </li>
        @endforeach
    </ul>
</x-layout>
<x-layout>
    <x-slot:title>{{ $heading }} - Mini-CMS</x-slot:title>

    <h1 class="text-3xl font-bold mb-6">{{ $heading }}</h1>

    <div class="grid gap-6 md:grid-cols-2">
        @forelse ($posts as $post)
            <x-post-card :post="$post" />
        @empty
            <x-alert type="warning" title="Aucun article" class="md:col-span-2">
                Il n'y a pas encore d'article publié.
            </x-alert>
        @endforelse
    </div>
</x-layout>