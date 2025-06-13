# Laravel SEO Module by KairosTech

A reusable SEO management package for Laravel.

## Installation

1. Add the repository in your Laravel project's `composer.json`:
```json
"repositories": [
  {
    "type": "path",
    "url": "packages/KairosTechOffical/Seo"
  }
]
```

2. Require the package:
```bash
composer require kairostechoffical/seo:@dev
```

3. Publish views:
```bash
php artisan vendor:publish --tag=seo-views
```

4. Run migration:
```bash
php artisan migrate
```

## Usage

Visit `/seo` route.
