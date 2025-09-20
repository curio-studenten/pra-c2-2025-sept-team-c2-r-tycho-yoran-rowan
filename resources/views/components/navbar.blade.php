<nav class="navbar navbar-expand navbar-dark bg-dark">
    <div class="container">
        <div class="navbar-header mr-auto">
            <a class="navbar-brand" href="/" title="{{ __('misc.home_alt') }}">{{ __('misc.homepage_title') }}</a>

            <a class="navbar-brand" href="/contact" title="{{ __('misc.contact_alt') }}">{{ __('contact') }}</a>

            <a class="navbar-brand" href="/form" title="{{ __('misc.form_alt') }}">{{ __('Form') }}</a>
        </div>

        <div id="navbar" class="form-inline">

            <script>
                (function () {
                    var cx = 'partner-pub-6236044096491918:8149652050';
                    var gcse = document.createElement('script');
                    gcse.type = 'text/javascript';
                    gcse.async = true;
                    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
                    var s = document.getElementsByTagName('script')[0];
                    s.parentNode.insertBefore(gcse, s);
                })();
            </script>
            <gcse:searchbox-only></gcse:searchbox-only>
                <div class="language-switcher">
                    <a href="{{ route(name: 'lang.switch', parameters: 'en') }}">🇬🇧 English</a> 
                    <a href="{{ route(name: 'lang.switch', parameters: 'nl') }}">🇳🇱 Nederlands</a>
                </div>

        </div><!--/.navbar-collapse -->

    </div>
</nav>