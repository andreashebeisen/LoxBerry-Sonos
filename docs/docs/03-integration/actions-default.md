---
sidebar_position: 2
description: Standardbefehle zur Steuerung von Sonos
---

# Standard-Befehle

Alle Befehle müssen als **virtueller Ausgangsbefehl** (Loxone) oder in einem **HTTP-Ausgang** (Nicht-Loxone) angelegt werden. Zum Testen im Browser jeweils `http://<LOXBERRY IP-ADRESSE>` voranstellen. Siehe auch [Loxone-Anbindung](./loxone.md).

:::tip

Syntax immer erst im Browser testen, bevor sie als Ausgangsbefehl in Loxone angelegt wird.

:::

| Funktion | Befehl / Syntax / URL | Einzel | Gruppe | Erläuterung |
| --- | --- | :-: | :-: | --- |
| stop | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=stop` | **X** | | Stoppt eine Zone (Radio) |
| pause | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=pause` | **X** | | Stoppt eine Zone (Playliste/Queue) |
| play | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=play` | **X** | | Startet Wiedergabe (Radio/Playliste/Queue) |
| next | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=next` | **X** | | Einen Song vor |
| previous | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=previous` | **X** | | Einen Song zurück |
| rewind | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=rewind` | **X** | | Zurück zum Anfang des Songs |
| mute | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=mute&mute=true` | **X** | | Zone auf Mute stellen |
| | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=mute&mute=false` | **X** | | Zone auf Unmute stellen |
| togglemute | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=togglemute` | **X** | | Mute EIN/AUS |
| stopall | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=stopall` | **X** | **X** | Stoppt alle Zonen |
| softstop | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=softstop` | **X** | | Reduziert Lautstärke langsam auf Null |
| softstopall | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=softstopall` | | **X** | Reduziert alle Player langsam auf Null |
| toggle | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=toggle` | **X** | | Wechselt zwischen Pause/Play |
| playmode | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=playmode&playmode=normal` | **X** | | Playmode NORMAL |
| | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=playmode&playmode=repeat_all` | **X** | | Playmode REPEAT_ALL |
| | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=playmode&playmode=shuffle_norepeat` | **X** | | Playmode SHUFFLE_NOREPEAT |
| | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=playmode&playmode=shuffle` | **X** | | Playmode SHUFFLE |
| | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=playmode&playmode=shuffle_repeat_one` | **X** | | Playmode SHUFFLE_REPEAT_ONE |
| | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=playmode&playmode=repeat_one` | **X** | | Playmode REPEAT_ONE |
| crossfade | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=crossfade&crossfade=1` | **X** | | Überblenden ein |
| | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=crossfade&crossfade=0` | **X** | | Überblenden aus |
| clearqueue | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=clearqueue` | **X** | | Löscht die Queue |
| volume | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=volume&volume=30` | **X** | | Setzt die Lautstärke |
| volumeup | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=volumeup` | **X** | | Erhöht Lautstärke um den [konfigurierten Wert](../02-configuration/options.md#lautstärke-änderung-per-klick) |
| volumedown | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=volumedown` | **X** | | Verringert Lautstärke um den konfigurierten Wert |
| setrelativegroupvolume | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=setrelativegroupvolume&volume=10` | | **X** | Werte −100 bis 100; erhöht Volume je Player der Gruppe um 10% |
| setgroupvolume | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=setgroupvolume&volume=25` | | **X** | Werte 0–100; setzt Gruppen-Volume auf 25, passt einzelne Player proportional an |
| setloudness | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=setloudness&loudness=1` | **X** | | Loudness ein |
| | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=setloudness&loudness=0` | **X** | | Loudness aus |
| settreble | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=settreble&treble=3` | **X** | | Setzt Wert für Höhen |
| setbass | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=setbass&bass=4` | **X** | | Setzt Wert für Bass |
| balance | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=balance&balance=LF&value=20` | **X** | | Balance des linken Lautsprechers (LF) des Stereopaares um 80% reduziert |
| resetbasic | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=resetbasic` | **X** | | Balance/Höhen/Bass auf Standard zurücksetzen |
