<x-layouts.app>
    <x-slot:breadcrumb>
    <li><a href="/{{ $letter }}/" alt="Manuals for '{{$letter}}'"
           title="Manuals for '{{$letter}}'">{{ $letter }}</a></li>
    </x-slot:breadcrumb>

    @foreach ($brands as $brand)
        <div class="manualButten">

            <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/">
                {{ $brand->name }}
            </a>
        </div>
    @endforeach
</x-layouts.app>

