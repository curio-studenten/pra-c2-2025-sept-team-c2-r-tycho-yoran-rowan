<x-layouts.app>

    <x-slot:head>
        <meta name="robots" content="index, nofollow">
    </x-slot:head>

    <x-slot:breadcrumb>
        <li><a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/" alt="Manuals for '{{$brand->name}}'"
                title="Manuals for '{{$brand->name}}'">{{ $brand->name }}</a></li>
    </x-slot:breadcrumb>


    <h1>{{ $brand->name }}</h1>

    <p>{{ __('introduction_texts.type_list', ['brand' => $brand->name]) }}</p>


    <div class="jumbotron">

        <h2 class="jumbotron-center">{{ __('misc.top_5_manuals') }}</h2>

        <div class="top-manuals">
            <ol>
                @foreach($top5 as $manual)
                    <li><a href="/manual/{{$manual->id}}">{{$manual->name}}</a> | Visits: {{$manual->visits}}</li>
                @endforeach
            </ol>
        </div>



    </div>

    @foreach ($manuals as $manual)
        <div class="manualButten">
{{--            @if ($manual->locally_available)--}}
{{--                <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/{{ $manual->id }}/"--}}
{{--                    alt="{{ $manual->name }}" title="{{ $manual->name }}">{{ $manual->name }}</a>--}}
{{--                ({{$manual->filesize_human_readable}})--}}
{{--            @else--}}
                <a href="{{ route('manualRedirect', $manual->id) }}" target="new" alt="{{ $manual->name }}"
                    title="{{ $manual->name }}">{{ $manual->name }}</a>
{{--            @endif--}}

            <br />
        </div>
    @endforeach
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
    <div class="clear"></div>


</x-layouts.app>
