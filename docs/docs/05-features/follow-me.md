---
sidebar_position: 2
description: Musik folgt dem Bewohner von Raum zu Raum (Präsenzerkennung)
---

# Follow-me (Präsenzerkennung)

_Ab v5.5.0._ Ermöglicht, dass ein Player automatisch den Stream eines "Host Players" übernimmt, sobald ein Raum betreten wird (z. B. per Bewegungsmelder). Der Standard-Host und die Nachlaufzeit werden in den [Optionen](../02-configuration/options.md#follow-me-präsenzerkennung) konfiguriert.

## Voraussetzungen

  * Auf dem Player des betretenen Raumes ist **kein** Stream aktiv
  * Auf dem Host Player läuft **kein** TV

## Befehle

Befehle am Bewegungsmelder-Ausgangsverbinder:

| Funktion | Befehl | Beschreibung |
| --- | --- | --- |
| follow | `/plugins/sonos4lox/index.php/?zone=<PLAYER>&action=follow` | Befehl bei EIN → folgt dem Host Player |
| leave | `/plugins/sonos4lox/index.php/?zone=<PLAYER>&action=leave` | Befehl bei AUS → verlässt den Stream |

## Optionale Parameter

| Parameter | Befehl | Beschreibung |
| --- | --- | --- |
| volume | `&action=follow&volume=12` | Einschaltlautstärke für den Client |
| play | `&action=follow&play` | Falls kein Stream auf Host: Client mit play starten (Queue/Sender muss vorhanden sein) |
| host | `&action=follow&host=<PLAYER>` | Überschreibt den Standard-Host aus der Config |
| function | `&action=follow&function` | Falls kein Stream auf Host: Backupfunktion starten (Auswahl in Plugin-Config inkl. Radio-Favoriten) |

 ![Auswahl Backupfunktion](./img/sod1.png)

:::note

`&play` und `&function` können nicht kombiniert werden; alle anderen Parameter sind kombinierbar.

:::
