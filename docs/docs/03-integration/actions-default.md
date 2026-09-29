---
sidebar_position: 2
description: Standardbefehle zur Steuerung von Sonos
---

# Standard-Befehle

Alle Befehle müssen als **virtueller Ausgangsbefehl** (Loxone) oder in einem **HTTP-Ausgang** (Nicht-Loxone) angelegt werden. Zum Testen im Browser jeweils `http://<LOXBERRY IP-ADRESSE>` voranstellen. Siehe auch [Loxone-Anbindung](./loxone.md).

:::tip

Syntax immer erst im Browser testen, bevor sie als Ausgangsbefehl in Loxone angelegt wird. Nicht existierende Befehle werden abgelehnt und im [Log](../02-configuration/logs.md) mit "Unsupported URL action" protokolliert.

:::

| Funktion | Befehl / Syntax / URL | Einzel | Gruppe | Erläuterung |
| --- | --- | :-: | :-: | --- |
| stop | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=stop` | **X** | | Stoppt eine Zone (Radio); falls nicht möglich wird pausiert |
| pause | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=pause` | **X** | | Pausiert eine Zone (Playliste/Queue); falls nicht möglich wird gestoppt |
| play | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=play` | **X** | | Startet Wiedergabe (Radio/Playliste/Queue) |
| playqueue | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=playqueue` | **X** | | Startet die Queue der Zone (mit [Rampto](../02-configuration/options.md#rampto-parameter)) |
| next | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=next` | **X** | | Einen Song vor |
| previous | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=previous` | **X** | | Einen Song zurück |
| rewind | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=rewind` | **X** | | Zurück zum Anfang des Songs |
| mute | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=mute&mute=true` | **X** | | Zone auf Mute stellen |
| | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=mute&mute=false` | **X** | | Zone auf Unmute stellen |
| togglemute | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=togglemute` | **X** | | Mute EIN/AUS |
| setgroupmute | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=setgroupmute&mute=1` | | **X** | Gruppe stumm (1) bzw. laut (0) schalten |
| stopall | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=stopall` | **X** | **X** | Pausiert/stoppt alle spielenden Zonen (Player im TV-Modus werden übersprungen) |
| softstop | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=softstop` | **X** | | Reduziert Lautstärke langsam auf Null, pausiert und stellt die ursprüngliche Lautstärke wieder her |
| softstopall | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=softstopall` | | **X** | Wie softstop für alle spielenden Zonen (TV-Modus wird übersprungen) |
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
| volume | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=volume&volume=30` | **X** | | Setzt die Lautstärke (0–100, begrenzt auf Max Vol) |
| volumeup | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=volumeup` | **X** | | Erhöht Lautstärke um den [konfigurierten Wert](../02-configuration/options.md#lautstärke-änderung-per-klick) |
| volumedown | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=volumedown` | **X** | | Verringert Lautstärke um den konfigurierten Wert |
| grvolup | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=grvolup` | | **X** | Erhöht die Gruppenlautstärke um den konfigurierten Wert |
| grvoldown | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=grvoldown` | | **X** | Verringert die Gruppenlautstärke um den konfigurierten Wert |
| setrelativegroupvolume | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=setrelativegroupvolume&volume=10` | | **X** | Werte −100 bis 100; erhöht Volume je Player der Gruppe um 10% |
| setgroupvolume | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=setgroupvolume&volume=25` | | **X** | Werte 0–100; setzt Gruppen-Volume auf 25, passt einzelne Player proportional an |
| setloudness | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=setloudness&loudness=1` | **X** | | Loudness ein |
| | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=setloudness&loudness=0` | **X** | | Loudness aus |
| settreble | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=settreble&treble=3` | **X** | | Setzt Wert für Höhen (-10 bis 10) |
| setbass | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=setbass&bass=4` | **X** | | Setzt Wert für Bass (-10 bis 10) |
| resetbasic | `/plugins/sonos4lox/index.php/?zone=<DEINE ZONE>&action=resetbasic` | **X** | | Balance/Höhen/Bass/Loudness auf Standard zurücksetzen (Sonos ResetBasicEQ) |

:::note

Der Wert von `playmode` ist nicht case-sensitiv. Der Parameter `&playmode=` kann auch an andere Befehle (z. B. [sonosplaylist](./actions-playback.md#playlisten--queue-befehle)) angehängt werden. Weitere, bei allen Befehlen nutzbare Parameter (`&wait`, `&timer`, `&debug`) siehe [Sonstige Befehle](./actions-extended.md#allgemeine-parameter).

:::
