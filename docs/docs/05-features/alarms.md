---
sidebar_position: 4
description: Sonos Wecker/Alarme an den Miniserver übertragen
---

# Sonos Wecker / Alarme (Service)

_Ab v5.x.x_ sendet ein täglicher Cronjob alle Sonos-Wecker/Alarme und ihren Status (Aktiv/Aus) an den MS. Die Zeiten werden in **Minuten nach Mitternacht − 10 Minuten** berechnet (für rechtzeitiges Einschalten schaltbarer Steckdosen).

Die Schlüssel für die MS-Eingangsverbinder über `...action=listalarms` ermitteln (UDP) oder aus dem MQTT "Incoming Overview" kopieren.

Beispielausgabe `action=listalarms`:

```
[min_schlafen_ID_27] => 440   (= 07:30 Uhr − 10 Min.)
[stat_schlafen_ID_27] => 0    (0 = deaktiviert)
[min_kids_ID_42] => 380
[stat_kids_ID_42] => 0
```

Weitere Befehle rund um Wecker (alarmon, alarmoff, alarmstop) siehe [Sonstige Befehle](../03-integration/actions-extended.md#sonstige-befehle).
