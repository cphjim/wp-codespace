# DJC Gaming WordPress Plugin - Roadmap

## Doel
De `djc-gaming` plugin levert een centrale **DJC-Gaming hubpagina** binnen elke gemeentelijke WordPress-omgeving. Vanuit deze hub kunnen jongeren spellen starten zoals **DJC-Game-Words** en later andere educatieve of competitieve games.

De plugin is modulair: nieuwe games kunnen eenvoudig worden toegevoegd in `/games/<slug>/`.

---

## Functionaliteiten v1

### Hubpagina (`[djc_gaming]`)
  - **Header**: titel, subtitel, categorie-dropdown.
  - **Highlight-blok**: featured game (grote banner met “Speel nu”).
  - **Categorie-secties**: Populair, Educatief, Competitie.
  - **Game-kaarten**:
    - Icoon (PNG/SVG).
    - Titel en korte omschrijving.
    - Labels:
      - `Nieuw` label voor nieuwe games.
      - `Topscore` badge (laatste dag/week/maand).
    - Sponsor-branding (optionele overlay/hoeklabel met logo of naam).
 - **Klik op een game-kaart start de game direct binnen de hubpagina (overlay of bovenaan), zonder pagina-verversing.**

### Gamepagina (`[djc_game slug="words"]`)
- Presetselectie: Fast (20), Standard (40), Endurance (100).
- HUD: score, tijd (ms), voortgang (x/y).
- Game-loop:
  - Words: woordenlijst invoeren (textarea).
  - Numbers (later): generator (+/×).
- Resultaat:
  - Score, tijd, accuracy.
  - Formulier: voornaam, achternaam, e-mail (verplicht), consent (checkbox), nickname (optioneel).
  - Opslag in lokale WP-DB via REST.
- Simpele animaties (pop bij correct, shake bij fout, confetti bij einde ronde).

### Leaderboards (`[djc_leaderboard]`)
- Per periode: dag, week, maand.
- Sortering: score DESC, tijd ASC, accuracy DESC.
- Alleen publieke velden: display_name, score, tijd, accuracy, datum.
- Labels:
  - Highlight “Topscore vandaag/week/maand”.
- Mogelijkheid om een “Hall of Fame” view te maken met archief.

---

## Data-opslag (WP-DB)
Tabel `{prefix}djc_scores`:
- id, game, preset, items, score_letters, keypress_count, correct_keystrokes, mistakes, items_completed, time_ms, accuracy
- display_name (nickname of initialen)
- first_name, last_name, email, consent
- season_day, season_week, season_month
- created_at

Indexes:
- dag/week/maand queries op (game, preset, score_letters, time_ms).

---

## Admin (WP Dashboard)
Menu **DJC Gaming**:
- **Dashboard**: tegels (sessies, scores, unieke e-mails), grafiek rondes per dag.
- **Scores**: filterbare tabel + CSV export.
- **Settings**:
  - Privacy-URL
  - Bewaartermijn (maanden)
  - Rate-limit parameters
  - Toggle: “Publiek leaderboard inschakelen”

---

## Styling
- Gebruik kleurrijke, speelse stijl (zoals voorbeelddesign).
- Game-kaarten met afgeronde hoeken, iconen, labels en badges.
- Responsive grid voor tegels.
- Sponsors: logo overlay of hoeklabel.

---

## Toekomst (v1.1+)
- Extra games (Numbers, Quiz, Avonturen).
- Provinciale/landelijke competitie via centrale sync.
- E-mailverificatie van scores.
- Uitgebreidere brandingopties voor sponsors.
