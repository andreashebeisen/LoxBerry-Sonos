---
sidebar_position: 1
description: Plugin-Installation
---

# Installation

## Voraussetzungen

  * LoxBerry ab Version **3.0**
  * Architektur: Raspberry Pi, x86 oder x86_64
  * Sonos Player (S2) mit statischer IP-Adresse (siehe [Einführung](../intro.md))

## Hinzufügen zum LoxBerry

Das Plugin wird wie jedes andere LoxBerry Plugin über die **Plugin-Verwaltung** des LoxBerry installiert:

  1. Aktuelles Release (ZIP) von [GitHub](https://github.com/Liver64/LoxBerry-Sonos/releases) herunterladen bzw. die ZIP-URL kopieren.
  2. In LoxBerry → **Plugin-Verwaltung** die Datei bzw. URL angeben und installieren.
  3. Nach der Installation ist ein **Neustart** des LoxBerry erforderlich.

Während der Installation werden automatisch installiert bzw. eingerichtet:

  * die Offline-Sprachengine **Piper TTS** inkl. deutscher Stimmen (siehe [Text-to-speech](./t2s.md#piper-tts-offline))
  * Standard-Jingles im Verzeichnis `tts/mp3`
  * Hintergrunddienste (Event Listener, Online-Check, Watchdog) sowie Cronjobs

Die Hintergrunddienste für die Datenübertragung zum Miniserver werden erst aktiv, wenn in der Konfiguration die [Ausgehende Datenübertragung](./t2s.md#weitere-einstellungen) eingeschaltet ist.

## Update / Downgrade

Updates werden über die LoxBerry Plugin-Verwaltung (inkl. Auto-Update) eingespielt. Eine bestimmte Version (auch ein Downgrade) kann in den [Optionen](../02-configuration/options.md#sonos-plugin-version) unter "**Sonos Plugin Version**" ausgewählt und installiert werden.

## Nächste Schritte

  1. [Zonen hinzufügen](./add-zones.md)
  2. [Text-to-speech einrichten](./t2s.md)
  3. [Loxone-Anbindung](../03-integration/loxone.md)
