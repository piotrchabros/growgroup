# Prompt do nowej konwersacji — wdrożenie bloków ACF

Skopiuj poniższy tekst i wklej jako pierwszy message w nowej konwersacji Claude Code:

---

## Kontekst projektu

Pracujemy nad motywem WordPress **Grow Group** (`growshop`) w `/Users/dawid/Local Sites/growgroup/app/public/wp-content/themes/growshop/`.

**Co już jest zrobione (Faza 0 + Hero):**
- Skeleton motywu WP: style.css, functions.php, index.php, front-page.php, header.php, footer.php
- ACF Pro zainstalowany i aktywny
- Automatyczny scanner bloków ACF (scandir blocks/)
- ACF JSON sync do acf-json/
- Editor styles (ciemne tło, pełna szerokość bloków w Gutenbergu)
- Global CSS/JS wyekstrahowane z oryginalnej strony
- Vendor assets (Bootstrap 5, Animate.css, Swiper, Font Awesome, jQuery)
- Blok Hero Banner — kompletny i działający
- Skill `/acf-block` — gotowy do użycia przy tworzeniu kolejnych bloków

**Oryginalna strona HTML** jest w `original/www/index.html` — to źródło treści i struktury do przeniesienia.

## Zadanie

Zaplanuj i wdróż **wszystkie pozostałe bloki ACF** sekcja po sekcji. Użyj skilla `/acf-block` do tworzenia każdego bloku.

**Kolejność wdrożenia (12 bloków):**

1. **Service Cards** (#jak-dzialamy, linie 369-496) — 6 kart usług z ikonami, repeater
2. **Process Steps** (#jak-dzialamy 2nd, linie 499-612) — 4 kroki procesu, repeater
3. **Results Section** (#efekty, linie 615-675) — obraz + lista korzyści
4. **Case Studies** (#case-studies, linie 678-824) — 3 karty case study z problem/solution/results
5. **Team Members** (#zespol, linie 827-908) — 3 karty członków zespołu
6. **Tech Stack** (linie 911-957) — 8 logotypów partnerów technologicznych
7. **Onboarding** (#onboarding, linie 960-1044) — 3 karty procesu + obraz z CTA
8. **Target Audience** (#dla-kogo, linie 1047-1092) — 3 karty grup docelowych
9. **Contact Form** (#kontakt, linie 1094-1191) — iframe embed (ACF pole na URL)
10. **Blog Preview** (#blog, linie 1194-1287) — dynamiczny z WP_Query
11. **Final CTA** (linie 1290-1332) — banner CTA z checklistą
12. **Growth Dashboard** (#growth-dashboard, linie 145-365) — GSAP ScrollTrigger, SVG charts (najbardziej złożony, na koniec)

**Na sam koniec:** Header (nawigacja z wp_nav_menu) i Footer (stopka z ACF options page)

## Jak pracujemy

- Blok po bloku — po każdym bloku commituj i powiedz mi co zrobić w WP admin
- Treści 1:1 z oryginalnej strony (fallback defaults w PHP)
- HTML struktura bez zmian (klasy CSS zostają, style są w global.css)
- Po każdym commicie powiedz mi jak przetestować blok w edytorze WP
- Jak skończysz wszystkie bloki — powiedz mi i zrobimy header/footer

Zacznij od przeczytania AGENTS.md, potem `/acf-block` i lecimy z Service Cards.

---
