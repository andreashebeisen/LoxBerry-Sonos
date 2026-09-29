---
sidebar_position: 1
description: Automatisches Umschalten zwischen Musik und TV an Soundbars
---

# TV-Monitor

_Ab v5.3.3._ Ermöglicht das automatische Monitoren des Signals am HDMI/SPDIF-Eingang einer Soundbar (PLAYBASE, BEAM usw.).

 ![TV-Monitor](./img/TVMonitor.png)

**Typischer Use-case:** Tagsüber läuft Musik, teilweise laut. Beim Einschalten des TV-Gerätes in Kombination mit aktivierter Autoplay-Einstellung der Soundbar (Sonos App) ist das unschön. Umgekehrt ist es nach dem Ausschalten des TV nervig, die Musik manuell wieder zu starten. Der TV-Monitor übernimmt beides automatisch.

## Ablauf

  * Solange Musik/Radio läuft: Plugin speichert laufend alle notwendigen Informationen (Titel, Sender, Lautstärke, Gruppenstruktur) für einen späteren Restore.
  * TV einschalten → anliegendes HDMI/SPDIF-Signal erkannt → Speichern wird unterbrochen, vordefinierte TV-Lautstärke wird gesetzt, Soundbar wechselt auf TV-Modus.
  * TV ausschalten → vorheriger Musik-/Radiostatus wird automatisch wiederhergestellt, analog zu den T2S-Funktionen.

Das Ganze funktioniert auch mit Gruppen, egal ob die Soundbar Master oder Member ist. Einzige Ausnahme: War die Soundbar Master einer Gruppe, wird sie beim Restore-Prozess als Member hinzugefügt.

## Konfiguration

  * TV-Monitor in der Plugin-Config aktivieren (nur sichtbar wenn bei Update/Installation eine Soundbar detektiert wurde)
  * Zeitraum für aktives Monitoring festlegen (z. B. bis 22:00 Uhr), damit das TV-Ausschalten nach 22 Uhr nicht automatisch Musik startet
  * TV-Lautstärke je Soundbar in der Config hinterlegen – ohne diesen Wert funktioniert das Monitoring nicht

Die Funktion wurde mit **Sonos BEAM Gen2** und **Samsung TV Frame** getestet.

## Diagnose bei Problemen

Sonos-Log und PHP-Log prüfen. Falls dort kein Fehler erscheint, folgenden Befehl im Browser ausführen – jeweils für alle 4 Szenarien (vorher in der Sonos App eine Playlist starten):

```
http://<LOXBERRY-IP>/plugins/sonos4lox/index.php/?zone=<DEINE_SOUNDBAR>&action=streammode
```

Werte für die 4 Szenarien notieren und ggf. [melden](../04-misc/error-reporting.md):

  * Wert Musik/Radio:
  * Wert TV Mode:
  * Wert Soundbar als Master einer Gruppe:
  * Wert Soundbar als Member einer Gruppe:
