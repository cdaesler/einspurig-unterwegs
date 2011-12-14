<?php
/**
 * In dieser Datei werden die Grundeinstellungen für WordPress vorgenommen.
 *
 * Zu diesen Einstellungen gehören: MySQL-Zugangsdaten, Tabellenpräfix,
 * Secret-Keys, Sprache und ABSPATH. Mehr Informationen zur wp-config.php gibt es auf der {@link http://codex.wordpress.org/Editing_wp-config.php
 * wp-config.php editieren} Seite im Codex. Die Informationen für die MySQL-Datenbank bekommst du von deinem Webhoster.
 *
 * Diese Datei wird von der wp-config.php-Erzeugungsroutine verwendet. Sie wird ausgeführt, wenn noch keine wp-config.php (aber eine wp-config-sample.php) vorhanden ist,
 * und die Installationsroutine (/wp-admin/install.php) aufgerufen wird.
 * Man kann aber auch direkt in dieser Datei alle Eingaben vornehmen und sie von wp-config-sample.php in wp-config.php umbenennen und die Installation starten.
 *
 * @package WordPress
 */

/**  MySQL Einstellungen - diese Angaben bekommst du von deinem Webhoster. */
/**  Ersetze database_name_here mit dem Namen der Datenbank, die du verwenden möchtest. */
define('DB_NAME', 'einspurig-test');

/** Ersetze username_here mit deinem MySQL-Datenbank-Benutzernamen */
define('DB_USER', 'root');

/** Ersetze password_here mit deinem MySQL-Passwort */
define('DB_PASSWORD', 'root');

/** Ersetze localhost mit der MySQL-Serveradresse */
define('DB_HOST', 'localhost');

/** Der Datenbankzeichensatz der beim Erstellen der Datenbanktabellen verwendet werden soll */
define('DB_CHARSET', 'utf8');

/** Der collate type sollte nicht geändert werden */
define('DB_COLLATE', '');

/**#@+
 * Sicherheitsschlüssel
 *
 * Ändere jeden KEY in eine beliebige, möglichst einzigartige Phrase. 
 * Auf der Seite {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service} kannst du dir alle KEYS generieren lassen.
 * Bitte trage für jeden KEY eine eigene Phrase ein. Du kannst die Schlüssel jederzeit wieder ändern, alle angemeldeten Benutzer müssen sich danach erneut anmelden.
 *
 * @seit 2.6.0
 */
define('AUTH_KEY',         '{>@^Isuj$&fNom|XS)2_!OM{byLLfW`&1gr[ 7*KSpNjC<Z)$&MYN?Z?Zy{cLZzq');
define('SECURE_AUTH_KEY',  'K:s0fA9|A?u5RlW2i9NNAe5PV^SQL4?7FmU93F<S !2sC64p^xj&fJtT!^r`KzZ0');
define('LOGGED_IN_KEY',    '!yyBn37i0}19`PXIhU mQb,o-.}Tf!.=z DY(83NR&U=wr8kV%sEibXa,Wp6sD=/');
define('NONCE_KEY',        '5?mDA~@Y0d$3BeY;I34G6pr^10[lKoJ?~UOwdj8LP$Q09A<0B{-BSE#%3PD$#b|<');
define('AUTH_SALT',        '|*/>ViC4^/=y=&Dbk2<=Lu25r^@ &Edr6~>GX{7bAf)se`p1+HvMe^V8^6=D$E36');
define('SECURE_AUTH_SALT', 'H3$hbr:mQ,:U^7KdI(k{l{.0`RyedX3(5F;4T;3C`@3-7Vj(4ti!O?X `3Bc90r.');
define('LOGGED_IN_SALT',   'cy~z=b2z}*W&!v_ EC>fJcC{WDe5#{Y.;X6YTPQ L71`:{&*.Mf=q/DSXw+b{elS');
define('NONCE_SALT',       'vo.]aCb9uW?{>6QuZo8n@{TAfU|dWSD_*^ps%_Y!tjxrmO$EEU~<4wle@$Yq9Og,');

/**#@-*/

/**
 * WordPress Datenbanktabellen-Präfix
 *
 *  Wenn du verschiedene Präfixe benutzt, kannst du innerhalb einer Datenbank
 *  verschiedene WordPress-Installationen betreiben. Nur Zahlen, Buchstaben und Unterstriche bitte!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Sprachdatei
 *
 * Hier kannst du einstellen, welche Sprachdatei benutzt werden soll. Die entsprechende
 * Sprachdatei muss im Ordner wp-content/languages vorhanden sein, beispielsweise de_DE.mo
 * Wenn du nichts einträgst, wird Englisch genommen.
 */
define('WPLANG', 'de_DE');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');