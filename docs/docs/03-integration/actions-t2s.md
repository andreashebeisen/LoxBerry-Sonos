---
sidebar_position: 4
description: Befehle für Text-to-speech
---

# T2S-Durchsagen

Die Grundeinstellungen für Text-to-speech (Engine, Stimme, Jingle) sind unter [Text-to-speech (T2S)](../01-getting-started/t2s.md) beschrieben.

:::warning

Virtuelle Ausgangsbefehle in Loxone müssen mit gesetztem Haken bei "**Verbindung nach dem Senden schließen**" angelegt werden, sonst wird die Funktion u. U. 2× ausgeführt.

 ![Verbindung nach dem Senden schließen](./img/loxone_1228539679.png)

:::

:::info

Die früheren Befehle `sendmessage` und `sendgroupmessage` sind veraltet. Sie funktionieren noch (werden intern auf `say` umgeleitet, ohne Unterstützung von `&profile`), sollten aber durch **`action=say`** ersetzt werden.

:::

## An-/Abwesenheitssteuerung

Mit den Funktionen **absent** und **present** ist es möglich T2S-Durchsagen nur in Abhängigkeit von Anwesenheit auszugeben.

| Funktion | Befehl / Syntax | Beschreibung |
| --- | --- | --- |
| present | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=present` | T2S EIN (im MS bei HTTP Ein) |
| absent | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=absent` | T2S AUS (im MS bei HTTP Aus) |

Bei Abwesenheit werden **alle** `say`-Durchsagen unterdrückt, auch mit `&urgent`. Die Türklingel (`doorbell`) wird weiterhin ausgegeben.

## Allgemeine T2S-Parameter

Diese Parameter können bei **jeder** T2S optional kombiniert werden:

