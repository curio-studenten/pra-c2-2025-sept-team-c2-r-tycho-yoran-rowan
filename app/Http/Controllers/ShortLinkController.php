<?php
namespace App\Http\Controllers;

use App\Models\ShortLink;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShortLinkController extends Controller
{
    public function shorten(Request $request)
    {
        $url = $request->query('url');

        if (!$url) {
            return response("Geen URL opgegeven", 400);
        }

        // Check if a short code already exists
        $shortLink = ShortLink::where('handleiding_url', $url)->first();

        if (!$shortLink) {
            $code = Str::lower(Str::random(4));
            $shortLink = ShortLink::create([
                'handleiding_url' => $url,
                'code' => $code,
            ]);
        }

        // Return the full short link
        return url("/link/{$shortLink->code}");
    }

    // **Add this method for redirecting**
    public function redirect($code)
    {
        $shortLink = ShortLink::where('code', $code)->first();

        if (!$shortLink) {
            abort(404); // Not found
        }

        return redirect($shortLink->handleiding_url);
    }
}
