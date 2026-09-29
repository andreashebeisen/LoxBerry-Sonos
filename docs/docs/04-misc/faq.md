---
sidebar_position: 7
description: Antworten auf häufige Fragen
---

# FAQ / Troubleshooting

* **Warum bekomme ich beim Scan keine Player angezeigt?**  
    Ist evtl. in der Sonos App der UPnP Dienst deaktiviert. Bitte Sonos Einstellungen überprüfen.  
    Ich verwende eine Sonos Bridge in meinem Netzwerk. Am besten entfernen und erneut scannen.  
    Multicast im Netzwerk prüfen oder alternativ den UNICAST Scan nutzen (siehe [Zonen hinzufügen](../01-getting-started/add-zones.md)).
* **Was mache ich wenn ich eine Zone nicht mehr benötige?**  
    Vor der nicht mehr benötigten Zone den Papierkorb (Tick-Box) anticken und speichern.
* **Was mache ich wenn ich eine Zone in der Sonos App umbenenne?**  
    Vor der umbenannten Zone den Papierkorb (Tick-Box) anticken und speichern. Anschließend den Scan neu ausführen, Daten ergänzen und speichern. Ggf. den Raum in den Ausgangsverbindern im MS anpassen.
* **Was mache ich wenn ich eine neue Zone hinzufügen möchte?**  
    Den Scan erneut aufrufen, Daten ergänzen und speichern.
* **Warum bekomme ich bei T2S eine Fehlermeldung bezüglich curl_init?**  
    Du hast das LoxBerry Image auf einer VM installiert. Aus derzeit unerfindlichen Gründen werden 3 Pakete bei der Grundinstallation vom LoxBerry nicht installiert. Bitte installiere mit dem root User manuell folgende Pakete: `apt-get install curl libcurl3 php5-curl`
* **Warum bekomme ich einen Fehler bei einer Gruppendurchsage?**  
    Eine Zone darf innerhalb der Syntax nur einmal verwendet werden und nicht über member= noch einmal hinzugefügt werden.  
    Bsp. falsch:  
    `http://<DEINE IP>/plugins/sonos4lox/index.php?zone=kueche&action=sendgroupmessage&member=kueche,buero&text=dies ist ein test&groupvolume=15`  
    Bsp. richtig:  
    `http://<DEINE IP>/plugins/sonos4lox/index.php?zone=kueche&action=sendgroupmessage&member=buero&text=dies ist ein test&groupvolume=15`
* **Warum bekomme ich keine Daten per UDP in den Miniserver?**  
    Der Datentransfer in der Konfiguration ist ausgeschaltet.  
    Das Portforwarding am Router wurde nicht durchgeführt.  
    Senderadresse im virtuellen UDP-Eingang leer lassen.
* **Warum höre ich keinen playgong/jingle vor meiner T2S?**  
    Das Jingle MP3 File muss in folgendes Verzeichnis kopiert werden: `/loxberry/data/plugins/sonos4lox/tts/mp3`
* **Warum wird keine messageid abgespielt?**  
    Die numerischen MP3 Files müssen in folgendes Verzeichnis kopiert werden: `/loxberry/data/plugins/sonos4lox/tts/mp3`. Ggf. mit dem Befehl [mp3rights](../03-integration/actions-t2s.md#sonderfunktionen-t2s) die Rechte des Verzeichnisses korrigieren.
* **Warum wird keine MP3 (T2S oder messageid) abgespielt?**  
    Du hast in deinem Router die IPv6 Unterstützung markiert. Bitte deaktivieren.
* **Warum wird eine T2S zweimal abgespielt obwohl im virtuellen Ausgangsbefehl nur ein Eintrag bei "Befehl bei EIN" vorhanden ist?**
    * Im virtuellen Ausgangsbefehl ist der Haken bei "Als Digitalausgang verwenden" nicht entfernt. Das muss bei Ansage eines Textes mit dem Parameter `<v>` (Übernahme eines Wertes aus Loxone) durchgeführt werden. Wenn kein Wert ausgegeben werden soll muss der Haken bleiben.
    * Im virtuellen Ausgang ist der Haken bei "Verbindung nach Senden schließen" nicht gesetzt.
    * Die Ansage erfolgt basierend auf einer Textgenerierung aus einem Statusbaustein heraus. Hierzu die [PicoC-Lösung](../03-integration/actions-t2s.md#t2s-aus-statusbaustein-picoc) nutzen.
* **Warum bekomme ich nur 1x eine T2S und danach muss ich die Zone vom Netz nehmen? Z. B. Fehler "/PHPSonos.php on line 2478"**  
    **→ erledigt** (seit Release 2.0)
