# Konwencje kodowania

## WordPress templates (aktualna implementacja)

- Blog listing i archiwa utrzymuj w jednym layoucie opartym o `archive.php`.
- Dla stron blogowych uzywaj kart `.card-blog` i metadanych `.meta-data` / `.meta-data-post`.
- `search.php` powinien korzystac z tego samego patternu kart co blog/archive.
- Komentarze renderuj przez `comments_template()` w `single.php`, a formularz utrzymuj w `comments.php`.
- Przy wsparciu zagniezdzonych odpowiedzi laduj `comment-reply` tylko warunkowo (`is_singular() && comments_open()`).
- Style WordPress UI (`comments`, `pagination`, `screen-reader-text`, formularz search) utrzymuj w `assets/css/global.css` w sekcji `32b. WordPress UI Components`.
- Link do strony bloga pobieraj helperem `growshop_get_blog_url()` (fallback na `/?post_type=post`, gdy `page_for_posts` nie jest ustawione).

## Ścieżki i linki

- **Zawsze względne** w obrębie `www/`: `./css/style.css`, `./image/favicon.ico`, `index.html#kontakt`.
- CDN dopuszczalne dla bibliotek (np. Font Awesome); reszta zasobów lokalnie z `www/`.
- Kotwice wewnętrzne: `#kontakt`, `#jak-dzialamy`, `#efekty`, `#case-studies`, `#zespol`.

## HTML

- Język: `lang="pl"`.
- Partiale: `header.html`, `footer.html`, `sidebar.html`, `search-form.html` wstrzykiwane do `index.html` przez fetch/jQuery do `#header`, `#sidebar` itd.
- Semantyka: `<header>`, `<main>`, `<footer>`, sekcje z nagłówkami; klasy Bootstrap gdzie używany.
- Animacje: dodawać przez `data-animate="animate__fadeInUp"` + klasy `animate-box animated animate__animated` — obsługuje `initAnimateData()` w `script.js`.

## CSS

- Główny plik: `www/css/style.css`. Zachować spójność z konwencją szablonu Marko.
- Nie usuwać klas używanych przez JS: `animate-box`, `banner-video-container`, `request-loader`, `counter`, `counter-detail`.
- **Kluczowe klasy layoutu hero** (nie mieszać z Bootstrap cols bez potrzeby):
  - `.banner-heading` — flex row, justify-content: space-between (dla 2-kolumnowego hero V0)
  - `.banner-video-content` — width: 38% (lewa kolumna V0)
  - `.banner-content` — width: 53% (prawa kolumna V0); **uwaga:** nie używać tej klasy wewnątrz Bootstrap `col-xl-*` bo daje konflikt szerokości
- Zmienne CSS: `--accent-color` (#00D170 zielony), `--primary`, `--secondary`, `--global-border-radius`

## JavaScript — kluczowe funkcje (script.js)

| Funkcja | Opis |
|---------|------|
| `initBannerVideo()` | Ładuje YouTube IFrame API, tworzy player na `#banner-video-background`, obsługuje autoplay/loop/mute |
| `window.setYoutubeSize` | Przelicza wymiary iframe do aktywnego `.banner-video-container`; eksportowana globalnie dla `switchVariant()` |
| `initCounter()` | IntersectionObserver na `.counter[data-target]` — animuje liczniki gdy wchodzą w viewport |
| `initAnimateData()` | IntersectionObserver na `[data-animate]` — dodaje klasy Animate.css |
| `switchVariant(version)` | W inline script w index.html; przełącza hero V0/V1/V2 i przesuwa `#banner-video-background` |

## Treści i formularze

- Formularz kontaktowy: domyślnie `action="mail.php"`. Na hostingu statycznym podmienić na Formspree lub inny endpoint.
- Teksty po polsku; CTA spójne z produktem (Grow Group, AI Growth System, Umów konsultację).

## Scroll-Animated Sections (GSAP)

Zasady dla sekcji animowanych scrollem (Growth Dashboard i przyszłe):

- **CSS sticky, nie GSAP pin** — `position: sticky; top: 0; height: 100vh` na wrapperze sticky. GSAP pin powoduje skoki layoutu.
- **Jeden timeline scrub** — `start: 'top 70%', end: 'bottom bottom', scrub: 0.6`. Brak osobnych triggerów dla intro/pinu.
- **Prefix klas** — każda sekcja ma unikalny prefix (np. `.gd-` dla Growth Dashboard) — zero kolizji z istniejącym CSS.
- **SVG animacje** — `stroke-dashoffset` dla linii; `attr: { y, height }` dla prostokątów (rect). **Nie używać CSS scaleY na SVG** — transform-origin nie działa poprawnie.
- **Nagłówek sekcji poza sticky** — element z tytułem/opisem scrolluje normalnie, nie jest pinowany.
- **Mobile** — `overflow: hidden` + `max-height: calc(100vh - 20px)` na `.gd-sticky` i zawartości.

## Co nie zmieniać bez potrzeby

- Struktura katalogów w `www/` (css, js, image, php).
- Nazwy plików partiali (header.html itd.) — są ładowane z index.html po nazwie.
- Unikalność `id="banner-video-background"` — musi być dokładnie jeden taki element w DOM; mechanizm switcher przenosi go między hero sekcjami.
