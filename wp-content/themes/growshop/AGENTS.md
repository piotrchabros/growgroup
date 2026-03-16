# Grow Group

Motyw WordPress dla Grow Group — AI Growth System dla biznesu. ACF Pro + Gutenberg blocks, sekcja po sekcji.

**Domena / produkt:** growgroup.now

## Stack

- **Motyw WP:** PHP/CSS/JS → root katalogu motywu (`growshop/`)
- **ACF Pro:** pola i bloki Gutenberga — field groups w `acf-json/`
- **Bloki ACF:** `blocks/{nazwa-bloku}/` — block.json + render.php + per-block CSS/JS
- **Assety:** CSS → `assets/css/`, JS → `assets/js/`, obrazy → `assets/images/`
- **Vendor:** Bootstrap 5, Animate.css, Swiper, Font Awesome (CDN), jQuery (WP built-in)
- **Oryginały:** statyczna wersja HTML + szablony źródłowe → `original/`
- **Dokumentacja:** `original/docs/`

## Commands

```bash
# Local by Flywheel — uruchom site z GUI
# WP Admin: growgroup.local/wp-admin
# Motyw: /wp-content/themes/growshop/
```

## Structure

```
growshop/
├── style.css              # WP theme header
├── functions.php          # Setup, enqueue, ACF blocks, ACF JSON
├── index.php / front-page.php / page.php / home.php / archive.php
├── single.php / 404.php / search.php / searchform.php / comments.php
├── category.php / tag.php / author.php / date.php / header.php / footer.php
├── assets/
│   ├── css/global.css     # Shared styles (root vars, base, layout, components)
│   ├── css/vendor/        # Bootstrap, animate, swiper, fonts
│   ├── js/global.js       # Counter, animate, theme switch, sidebar
│   ├── js/vendor/         # bootstrap.bundle, swiper, jquery
│   └── images/            # Wszystkie obrazy
├── blocks/                # ACF Gutenberg blocks
│   └── {block-name}/
│       ├── block.json     # Rejestracja bloku
│       ├── {block-name}.php   # Render template
│       ├── {block-name}.css   # Per-block styles
│       └── {block-name}.js    # Per-block JS (opcjonalnie)
├── acf-json/              # ACF field group JSONy (auto-sync, git-tracked)
└── original/              # Archiwum: www/, Marko v2, docs/, generated_imgs/
```

## Critical Rules

- Edytuj pliki motywu WP — `original/` to tylko referencja, nie ruszaj.
- ACF field groups zawsze w `acf-json/` (JSON sync) — commituj JSONy do gita.
- Każdy blok = osobny katalog w `blocks/` z block.json + render PHP.
- Nie commituj sekretów; nowe zmienne env → tylko `.env.example`.
- Obrazy w szablonach: `get_template_directory_uri() . '/assets/images/...'`

## Block Implementation Pattern

Dla każdego nowego bloku:
1. Utwórz `blocks/{nazwa}/block.json` (rejestracja, kategoria `growshop`)
2. Utwórz `blocks/{nazwa}/{nazwa}.php` (render template z `get_field()`)
3. Wyekstrahuj CSS z `assets/css/global.css` do `blocks/{nazwa}/{nazwa}.css`
4. JS per-block tylko jeśli potrzebny (hero video, dashboard GSAP)
5. Utwórz ACF field group w WP admin → auto-save do `acf-json/`
6. Testuj: dodaj block na stronę, wypełnij pola, sprawdź frontend
