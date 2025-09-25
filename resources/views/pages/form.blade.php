<x-layouts.app>
    <h1>
        <x-slot:title>
            {{ __('misc.all_brands') }}
        </x-slot:title>
    </h1>

    <div class="jumbotron">
        <form action="/form" method="POST">
            @csrf
            <div>
                <label for="name">{{ __('misc.name') }}</label>
                <input type="text" name="name" id="name" required>
            </div>


            <div class="form-group">
                <label for="brand">{{ __('misc.brand') }}</label>
                <select name="brand" id="brand" required>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="originUrl">{{ __('misc.url') }}</label>
                <input type="url" name="originUrl" id="originUrl" required>
            </div>



            <button type="submit">{{ __('misc.submit') }}</button>
        </form>
    </div>
</x-layouts.app>