---
sidebar_position: 4
description: Statusdaten der Player per MQTT
---

# MQTT

Das Plugin veröffentlicht die Statusdaten aller Player über den **LoxBerry MQTT Gateway**. Grundeinrichtung, Broker und Weiterleitung an den Miniserver sind in der [LoxBerry Dokumentation](https://wiki.loxberry.de/) beschrieben. Ist das MQTT Gateway installiert und die [Ausgehende Datenübertragung](../01-getting-started/t2s.md#weitere-einstellungen) aktiv, erscheint in der Plugin-Navigation der Link "**MQTT Connection**" zur MQTT-Seite des LoxBerry.

Die Daten werden vom Event Listener (Dienst `sonos_event_listener`) bei jeder Statusänderung nahezu in Echtzeit gesendet.

:::info

Das Plugin kann **nicht** per MQTT gesteuert werden. Die Datei `mqtt_subscriptions.cfg` des Plugins (`Sonos4lox/#`, `s4lox/#`) teilt dem MQTT Gateway lediglich mit, welche Topics an den Miniserver weitergeleitet werden. Befehle werden ausschließlich per HTTP gesendet (siehe [Loxone-Anbindung](../03-integration/loxone.md)).

:::

## Topics

Je Raum werden Topics der Form `s4lox/sonos/<Raum>/<Typ>` mit einem JSON-Payload veröffentlicht:

| Typ | Retained | Wichtige Felder |
| --- | :-: | --- |
| `state` | ✔ | `state_code` (1 = Play, 2 = Pause, 3 = Stop, 4 = Wechsel) |
| `volume` | ✔ | `volume` |
| `mute` | | `mute_int` (1/0) |
| `track` | ✔ | `tit` (Titel), `int` (Interpret), `titint`, `radio`, `source` (0 = nichts, 1 = Radio, 2 = Playlist/Stream, 3 = TV, 4 = Line-In), `sid`, `cover`, `tvstate` |
| `nexttrack` | ✔ | Informationen zum nächsten Titel |
| `group` | | `role_code` (1 = Single, 2 = Master, 3 = Member) |
| `eq` | ✔ | `bass`, `treble`, `loudness`, `balance`, `subgain`, `nightmode`, `dialoglevel` |
| `playmode` | | `shuffle`, `repeat`, `repeat_one`, `crossfade`, `code` (0–5, 99 = unbekannt) |
| `position` | | `position_sec`, `duration_sec`, `progress_pct`, `track_no`, `track_count` |

Zusätzlich:

  * `s4lox/sonos/_health` (retained): Anzahl Player online/offline/gesamt, `<Raum>_Online`, Laufzeit des Listeners
  * `s4lox/t2s/<Zone>` bzw. `Sonos4lox/t2s/<Zone>`: **1** während einer T2S-Durchsage, danach **0** (nur wenn kein UDP-Port konfiguriert ist)

### Legacy Topics

Für bestehende Installationen werden zusätzlich die bisherigen Topics `Sonos4lox/<Wert>/<Raum>` gesendet, mit `<Wert>` = `vol`, `stat`, `grp`, `mute`, `titint`, `tit`, `int`, `radio`, `source`, `sid`, `cover`, `tvstate`.

## Loxone Template

Das vorkonfigurierte Template `VI_MQTT_UDP_Sonos.xml` für den Import in Loxone Config kann in der Plugin-Konfiguration heruntergeladen werden (siehe [Loxone-Anbindung](../03-integration/loxone.md#eingangsseitig-sonos--miniserver)).
