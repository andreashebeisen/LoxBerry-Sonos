---
sidebar_position: 4
description: Sonos Wecker/Alarme an den Miniserver übertragen
---

# Sonos Wecker / Alarme (Service)

Ein täglicher Cronjob sendet alle Sonos-Wecker/Alarme und ihren Status (Aktiv/Aus) per **UDP** an den Miniserver (Voraussetzung: [Ausgehende Datenübertragung](../01-getting-started/t2s.md#weitere-einstellungen) aktiv). Die Zeiten werden in **Minuten nach Mitternacht − 10 Minuten** berechnet (für rechtzeitiges Einschalten schaltbarer Steckdosen).

Die Werte werden im Format `Sonos4lox: <Key>@<Wert>` gesendet. Die Schlüssel für die MS-Eingangsverbinder über `...action=listalarms` im Browser ermitteln:

  * `min_<Raum>_ID_<ID>` = Startzeit in Minuten nach Mitternacht − 10
  * `stat_<Raum>_ID_<ID>` = Status (1 = aktiv, 0 = deaktiviert)

Beispielausgabe `action=listalarms`:

```
[min_schlafen_ID_27] => 440   (= 07:30 Uhr − 10 Min.)
[stat_schlafen_ID_27] => 0    (0 = deaktiviert)
[min_kids_ID_42] => 380
[stat_kids_ID_42] => 0
```

Einzelne Wecker können über ihre ID mit `action=alarmoff&id=27` bzw. `action=alarmon&id=27` aus- und wieder eingeschaltet werden. Weitere Befehle rund um Wecker (alarmon, alarmoff, alarmstop) siehe [Sonstige Befehle](../03-integration/actions-extended.md#gruppierung-geräte--wecker).
