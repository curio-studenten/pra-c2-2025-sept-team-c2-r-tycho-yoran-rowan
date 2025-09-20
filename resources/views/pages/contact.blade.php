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

    ?>

    <div class="jumbotron">

        {{ __('misc.contact_info') }}

        <form action="/contact" method="POST">
            @csrf
            <div>
                <label for="name">{{ __('misc.name') }}</label>
                <input type="text" name="name" id="name" required>
            </div>

            <div>
                <label for="email"></label>{{ __('misc.email') }}</label>
                <input type="email" name="email" id="email" required>
            </div>

            <div>
                <label for="subject"></label>{{ __('misc.subject') }}</label>
                <input type="text" name="subject" id="subject" required>
            </div>

            <div>
                <label for="message"></label>{{ __('misc.message') }}</label>
                <textarea name="message" id="message" rows="4" required></textarea>
            </div>

            <button type="submit">{{ __('misc.send') }}</button>
        </form>

    </div>
</x-layouts.app>