<x-layouts.app>

    <x-slot:head>
        <meta name="robots" content="index, nofollow">
    </x-slot:head>

    <x-slot:breadcrumb>
        <li><a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/" alt="Manuals for '{{$brand->name}}'" title="Manuals for '{{$brand->name}}'">{{ $brand->name }}</a></li>
        <li><a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/" alt="Manuals for '{{$brand->name}} {{ $type->name }}'" title="Manuals for '{{$brand->name}} {{ $type->name }}'">{{ $type->name }}</a></li>
        <li><a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/{{ $manual->id }}/" alt="View manual for '{{$brand->name}} '" title="View manual for '{{$brand->name}} {{ $type->name }}'">View</a></li>
    </x-slot:breadcrumb>

    <h1>{{ $brand->name }} - {{ $type->name }}</h1>

    @if ($manual->locally_available)
        <iframe src="{{ $manual->url }}" width="780" height="600" frameborder="0" marginheight="0" marginwidth="0">
        Iframes are not supported<br />
        <a href="{{ $manual->url }}" target="new" alt="Download your manual here" title="Download your manual here">Click here to download the manual</a>
        </iframe>
    @else
        <a href="{{ $manual->url }}" target="new" alt="Download your manual here" title="Download your manual here">Click here to download the manual</a>
    @endif
    @php
    $shortLink = url('/link/' . \App\Models\ShortLink::firstOrCreate(
        ['handleiding_url' => request()->fullUrl()],
        ['code' => \Illuminate\Support\Str::lower(\Illuminate\Support\Str::random(4))]
    )->code);
@endphp

<div>
  <button id="copyButton" class="device-button">Korte link kopiëren</button>
  <span id="status" style="margin-left: 1rem;"></span>
</div>


<script>
document.getElementById('copyButton').addEventListener('click', () => {
    const statusEl = document.getElementById('status');
    const textToCopy = "{{ $shortLink }}";

    if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(textToCopy).then(() => {
            statusEl.textContent = "Gekopieerd!";
            statusEl.style.color = "green";
            setTimeout(() => statusEl.textContent = "", 3000);
        }).catch(err => {
            statusEl.textContent = "Kon niet kopiëren";
            statusEl.style.color = "red";
        });
    } else {
        const ta = document.createElement('textarea');
        ta.value = textToCopy;
        document.body.appendChild(ta);
        ta.select();
        try {
            document.execCommand('copy');
            statusEl.textContent = "Gekopieerd!";
            statusEl.style.color = "green";
        } catch {
            statusEl.textContent = "Kon niet kopiëren";
            statusEl.style.color = "red";
        }
        document.body.removeChild(ta);
    }
});
</script>
</x-layouts.app>
