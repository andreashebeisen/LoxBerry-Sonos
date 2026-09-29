---
sidebar_position: 5
description: Logfiles und Loglevel
---

# Logfiles

Die Logfiles des Plugins sind im Tab "**Logfiles**" der Plugin-Konfiguration bzw. über das LoxBerry Log Manager Widget erreichbar. Allgemeines zum Umgang mit Logfiles siehe [LoxBerry Dokumentation](https://wiki.loxberry.de/).

## Loglevel

Der Loglevel wird **nicht** im Plugin, sondern in der LoxBerry Plugin-Verwaltung für das Sonos Plugin eingestellt. Bei Loglevel **Debug** erscheint zusätzlich der Tab "Testing" (siehe [Optionen](./options.md#testing)).

## Logdateien

| Datei | Inhalt |
| --- | --- |
| `sonos.log` | Alle über URL aufgerufenen Befehle und T2S-Durchsagen |
| `s4lox_debug_<Datum>.log` | Wird erzeugt, wenn an einen Befehl der Parameter `&debug` angehängt wird. Der Befehl wird dann mit Loglevel 7 (Debug) protokolliert, unabhängig vom eingestellten Loglevel. Ältere Debug-Logs werden dabei gelöscht. |
| `sonos_watchdog.log` | Überwachung der Hintergrunddienste (Event Listener, Online-Check) |

Beispiel: `/plugins/sonos4lox/index.php?zone=kueche&action=say&text=test&debug`

## Typische Hinweise im Log

  * **Unsupported URL action '…'** – die angegebene `action` existiert nicht (mehr). Der Befehl wurde nicht ausgeführt. Ggf. wird ein Vorschlag ("Did you mean …?") angezeigt. Siehe auch [Entfernte Befehle](../03-integration/actions-extended.md#entfernte-befehle).
  * **Unknown URL parameter '…'** – ein Parameter ist nicht in der Liste bekannter Parameter (z. B. Tippfehler). Ggf. mit Vorschlag des richtigen Parameters. Hinweis: Einige gültige Parameter (z. B. `mute`, `greet`, `clip`, `paused`, `speaker`, `sonos`, `calendar`, `groupvolume`, `to`, `traffic`, `status`, `reset`) erzeugen diese Warnung derzeit ebenfalls, funktionieren aber trotzdem.
  * **Requested master zone '…' seems to be offline** – die Zone ist nicht erreichbar oder außerhalb ihres [Zeitfensters](../01-getting-started/add-zones.md#zeitsteuerung-optional).
  * **Script is off** – das Plugin wurde mit `action=off` ausgeschaltet.
