<?php
	$GLOBALS['CONFIG']['CONFERENCE'] = array(
	/**
	 * Der Startzeitpunkt der Konferenz als Unix-Timestamp. Befinden wir uns davor, wird die Closed-Seite
	 * mit einem Text der Art "hat noch nicht angefangen" angezeigt.
	 *
	 * Wird dieser Zeitpunkt nicht angegeben, gilt die Konferenz immer als angefangen. (Siehe aber ENDS_AT
	 * und CLOSED weiter unten)
	 */
	'STARTS_AT' => strtotime("2016-05-02 9:00"),

	/**
	 * Der Endzeitpunkt der Konferenz als Unix-Timestamp. Befinden wir uns danach, wird eine Danke-Und-Kommen-Sie-
	 * Gut-Nach-Hause-Seite sowie einem Ausblick auf die kommenden Events angezeigt. 
	 *
	 * Wird dieser Zeitpunkt nicht angegeben, endet die Konferenz nie. (Siehe aber CLOSED weiter unten)
	 */
	'ENDS_AT' => strtotime("2016-05-04 21:00"),

	/**
	 * Hiermit kann die Funktionalitaet von STARTS_AT/ENDS_AT überschrieben werden. Der Wert 'before'
	 * simuliert, dass die Konferenz noch nicht begonnen hat. Der Wert 'after' simuliert, dass die Konferenz
	 * bereits beendet ist. 'running' simuliert eine laufende Konferenz.
	 *
	 * Der Boolean true ist aus Abwärtskompatibilitätsgründen äquivalent zu 'after'. False ist äquivalent
	 * zu 'running'.
	 */
	//'CLOSED' => false,

	/**
	 * Titel der Konferenz (kann Leer- und Sonderzeichen enthalten)
	 * Dieser im Seiten-Header, im <title>-Tag, in der About-Seite und ggf. ab weiteren Stellen als
	 * Anzeigetext benutzt
	 */
	'TITLE' => "rpTEN - Stage 1",

	/**
	 * Veranstalter
	 * Wird für den <meta name="author">-Tag verdet. Wird diese Zeile auskommentiert, wird kein solcher
	 * <meta>-Tag generiert.
	 */
	'AUTHOR' => 're:publica video crew',

	/**
	 * Beschreibungstext
	 * Wird für den <meta name="description">-Tag verdet. Wird diese Zeile auskommentiert, wird kein solcher
	 * <meta>-Tag generiert.
	 */
	'DESCRIPTION' => 'Relay des re:publica-Streams von Stage1',

	/**
	 * Schlüsselwortliste, Kommasepariert
	 * Wird für den <meta name="keywords">-Tag verdet. Wird diese Zeile auskommentiert, wird kein solcher
	 * <meta>-Tag generiert.
	 */
	'KEYWORDS' => 're:publica, Video, Media, Streaming',

	/**
	 * HTML-Code für den Footer (z.B. für spezielle Attribuierung mit <a>-Tags)
	 * Sollte üblicherweise nur Inline-Elemente enthalten
	 * Wird diese Zeile auskommentiert, wird die Standard-Attribuierung für (c3voc.de) verwendet
	 */
	'FOOTER_HTML' => '
		brought to you by <a href="https://c3voc.de">C3VOC</a>
	',

	/**
	 * HTML-Code für den Banner (nur auf der Startseite, direkt unter dem Header)
	 * wird üblicherweise für KeyVisuals oder Textmarke verwendet (vgl. Blaues
	 * Wischiwaschi auf http://media.ccc.de/)
	 *
	 * Dieser HTML-Block wird üblicherweise in der main.less speziell für die
	 * Konferenz umgestaltet.
	 *
	 * Wird diese Zeile auskommentiert, wird kein Banner ausgegeben.
	 */
//	'BANNER_HTML' => "",

	/**
	 * Link zu den Recordings
	 * Wird diese Zeile auskommentiert, wird der Link nicht angezeigt
	 */
//	'RELEASES' => 'https://media.ccc.de/browse/broadcast/chaosradio/index.html',

	/**
	 * Um die interne ReLive-Ansicht zu aktivieren, kann hier ein ReLive-JSON
	 * konfiguriert werden. Üblicherweise wird diese Datei über das Script
	 * configs/download.sh heruntergeladen, welches von einem Cronjob
	 * regelmäßig getriggert wird.
	 *
	 * Wird diese Zeile auskommentiert, wird der Link nicht angezeigt
	 */
	//'RELIVE_JSON' => 'configs/vod.json',
);

