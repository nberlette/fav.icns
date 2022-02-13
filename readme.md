# [fvicns.vercel.app]

Favicon fetcher API built in 100% PHP, shipped with [Vercel].

## Usage

```bash
https://fvicns.vercel.app/gitpod.io
https://fvicns.now.sh/reddit.com.png
https://fvicns.now.sh/flourd.com.png
https://fvicns.vercel.app/?url=github.com
```

### Cache-Control

- [x] 1 wk (604800) `s-maxage` cache on the CDN
- [x] 1 hour (3600) `stale-while-revalidate` (SWR)
- [x] 1 day (86400) `stale-if-error` (SIE).

## License

[MIT] © [Nicholas Berlette] — related: [icns.ml] · [vercel-php]

[fvicns.vercel.app]: https://fvicns.vercel.app
[MIT]: https://mit-license.org
[Vercel]: https://vercel.com
[Nicholas Berlette]: https://github.com/nberlette
[nberlette/icns]: https://github.com/nberlette/icns
[icns.ml]: https://icns.ml
[vercel-php]: https://github.com/juicyfx/vercel-php
[vercel-examples]: https://github.com/juicyfx/vercel-examples
