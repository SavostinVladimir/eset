<?php

// This file is part of Eset - http://eset.org/
//
// Eset is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Eset is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Eset.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Automatically generated strings for Eset installer
 *
 * Do not edit this file manually! It contains just a subset of strings
 * needed during the very first steps of installation. This file was
 * generated automatically by export-installer.php (which is part of AMOS
 * {@link http://docs.eset.org/dev/Languages/AMOS}) using the
 * list of strings defined in /install/stringnames.txt.
 *
 * @package   installer
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('ESET_INTERNAL') || die();

$string['admindirname'] = 'Director Admin';
$string['availablelangs'] = 'Pachete de limbă disponibile';
$string['chooselanguagehead'] = 'Selectare limbă';
$string['chooselanguagesub'] = 'Vă rugăm selectaţi limba pentru interfaţa de instalare, limba selectată va fi folosită EXCLUSIV în cadrul procedurii de instalare. Ulterior veţi putea selecta limba în care doriţi să fie afişată interfaţa.';
$string['clialreadyconfigured'] = 'Fișierul de configurare';
$string['clialreadyinstalled'] = 'Fișierul de configurare config.php există deja. Vă rugăm să folosiți dmin/cli/install_database.php to pentru a upgrada Eset pentru acest site.';
$string['cliinstallheader'] = 'Program  command line installation Eset {$a}';
$string['databasehost'] = 'Gazdă baza de date';
$string['databasename'] = 'Nume baza de date';
$string['databasetypehead'] = 'Alegere driver baza de date';
$string['dataroot'] = 'Director date';
$string['datarootpermission'] = 'Permisiuni directoare date';
$string['dbprefix'] = 'Prefix tabele';
$string['dirroot'] = 'Director Eset';
$string['environmenthead'] = 'Se verifică mediul...';
$string['environmentsub2'] = 'Fiecare versiune Eset are o anumită cerință minimă PHP și un număr de extensii PHP obligatorii.
Verificarea completă a mediului se face înainte de fiecare instalare și upgrade. Vă rugăm să contactați administratorul serverului, dacă nu știți cum se instalează noua versiune sau dacă activați extensiile PHP.';
$string['errorsinenvironment'] = 'Verificarea mediului eșuată!';
$string['installation'] = 'Instalare';
$string['langdownloaderror'] = 'Din păcate, limba "{$a}" nu a putut fi descărcată. Procesul de instalare va continua în limba engleză.';
$string['paths'] = 'Căi';
$string['pathserrcreatedataroot'] = 'Data directory ({$a->dataroot}) nu poate fi creat de către installer.';
$string['pathshead'] = 'Confirmare căi';
$string['pathsrodataroot'] = 'Directorul dataroot nu poate fi scris.';
$string['pathsroparentdataroot'] = 'Directorul parent ({$a->parent}) nu poate fi scris. Directorul data ({$a->dataroot}) nu poate fi creat de persoana care îl instalează.';
$string['pathssubdataroot'] = '<p>Un director unde Eset va stoca tot conținutul unui fișier încărcat de către utilizatori.</p>
<p>Acest director trebuie să poată fi citit și scris de către utilizatrii serverului web (de obicei \'www-data\', \'nobody\', or \'apache\').</p>
<p>Nu trebuie să fie direct accesibil de pe web.</p>
<p>Dacă directorul nu există în prezent, procesul de instalare va încerca să îl creeze.</p>';
$string['pathssubdirroot'] = '<p>Calea completă către directorul care conține codul Eset .</p>';
$string['pathsunsecuredataroot'] = 'Locația dataroot nu este sigură';
$string['pathswrongadmindir'] = 'Directorul admin nu există';
$string['phpextension'] = 'extensie PHP {$a}';
$string['phpversion'] = 'Versiune PHP';
$string['phpversionhelp'] = '<p>Eset necesită o versiune PHP de cel puțin  4.3.0 or 5.1.0 (5.0.x are un număr de probleme cunscute).</p>
<p>Momentan rulați versiunea {$a}</p>
<p>Trebuie să upgradați PHP sau să îl mutați pe o gazdă cu o nouă versiune de PHP!<br />
(În cazul 5.0.x puteți, de asemenea, să downgradați la versiunea 4.4.x)</p>';
$string['welcomep10'] = '{$a->installername} ({$a->installerversion})';
$string['welcomep20'] = 'Vedeți această pagină deoarece ați instalat și lansat cu succes pachetul  <strong>{$a->packname} {$a->packversion}</strong> în computerul dumneavoastră. Felicitări!';
$string['welcomep30'] = 'Lansarea <strong>{$a->installername}</strong> include aplicațiile
    pentru a crea un mediu în care <strong>Eset</strong> va funcționa, și anume:';
$string['welcomep40'] = 'Pachetul include și <strong>Eset {$a->esetrelease} ({$a->esetversion})</strong>.';
$string['welcomep50'] = 'Utilizarea tuturor aplicațiilor din acest pachet este determinată de respectivele lor
   licențe. Pachetul complet <strong>{$a->installername}</strong> este
     <a href="http://www.opensource.org/docs/definition_plain.html">open source</a> și este distribuit sub licența <a href="http://www.gnu.org/copyleft/gpl.html">GPL</a>.';
$string['welcomep60'] = 'Următoarele pagini vă oferă pași ușor de urmat pentru a
   configura și seta <strong>Eset</strong> în computerul       dumneavoastră. Puteți accepta setările implicite
    sau, opțional, să le modificați pentru a corespunde nevoilor dumneavoastră.';
$string['welcomep70'] = 'Click pe butonul "Next" de mai jos pentru a continua setarea <strong>Eset</strong>.';
$string['wwwroot'] = 'Adresă Web';
