---
sidebar_position: 5
description: Erweiterte Befehle zur Steuerung von Sonos
---

# Sonstige Befehle

Alle Befehle müssen als **virtueller Ausgangsbefehl** (Loxone) oder in einem **HTTP-Ausgang** (Nicht-Loxone) angelegt werden. Zum Testen im Browser jeweils `http://<LOXBERRY IP-ADRESSE>` voranstellen.

## Gruppierung, Geräte & Wecker

| Funktion | Befehl / Syntax | Einzel | Gruppe | Beschreibung |
| --- | --- | :-: | :-: | --- |
| createstereopair | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=createstereopair&pair=ZONE2` | **X** | | Erstellt Stereopaar aus zwei gleichen Playern; `zone` = linker, `pair` = rechter Lautsprecher |
| seperatestereopair | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=seperatestereopair&pair=ZONE2` | **X** | | Löst Stereopaar in 2 Einzelzonen auf (Schreibweise "seperate" beachten) |
| addmember | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=addmember&member=ZONE2,ZONE3` | | **X** | Fügt Zone(n) zur Gruppe hinzu; `member=all` für alle Zonen |
| removemember | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=removemember&member=ZONE2` | | **X** | Entfernt Zone(n) aus Gruppe |
| group | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=group` | | **X** | Gruppiert alle Zonen zur angegebenen Zone (ohne Speichern der Zustände) |
| ungroup | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=ungroup` | | **X** | Hebt alle Gruppierungen auf |
| becomegroupcoordinator | `/plugins/sonos4lox/index.php/?zone=DEINE_ZONE&action=becomegroupcoordinator` | | **X** | Nimmt Zone aus bestehender Gruppe heraus |
| off | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=off` | **X** | | Schaltet Sonos4lox temporär komplett aus (keine Befehle, keine T2S) |
| on | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=on` | **X** | | Schaltet Sonos4lox wieder ein |
| sleeptimer | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=sleeptimer&timer=5` | **X** | | Schlummermodus für x Minuten (1–120) |
| listalarms | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=listalarms` | **X** | **X** | Listet alle Sonos-Alarme inkl. ID auf (nur im Browser), siehe [Wecker / Alarme](../05-features/alarms.md) |
| alarmoff | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=alarmoff` | **X** | **X** | Schaltet alle Wecker aus |
| | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=alarmoff&id=27,42` | **X** | **X** | Schaltet nur die Wecker mit den angegebenen IDs aus |
| alarmon | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=alarmon` | **X** | **X** | Schaltet alle zuvor ausgeschalteten Wecker wieder ein |
| | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=alarmon&id=27,42` | **X** | **X** | Schaltet die Wecker mit den angegebenen IDs wieder ein |
| alarmstop | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=alarmstop` | **X** | **X** | Setzt Zone(n) nach Alarm-MP3 auf Ausgangszustand zurück (mit `&member=` für Gruppen) |
| linein | `/plugins/sonos4lox/index.php/?zone=DEINE_ZONE&action=linein` | **X** | | Line-In Eingang auswählen (z. B. PLAY:5, CONNECT, CONNECT:AMP, Five, Port) |
| nightmode | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=nightmode&mode=on` | **X** | | Nachtmodus ein (`mode=on`) / aus (`mode=off`) – nur im TV-Modus |
| speech | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=speech&mode=on` | **X** | | Sprachverbesserung ein/aus (nur TV-Modus) |
| surround | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=surround&mode=on` | **X** | | Surroundmodus ein/aus (nur TV-Modus) |
| subbass | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=subbass&mode=on` | **X** | | SUB-Bass ein/aus (nur TV-Modus) |
| setautoplayvolume | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=setautoplayvolume&volume=20` | **X** | | Soundbar: Lautstärke bei TV-Autoplay (0–100) |
| setuseautoplayvolume | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=setuseautoplayvolume&status=true` | **X** | | Soundbar: Autoplay-Lautstärke verwenden (true/false) |
| setautolinkedzones | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=setautolinkedzones&status=true` | **X** | | Soundbar: gruppierte Zonen bei TV-Autoplay einbeziehen (true/false) |
| getledstate | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=getledstate` | **X** | | Liest Status der Statusleuchte aus |
| setledstate | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=setledstate&state=On` | **X** | | Schaltet Statusleuchte (`state=On` oder `state=Off`) |
| setmaxvolume | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=setmaxvolume&volume=WERT` | **X** | **X** | Begrenzt die max. Lautstärke temporär (0–100), optional mit `&member=ZONE2,ZONE3`; wird ca. alle 10 Sek. überwacht. Zuerst "[Nutzung Lautstärkebegrenzung](../02-configuration/options.md#auto-update-sonos-firmware)" in den Optionen aktivieren |
| setmaxvolume reset | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=setmaxvolume&reset` | **X** | **X** | Setzt Lautstärkebegrenzung zurück (nicht vergessen!) |
| battery | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=battery` | **X** | | Prüft Akku-Player (Move/Roam); bei ≤ 20 % im Akkubetrieb Warnung im Log (läuft auch stündlich automatisch, 8–22 Uhr) |
| update | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=update` | **X** | | Prüft, ob ein Sonos Firmware-Update verfügbar ist (siehe [Auto-Update](../05-features/firmware-update.md)) |

