---
sidebar_position: 7
description: Antworten auf häufige Fragen
---

# FAQ / Troubleshooting

* **Warum bekomme ich beim Scan keine Player angezeigt?**  
    Ist evtl. in der Sonos App der UPnP Dienst deaktiviert. Bitte Sonos Einstellungen überprüfen.  
    Ich verwende eine Sonos Bridge in meinem Netzwerk. Am besten entfernen und erneut scannen.  
    Multicast im Netzwerk prüfen oder alternativ den UNICAST Scan mit den IP-Adressen der Player nutzen (siehe [Zonen hinzufügen](../01-getting-started/add-zones.md#unicast-scan-z-b-bei-vlan)).
* **Was mache ich wenn ich eine Zone nicht mehr benötige?**  
    Vor der nicht mehr benötigten Zone auf den Papierkorb klicken, bestätigen und speichern.
* **Was mache ich wenn ich eine Zone in der Sonos App umbenenne?**  
    Vor der umbenannten Zone auf den Papierkorb klicken und speichern. Anschließend den Scan neu ausführen, Daten ergänzen und speichern. Ggf. den Raum in den Ausgangsverbindern im MS anpassen.
* **Was mache ich wenn ich eine neue Zone hinzufügen möchte?**  
    Den Scan erneut aufrufen, Daten ergänzen und speichern.
* **Warum wird mein Befehl nicht ausgeführt?**  
    Im [Log](../02-configuration/logs.md) nachsehen. Steht dort "Unsupported URL action", existiert der Befehl nicht (mehr) – siehe [Entfernte Befehle](../03-integration/actions-extended.md#entfernte-befehle). Steht dort, dass die Zone offline ist, ist der Player nicht erreichbar oder außerhalb seines [Zeitfensters](../01-getting-started/add-zones.md#zeitsteuerung-optional). Steht dort "Script is off", wurde das Plugin mit `action=off` ausgeschaltet.
* **Warum bekomme ich einen Fehler bei einer Gruppendurchsage?**  
    Eine Zone darf innerhalb der Syntax nur einmal verwendet werden und nicht über member= noch einmal hinzugefügt werden.  
    Bsp. falsch:  
    `http://<DEINE IP>/plugins/sonos4lox/index.php?zone=kueche&action=say&member=kueche,buero&text=dies ist ein test&volume=15`  
    Bsp. richtig:  
    `http://<DEINE IP>/plugins/sonos4lox/index.php?zone=kueche&action=say&member=buero&text=dies ist ein test&volume=15`
* **Warum wird meine T2S nicht ausgegeben?**  
    Die T2S-Funktion ist in der Konfiguration ausgeschaltet (Abhilfe: `&urgent`), es wurde zuvor `action=absent` ausgeführt, oder dieselbe Durchsage wurde innerhalb der [Wartezeit](../02-configuration/options.md#wartezeit-bis-t2s-erneut-ausgegeben-wird) bereits ausgegeben.
* **Warum bekomme ich keine Daten per UDP in den Miniserver?**  
    Der Datentransfer in der Konfiguration ist ausgeschaltet.  
    Es ist kein UDP-Port konfiguriert (dann werden die Daten nur per MQTT gesendet).  
    Der Port ist in einer Firewall zwischen LoxBerry und Miniserver gesperrt.  
    Senderadresse im virtuellen UDP-Eingang leer lassen.
* **Warum höre ich keinen playgong/jingle vor meiner T2S?**  
    Das Jingle MP3 File muss in folgendes Verzeichnis kopiert werden: `/opt/loxberry/data/plugins/sonos4lox/tts/mp3` (bzw. `tts/mp3` im konfigurierten [Speicherort](../01-getting-started/configuration.md#speicherort)).
* **Warum wird keine messageid abgespielt?**  
    Die MP3 Files müssen in folgendes Verzeichnis kopiert werden: `/opt/loxberry/data/plugins/sonos4lox/tts/mp3`. Der Dateiname darf nur Buchstaben, Ziffern, `_` und `-` enthalten. Ggf. mit dem Befehl [mp3rights](../03-integration/actions-t2s.md#sonderfunktionen-t2s) die Rechte des Verzeichnisses korrigieren.
* **Warum wird keine MP3 (T2S oder messageid) abgespielt?**  
    Du hast in deinem Router die IPv6 Unterstützung markiert. Bitte deaktivieren.  
    Die Player erreichen die SMB-Freigabe des LoxBerry nicht (VLAN/Firewall, siehe [Security (VLAN)](../01-getting-started/add-zones.md#security-vlan)).
* **Warum wird eine T2S zweimal abgespielt obwohl im virtuellen Ausgangsbefehl nur ein Eintrag bei "Befehl bei EIN" vorhanden ist?**
    * Im virtuellen Ausgangsbefehl ist der Haken bei "Als Digitalausgang verwenden" nicht entfernt. Das muss bei Ansage eines Textes mit dem Parameter `<v>` (Übernahme eines Wertes aus Loxone) durchgeführt werden. Wenn kein Wert ausgegeben werden soll muss der Haken bleiben.
    * Im virtuellen Ausgang ist der Haken bei "Verbindung nach Senden schließen" nicht gesetzt.
    * Die Ansage erfolgt basierend auf einer Textgenerierung aus einem Statusbaustein heraus. Hierzu die [PicoC-Lösung](../03-integration/actions-t2s.md#t2s-aus-statusbaustein-picoc) nutzen.
