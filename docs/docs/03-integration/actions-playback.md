---
sidebar_position: 3
description: Befehle für die Medienwiedergabe
---

# Playlisten / Radio / Dienste / lokale Dateien

Alle Befehle müssen als **virtueller Ausgangsbefehl** (Loxone) oder in einem **HTTP-Ausgang** (Nicht-Loxone) angelegt werden. Zum Testen im Browser jeweils `http://<LOXBERRY IP-ADRESSE>` voranstellen.

## Playlisten & Queue-Befehle

| Funktion | Befehl / Syntax / URL | Einzel | Gruppe | Beschreibung |
| --- | --- | :-: | :-: | --- |
| sonosplaylist | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=sonosplaylist&playlist=NAME_DER_PLAYLISTE&volume=15` | **X** | | Lädt Playliste und startet Wiedergabe mit Volume 15% |
| load | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=sonosplaylist&playlist=NAME_DER_PLAYLISTE&load` | **X** | **X** | Lädt Playliste **ohne** Wiedergabe zu starten |
| rampto | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=sonosplaylist&playlist=NAME_DER_PLAYLISTE&rampto=sleep&volume=20` | **X** | | Lädt Playliste mit langsamem Lautstärkeanstieg (siehe [Rampto](../02-configuration/options.md#rampto-parameter)) |
| zero | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=sonosplaylist&playlist=NAME&rampto=sleep&volume=20&zero` | **X** | | Wie rampto, startet aber von Lautstärke Null |
| Gruppe | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=sonosplaylist&playlist=NAME&volume=25&member=ZONE2,ZONE3` | | **X** | Startet Playliste auf 3 Playern parallel |
| nextpush | `/plugins/sonos4lox/index.php/?zone=DEINE_ZONE&action=nextpush` | **X** | | PL läuft → next track; Ende PL → 1st track; Radio → nextradio Loop; leer → nextradio Loop |
| zapzone | `/plugins/sonos4lox/index.php/?zone=DEINE_ZONE&action=zapzone` | **X** | | Zone wird spielendem Player hinzugefügt; erneuter Klick → nächster Player oder nextradio Loop (Reset nach 60 Sek.) |
| playfavorite | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=playfavorite&favorite=NAME_DES_FAVORITEN&volume=25` | **X** | **X** | Lädt Favoriten und spielt ihn ab; Fuzzy-Logic-Suche möglich |

## Radio-Befehle

