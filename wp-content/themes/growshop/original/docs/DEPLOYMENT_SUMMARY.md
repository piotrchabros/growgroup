# Wrzucenie strony Grow Group (LP) online — podsumowanie

**Aktywna wersja:** `www/` (root). Nieużywane wersje i szablony źródłowe są w folderze `archive/`.

## 1. Serwer lokalny (odpalony)

- **URL:** http://localhost:8006  
- **Katalog:** `www/`  
- **Port 8006** — serwer Python już działa w tle.

### Wszystkie porty w stanie LISTEN (na Twoim macOS)

| Port   | Uwagi |
|--------|--------|
| 5000   | |
| 7000   | |
| 8000   | |
| 8001   | |
| 8002   | |
| 8003   | |
| 8004   | |
| 8005   | |
| **8006** | **www (Grow Group)** — ten serwer |
| 8010   | |
| 8765   | |
| 15292+ | Różne (localhost) |

---

## 2. Co masz do wrzucenia online

- **Jedna główna strona (LP):** `www/index.html` — migracja z growgroup.now.  
- **Ewentualnie:** inne HTML-e z `www/` (contact, blog, portfolio itd.), jeśli chcesz je mieć na produkcji.

---

## 3. Kroki, żeby wrzucić wszystko online

### A. Hosting (wybór jednej opcji)

1. **Hosting statyczny (najprostsze)**  
   - **Netlify / Vercel / GitHub Pages:**  
     - Repo: wrzucasz folder `www` (albo cały projekt z `www` w root albo w podkatalogu).  
     - Build: brak (static site).  
     - Publish directory: `www` (albo root, jeśli w repo jest tylko zawartość `www`).  
   - **Efekt:** domena typu `nazwa.netlify.app` lub własna domena.

2. **VPS / serwer (np. Nginx)**  
   - Na serwerze: skopiować cały folder `www` (np. `/var/www/growgroup`).  
   - Nginx: root ustawić na ten folder.  
   - SSL: Let’s Encrypt (np. certbot).  
   - **Efekt:** np. `https://growgroup.now` lub inna domena.

3. **FTP / panel (np. home.pl, cyber_Folks)**  
   - Zalogować się przez FTP lub panel „Pliki”.  
   - Wgrać całą zawartość `www` (wszystkie pliki i foldery: `css/`, `js`, `image`, wszystkie `.html`).  
   - Domena: ustawiona w panelu na katalog z `index.html`.  
   - **Efekt:** strona pod Twoją domeną.

### B. Konkretna checklist przed wrzuceniem

- [ ] **Ścieżki:** W `www` linki są względne — przy wgraniu całego `www` będą działać.  
- [ ] **Formularz kontaktowy:** W `index.html` formularz ma `action="mail.php"`. Na hostingu statycznym (Netlify/Vercel/GitHub Pages) **mail.php nie zadziała** — trzeba:
  - użyć zewnętrznego serwisu (np. Formspree, Netlify Forms, Getform), **albo**
  - mieć backend (PHP na hostingu z PHP, albo osobna funkcja/serverless).  
- [ ] **Newsletter:** W stopce formularz jest na `#` — podpięcie np. Mailchimp/ConvertKit przez ich form action lub API.  
- [ ] **Domena:** Jeśli masz domenę (np. growgroup.now), w panelu hostingu ustawiasz ją na katalog ze stroną (lub na projekt Netlify/Vercel).

### C. Minimalny deploy (np. Netlify) — krok po kroku

1. Załóż konto na [Netlify](https://netlify.com).  
2. **Drag & drop:** wejdź w Netlify → "Sites" → "Add new site" → "Deploy manually" → przeciągnij **cały folder `www`** (wraz z `css`, `js`, `image`, wszystkimi `.html`).  
3. Netlify da Ci URL typu `random-name-123.netlify.app`.  
4. (Opcja) W "Domain settings" podłącz swoją domenę (np. growgroup.now).  
5. **Formularz:** Zamień `action="mail.php"` na np. Formspree:  
   `action="https://formspree.io/f/TWOJE_ID"` i przetestuj wysyłkę.

---

## 4. Podsumowanie jednym zdaniem

**Żeby wrzucić wszystkie LP (strony z `www`) online:** wybierz hosting (Netlify/Vercel = wrzucasz folder; VPS = kopiujesz `www` + Nginx; FTP = wgrywasz `www`), wgraj cały katalog `www`, ustaw domenę i zamień obsługę formularza (mail.php → Formspree lub backend).
