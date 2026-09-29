---
sidebar_position: 3
description: Befehle für die Medienwiedergabe
---

# Playlisten / Radio / Dienste / lokale Dateien

Alle Befehle müssen als **virtueller Ausgangsbefehl** (Loxone) oder in einem **HTTP-Ausgang** (Nicht-Loxone) angelegt werden. Zum Testen im Browser jeweils `http://<LOXBERRY IP-ADRESSE>` voranstellen.

Bei allen Befehlen dieser Seite kann statt `&volume=` auch ein [Sound-Profil](../02-configuration/sound-profiles.md) per `&profile=` angegeben werden (nicht beides zusammen).

## Playlisten & Queue-Befehle

| Funktion | Befehl / Syntax / URL | Einzel | Gruppe | Beschreibung |
| --- | --- | :-: | :-: | --- |
| sonosplaylist | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=sonosplaylist&playlist=NAME_DER_PLAYLISTE&volume=15` | **X** | | Lädt Playliste und startet Wiedergabe mit Volume 15% |
| load | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=sonosplaylist&playlist=NAME_DER_PLAYLISTE&load` | **X** | **X** | Lädt Playliste **ohne** Wiedergabe zu starten |
| rampto | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=sonosplaylist&playlist=NAME_DER_PLAYLISTE&rampto=sleep&volume=20` | **X** | | Lädt Playliste mit langsamem Lautstärkeanstieg (siehe [Rampto](../02-configuration/options.md#rampto-parameter)) |
| zero | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=sonosplaylist&playlist=NAME&rampto=sleep&volume=20&zero` | **X** | | Wie rampto, startet aber von Lautstärke Null |
| playmode | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=sonosplaylist&playlist=NAME&playmode=shuffle` | **X** | **X** | Lädt Playliste und setzt den [Playmode](./actions-default.md) |
| Gruppe | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=sonosplaylist&playlist=NAME&volume=25&member=ZONE2,ZONE3` | | **X** | Startet Playliste auf 3 Playern parallel |
| randomplaylist | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=randomplaylist` | **X** | **X** | Lädt eine zufällige Sonos-Playliste; mit **`&except=0,3`** werden Playlisten (Index laut `getsonosplaylists`) ausgeschlossen |
| nextpush | `/plugins/sonos4lox/index.php/?zone=DEINE_ZONE&action=nextpush` | **X** | | PL läuft → next track; Ende PL → 1st track; Radio/TV → nextradio Loop; leer → nextradio Loop |
| zapzone | `/plugins/sonos4lox/index.php/?zone=DEINE_ZONE&action=zapzone` | **X** | | Zone wird spielendem Player hinzugefügt; erneuter Klick → nächster spielender Player; danach bzw. wenn kein Player spielt → [Folgefunktion](../02-configuration/options.md#folgefunktion-für-zapzone-u-follow) (Reset nach 60 Sek.) |
| playfavorite | `/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=playfavorite&favorite=NAME_DES_FAVORITEN&volume=25` | **X** | **X** | Lädt Favoriten und spielt ihn ab; Fuzzy-Logic-Suche nach Titel/Playliste/Radiosender möglich |

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

Mit jedem weiteren Aufruf desselben Befehls wird zum nächsten Eintrag gewechselt. Das Looping wird durch andere Befehle zurückgesetzt – außer durch: play, stop, pause, toggle, next, previous, volume, volumeup, volumedown, getvolume, gettransportinfo, say, sendmessage, sendgroupmessage, sonosplaylist, playfavorite, zapzone, follow, leave sowie Befehle mit `&volume`, `&keepvolume` oder `&groupvolume`. Zusätzlich werden die ONE-click Funktionen nach der unter "[Reset nach](../02-configuration/options.md#folgefunktion-für-zapzone-u-follow)" eingestellten Zeit sowie einmal täglich per Cronjob zurückgesetzt.

Unterstützte Streaming-Dienste: Apple Music, Amazon Music, Napster, Deezer, Sonos Radio, TuneIn Radio, Soundcloud, Mixcloud, YouTube Music, TIDAL sowie Sonos-Playlisten und lokale Musikbibliothek.

| Funktion | Befehl / Syntax / URL | Einzel | Gruppe | Beschreibung |
| --- | --- | :-: | :-: | --- |
| playallfavorites | `/plugins/sonos4lox/index.php/?zone=DEINE_ZONE&action=playallfavorites` | **X** | **X** | Tracks aus Sonos-Favoriten, dann Radiostationen (Loop); Playlisten/Alben nicht unterstützt |
| playtrackfavorites | `/plugins/sonos4lox/index.php/?zone=DEINE_ZONE&action=playtrackfavorites` | **X** | **X** | Alle Track-Favoriten; ONE-click → Next Track, am Ende Restart |
| playradiofavorites | `/plugins/sonos4lox/index.php/?zone=DEINE_ZONE&action=playradiofavorites` | **X** | **X** | Alle Radiosender aus Sonos-Favoriten; ONE-click → nächster Sender, am Ende Restart |
| playsonosplaylist | `/plugins/sonos4lox/index.php/?zone=DEINE_ZONE&action=playsonosplaylist` | **X** | **X** | Alle Sonos-Playlisten; ONE-click → nächste PL, am Ende Restart |
| playplfavorites | `/plugins/sonos4lox/index.php/?zone=DEINE_ZONE&action=playplfavorites` | **X** | **X** | Alle Playlisten aus Sonos-Favoriten; ONE-click → nächste PL, am Ende Restart |

:::note

Die Kurzformen `trackfavorites`, `radiofavorites` und `playlistfavorites` existieren nicht mehr. Im Log wird dann der korrekte Befehl (`playtrackfavorites`, `playradiofavorites`, `playplfavorites`) vorgeschlagen.

:::

## Streaming-Dienste (Amazon, Spotify, Apple, Napster)

Track-, Album- bzw. Playlisten-ID aus der jeweiligen App oder per Rechtsklick → "Link kopieren" ermitteln (die ID ist jeweils **fett** markiert):

| Dienstanbieter | Beispiel-URL / Format |
| --- | --- |
| Amazon Album | music.amazon.de/albums/**B00IK3IV6Y** |
| Amazon Playlist | music.amazon.de/playlists/**B071W6HN35**?ref=… |
| Amazon Track | music.amazon.de/track/**D00IK3IV6Y** |
| Spotify Playlist | open.spotify.com/playlist/**37i9dQZF1DX3h1vasAdBTc** |
| Spotify Album | open.spotify.com/album/**0PNXB6AmSfM9oS0YwNkCYH** |
| Spotify Track | open.spotify.com/track/**&lt;ID&gt;** |
| Napster Album | app.napster.com/artist/art.4212/album/**alb.285904254** |
| Apple Music Album | music.apple.com/de/album/eiskalt/**1288630360** |
| Apple Music Playlist | music.apple.com/de/playlist/…/pl.**6bf4415b83ce4f3789614ac4c3675740** |

Syntax (Anbietername austauschen: `amazon`, `spotify`, `apple`, `napster`; **trackuri** für Titel, **albumuri** für Alben, **playlisturi** für Playlisten):

```
/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=amazon&albumuri=ID&volume=5
/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=spotify&playlisturi=ID&volume=5
/plugins/sonos4lox/index.php?zone=DEINE_ZONE&action=apple&trackuri=ID&volume=5
```

Die Queue der Zone wird dabei geleert, der Inhalt geladen und abgespielt. Ohne Angabe von `&volume` bzw. `&profile` wird mit Lautstärke 25 gestartet. Bei **Napster** werden keine einzelnen Titel (`trackuri`) unterstützt. Bei Apple Music Playlisten wird die ID ohne das Präfix `pl.` angegeben.

## Lokale Tracks (NAS, USB, LoxBerry)

Tracks sollten in der Sonos-Bibliothek vorhanden sein. Immer **vollen SMB/UNC-Pfad inkl. Dateiendung** angeben. Unix- (`//SERVER/Freigabe/...`) und Windows-Pfade (`\\SERVER\Freigabe\...`) werden akzeptiert. Das Dateiformat wird vor dem Abspielen geprüft. Unterstützte Formate: [Sonos Audio-Formate](https://sonos-de.custhelp.com/app/answers/detail/a_id/3661/~/unterst%C3%BCtzte-audioformate)

```
/plugins/sonos4lox/index.php/?zone=<ZONE>&action=track&file=//DESKTOP/E/05 Ich Und Ich - Vom Selben Stern.mp3
/plugins/sonos4lox/index.php/?zone=<ZONE>&action=track&file=\\SYN-DS415\music\Sonstige\15 - Family Of The Year - Hero.mp3
/plugins/sonos4lox/index.php/?zone=<ZONE>&action=track&file=//LOXBERRY/plugindata/sonos4lox/tts/mp3/07 - Eminem - The Monster.mp3
```