Die Radiosender für **pluginradio** und **nextradio** werden in den [Radio-Favoriten](../02-configuration/settings.md#radio-favoriten-für-tasterbedienung) des Plugins gepflegt.

| Funktion | Befehl / Syntax / URL | Einzel | Gruppe | Beschreibung |
| --- | --- | :-: | :-: | --- |
| pluginradio | `/plugins/sonos4lox/index.php/?zone=DEINE_ZONE&action=pluginradio&radio=<SENDER AUS PLUGIN CONFIG>` | **X** | | Lädt Sender aus Plugin-Radio-Favoriten |
| | `/plugins/sonos4lox/index.php/?zone=DEINE_ZONE&member=<ZONE2,ZONE3>&action=pluginradio&radio=<SENDER>` | | **X** | Wie oben, für Gruppe; `member=all` für alle Zonen |
| rampto | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=pluginradio&radio=<SENDER>&rampto=sleep&volume=20` | **X** | | Mit langsamem Lautstärkeanstieg |
| nextradio | `/plugins/sonos4lox/index.php/?zone=DEINE_ZONE&action=nextradio` | **X** | | Durchläuft Radio-Favoriten sequentiell (ONE-click Loop) |
| nextpush | `/plugins/sonos4lox/index.php/?zone=DEINE_ZONE&action=nextpush` | **X** | | PL/Album → next track; Radio → nextradio Loop; leer → nextradio Loop |
| zapzone | `/plugins/sonos4lox/index.php/?zone=DEINE_ZONE&action=zapzone` | **X** | | Wie bei [Playlisten](#playlisten--queue-befehle) |

## ONE-Click Funktionen – Sonos Favoriten & Streaming

_Ab v4.1.4._ Das Looping wird durch andere Befehle zurückgesetzt (außer: start, stop, play, pause, toggle, next, previous, volume, say, sendmessage, sendgroupmessage). Einmal täglich werden alle ONE-click Funktionen per Cronjob zurückgesetzt.

Unterstützte Streaming-Dienste: Apple Music, Amazon Music, Napster, Deezer, Sonos Radio, TuneIn Radio, Soundcloud, Mixcloud, YouTube Music, TIDAL sowie Sonos-Playlisten und lokale Musikbibliothek.

| Funktion | Befehl / Syntax / URL | Einzel | Gruppe | Beschreibung |
| --- | --- | :-: | :-: | --- |
| playallfavorites | `/plugins/sonos4lox/index.php/?zone=DEINE_ZONE&action=playallfavorites` | **X** | **X** | Tracks aus Sonos-Favoriten, dann Radiostationen (Loop); Playlisten/Alben nicht unterstützt |
| playtrackfavorites | `/plugins/sonos4lox/index.php/?zone=DEINE_ZONE&action=playtrackfavorites` | **X** | **X** | Alle Track-Favoriten; ONE-click → Next Track, am Ende Restart |
| playradiofavorites | `/plugins/sonos4lox/index.php/?zone=DEINE_ZONE&action=playradiofavorites` | **X** | **X** | Alle Radiosender aus Sonos-Favoriten; ONE-click → nächster Sender, am Ende Restart |
| playsonosplaylist | `/plugins/sonos4lox/index.php/?zone=DEINE_ZONE&action=playsonosplaylist` | **X** | **X** | Alle Sonos-Playlisten; ONE-click → nächste PL, am Ende Restart |
| playplfavorites | `/plugins/sonos4lox/index.php/?zone=DEINE_ZONE&action=playplfavorites` | **X** | **X** | Alle Playlisten aus Sonos-Favoriten; ONE-click → nächste PL, am Ende Restart |

## Streaming-Dienste (Amazon, Spotify, Apple, Napster)

Album/Playlisten-ID aus der jeweiligen App oder per Rechtsklick → "Link kopieren" ermitteln (die ID ist jeweils **fett** markiert):

| Dienstanbieter | Beispiel-URL / Format |
| --- | --- |
| Amazon Album | music.amazon.de/albums/**B00IK3IV6Y** |
| Amazon Playlist | music.amazon.de/playlists/**B071W6HN35**?ref=… |
| Amazon Track | music.amazon.de/track/**D00IK3IV6Y** |
| Spotify Playlist | spotify:user:spotify:playlist:**37i9dQZF1DX3h1vasAdBTc** |
| Spotify Album | spotify:album:**0PNXB6AmSfM9oS0YwNkCYH** |
| Napster Album | app.napster.com/artist/art.4212/album/**alb.285904254** |
| Apple Music Album | itunes.apple.com/de/album/eiskalt/**1288630360** |
| Apple Music Playlist | itunes.apple.com/de/playlist/…/**pl.6bf4415b83ce4f3789614ac4c3675740** |

Syntax (Anbietername austauschen; **albumuri** für Alben, **playlisturi** für Playlisten):

```
/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=amazon&albumuri=ID&volume=5
/plugins/sonos4lox/index.php/?zone=DEINE_ZONE&action=amazon&playlisturi=ID&volume=5
```

Spotify-Beispiel mit User-spezifischer Playliste (User: stevie-gfc, PL: Club Velcro):

```
/plugins/sonos4lox/index.php/?zone=DEINE_ZONE&action=spotify&playlisturi=46V4B0kaRt7MHYCwt6BpmP&volume=5&user=stevie-gfc
```

## Lokale Tracks (NAS, USB, LoxBerry)

Tracks sollten in der Sonos-Bibliothek vorhanden sein. Immer **vollen Pfad inkl. Dateiendung** angeben. Unix- und Windows-Pfade werden akzeptiert. Unterstützte Formate: [Sonos Audio-Formate](https://sonos-de.custhelp.com/app/answers/detail/a_id/3661/~/unterst%C3%BCtzte-audioformate)

```
/plugins/sonos4lox/index.php/?zone=<ZONE>&action=track&file=//DESKTOP/E/05 Ich Und Ich - Vom Selben Stern.mp3
/plugins/sonos4lox/index.php/?zone=<ZONE>&action=track&file=\\SYN-DS415\music\Sonstige\15 - Family Of The Year - Hero.mp3
/plugins/sonos4lox/index.php/?zone=<ZONE>&action=track&file=//loxberry/sonos_tts/mp3/07 - Eminem - The Monster.mp3
/plugins/sonos4lox/index.php/?zone=<ZONE>&action=track&file=//LOXBERRY/loxberry/data/plugins/sonos4lox/tts/mp3/07 - Eminem.mp3
```