## Allgemeine Parameter

Diese Parameter können an **jeden** Befehl angehängt werden:

| Parameter | Syntax | Beschreibung |
| --- | --- | --- |
| wait | `&wait=5` | Verzögert die Befehlsausführung um x Sekunden (1–900), z. B. `...&action=play&wait=5` |
| timer | `&timer=15` | Aktiviert nach der Befehlsausführung den Schlummermodus (1–120 Min.) |
| playmode | `&playmode=shuffle` | Setzt vor der Ausführung den [Playmode](./actions-default.md) |
| debug | `&debug` | Protokolliert den Aufruf in einem separaten Debug-Log (siehe [Logfiles](../02-configuration/logs.md)) |

## Diagnosebefehle

Diese Befehle geben Informationen im Browser aus.

| Funktion | Befehl / Syntax | Beschreibung |
| --- | --- | --- |
| getmediainfo | `/plugins/sonos4lox/index.php/?zone=DEINE_ZONE&action=getmediainfo` | Info über Metadaten und laufenden Radiosender |
| getpositioninfo | `/plugins/sonos4lox/index.php/?zone=DEINE_ZONE&action=getpositioninfo` | Info über Titel, Interpret, Laufzeit, TrackURI |
| gettransportinfo | `...&action=gettransportinfo` | Wiedergabestatus (1 = Play, 2 = Pause, 3 = Stop) |
| gettransportsettings | `...&action=gettransportsettings` | Aktueller Playmode |
| getcurrenttransportactions | `...&action=getcurrenttransportactions` | Aktuell mögliche Transportaktionen |
| getvolume / getmute | `...&action=getvolume` | Aktuelle Lautstärke bzw. Mute-Status |
| getgroupvolume / getgroupmute | `...&action=getgroupvolume` | Lautstärke bzw. Mute-Status der Gruppe |
| snapshotgroupvolume | `...&action=snapshotgroupvolume` | Erstellt einen Snapshot der Gruppenlautstärke (Grundlage für setgroupvolume) |
| getloudness / gettreble / getbass | `...&action=getbass` | Aktuelle Klangeinstellungen |
| getzoneinfo | `...&action=getzoneinfo` | Technische Details der Zone (IP, Seriennummer, Software-/Hardwareversion, MAC, RinconID) |
| getzoneattributes | `...&action=getzoneattributes` | Name und Symbol der Zone |
| getaudioinputattributes | `...&action=getaudioinputattributes` | Attribute des Line-In/TV-Eingangs |
| getzonestatus | `...&action=getzonestatus` | Rolle der Zone (single/master/member) |
| getzonegroupstate / getzonegroupattributes | `...&action=getzonegroupstate` | Gruppenstruktur aller Zonen |
| getroomcoordinator / getgroups / getgroup | `...&action=getgroups` | Gruppen und Koordinatoren |
| masterplayer | `...&action=masterplayer` | Zeigt je Player den Master seiner Gruppe |
| getfavorites / browse | `...&action=getfavorites` | Liste der Sonos-Favoriten (browse inkl. Metadaten) |
| getsonosplaylists / getimportedplaylists | `...&action=getsonosplaylists` | Liste der Sonos- bzw. importierten Playlisten (inkl. Index für `randomplaylist&except`) |
| getcurrentplaylist | `...&action=getcurrentplaylist` | Inhalt der aktuellen Queue |
| getautoplayvolume / getuseautoplayvolume / getautolinkedzones | `...&action=getautoplayvolume` | Autoplay-Einstellungen der Soundbar |
| services | `...&action=services` | Liste der in Sonos eingebundenen Musikdienste |
| volumeout | `...&action=volumeout` | Aktuelle Lautstärken aller Player und Gruppen |

Mit `...` ist jeweils `/plugins/sonos4lox/index.php/?zone=DEINE_ZONE` gemeint.

## Entfernte Befehle

Folgende Befehle bzw. Parameter aus früheren Versionen existieren nicht mehr. Nicht existierende Befehle werden **nicht ausgeführt** und im [Log](../02-configuration/logs.md) mit "Unsupported URL action" protokolliert. Bitte bestehende virtuelle Ausgangsbefehle in Loxone entsprechend anpassen.

| Befehl / Parameter | Hinweis |
| --- | --- |
| `action=balance` | entfernt |
| `action=profile` | entfernt; `&profile=` als Parameter bei Wiedergabe- und T2S-Befehlen verwenden (siehe [Sound-Profile](../02-configuration/sound-profiles.md)) |
| `action=checkradiourl` | entfernt |
| `action=streammode` | entfernt; zur Diagnose `getpositioninfo` bzw. `getaudioinputattributes` verwenden |
| `action=saysonos` | entfernt; stattdessen `action=say&sonos` |
| `action=trackfavorites`, `radiofavorites`, `playlistfavorites` | ersetzt durch `playtrackfavorites`, `playradiofavorites`, `playplfavorites` |
| `&user=` (Spotify) | entfernt; es wird nur noch die ID angegeben |
| `action=sendmessage`, `sendgroupmessage` | veraltet, funktionieren noch; durch `action=say` ersetzen |
