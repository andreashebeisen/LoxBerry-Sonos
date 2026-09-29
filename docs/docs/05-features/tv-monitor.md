---
sidebar_position: 1
description: Automatisches Umschalten zwischen Musik und TV an Soundbars
---

# TV-Monitor

Ermöglicht das automatische Monitoren des Signals am HDMI/SPDIF-Eingang einer Soundbar (PLAYBASE, BEAM, ARC usw.).

 ![TV-Monitor](./img/TVMonitor.png)

**Typischer Use-case:** Tagsüber läuft Musik, teilweise laut. Beim Einschalten des TV-Gerätes in Kombination mit aktivierter Autoplay-Einstellung der Soundbar (Sonos App) ist das unschön. Umgekehrt ist es nach dem Ausschalten des TV nervig, die Musik manuell wieder zu starten. Der TV-Monitor übernimmt beides automatisch.

## Ablauf

Das Plugin prüft ca. alle 10 Sekunden den Eingang der Soundbar.

  * Solange Musik/Radio läuft: Plugin speichert laufend alle notwendigen Informationen (Titel, Sender, Lautstärke, Klangeinstellungen, Gruppenstruktur) für einen späteren Restore.
  * TV einschalten → anliegendes HDMI/SPDIF-Signal erkannt → Speichern wird unterbrochen, die hinterlegten TV-Einstellungen (Lautstärke, Höhen/Bass, Sprachverbesserung, Surround, Sub) werden gesetzt, ab der eingestellten Uhrzeit "ab" die Nacht-Einstellungen. Optional werden die unter "Stop Player bei Ein" gewählten Player gestoppt.
  * TV ausschalten → vorheriger Musik-/Radiostatus wird automatisch wiederhergestellt, analog zu den T2S-Funktionen.
  * Außerhalb des konfigurierten Zeitfensters werden beim Ausschalten nur die Klangeinstellungen, nicht aber die Wiedergabe wiederhergestellt.

Das Ganze funktioniert auch mit Gruppen, egal ob die Soundbar Master oder Member ist. Einzige Ausnahme: War die Soundbar Master einer Gruppe, wird sie beim Restore-Prozess als Member hinzugefügt.

## Konfiguration

  * TV-Monitor in der Plugin-Config aktivieren (nur sichtbar wenn eine Soundbar detektiert wurde), siehe [TV Monitor Einstellungen](../01-getting-started/configuration.md#tv-monitor)
  * Zeitraum für aktives Monitoring festlegen (Standard 10–22 Uhr), damit z. B. das TV-Ausschalten nach 22 Uhr nicht automatisch Musik startet
  * Je Soundbar das Monitoring einschalten und die TV-Lautstärke hinterlegen – ohne diesen Wert funktioniert das Monitoring nicht. Optional Höhen, Bass, Sprachverbesserung, Surround/Sub inkl. Level sowie Nacht-Einstellungen

Die Funktion wurde mit **Sonos BEAM Gen2** und **Samsung TV Frame** getestet.

## Diagnose bei Problemen

Sonos-Log und PHP-Log prüfen. Falls dort kein Fehler erscheint, folgende Befehle im Browser ausführen – jeweils für die Szenarien Musik/Radio und TV eingeschaltet:

```
http://<LOXBERRY-IP>/plugins/sonos4lox/index.php/?zone=<DEINE_SOUNDBAR>&action=getpositioninfo
http://<LOXBERRY-IP>/plugins/sonos4lox/index.php/?zone=<DEINE_SOUNDBAR>&action=getaudioinputattributes
```

Im TV-Betrieb beginnt die `TrackURI` mit `x-sonos-htastream:`. Die Ausgaben ggf. [melden](../04-misc/error-reporting.md).
