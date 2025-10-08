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

        $half = ceil(count($manuals) / 2);
        $left = array_slice($manuals->all(), 0, $half);
        $right = array_slice($manuals->all(), $half);

    ?>

    <div class="jumbotron">
        <div class="tables-wrapper">
            <table class="table">
                <tr>
                    <th>Naam</th>
                    <th>Delete</th>
                </tr>
                @foreach($left as $manual)
                    <tr>
                        <td><p>{{ $manual->name }}</p></td>
                        <td>
                            <form action="{{ route('admin.destroy', $manual->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="DELETE">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            <table class="table">
                <tr>
                    <th>Naam</th>
                    <th>Delete</th>
                </tr>
                @foreach($right as $manual)
                    <tr>
                        <td><p>{{ $manual->name }}</p></td>
                        <td>
                            <form action="{{ route('admin.destroy', $manual->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="DELETE">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</x-layouts.app>
