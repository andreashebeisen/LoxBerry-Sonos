---
sidebar_position: 3
description: TV Monitor, Speicherort, Backup & Restore etc.
---

# Weitere Grundeinstellungen

## Player Online Check

Das Plugin prüft **automatisch jede Minute**, welche Player im Netzwerk erreichbar sind (auch für User die ihre Sonos Player an schaltbaren Steckdosen betreiben). Eine Konfiguration ist nicht notwendig. Kommt ein Player wieder online, wird automatisch seine Audio Vol gesetzt. Befehle an eine Zone die offline ist werden mit einem Hinweis im Log abgebrochen.

## TV Monitor

Nur sichtbar, wenn eine Soundbar (z. B. BEAM, ARC, PLAYBASE) erkannt wurde.

  * **TV Monitor:** Ein/Aus
  * **aktiv zwischen / und:** Zeitfenster (Stunden) in dem das Monitoring aktiv ist (Standard 10–22 Uhr)

Je Soundbar können folgende Werte hinterlegt werden:

| Spalte | Beschreibung |
| --- | --- |
| Ein/Aus | Monitoring für diese Soundbar aktivieren |
| Vol | TV-Lautstärke (0–100) – **Pflichtfeld** bei aktivierter Soundbar |
| Treble / Bass | Höhen / Bass im TV-Betrieb (-10 bis 10) |
| Sprache | Sprachverbesserung ein/aus |
| Surr / SurLev | Surround ein/aus und Surround-Level (-15 bis 15) |
| Sub / SubLev | Subwoofer ein/aus und Sub-Level (-15 bis 15) |
| Stop Player bei Ein | Diese Player werden beim Einschalten des TV gestoppt |
| ab | Uhrzeit ab der die Nacht-Einstellungen gelten; danach erscheinen die Spalten **Nacht** (Nachtmodus), **Sub** und **SubLev** für die Nacht |

Details zur Funktionsweise unter [TV-Monitor](../05-features/tv-monitor.md).

## Speicherort

Über "**Speicherort**" wird das Verzeichnis für die T2S-Dateien festgelegt (Standard: `/opt/loxberry/data/plugins/sonos4lox`). Darin liegen die Unterverzeichnisse `tts` (generierte Ansagen) und `tts/mp3` (Jingles und eigene MP3-Dateien für `messageid`).

## Backup & Restore

Die Konfiguration (inkl. Audio Profile) wird **einmal täglich** automatisch per Cronjob gesichert.

Unterscheidet sich die Sicherung von der aktuellen Konfiguration, erscheint neben dem Schalter "Text-2-speech Funktion" der Button "**Restore**" (Restore Konfiguration von gestern). Damit wird die Sicherung wiederhergestellt.
