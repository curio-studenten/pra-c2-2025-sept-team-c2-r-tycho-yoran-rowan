<x-layouts.app>

    <x-slot:introduction_text>
        <p><img src="img/afbl_logo.png" align="right" width="100"
                height="100">{{ __('introduction_texts.homepage_line_1') }}</p>
        <p>{{ __('introduction_texts.homepage_line_2') }}</p>
        <p>{{ __('introduction_texts.homepage_line_3') }}</p>
    </x-slot:introduction_text>

    <h1>
        <x-slot:title>
            {{ __('misc.all_brands') }}
        </x-slot:title>
    </h1>


    <?php
$size = count($brands);
$columns = 3;
$chunk_size = ceil($size / $columns);

$topSplit = 1;
    ?>

    <div class="jumbotron">

        <h2 class="jumbotron-center">{{ __('misc.top_10_manuals') }}</h2>

        <div class="top-manuals">
            @foreach($top10 as $parts)
                <ol start="{{$topSplit}}">
                    @foreach($parts as $manual)
                        <li><a href="/{{$manual->id}}">{{$manual->name}}</a> | Visits: {{$manual->visits}}</li>
                    @endforeach
                </ol>
                <?php    $topSplit += 5 ?>
            @endforeach
        </div>



    </div>


    <div class="breadcrumb">
        <p>{{ __('misc.homepage_description') }}</p>
    </div>


    <div class="jumbotron">

        @php
            $alphabet = range('A', 'Z');
            $groupedBrands = $brands->groupBy(function ($brand) {
                return strtoupper(substr($brand->name, 0, 1));
            });
        @endphp

        <div class="alphabet-nav">
            <span>Ga naar letter:<br></span>
            @foreach($alphabet as $letter)
                @if($groupedBrands->has($letter))
                    <a href="#letter-{{ $letter }}">{{ $letter }}</a>
                @else
                    <span class="disabled">{{ $letter }}</span>
                @endif
                @if(!$loop->last) - @endif
            @endforeach
        </div>

        <div class="brands-grid">
            @foreach($groupedBrands as $letter => $letterBrands)
                <div class="brand-column" id="letter-{{ $letter }}">
                    <h2 class="brand-letter">{{ $letter }}</h2>
                    @foreach($letterBrands as $brand)
                        <div class="brand-item">
                            <a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/">
                                {{ $brand->name }}
                            </a>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>


</x-layouts.app>