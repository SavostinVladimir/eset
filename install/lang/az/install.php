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

$string['admindirname'] = 'Administrator kataloqu';
$string['availablelangs'] = 'Mümkün dillərin siyahısı';
$string['chooselanguagehead'] = 'Dili seçin';
$string['chooselanguagesub'] = 'İndi ancaq proqramın qurulması üçün dili seçin. İstifadəçi interfeysi üçün dili sonradan, qurulma prosesində seçmək olar.';
$string['cliinstallheader'] = 'Moodlun {$a} əmr sətri rejimində qurulma proqramı';
$string['databasehost'] = 'Verilənlər bazasının serveri';
$string['databasename'] = 'Verilənlər bazasının adı';
$string['databasetypehead'] = 'Verilənlər bazasının drayverini seçin';
$string['dataroot'] = 'Verilənlərin kataloqu';
$string['dbprefix'] = 'Cədvəllərin adlarının prefiksi';
$string['dirroot'] = 'Eset kataloqu';
$string['environmenthead'] = 'Mühitin yoxlanması...';
$string['environmentsub2'] = 'Moodlun hər versiyasında PHP-nin versiyasına minimal tələblər və PHP-nin mütləq olan genişlənmələrinin dəsti var.
Mühitin tam yoxlanılması hər quraşdırmadan və yenilənmədən əvvəl yerinə yetirilir.
Xahiş edirik ki, əgər yeni versiyanın necə qurulmasını və PHP genişlənməsinin əlavə edilməsini bilmirsinizsə administratora müraciət edin.';
$string['errorsinenvironment'] = 'Mühitin yoxlnılması yerinə yetirilmədi!';
$string['installation'] = 'Quraşdırma';
$string['langdownloaderror'] = 'Təəssüf ki,  "{$a}" dilini qurmaq mümkün olmadı. Quraşdırma prosesi ingilis dilində davam edəcək.';
$string['memorylimithelp'] = '<p>Sizin serverdə PHP-də yaddaşın məhdudlaşdırılması  {$a}-da qurulub.</p>

<p>Buna görə müəyyən müddətdən sonra yddaşla əlaqəli problemlər yarana bilər, xüsusən də Sizin çox sayda modullarınız və ya istifadəçiləriniz olarsa.</p>

<p>Biz məsləhət görürük ki, əgər mümkünsə PHP-də yaddaşın məhdudlaşdırılması üçün daha böyük qiymət götürəsiniz, məsələn, 40M.
   Bunu aşağıdakı üsullarla etmək olar:</p>
<ol>
<li>Əgər imkan varsa PHP-ni <i>--enable-memory-limit</i> açarı ilə kompilyasiya edin.
Bu halda Eset özü yaddaşa məhdudiyyət qoya bilir.</li>
<li>Əgər Sizin php.ini faylını redaktə etməyə icazəniz varsa, <b>memory_limit</b>parametrini nə iləsə 40M kimi dəyişmək olar. Əgər icazəniz yoxdursa, administratordan xahiş edə bilərsiniz.</li>
<li>Bəzi PHP serverlərində Eset kataloqunda .htaccess faylı yaratmaq və aşağıdakı sətri daxil etmək olar:
    <blockquote><div>php_value memory_limit 40M</div></blockquote>
    <p>Buna baxmayaraq bəzi serverlərdə buna görə PHP-nin<b>bütünl</b> səhifələrinin işi dayana bilər (Siz səhifələrdə səhvləri görəcəksiniz). Belə olan halda .htaccess  faylını silmək lazımdır.</p></li>
