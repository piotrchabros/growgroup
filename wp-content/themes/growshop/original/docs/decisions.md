# Decisions Log

## Full-screen mobile menu overlay (2026-03-17)

- **Decision**: Zastąpiono stary sidebar (`.sidebar` + `.sidebar-overlay`) pełnoekranowym overlayem (`.mobile-menu`).
- **Rationale**: Bootstrap collapse nie działał na mobile; stary sidebar nie istniał w HTML → JS trafiał w puste elementy. Nowy overlay daje spójny UX z animowanym wejściem i staggered linkami.
- **Implementation**: `header.php` (nowy HTML), `global.css` sekcja 09 (przepisana), `global.js` `initSidebar()` (nowe selektory). Klasy `.sidebar*`, `.close-btn` usunięte.
- **Outcome**: Menu działa na wszystkich urządzeniach; efekt otwarcia oparty o `opacity/visibility/transform + cubic-bezier`.

## Unifikacja animacji fadeIn (2026-03-17)

- **Decision**: Wszystkie `animate__fadeInLeft/Right/Up/Down` w blokach ACF zastąpione przez `animate__fadeIn` z `animation-duration: 2s`.
- **Rationale**: Kierunkowe animacje wyglądały niespójnie; prosta fadeIn jest bardziej profesjonalna.
- **Implementation**: `sed` batch replace w 12 plikach `blocks/*/` + override w `global.css`.
- **Outcome**: Jednolite 2s fade-in we wszystkich sekcjach.

## Logo: usunięcie fallbacku na PNG (2026-03-17)

- **Decision**: PHP fallback do `growshop-logo-light.png` zastąpiony wyświetlaniem `bloginfo('name')`. Pliki PNG usunięte z repo.
- **Rationale**: JS (`updateLogos()`) nadpisywał ACF logo przy każdym załadowaniu strony. Fallback na statyczny plik był błędny — logo powinno pochodzić wyłącznie z ACF Options lub z nazwy bloga.
- **Implementation**: `header.php`, `footer.php`, `global.js` (usunięto `siteLogos.attr('src', ...)`).
- **Outcome**: Logo ładuje się z ACF Options; jeśli puste → nazwa bloga. Brak migotania.

## Telefon w navbarze: ripple animation + tel: link (2026-03-17)

- **Decision**: Usunięto zielone kółko z ikoną telefonu; zastąpiono samą ikoną z ripple pulse + link `tel:`.
- **Rationale**: Solid circle wyglądał zbyt ciężko; ripple spójny ze scroll-down-btn. Brak efektu hover na życzenie klienta.
- **Implementation**: `header.php` (wrapping `<a href="tel:">`), `global.css` (`.navbar-phone-icon` ripple).
- **Outcome**: Klikalny numer telefonu z delikatnym pulsem, bez hover.
