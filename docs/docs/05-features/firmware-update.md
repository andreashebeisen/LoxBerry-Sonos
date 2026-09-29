---
sidebar_position: 3
description: Automatisches Firmware-Update der Sonos Player
---

# Auto-Update Sonos Firmware

Das Plugin prüft stündlich, ob der konfigurierte Update-Zeitpunkt erreicht ist, und führt dann je Player ein verfügbares Firmware-Update automatisch durch. Starttag (täglich oder ein bestimmter Wochentag) und Uhrzeit sind in den [Optionen](../02-configuration/options.md#auto-update-sonos-firmware) konfigurierbar. Ob für einen Player ein Update verfügbar ist, kann mit `...action=update` im Browser geprüft werden.

Option "**Power On**": ausgeschaltete Player (schaltbare Steckdose) werden vor dem Update eingeschaltet (Wartezeit ca. 7 Minuten, bis alle Player online sind) und danach wieder ausgeschaltet. Dazu sendet das Plugin ein Signal an den Miniserver, mit dem die Steckdosen geschaltet werden können.

 ![Auto-Update Konfiguration](./img/sw_update.png)
 ![Auto-Update Details](./img/sw_update_det.png)

Voraussetzung für das Signal: aktivierte [Ausgehende Datenübertragung](../03-integration/loxone.md#eingangsseitig-sonos--miniserver) **mit konfiguriertem UDP-Port**.

| Protokoll | Eingangs-Syntax im MS | Wert |
| --- | --- | --- |
| UDP | `Sonos4lox: update@\v` | 1 = Player einschalten (vor dem Update), 0 = Player ausschalten (nach dem Update) |