/**
 * Konfiguration der Stream-Übersicht auf der Startseite
 */
$GLOBALS['CONFIG']['OVERVIEW'] = array(
	/**
	 * Abschnitte aud der Startseite und darunter aufgeführte Räume
	 * Es können beliebig neue Gruppen und Räume hinzugefügt werden
	 *
	 * Die Räume müssen in $GLOBALS['CONFIG']['ROOMS'] konfiguriert werden,
	 * sonst werden sie nicht angezeigt.
	 */
	'GROUPS' => array(
		'' => array(
			'stage1',
		),
	),
);



/**
 * Liste der Räume (= Audio & Video Produktionen, also auch DJ-Sets oä.)
 */
$GLOBALS['CONFIG']['ROOMS'] = array(
	/**
	 * Array-Key ist der Raum-Slug, der z.B. auch zum erstellen der URLs,
	 * in $GLOBALS['CONFIG']['OVERVIEW'] oder im Feedback verwendet wird.
	 */
	'stage1' => array(
		/**
		 * Angezeige-Name
		 */
		'DISPLAY' => "rpTEN - Stage 1",
		/**
		 * ID des Video/Audio-Streams. Die Stream-ID ist davon abhängig, welches
		 * Event-Case in welchem Raum aufgebaut wird und wird üblicherweise von
		 * s1 bis s5 durchnummeriert.
		 */
		'STREAM' => 'q1',

		/**
		 * Stream-Vorschaubildchen auf der Übersichtsseite anzeigen
		 * Damit das funktioniert muss der entsprechende runit-Task auf dem
		 * CDN-Quell-Host (live.ber) laufen.
		 */
		'PREVIEW' => true,

		/**
		 * Übersetzungstonspur aktivieren
		 *
		 * Wenn diese Zeile auskommentiert oder auf false gesetzt ist werden nur
		 * die native-Streams verwendet, andernfalls wird native und translated
		 * angeboten und auch für beide Tonspuren eine Player-Seite angezeigt.
		 */
		'TRANSLATION' => false,

		/**
		 * stereo-Tonspur statt native-Tonspur benutzen
		 *
		 * Wenn diese Zeile auskommentiert oder auf false gesetzt ist werden
		 * die "native"-Mono-Streams verwendet, andernfalls wird statt "native"
		 * der Streamname "stereo" eingesetzt. Im normalen Konferenz-Setup
		 * müssen dann beide Kanäle der Kamera mit einem Signal bespielt werden.
		 */
		'STEREO' => false,

		/**
		 * SD-Video-Stream (1024×576) verfügbar
		 *
		 * Wenn diese Zeile auskommentiert oder auf false gesetzt ist ẃird kein SD-Video
		 * angeboten. Wird auch HD_VIDEO auf false gesetzt oder auskommentiert ist, wird
		 * für diesen Raum überhaupt kein Video angeboten.
		 *
		 * In diesem Fall wird, sofern jeweils aktiviert, Slides, Audio und zuletzt Musik
		 * als Default-Stream angenommen.
		 */
		'SD_VIDEO' => true,

		/**
		 * HD-Video-Stream (1920×1080) verfügbar
		 *
		 * Wenn diese Zeile auskommentiert oder auf false gesetzt ist ẃird kein HD-Video
		 * angeboten. Wird auch SD_VIDEO auf false gesetzt oder auskommentiert ist, wird
		 * für diesen Raum überhaupt kein Video angeboten.
		 *
		 * In diesem Fall wird, sofern jeweils aktiviert, Slides, Audio und zuletzt Musik
		 * als Default-Stream angenommen.
		 */
		'HD_VIDEO' => true,

		/**
		 * Slide-Only-Stream (1024×576) verfügbar
		 *
		 * Wenn diese Zeile auskommentiert oder auf false gesetzt ist ẃird kein Slide-Only-
		 * Stream angeboten. Für diesen Raum wird dann keim Slides-Tab angeboten.
		 *
		 * In diesem Fall wird, sofern jeweils aktiviert, Audio und zuletzt Musik als
		 * Default-Stream angenommen.
		 */
		'SLIDES' => false,

		/**
		 * Audio-Only-Stream verfügbar
		 *
		 * Wenn diese Zeile auskommentiert oder auf false gesetzt ist ẃird kein Audio-Only-
		 * Stream angeboten. Für diesen Raum wird dann keim Audio-Tab angeboten.
		 *
		 * In diesem Fall wird, sofern aktiviert, Musik als Default-Stream angenommen.
		 */
		'AUDIO' => true,

		/**
		 * Musik-Stream verfügbar
		 *
		 * Wenn diese Zeile auskommentiert oder auf false gesetzt ist ẃird kein Musik-Stream
		 * angeboten. Für diesen Raum wird dann keim Musik-Tab angeboten.
		 *
		 * Ist kein einziger Stream angebote, wird statt der Stream-Seite ein 404-Fehler
		 * angezeigt.
		 */
		'MUSIC' => false,

		/**
		 * Fahrplan-Ansicht auf der Raum-Seite aktivieren (boolean)
		 *
		 * Wenn diese Zeile auskommentiert oder auf false gesetzt ist,
		 * wird der Raum nicht im Fahrplan gesucht und auch auf der Startseite
		 * findet keine Darstellung statt.
		 *
		 * Ebenso können alle Fahrplan-Funktionialitäten durch auskommentieren
		 * des globalen $GLOBALS['CONFIG']['SCHEDULE']-Blocks deaktiviert werden
		 */
		'SCHEDULE' => false,

		/**
		 * Name des Raums im Fahrplan
		 * Wenn diese Zeile auskommentiert ist wird der Raum-Slug verwendet
		 */
		//'SCHEDULE_NAME' => 'Saal 1',

		/**
		 * Feedback anzeigen (boolean)
		 *
		 * Wenn diese Zeile auskommentiert oder auf false gesetzt ist,
		 * taucht der Raum auch im globalen Feedback-Formular nicht auf.
		 *
		 * Ebenso können alle Feedback-Funktionialitäten durch auskommentieren
		 * des globalen $GLOBALS['CONFIG']['FEEDBACK']-Blocks deaktiviert werden
		 */
		'FEEDBACK' => false,

		/**
		 * Subtitles-Player aktivieren (boolean)
		 *
		 * Wenn diese Zeile auskommentiert oder auf false gesetzt ist,
		 * wird der Subtitles-Button und die damit verbundenen Funktionen deaktiviert.
		 *
		 * Ebenso können alle Subtitles-Funktionialitäten durch auskommentieren
		 * des globalen $GLOBALS['CONFIG']['SUBTITLES']-Blocks deaktiviert werden
		 */
		'SUBTITLES' => false,

		/**
		 * Embed-Form aktivieren (boolean)
		 *
		 * Ist dieses Feld auf true gesetzt, wird ein Embed-Tab unter dem Video
		 * angezeigt. Darüber kann der Player als iframe eingebunden werden.
		 *
		 * Wenn diese Zeile auskommentiert oder auf false gesetzt ist,
		 * wird kein Embed-Tab angeboten und die URL zum Einbetten existiert nicht.
		 *
		 * Ebenso können alle Embedding-Funktionialitäten durch auskommentieren
		 * des globalen $GLOBALS['CONFIG']['EMBED']-Blocks deaktiviert werden
		 */
		'EMBED' => true,

		/**
		 * IRC-Link aktivieren (boolean)
		 *
		 * Solange Twitter oder IRC aktiviert ist, wird ein "Chat"-Tab mit den
		 * jeweiligen Links angezeigt.
		 *
		 * Ist dieses Feld auf true gesetzt, wird ein irc://-Link angezeigt.
		 * WebIrc wird nach dem Congress nicht mehr unterstützt ;)
		 *
		 * Wenn diese Zeile auskommentiert oder auf false gesetzt ist,
		 * wird kein IRC-Link angezeigt
		 *
		 * Ebenso können alle IRC-Links durch auskommentieren
		 * des globalen $GLOBALS['CONFIG']['IRC']-Blocks deaktiviert werden
		 */
		'IRC' => false,

		/**
		* Mit dem Angaben in diesem Block können die Vorgaben aus dem
		* globalen $GLOBALS['CONFIG']['IRC'] Block überschrieben werden.
		*
		* Der globale $GLOBALS['CONFIG']['IRC']-Block muss trotzdem existieren,
		* da sonst überhaupt kein IRC-Link erzeugt wird. (ggf. einfach `= true` setzen)
		*/
		//'IRC_CONFIG' => array(
		//	'DISPLAY' => '#31C3-hall-1 @ hackint',
		//	'URL'     => 'irc://irc.hackint.eu:6667/31C3-hall-1',
		//),

		/**
		 * Twitter-Link aktivieren (boolean)
		 *
		 * Ist dieses Feld auf true gesetzt, wird ein Link zu Twitter angezeigt.
		 *
		 * Solange Twitter oder IRC aktiviert ist, wird ein "Chat"-Tab mit den
		 * jeweiligen Links angezeigt.
		 *
		 * Wenn diese Zeile auskommentiert oder auf false gesetzt ist,
		 * wird kein Twitter-Link angezeigt
		 *
		 * Ebenso können alle Twitter-Links durch auskommentieren
		 * des globalen $GLOBALS['CONFIG']['TWITTER']-Blocks deaktiviert werden
		 **/
		'TWITTER' => true,

		/**
		* Mit dem Angaben in diesem Block können die Vorgaben aus dem
		* globalen $GLOBALS['CONFIG']['TWITTER'] Block überschrieben werden.
		*
		* Der globale $GLOBALS['CONFIG']['TWITTER']-Block muss trotzdem existieren,
		* da sonst überhaupt kein IRC-Link erzeugt wird. (ggf. einfach `= true` setzen)
		*/
		//'TWITTER_CONFIG' => array(
		//	'DISPLAY' => '#hall1 @ twitter',
		//	'TEXT'    => '#31C3 #hall1',
		//),
	),
);




