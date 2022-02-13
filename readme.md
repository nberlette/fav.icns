# [fvicns.vercel.app]

Favicon fetching API. 100% PHP. Shipped with [Vercel].

## Usage

    https://fvicns.vercel.app/gitpod.io
    https://fvicns.now.sh/reddit.com.png
    https://fvicns.now.sh/flourd.com.png
    https://fvicns.vercel.app/?url=github.com


### Cache-Control

- `s-maxage=1209600` - 2 week - cache TTL on the CDN
- `stale-while-revalidate=86400` - 1 day - show stale content while refreshing (SWR)
- `stale-if-error` - 3 days - show cached content if an error occurs


#### Forced Revalidation

    https://fvicns.vercel.app/github.com.png?refresh

## License

[MIT] © [Nicholas Berlette] · runs on [vercel-php]

[fvicns.vercel.app]: https://fvicns.vercel.app
[MIT]: https://mit-license.org
[Vercel]: https://vercel.com
[Nicholas Berlette]: https://github.com/nberlette
[nberlette/icns]: https://github.com/nberlette/icns
[icns.ml]: https://icns.ml
[vercel-php]: https://github.com/juicyfx/vercel-php
[vercel-examples]: https://github.com/juicyfx/vercel-examples
