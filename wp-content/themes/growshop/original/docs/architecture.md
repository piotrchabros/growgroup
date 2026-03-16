# Architektura projektu

## Uwaga o aktywnej wersji

Ten dokument opisuje starsza, statyczna architekture (`original/www`) jako material referencyjny.
Aktualna implementacja produkcyjna jest motywem WordPress w katalogu root `growshop/`.

### Aktualne szablony WP (root `growshop/`)

- Landing page: `front-page.php`
- Strony: `page.php`
- Blog index / posts page: `home.php`
- Archiwa: `archive.php` + fallbacki `category.php`, `tag.php`, `author.php`, `date.php`
- Single post: `single.php`
- Search: `search.php` + `searchform.php`
- Error page: `404.php`
- Komentarze: `comments.php` (podpinane z `single.php`)

## Struktura katalogów

| Katalog | Opis |
|--------|------|
| `www/` | **Jedyna aktywna wersja** LP — HTML, CSS, JS, obrazy, partiale (header, footer, sidebar). Tu robisz zmiany. |
| `www/css/` | Arkusze stylów (głównie `style.css`, oparty na Marko v2) |
| `www/js/` | Skrypty (`script.js`, `swiper-script.js`, `video_embedded.js`, `submit-form.js`, `themeswitch.js`) |
| `www/image/` | Obrazy, favicon |
| `www/php/` | Obsługa formularzy (mail.php itd.) — na static hostingu nieużywane |
| `docs/` | Dokumentacja projektu |
| `archive/` | Nieużywane wersje i szablony źródłowe (nie edytować) |
| `Marko v2 Main File/` | Szablon źródłowy HTML — referencja struktury i klas CSS (nie deploy) |

## Przepływ treści

- **index.html** ładuje partiale przez JS (header, footer, sidebar, search-form) do elementów `#header`, `#sidebar` itd.
- Jedna główna strona (LP); ewentualne podstrony to osobne pliki HTML w `www/`.
- Brak build step — deploy = wgranie zawartości `www/`.

## Kluczowe pliki w www/

- `index.html` — strona główna (hero, Growth Dashboard, sekcje, kontakt, stopka)
- `header.html`, `footer.html`, `sidebar.html`, `search-form.html` — wstrzykiwane fragmenty
- `css/style.css` — główne style (5500+ linii, sekcja `.gd-*` dla Growth Dashboard)
- `js/growth-dashboard.js` — GSAP ScrollTrigger animacje dla Growth Dashboard
- Formularz kontaktowy: `action="mail.php"` — na static hostingu zamienić na Formspree lub inny backend

## Hero Section — system 3 wariantów

Sekcja hero ma 3 wersje w jednym pliku, przełączane przez panel "Wybierz układ" (prawy górny róg, tylko na dev).

### Warianty

**V0 — Szablon Marko 1:1** (`#hero-v0`, domyślnie ukryty)
- Struktura identyczna z `Marko v2 Main File/HTML_TEMPLATE/index.html`
- Układ: tytuł H1 → `.banner-heading` (flex row) → `.banner-video-content` (38%, order-xl-1) + `.banner-content` (53%, order-xl-2)
- Elementy: play button do modal video + CTA "Umów konsultację" + `.banner-reviewer` (avatary + stat)

**V1 — Centered** (`#hero-v1`, domyślnie ukryty)
- Układ: tytuł H1 → centered flex-column → 4-kolumnowy rząd statystyk z licznikami
- Liczniki: +34% sesji, +28% produktów, +36% transakcji, +1100% ROAS

**V2 — Two-column** (`#hero-v2`, **domyślny**)
- Układ: dwie kolumny Bootstrap (col-xl-6 / col-xl-6)
- Lewa: tytuł + opis + CTA; Prawa: stats grid 2×2 z efektem glassmorphism
- Liczniki: PLN 245k przychód, +1100% ROAS, +62% CR, +34% sesji

### Mechanizm video background

**Jeden element** `#banner-video-background` żyje w DOM i jest fizycznie przenoszony do aktywnego hero przy każdej zmianie:

```javascript
// switchVariant() w index.html (inline script):
const videoBg = document.getElementById('banner-video-background');
const targetContainer = document.querySelector('#hero-' + version + ' .banner-video-container');
if (videoBg && targetContainer) targetContainer.prepend(videoBg);
```

YouTube Player inicjalizowany przez `initBannerVideo()` w `js/script.js`. Po przesunięciu wywoływane `window.setYoutubeSize()` (eksportowane z domknięcia `initBannerVideo`) aby przeliczył wymiary iframe.

### Liczniki

`initCounter()` w `js/script.js` używa `IntersectionObserver` — animuje `.counter[data-target]` gdy element wchodzi w viewport. Działa automatycznie dla wszystkich wariantów (V1, V2) gdy staną się widoczne.

---

## Growth Dashboard — sekcja animowana scrollem