| Parameter | Syntax | Beschreibung |
| --- | --- | --- |
| volume | `&volume=40` | Setzt Lautstärke auf 40% (begrenzt auf Max Vol); nicht mit `&profile` kombinierbar |
| keepvolume | `&keepvolume` | Behält gegenwärtige Lautstärke bei (ist sie sehr niedrig, wird die T2S Vol verwendet) |
| groupvolume | `&groupvolume=10` | Bei Gruppendurchsagen: erhöht die aktuelle Lautstärke jedes Members um 10 % (bei AudioClip: absolute Lautstärke) |
| greet | `&greet` | Zufällige, tageszeitabhängige Grußformel vor der T2S (4–10 Uhr Morgen, 10–17 Uhr Tag, 17–22 Uhr Abend, 22–24 Uhr Nacht); anpassbar über LoxBerry Translation Widget (Plugin: Sonos, Datei: `t2s-text_de.ini`, Abschnitt GREETINGS) |
| playgong | `&playgong` bzw. `&playgong=yes` | Spielt den Standard-Jingle aus der Plugin-Config vor der T2S ab (auch `true`, `1`, `on`) |
| | `&playgong=2_Airport_gong` | Spielt angegebenes Jingle (ohne .mp3) aus `tts/mp3` ab |
| batch | `&batch` | Erzeugt T2S-MP3 für späteren Abruf, ohne sie abzuspielen (nicht kombinierbar mit volume, rampto, playmode, playgong, member, profile) |
| playbatch | `&playbatch` bzw. `action=playbatch` | Spielt alle mit `&batch` erstellten T2S in Reihenfolge ab |
| nocache | `&nocache` | Erzwingt Neu-Generierung der T2S trotz vorhandenem Cache (notwendig nach Wechsel von Engine/Stimme, da der Cache nur den Text berücksichtigt) |
| clip | `&clip` | Erzwingt Sonos AudioClip: T2S wird in den laufenden Stream eingemischt. Ohne `&clip` wird AudioClip automatisch genutzt, wenn alle Ziel-Player es unterstützen |
| paused | `&paused` | Durchsage nur auf Playern, die gerade **nicht** spielen (nur zusammen mit `&member` oder `&profile`) |
| high | `&high` | AudioClip mit hoher Priorität |
| urgent | `&urgent` | T2S wird auch bei ausgeschalteter T2S-Funktion ausgegeben (nicht bei `absent`) |
| voice | `&voice=<STIMME>` | Überschreibt die Standardstimme (alle Engines; bei ElevenLabs die voice_id) |
| language | `&language=<de-DE>` | Überschreibt die Standardsprache |
| t2sengine | `&t2sengine=<CODE>` | Überschreibt die Engine: 1001 VoiceRSS, 4001 Polly, 6001 ResponsiveVoice, 8001 Google Cloud, 9001 MS Azure, 9011 ElevenLabs, 9012 Piper |
| speaker | `&speaker=0` | Emotion der Piper-Stimme _thorsten_emotional_ (0–7, Standard 4), siehe [Piper TTS](../01-getting-started/t2s.md#piper-tts-offline) |
| encode | `&encode=hq` | Nur Piper: Qualität `fast`, `balanced` oder `hq` |

Identische Durchsagen innerhalb der unter [Optionen](../02-configuration/options.md#wartezeit-bis-t2s-erneut-ausgegeben-wird) eingestellten Wartezeit werden nur einmal ausgegeben. Ein Text `null` oder `0` (leerer Wert aus Loxone) wird ignoriert.

## Einzel- und Gruppendurchsagen

Bei T2S **ohne** Loxone-Werte → Ausgangsbefehl als **Digital** markieren

 ![Als Digitalausgang verwenden](./img/loxone_1228539677.png)

| Befehl / Syntax | Einzel | Gruppe | Beschreibung |
| --- | :-: | :-: | --- |
| `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=say&text=hallo. dies ist ein test` | **X** | | Einzeldurchsage |
| `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=say&text=hallo&playgong=yes` | **X** | | Einzeldurchsage mit Standard-Jingle |
| `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=say&text=hallo&voice=Hans&playgong=yes` | **X** | | Mit Jingle und abweichender Stimme (hier Polly "Hans") |
| `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=say&text=test&volume=20&greet&playgong=yes` | **X** | | Mit Jingle und Zufallsgrußformel |
| `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=say&messageid=3&volume=30` | **X** | | Spielt Datei `3.mp3` aus `tts/mp3` ab |
| `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=say&messageid=Gartentor_offen` | **X** | | Spielt `Gartentor_offen.mp3` aus `tts/mp3` ab |
| `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=say&text=hallo&member=ZONE2,ZONE3` | | **X** | Gruppendurchsage auf 3 Zonen (Standard-Lautstärke) |
| `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=say&text=hallo&member=ZONE2,ZONE3&volume=40` | | **X** | Gruppendurchsage mit Volume 40% |
| `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=say&messageid=haustuer_offen&member=ZONE2` | | **X** | MP3-Datei auf 2 Playern |
| `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=say&messageid=haustuer_offen&profile=gruppe1` | | **X** | MP3-Datei auf allen Playern des [Sound-Profils](../02-configuration/sound-profiles.md) gruppe1 |
| `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=say&text=hallo&member=all` | | **X** | Gruppendurchsage auf **allen** Zonen |
| `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=say&text=hallo&member=all&paused` | | **X** | Gruppendurchsage nur auf Zonen, die gerade nicht spielen |

:::note

Eine Zone darf in der Syntax nur einmal vorkommen, also nicht gleichzeitig in `zone=` und `member=`.

Für `messageid` sind nur Buchstaben, Ziffern, `_` und `-` erlaubt (keine Leerzeichen, Punkte oder Pfade). Die Endung `.mp3` kann weggelassen werden.

:::

## T2S mit Loxone-Werten (`<v>`)

Bei T2S **mit** Loxone-Werten → Ausgangsbefehl als **Analog** markieren. Der Platzhalter `<v>` wird vom Miniserver durch den Wert ersetzt, bevor der Befehl an das Plugin gesendet wird.

 ![Als Analogausgang verwenden](./img/loxone_1228539678.png)

| Befehl / Syntax | Einzel | Gruppe | Beschreibung |
| --- | :-: | :-: | --- |
| `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=say&text=Die Temperatur betraegt <v> Grad` | **X** | | Gibt Wert **`<v>`** des MS-Bausteins aus |
| `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=say&text=Temperatur: <v> Grad&member=2.ZONE,3.ZONE&volume=40` | | **X** | Wert auf 3 Playern mit Volume 40% |
| `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=say&text=<v>&volume=40` | **X** | **X** | T2S aus Statusbaustein; gesamter Text inkl. Variablen im Statusbaustein. **Kein Zeilenumbruch am Textende!** |

Beispiel Statusbaustein (Pooltemperatur mit 1 Dezimalstelle an AI1): Statustext = `Die aktuelle Pooltemperatur ist <v1.1> Grad`

## T2S aus Statusbaustein (PicoC)

Um doppelte T2S-Ausgabe beim Ein-/Ausschalten eines Triggers zu vermeiden, empfiehlt sich ein PicoC-Programmbaustein als Zwischenschicht. Aufbau: Ausgang TQ des Statusbausteins → TIx des PicoC-Bausteins; Trigger → AIx; T2S-HTTP-Ausgang → TQx.

```c title="PicoC"
float f1, f2, f3;
int nEvents;
char* Text;
while(TRUE)
 {
 nEvents = getinputevent();
 if (nEvents & 0x38) // 4er Pico = 0xe, 8er Pico = 0x1c, 16er Pico = 0x38
 {
 f1 = getinput(0);
 if (f1 == 1) { Text = getinputtext(0); setoutputtext(0,Text); }
 f2 = getinput(1);
 if (f2 == 1) { Text = getinputtext(1); setoutputtext(1,Text); }
 f3 = getinput(2);
 if (f3 == 1) { Text = getinputtext(2); setoutputtext(2,Text); }
 }
 sleep(100);
 }
```

Ab Version 9 der Loxone Config steht nur noch der 16er Baustein zur Verfügung → `0x38` verwenden.

## Sonderfunktionen T2S

Pro Aufruf kann nur **eine** der folgenden Ansagefunktionen (clock, weather, pollen, warning, distance, abfall, calendar, sonos) genutzt werden.

| Funktion | Befehl / Syntax | Einzel | Gruppe | Beschreibung |
| --- | --- | :-: | :-: | --- |
| Türklingel | `/plugins/sonos4lox/index.php/?zone=DEINE_ZONE&action=doorbell&file=chime` | **X** | **X** | Sonos-Built-in-Klingelton (`chime`) oder MP3 aus `tts/mp3` (ohne .mp3). Immer per AudioClip mit hoher Priorität (alle Zonen müssen [Clip](../01-getting-started/add-zones.md#raum-einstellungen) unterstützen). Optional: **`&paused`**, **`&volume=30`**, **`&member=<ZONE1,ZONE2 oder all>`**, **`&profile=`**. `&playgong` ist nicht erlaubt |
| Uhrzeit | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=say&clock` | **X** | **X** | Aktuelle LoxBerry-Uhrzeit wird angesagt |
| Wetter | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=say&weather` | **X** | **X** | Wettervorhersage/-status (benötigt Weather4Lox Plugin) |
| Abfall | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=say&abfall` | **X** | **X** | Nächster Abfalltermin (benötigt CalDAV-4-Lox Plugin und [Abfallkalender-URL](../02-configuration/settings.md#kalender)) |
| Kalender | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=say&calendar` | **X** | **X** | Termine aus dem Kalender (benötigt CalDAV-4-Lox Plugin und [Kalender-URL](../02-configuration/settings.md#kalender)) |
| Pollen | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=say&pollen` | **X** | **X** | Pollenflughinweis (Stadt/Gemeinde unter [Wetterwarnungen](../02-configuration/settings.md#wetterwarnungen) muss gepflegt sein) |
| Wetterwarnung | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=say&warning` | **X** | **X** | Aktuelle DWD-Wetterwarnung (Bundesland und Gemeinde unter [Wetterwarnungen](../02-configuration/settings.md#wetterwarnungen) müssen gepflegt sein) |
| Titel/Interpret | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=say&sonos` | **X** | | Aktuell laufenden Titel/Interpret oder Radiosender ansagen (Player muss spielen; nicht für Gruppen). Siehe Option [Ansage der Radio Station](../02-configuration/options.md#ansage-der-radio-station) |
| Fahrzeit | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=say&distance&to=Hamburg&traffic` | **X** | **X** | Fahrzeit via Google (API Key und Startadresse unter [Verkehrsmeldungen](../02-configuration/settings.md#verkehrsmeldungen) erforderlich); **`&to=`** Pflicht; optional **`&traffic`** (mit aktueller Verkehrslage), **`&model=pessimistic/best_guess/optimistic`**, **`&deptime=16:30`** (Abfahrtszeit in der Zukunft) |
| mp3rights | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=mp3rights` | | **X** | Setzt Rechte für die Verzeichnisse `tts` und `tts/mp3` auf 0755 (repariert Abspielprobleme bei messageid) |

:::tip

Für wiederkehrende Ansagen können vorgefertigte MP3-Dateien genutzt werden, siehe [Tipps & Tricks](../04-misc/tips.md).

:::