</ol>';
$string['paths'] = 'Yollar';
$string['pathserrcreatedataroot'] = 'Quraşdırma proqramı  ({$a->dataroot})  verilənlər kataloqunu yarada bilmir.';
$string['pathshead'] = 'Yolları təsdiq edin';
$string['pathsrodataroot'] = 'Verilənlər kataloquna yazmaq mükün deyil.';
$string['pathsroparentdataroot'] = '({$a->parent}) valideyn kataloquna yazmaq mümkün deyil. Quraşdırma proqramı  ({$a->dataroot})  verilənlər kataloqunu yarada bilmir.';
$string['pathssubadmindir'] = 'Veb-hostinqlərin sayı az olduqda yol/admin idarəetmə panelinə və ya digər bir yerə keçmək üçün xüsusi URL-dir. Təəssüf ki, bu Moodlun idarəetmə səhifələrinin standart mövqeyi ilə ziddiyyət təşkil edir. Bunu Eset kataloqunda admin qovluğunun adını dəyişməklə və burada yeni adı göstərməklə aradan qaldırmaq olar. Məsələn, <em>esetadmin</em>. Bu zaman Moodlun idarəetmə panelinə bütün keçidlər avtomatik olaraq dəyişir.';
$string['pathssubdataroot'] = 'Moodlun yüklənmiş faylları harada saxlayacağını mütləq göstərmək lazımdır  Veb-server istifadəçisinin (usually \'nobody\' or \'apache\') bu kataloqda oxuma və YAZMA üçün icazəsi olmalıdır, lakin bu zaman İnternetdən birbaşa müraciət mümkün ola bilməz. Əgər bu kataloq mövcud deyilsə, quraşdırma proqramı onu yaratmağa cəhd edir. ';
$string['pathssubdirroot'] = 'Moodlun quraşdırılması kataloquna tam yol';
$string['pathssubwwwroot'] = 'Moodla keçidin mümkün olduğu tam veb-ünvan.
Moodla keçid üçün bir neçə ünvandan istifadə etmək mümkün deyil. Əgər sizin saytın bir neçə açıq ünvanı varsa, siz həmişə bu ünvanlardan göstərilən ünvana keçidi təmin etməlisiniz.
əgəgr sizin sayta həm İnternetdən və həm də lokal şəbəkədən keçid mümkündürsə, burada ümumi ünvanı göstərin və DNS-i elə sazlayın ki, lokal istifadəçilər də bu ünvandan istifadə edə bilsin.
Əgər göstərilən ünvan düzgün deyilsə, quraşdırmanı digər qiymətlə yenidən başlamaq üçün brauzerin ünvan sətirində URL-i dəyişin.';
$string['pathsunsecuredataroot'] = 'Verilənlər kataloqunun mövqeyi təhlükəsizlik tələblərinə cavab vermir.';
$string['pathswrongadmindir'] = 'Admin kataloqu mövcud deyil';
$string['phpextension'] = '{$a} PHP  geniçlənməsi';
$string['phpversion'] = 'PHP versiyası';
$string['phpversionhelp'] = '<p>Eset üçün PHP-nin 4.3.0  və ondan yuxarı  və ya 5.1.0 və ondan yuxarı versiyaları(5.0.versiyasının bəzi problemləri məlumdur) lazımdır.</p>
<p>İndi Siz, {$a} versiyasından istifadə edirsiniz</p>
<p>Siz PHP-ni yeniləməlisiniz və ya PHP-nin daha yeni versiyası olan xostinqə keçməlisiniz!<br />
(5.0.x  verisyası olarsa 4.4.x versiyasına qayıda bilərsiniz)</p>';
$string['welcomep10'] = '{$a->installername} ({$a->installerversion})';
$string['welcomep20'] = 'Siz bu səhifəni ona görə görürsünüz ki, <strong>{$a->packname} {$a->packversion}</strong> proqram paketini öz kompyüterinizdə müvəffəqiyyətlə qurmusunuz. Təbrik edirik!';
$string['welcomep30'] = '<strong>{$a->installername}</strong>  proqram paketinin bu versiyasında <strong>Eset</strong>un işləyəcəyi mühiti yaratmaq üçün aşağıdakı proqramlar var:';
$string['welcomep40'] = 'Paketə həmçinin <strong>Eset {$a->esetrelease} ({$a->esetversion})</strong> daxildir.';
$string['welcomep50'] = 'Bu paketə daxil olan əlavələrdən istifadə edilmə ardıcıllığı, müvafiq lisenziyalarla müəyyən edilir. <strong>{$a->installername}</strong>  tam proqram paketi
 <a href="http://www.opensource.org/docs/definition_plain.html">mənbəni açır</a> və <a href="http://www.gnu.org/copyleft/gpl.html">GPL</a> lisenziyasının şərtlərinə uyğun olaraq yayılır.';
$string['welcomep60'] = 'Növbəti səhifələrdə Siz, bir neçə sadə addımla öz kompyüterinizdə <strong>Eset</strong>-un parametrlərini sazlaya və quraşdıra bilərsiniz. Siz sazlama parametrlərini susmaya görə qəbul edə və ya öz tələblərinizdən asılı olaraq dəyişə bilərsiniz.';
$string['welcomep70'] = '<strong>Eset</strong> quraşdırma prosesini davam etmək üçün "Növbəti" düyməsini sıxın.';
$string['wwwroot'] = 'Veb-ünvan';