/**
 * Globaler Schalter für die Embedding-Funktionalitäten
 *
 * Wird diese Zeile auskommentiert oder auf False gesetzt, werden alle
 * Embedding-Funktionen deaktiviert.
 */
$GLOBALS['CONFIG']['EMBED'] = true;

/**
 * Globale Konfiguration der Twitter-Links.
 *
 * Wird dieser Block auskommentiert, werden keine Twitter-Links mehr erzeugt. Sollen die
 * Twitter-Links für jeden Raum einzeln konfiguriert werden, muss dieser Block trotzdem
 * existieren sein. ggf. einfach auf true setzen:
 *
 *   $GLOBALS['CONFIG']['TWITTER'] = true
 */
$GLOBALS['CONFIG']['TWITTER'] = array(
	/**
	 * Anzeigetext für die Twitter-Links.
	 *
	 * %s wird durch den Raum-Slug ersetzt.
	 * Ist eine weitere Anpassung erfoderlich, kann ein TWITTER_CONFIG-Block in der
	 * Raum-Konfiguration zum Überschreiben dieser Angaben verwendet werden.
	 */
	'DISPLAY' => '#rpTEN @ twitter',

	/**
	 * Vorgabe-Tweet-Text für die Twitter-Links.
	 *
	 * %s wird durch den Raum-Slug ersetzt.
	 * Eine Anpassung kann ebenfalls in der Raum-Konfiguration vorgenommen werden.
	 */
	'TEXT' => '#rpTEN',
);
