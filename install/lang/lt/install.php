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

$string['admindirname'] = 'Administratoriaus katalogas';
$string['availablelangs'] = 'Galimi kalbų paketai';
$string['chooselanguagehead'] = 'Pasirinkite kalbą';
$string['chooselanguagesub'] = 'Pasirinkite diegimo kalbą. Ši kalba bus naudojama ir kaip numatytoji svetainės kalba, nors vėliau ją bus galima pakeisti.';
$string['clialreadyconfigured'] = 'Failas config.php jau yra, prašau naudoti admin/cli/install_database.php jei norite įrašyti šią svetainę.';
$string['clialreadyinstalled'] = 'Failas config.php jau yra. Jei norite atnaujinti svetainę, naudokite admin/cli/upgrade.php.';
$string['cliinstallheader'] = '„Eset“ {$a} komandų eilutės diegimo programa';
$string['databasehost'] = 'Duomenų bazės pagrindinis kompiuteris';
$string['databasename'] = 'Duomenų bazės pavadinimas';
$string['databasetypehead'] = 'Pasirinkite duomenų bazės tvarkyklę';
$string['dataroot'] = 'Duomenų katalogas';
$string['datarootpermission'] = 'Duomenų katalogo leidimai';
$string['dbprefix'] = 'Lentelių priešvardis';
$string['dirroot'] = '„Eset“ katalogas';
$string['environmenthead'] = 'Tikrinama aplinka...';
$string['environmentsub2'] = 'Kiekvienas „Eset“ leidimas turi minimalius PHP versijos ir privalomų PHP plėtinių skaičiaus reikalavimus. Prieš kiekvieną diegimą ir versijos naujinimą, išsamiai tikrinama aplinka. Jei nežinote, kaip įdiegti naują versiją arba įjungti PHP plėtinius, kreipkitės į serverio administratorių.';
$string['errorsinenvironment'] = 'Aplinkos patikra nepavyko!';
$string['installation'] = 'Diegimas';
$string['langdownloaderror'] = 'Deja, {$a} kalbos atsisiųsti nepavyko. Diegimo procesas bus tęsiamas anglų kalba.';
$string['memorylimithelp'] = '<p>Serverio PHP atminties limitas dabar nustatytas kaip {$a}.</p> <p>Vėliau dėl to „Eset“ gali iškilti atminties problemų, ypač jei įjungta daug modulių ir (arba) yra daug naudotojų.</p> <p>Rekomenduojame sukonfigūruoti didesnį PHP limitą, jei galima, pvz., 40M. Galite pabandyti tai atlikti keliais būdais:</p> <ol> <li>Jei galite, pakartotinai sukompiliuokite PHP naudodami <i>--enable-memory-limit</i>. Taip „Eset“ pati galės nustatyti atminties limitą.</li> <li>Jei turite prieigą prie php.ini failo, galite pakeisti <b>memory_limit</b> parametro reikšmę į 40M ar pan. Jei prieigos neturite, galite paprašyti, kad tai padarytų administratorius.</li> <li>Kai kuriuose PHP serveriuose „Eset“ kataloge galite sukurti .htaccess failą, kuriame būtų ši eilutė : <blockquote><div>php_value memory_limit 40M</div></blockquote> <p>Tačiau kai kuriuose serveriuose dėl to neveiks <b>visi</b> PHP puslapiai (peržiūrėdami puslapius matysite klaidą), todėl the .htaccess failą teks pašalinti.</p></li> </ol>';
$string['paths'] = 'Keliai';
$string['pathserrcreatedataroot'] = 'Diegimo programa negali sukurti duomenų katalogo ({$a->dataroot}).';
$string['pathshead'] = 'Patvirtinti kelius';
$string['pathsrodataroot'] = 'Į šakninį duomenų katalogą negalima įrašyti.';
$string['pathsroparentdataroot'] = 'Į pirminį katalogą ({$a->parent}) negalima įrašyti. Diegimo programa negali sukurti katalogo ({$a->dataroot}).';
$string['pathssubadmindir'] = 'Labai mažai žiniatinklio pagrindinių kompiuterių naudoja /admin kaip specialų URL, kad galėtumėte pasiekti valdymo skydą ar pan. Deja, dėl to kyla konfliktas su „Eset“ administratoriaus puslapių standartine vieta. Tai galite ištaisyti, jei diegdami pervardysite administratoriaus katalogą ir tą naują pavadinimą įdėsite čia. Pavyzdžiui, <em>esetadmin</em>. Taip bus ištaisyti administratoriaus saitai „Eset“.';
$string['pathssubdataroot'] = 'Reikalinga vieta, kur „Eset“ galėtų saugoti įkeltus failus. Iš šio katalogo turi galėti skaityti IR Į JĮ  ĮRAŠYTI žiniatinklio serverio naudotojas (paprastai „nobody“ arba „apache“), bet jis neturi būti tiesiogiai pasiekiamas per žiniatinklį. Diegimo programa bandys jį sukurti, jei jo dar nėra.';
$string['pathssubdirroot'] = 'Visas „Eset“ diegimo katalogo kelias.';
$string['pathssubwwwroot'] = 'Visas žiniatinklio adresas, kur bus galima pasiekti „Eset“. „Eset“ negalima pasiekti naudojant kelis adresus. Jei jūsų svetainė turi kelis viešuosius adresus, turite nustatyti nuolatinį peradresavimą iš jų visų, išskyrus šį vieną. Jei svetainę galima pasiekti tiek iš intraneto, tiek iš interneto, čia naudokite viešąjį adresą ir nustatykite DNS, kad intraneto naudotojai taip pat galėtų naudoti viešąjį adresą. Jei adresas klaidingas, naršyklėje pakeiskite URL, kad pakartotinai paleidus diegti būtų naudojama kita reikšmė.';
$string['pathsunsecuredataroot'] = 'Šakninio duomenų katalogo kelias nesaugus';
$string['pathswrongadmindir'] = 'Nėra administratoriaus katalogo';
$string['phpextension'] = '{$a} PHP plėtinys';
$string['phpversion'] = 'PHP versija';
$string['phpversionhelp'] = '<p>„Eset“ reikalauja, kad PHP versija būtų ne žemesnė 5.6.5 arba 7.1 (7.0.x versijoje yra tam tikrų trūkumų).</p>
<p>Dabar naudojate versiją {$a}</p>
<p>Turite atnaujinti PHP versiją arba perkelti į pagrindinį kompiuterį, kuriame veikia naujesnė PHP versija.</p>';
$string['welcomep10'] = '{$a->installername} ({$a->installerversion})';
$string['welcomep20'] = 'Matote šį puslapį, nes į kompiuterį sėkmingai įdiegėte ir paleidote <strong>{$a->packname} {$a->packversion}</strong> paketą. Sveikiname!';
$string['welcomep30'] = 'Šiame <strong>{$a->installername}</strong> leidime yra taikomosios programos, skirtos aplinkai, kurioje veiks <strong>Eset</strong>, sukurti:';
$string['welcomep40'] = 'Pakete taip pat yra <strong>Eset {$a->esetrelease} ({$a->esetversion})</strong>.';
$string['welcomep50'] = 'Visoms šio paketo taikomosioms programoms taikomos atitinkamos licencijos. Visas <strong>{$a->installername}</strong> paketas yra <a href="http://www.opensource.org/docs/definition_plain.html">atvirojo kodo</a> ir platinamas pagal <a href="http://www.gnu.org/copyleft/gpl.html">GPL</a> licenciją.';
$string['welcomep60'] = 'Šiuose puslapiuose bus pateikta keletas paprastų veiksmų, kad būtų galima sukonfigūruoti ir nustatyti <strong>Eset</strong> kompiuteryje. Galite priimti numatytuosius parametrus arba pasirinktinai juos pakeisti, kad atitiktų jūsų poreikius.';
$string['welcomep70'] = 'Norėdami tęsti <strong>Eset</strong> sąranką, spustelėkite žemiau esantį mygtuką Kitas.';
$string['wwwroot'] = 'Žiniatinklio adresas';
