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

        <h2 class="jumbotron-center">Top 5 Manuals</h2>

        <div class="top-manuals">
            <ol>
                @foreach($top5 as $manual)
                    <li><a href="/{{$manual->id}}">{{$manual->name}}</a> | Visits: {{$manual->visits}}</li>
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
    <div class="clear"></div>


</x-layouts.app>