Sekcja bezpośrednio pod hero. Interaktywny dashboard z metrykami biznesowymi animowany podczas scrollowania.

### Pliki

| Plik | Opis |
|------|------|
| `www/index.html` | HTML sekcji: `.gd-header-section` (nagłówek scrollujący) + `#growth-dashboard` (wrapper 300vh) + `.gd-sticky` |
| `www/css/style.css` | Style `.gd-*` — sekcja "56b. Growth Dashboard" |
| `www/js/growth-dashboard.js` | GSAP ScrollTrigger timeline — wszystkie animacje |

### Architektura (kluczowe zasady)

**CSS `position: sticky` — nie GSAP pin.** `.gd-sticky` ma `position: sticky; top: 0; height: 100vh`. GSAP pin powoduje skoki layoutu przy wejściu/wyjściu — natywny sticky jest płynny.

**Jeden GSAP timeline scrub** (`start: 'top 70%'`, `end: 'bottom bottom'`) steruje wszystkimi animacjami. Brak osobnych ScrollTriggerów dla intro i pinu.

**Animacje startują zanim sekcja dotrze do góry** (`top 70%`) — brak czarnego ekranu podczas scrollowania do sekcji.

### Zawartość dashboardu

| Rząd | Elementy |
|------|----------|
| KPIs | Revenue (PLN 2.4M), ROAS (1100%), Conversion (4.2%), Orders (12847) |
| Charts + Process | SVG line chart (Revenue Trend), SVG bar chart (Monthly Orders), 4 kroki procesu |
| Metrics | AOV, CTR, CPA, Sessions, Bounce Rate, LTV |
| Bottom | Conversion funnel (4 etapy), 2x circular gauge (Store Health, Growth Index) |

### SVG animacje

- **Line chart**: `stroke-dashoffset` 600→0
- **Bar chart**: GSAP `attr: { y, height }` od dołu (nie CSS scaleY — SVG nie wspiera CSS transform-origin poprawnie)
- **Circular gauges**: `stroke-dashoffset` od pełnego do target-offset

### Biblioteki

GSAP 3.12.5 ładowany z CDN (gsap.min.js + ScrollTrigger.min.js) przed `</body>`.

---

## Technology Stack — siatka logotypów

Sekcja prezentująca narzędzia używane w pracy z klientami. Statyczna siatka CSS Grid 4×2 (responsywnie 2×4 na mobile).

- **HTML**: `.tech-stack-grid` > `.tech-stack-card` × 8, każda karta zawiera `<img class="tech-stack-logo">`
- **CSS**: klasy `.tech-stack-grid`, `.tech-stack-card`, `.tech-stack-logo` w `style.css`
- **Logotypy** (pliki w `www/image/`): `tech-meta.png`, `tech-google.png`, `tech-tiktok.png`, `tech-google-analytics.png`, `tech-shopify.png`, `tech-wordpress.png`, `tech-klaviyo.png`, `tech-hotjar.png`
- Hover: zmiana box-shadow (efekt neonowy jak reszta kart na stronie)

---

## Onboarding Process — sekcja „Jak wygląda start"

Dwukolumnowy layout (50/50): lewa strona — 3 karty kroków, prawa — nagłówek + obrazek z CTA overlay.

- **HTML**: `#onboarding` > `.chooseus-card-container` (karty) + `.chooseus-content-container` (treść + obrazek)
- **Karty**: `.card-chooseus` z dekoracyjnymi narożnikami (`.chooseus-spacer.above/.below` — box-shadow trick)
- **Ikony**: `.chooseus-icon-wrapper` > `.chooseus-icon-layout` > `.chooseus-icon` (FontAwesome)
- **CTA overlay**: `.card-chooseus-cta-layout` (position absolute na obrazku) > `.card-chooseus-cta-wrapper` > `.card-chooseus-cta`
- **Obrazek**: `www/image/onboarding-section.png` — laptop z dashboardem, zielone neonowe podświetlenie, bokeh
- **Responsive**: na tablecie (≤1199px) kolumny zamieniają się w jedną; na mobile (≤575px) karty pełna szerokość, ikony poziomo

---

## Sekcja CTA (przed stopką)

Sekcja call-to-action między formularzem kontaktowym a stopką. Wykorzystuje klasy Marko `newsletter-wrapper` + `newsletter-layout` (radialny gradient, accent border, świecący spacer).

- **Zawartość**: sub-heading "Zacznij teraz", heading "Gotowy na wzrost sprzedaży?", 3 trust badges (Bezpłatna konsultacja / Audyt w 24h / Bez zobowiązań), CTA button → `#kontakt`
- **Animacje**: `animate-box` z `data-animate="animate__fadeInUp"` (Animate.css via IntersectionObserver)
- **CSS**: istniejące klasy `.newsletter-wrapper`, `.newsletter-layout` w `style.css` (sekcja 39)
