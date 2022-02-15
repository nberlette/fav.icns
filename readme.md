<div align="center">

# [`fav.icns`](https://fav.icns.ml)

Fetch and cache favicons remotely. Runs on [PHP] + [Vercel].

</div>

---  

## Usage

    https://fav.icns.ml/github.com.png
    https://fav.icns.cf/berlette.com.png

### Cache-Control

- `s-maxage=1209600` - 2 week - cache TTL on the CDN
- `stale-while-revalidate=86400` - 1 day - show stale content while refreshing (SWR)
- `stale-if-error` - 3 days - show cached content if an error occurs

#### Forced Revalidation

    https://fav.icns.ml/github.com.png?refresh

## License

[MIT] © [Nicholas Berlette]

[fvicns.vercel.app]: https://fvicns.vercel.app
[MIT]: https://mit-license.org
[Vercel]: https://vercel.com
[Nicholas Berlette]: https://github.com/nberlette
[nberlette/icns]: https://github.com/nberlette/icns
[icns.ml]: https://icns.ml
[vercel-php]: https://github.com/juicyfx/vercel-php
[php]: https://github.com/juicyfx/vercel-php
[vercel-examples]: https://github.com/juicyfx/vercel-examples
