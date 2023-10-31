# php-forecast

*Minimal php-wasm example with full DOM interaction in 1.9mb*

This repository shows the smallest possible php-wasm implementation that's got the full JS API available in PHP-land.

The included demo uses JS's `fetch` to pull the forecast.

View it live: https://php-forecast.pages.dev/

## Serving locally

Clone the repo:

```bash
$ git clone https://github.com/seanmorris/php-forecast.git
```

Ensure you've got the necesary packages for compression:

```bash
$ sudo apt install gzip brotli
```

The following commands will serve on http://localhost:8887/.

Serve the assets with brotli compression:

```bash
$ npm run serve-b
```

Serve the assets with gzip compression:

```bash
$ npm run serve-g
```

Serve the assets with no compression:

```bash
$ npm run serve-u
```

Serve the assets with any available compression:

```bash
$ npm run serve
```