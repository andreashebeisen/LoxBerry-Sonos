---
sidebar_position: 2
description: Grundeinstellungen für Text-to-speech (T2S)
---

# Text-to-speech (T2S)

 ![Text-to-speech Einstellungen](./img/wiki_sr4.png)

## Text-to-speech Engine

Um die speech Funktionen nutzen zu können benötigt man eine Speech Engine, diese kann entweder Online oder Offline sein. Folgende T2S Optionen stehen zur Auswahl:

| Engine | Typ | Hinweis |
| --- | --- | --- |
| **Piper TTS** | Offline | **Standard**; KI-basiert (ONNX), kein Key, siehe [Piper TTS](#piper-tts-offline) |
| **VoiceRSS** | Online | API Key (32 Zeichen) |
| **Amazon Polly** | Online | API Key + Secret Key; **Preismodell beachten** |
| **ResponsiveVoice** | Online | Kein Key erforderlich |
| **Google Cloud** | Online | API Key, multilingual, Stimmenauswahl; **Preismodell beachten** |
| **MS Azure AI** | Online | API Key, Region westeurope, multilingual, Stimmenauswahl; **Preismodell beachten**. Anleitung als PDF in der Plugin-Konfiguration |
| **ElevenLabs** | Online | KI-basiert, multilingual, Stimmenauswahl (ohne Sprachauswahl); **Preismodell beachten** |

Nach erfolgreichem Generieren der entsprechenden Key(s) müssen diese in den entsprechenden Feldern eingetragen werden. Die Keys werden je Engine gespeichert, ein Wechsel der Engine überschreibt sie also nicht. Über den Link "**Link zur Erstellung des API-Key**" gelangt man direkt zum jeweiligen Anbieter.

### Automatischer Fallback

Schlägt die Generierung mit der gewählten Engine fehl (z. B. Internet nicht erreichbar, Key ungültig), verwendet das Plugin automatisch die lokale Piper-Stimme _thorsten_. Ist auch das nicht möglich, wird die Datei `t2s_not_available.mp3` abgespielt.

## Weitere Einstellungen

**Text-2-speech Funktion:** Die T2S Funktion kann temporär ausgeschaltet werden (default = ON). Ausnahme: Eine T2S wird mit dem Parameter **&urgent** ausgeführt, dann wird die T2S bei ausgeschalteter Funktion trotzdem ausgegeben.

**API-/Secret-Key:** Bitte den gültigen API Key von VoiceRSS/Google Cloud/MS Azure/ElevenLabs bzw. API und Secret Key von AWS Polly eingeben.

**Standardsprache/-stimme für T2S:** Bei Google Cloud, MS Azure, ElevenLabs und Piper nach Klick auf "**Lade Stimmenliste**" Sprache und Stimme wählen. Die Stimme, als auch die Sprache, kann innerhalb der Syntax für T2S jederzeit überschrieben werden (siehe [T2S-Durchsagen](../03-integration/actions-t2s.md#allgemeine-t2s-parameter)).

**Verweildauer der MP3 Dateien:** Anzahl der Tage die eine generierte MP3 gespeichert werden soll bevor Sie automatisch gelöscht wird (1 Tag, 1 Woche, 1 Monat, 1 Jahr oder für immer).

**Max. Cachegröße (MB):** Maximale Größe des T2S-Caches (100–3000 MB). Wird sie überschritten, werden die ältesten Dateien gelöscht. Die Bereinigung läuft einmal täglich und betrifft nur generierte Ansagen im Verzeichnis `tts`, nicht die Dateien in `tts/mp3`.

**Wähle Jingle:** Datei die vor einer Durchsage abgespielt werden soll (Parameter `&playgong`). Zur Auswahl stehen alle MP3-Dateien im Unterverzeichnis **tts/mp3**. Eigene Jingles einfach dorthin kopieren. Mitgeliefert werden u. a.:

  * `1_Alarmsirene.mp3`, `2_Airport_gong.mp3`, `3_Ding-noise.mp3`, `4_Old-fashioned-doorbell.mp3`
  * `17_schulglocke_2x.mp3`, `18_schulglocke_3x.mp3`, `100_Tuerklingel_3x.mp3`
  * `alarmanlage.mp3`, `auto_alarm.mp3`, `Hallo_Manni.mp3`, `Hund_bellt_agressiv.mp3`, `Ice_Age.mp3`, `laute_Sirene.mp3`, `postisdomp3.mp3`

Näheres zur Nutzung unter [T2S-Durchsagen](../03-integration/actions-t2s.md).

 ![Datenübertragung](./img/wiki_sr3.png)

**Ausgehende Datenübertragung:** Schalter um die Statusinformationen der Player (Titel/Interpret, Status, Lautstärke usw.) an Loxone zu senden. Näheres unter [Loxone-Anbindung](../03-integration/loxone.md).

**Miniserver:** Miniserver an den die Daten gesendet werden.

**UDP-Port:** Leer lassen, wenn die Daten nur per **MQTT** (LoxBerry MQTT Gateway) übertragen werden sollen. Wird ein Port eingetragen, werden die Daten **zusätzlich** direkt per UDP an diesen Port des Miniservers gesendet (Port in der Firewall freigeben).

Eine **Statusleuchte** zeigt den Zustand des Event Listeners (grün = aktiv, gelb = verzögert, rot = keine Daten). Mit "**Restart Listener**" kann der Dienst neu gestartet werden.

**Download XML-Template für Loxone Import:** siehe [Loxone-Anbindung](../03-integration/loxone.md#eingangsseitig-sonos--miniserver).

## Piper TTS (Offline)

Piper TTS ist eine reine Offline-Engine basierend auf ONNX-KI-Modellen und die Standard-Engine des Plugins. Bei der Installation werden 3 männliche deutsche Stimmen installiert:

| Stimme (Wert für `&voice=`) | Modell | Qualität |
| --- | --- | --- |
| `thorsten` | de_DE-thorsten | low |
| `thorsten_emotional` | de_DE-thorsten_emotional | medium, 8 Emotionen |
| `thorsten_hessisch` | Thorsten Hessisch | high |

Weitere Stimmen können über [HuggingFace](https://huggingface.co/rhasspy/piper-voices/tree/main) heruntergeladen werden (je eine **.onnx** und **.onnx.json** Datei) und ins Verzeichnis `/opt/loxberry/webfrontend/html/plugins/sonos4lox/VoiceEngines/piper-voices` kopiert werden. Anschließend über den Link in der Plugin Konfiguration den Stimmen-Index neu aufbauen und "**Lade Stimmenliste**" ausführen.

Mit dem Parameter **`&encode=fast|balanced|hq`** kann die Qualität der erzeugten Audiodatei gewählt werden.

Bei der **emotionalen Stimme** kann über den Parameter **`&speaker=<WERT>`** eine von 8 Emotionen gewählt werden (Standard: 4):

| Wert | Emotion |
| --- | --- |
| 0 | fröhlich |
| 1 | wütend |
| 2 | angewidert |
| 3 | betrunken |
| 4 | neutral |
| 5 | schläfrig |
| 6 | überrascht |
| 7 | flüsternd |
