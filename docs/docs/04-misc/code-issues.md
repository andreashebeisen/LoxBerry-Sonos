---
sidebar_position: 8
description: Beim Abgleich von Wiki und Code gefundene Fehler im Plugin
---

# Gefundene Fehler im Code

Beim Abgleich dieser Dokumentation mit dem Code des Plugins (Version 7.2.0) sind folgende Fehler aufgefallen. Sie sind noch **nicht behoben**. Wo die Dokumentation das beabsichtigte Verhalten beschreibt, ist das bei dem jeweiligen Punkt vermerkt.

Allgemeine Einschränkungen für Anwender stehen unter [Bekannte Probleme](./known-issues.md).

## 1. UDP-Keys im XML-Template passen nicht zu den gesendeten Daten

Das generierte Template `VI_UDP_Sonos.xml` (`src/Core/Communication/MsInbound.php`) erwartet andere Keys, als der Event Listener (`src/Core/Event/EventHandler.php:387-551`) tatsächlich per UDP sendet:

| Template erwartet | Event Listener sendet |
| --- | --- |
| `<Raum>_role_code` | `<Raum>_group_role` |
| `<Raum>_source` | `<Raum>_current_source` |
| `<Raum>_Online` | `<Raum>_online` |
| Umlaut ü → `ue` | Umlaut ü → `_` |

**Auswirkung:** Wer das UDP-Template importiert, erhält die betroffenen Werte nicht im Miniserver. Das MQTT-Template ist nicht betroffen.

## 2. Alarm-Push verwendet einen nicht mehr gepflegten Port

`src/Support/AlarmPush.php:74` sendet an den Port aus `LOXONE.LoxPort`. Diese Einstellung wird von der Konfigurationsoberfläche nicht mehr geschrieben, der UDP-Port steht in `LOXONE.UDP`.

**Auswirkung:** Der tägliche Versand der Wecker an den Miniserver schlägt vermutlich mit "UDP port invalid" fehl. Die Seite [Sonos Wecker / Alarme](../05-features/alarms.md) beschreibt das beabsichtigte Verhalten.

## 3. Firmware-Update-Signal nur per UDP

`src/Support/SoftwareUpdateCheck.php` sendet das Signal `update` per MQTT nur, wenn `LOXONE.LoxDatenMQTT` gesetzt ist. Diese Einstellung wird von `webfrontend/htmlauth/index.cgi:246` beim Laden der Konfiguration gelöscht.

**Auswirkung:** Das Signal geht in der Praxis nur per UDP raus und nur, wenn ein UDP-Port konfiguriert ist. Die Seite [Auto-Update Sonos Firmware](../05-features/firmware-update.md) beschreibt daher nur UDP.

## 4. Diagnosebefehle `networkstatus` und `debuginfo` ohne Funktion

Beide Aktionen sind im Action Router registriert (`src/Actions/DeviceActions.php`), führen aber nichts aus:

  * `networkstatus`: die aufgerufene Funktion `networkstatus()` existiert nicht mehr.
  * `debuginfo`: die Funktion `debugInfo()` liegt in `Info.php`, das von `Sonos.php` nicht geladen wird.

Im Browser erscheint jeweils nur "… is not available". Die Befehle sind deshalb nicht in den [Diagnosebefehlen](../03-integration/actions-extended.md#diagnosebefehle) aufgeführt.

## 5. Telefon-Einstellungen werden leer gespeichert

`save_details` in `webfrontend/htmlauth/index.cgi:2042-2043` schreibt `VARIOUS.phonemute` und `VARIOUS.phonestop` aus Formularfeldern, die es in der Oberfläche nicht mehr gibt. Dadurch werden leere Werte gespeichert. Zur Laufzeit wird außerdem ein anderer Key gelesen (`TTS.phonemute`, `src/Support/RequestPreparation.php:66`).

## 6. Falscher Piper-Pfad im Stimmen-Dialog

Der Dialog für weitere Piper-Stimmen zeigt den Pfad `/opt/loxberry/webfrontend/html/VoiceEngines/piper-voices` an (`templates/main.js:909`, `templates/lang/sonos_de.ini:161`). Richtig ist `/opt/loxberry/webfrontend/html/plugins/sonos4lox/VoiceEngines/piper-voices` (siehe [Piper TTS](../01-getting-started/t2s.md#piper-tts-offline)).

## 7. Falsche Warnung "Unknown URL parameter"

Die Liste bekannter URL-Parameter im Action Router (`src/Routing/ActionRouter.php:208-274`) ist unvollständig. Folgende gültige Parameter erzeugen im Log die Warnung "Unknown URL parameter … was ignored", werden aber trotzdem ausgeführt:

`mute`, `reset`, `status`, `greet`, `clip`, `paused`, `speaker`, `sonos`, `calendar`, `groupvolume`, `to`, `traffic`, `model`, `deptime`, `encode`, `region`, `out`

**Auswirkung:** Irreführende Warnungen im Log; die Befehle selbst funktionieren.
