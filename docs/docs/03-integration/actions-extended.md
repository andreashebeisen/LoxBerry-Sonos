---
sidebar_position: 5
description: Erweiterte Befehle zur Steuerung von Sonos
---

# Sonstige Befehle

Alle Befehle müssen als **virtueller Ausgangsbefehl** (Loxone) oder in einem **HTTP-Ausgang** (Nicht-Loxone) angelegt werden. Zum Testen im Browser jeweils `http://<LOXBERRY IP-ADRESSE>` voranstellen.

## Sonstige Befehle

| Funktion | Befehl / Syntax | Einzel | Gruppe | Beschreibung |
| --- | --- | :-: | :-: | --- |
| createstereopair | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=createstereopair&pair=ZONE2` | **X** | | Erstellt Stereopaar (PLAY:1, PLAY:3, PLAY:5) |
| seperatestereopair | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=seperatestereopair&pair=ZONE2` | **X** | | Löst Stereopaar in 2 Einzelzonen auf |
| addmember | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=addmember&member=ZONE2,ZONE3` | | **X** | Fügt Zone(n) zur Gruppe hinzu |
| removemember | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=removemember&member=ZONE2` | | **X** | Entfernt Zone aus Gruppe |
| group | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=group` | | **X** | Gruppiert alle Zonen (ohne Speichern der Zustände) |
| ungroup | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=ungroup` | | **X** | Hebt alle Gruppierungen auf |
| becomegroupcoordinator | `/plugins/sonos4lox/index.php/?zone=DEINE_ZONE&action=becomegroupcoordinator` | | **X** | Nimmt Zone aus bestehender Gruppe heraus |
| off | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=off` | **X** | | Schaltet Sonos4lox temporär komplett aus (kein UDP/HTTP Traffic, keine T2S, kein Online-Check) |
| on | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=on` | **X** | | Schaltet Sonos4lox wieder ein |
| sleeptimer | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=sleeptimer&timer=5` | **X** | | Schlummermodus für x Minuten (1–120); unter 10 Min. einstellig angeben |
| wait | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=play&wait=5` | **X** | | Verzögert Befehlsausführung um x Sekunden (1–900) |
| timer | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=play&timer=15` | **X** | | Schlummermodus nach Befehlsausführung (1–120 Min.) |
| listalarms | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=listalarms` | **X** | **X** | Listet alle Sonos-Alarme auf (nur im Browser), siehe [Wecker / Alarme](../05-features/alarms.md) |
| alarmoff | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=alarmoff` | **X** | **X** | Schaltet alle Wecker aus |
| alarmon | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=alarmon` | **X** | **X** | Schaltet alle Wecker wieder ein |
| alarmstop | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=alarmstop` | **X** | **X** | Setzt alle Zonen nach Alarm-MP3 auf Ausgangszustand zurück |
| linein | `/plugins/sonos4lox/index.php/?zone=DEINE_ZONE&action=linein` | **X** | | Line-In Eingang von PLAY:5, CONNECT, CONNECT:AMP auswählen |
| nightmode | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=nightmode&mode=on` | **X** | | Nachtmodus ein/aus – Parameter: on oder off (nur TV-Modus) |
| speech | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=speech&mode=on` | **X** | | Sprachverbesserung ein/aus (nur TV-Modus) |
| surround | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=surround&mode=on` | **X** | | Surroundmodus ein/aus (nur TV-Modus) |
| subbass | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=subbass&mode=on` | **X** | | SUB-Bass ein/aus (nur TV-Modus) |
| getledstate | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=getledstate` | **X** | | Liest Status der Statusleuchte aus (1=On, 0=Off) |
| setledstate | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=setledstate&state=On` | **X** | | Schaltet Statusleuchte (state=On oder state=Off) |
| setmaxvolume | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=setmaxvolume&volume=WERT` | **X** | **X** | Begrenzt max. Lautstärke; Cronjob prüft alle 10 Sek. Zuerst "[Nutzung Lautstärkebegrenzung](../02-configuration/options.md#auto-update-sonos-firmware)" in den Optionen aktivieren |
| setmaxvolume reset | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=setmaxvolume&reset` | **X** | **X** | Setzt Lautstärkebegrenzung zurück (nicht vergessen!) |

## Diagnosebefehle

| Funktion | Befehl / Syntax | Einzel | Beschreibung |
| --- | --- | :-: | --- |
| getmediainfo | `/plugins/sonos4lox/index.php/?zone=DEINE_ZONE&action=getmediainfo` | **X** | Info über Metadaten und laufenden Radiosender |
| getpositioninfo | `/plugins/sonos4lox/index.php/?zone=DEINE_ZONE&action=getpositioninfo` | **X** | Info über Titel, Interpret, Laufzeit |
| getvolume | `/plugins/sonos4lox/index.php/?zone=DEINE_ZONE&action=getvolume` | **X** | Info über aktuelle Lautstärke |
| getzoneinfo | `/plugins/sonos4lox/index.php/?zone=DEINE_ZONE&action=getzoneinfo` | **X** | Technische Details der Zone |
| checkradiourl | `/plugins/sonos4lox/index.php/?zone=DEINE_ZONE&action=checkradiourl` | **X** | Überprüft alle Radio-Favoriten-URLs auf Erreichbarkeit |
