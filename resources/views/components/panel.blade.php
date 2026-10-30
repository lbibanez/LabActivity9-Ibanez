@props(['title'])

<section class="bg-white rounded shadow mb-6">
    <h2 class="font-semibold px-4 py-3 border-b">{{ $title }}</h2>
    <div class="p-4">
        {{ $slot }}
    </div>
</section>
