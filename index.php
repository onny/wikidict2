<?php
  include('includes/lang/en.php');
  if(isset($_GET['from'])) {
	  if(isset($languageCodes[$_GET['from']])){
		  $from = $_GET['from'];
	  }
  } else {
	  // passed language code is not correct, lets fallback
	  // to the default 
	  $from = "en";
  }
  if(isset($_GET['to'])) {
	  if(isset($languageCodes[$_GET['to']])){
		  $to = $_GET['to'];
	  }
  } else {
	  // passed language code is not correct, lets fallback
	  // to the default 
	  $to = "de";
  }
  if(isset($_GET['q'])){
	  $q = $_GET['q'];
  } else {
	  $q = "";
  }
?> 
<!doctype html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="HandheldFriendly" content="true" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

	<script type='text/javascript' src='js/jquery-1.10.2.min.js'></script>
	<script type='text/javascript' src='js/base.js'></script>
	<script type='text/javascript' src="js/jquery-ui-1.10.3.custom.min.js"></script>
	<script type='text/javascript' src="js/jquery.cookie.js"></script>
        <script src="js/msdropdown/jquery.dd.min.js" type="text/javascript"></script>

	<link rel="stylesheet" type="text/css" href="css/msdropdown/dd.css" />
	<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.9.2.custom.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/msdropdown/flags.css">

	<link id="opensearch" title="WikiDict.cc en-de" type="application/opensearchdescription+xml" rel="search" href="includes/opensearch.php?from=en&amp;to=de">
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="copyright" href="//creativecommons.org/licenses/by-sa/3.0/">
	<link rel="copyright" href="//www.gnu.org/copyleft/fdl.html">
	<link rel="license" href="//creativecommons.org/licenses/by-sa/3.0/">
	<link rel="license" href="//www.gnu.org/copyleft/fdl.html">
	<title>WikiDict.cc</title>
</head>
<body>
<header>
  <a href="javascript:article('');"><h1>WikiDict.cc</h1></a> <!-- FIXME to ajax -->
  <ul>
    <li><a href="javascript:article('downloads');">Downloads</a></li>
    <li><a href="javascript:article('about');">About</a></li>
  </ul>
</header>
<div id=subpage>
</div>
<div id=container>
  <div id="placeholder">
  </div>
  <section>
  <form id="form" class="form-inline">
    <div id="search">
      <input type="search" id="word" value="<?=$q?>" placeholder="Text to translate ..." autofocus required>
    </div>
  <p id=note>This site is under heavy developement and just a tech preview. Some features might be still missing. <a href="#" onclick="$('#note').fadeOut('slow');"><img src=img/note_close.png class="fadeIn"></a>
  </p>

  <div class="translate">
  <table id=result>
  <thead>
    <tr><th>
      <select name="from" id="from" tabindex="-1">
	<!-- FIXME <?php
	foreach ($languageCodes as $key => $value)
	  if($key == $from) { 
	    echo "<option selected='selected' value='".$key."'>".$value." (".$key.")</option>";
	  } else {
	    echo "<option value='".$key."'>".$value." (".$key.")</option>";
	  }
	?> -->
	<option value='ab' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ab" data-title="Abkhazian">Abkhazian</option>
	<option value='aa' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag aa" data-title="Afar">Afar</option>
	<option value='af' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag af" data-title="Afrikaans">Afrikaans</option>
	<option value='ak' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ak" data-title="Akan">Akan</option>
	<option value='sq' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag sq" data-title="Albanian">Albanian</option>
	<option value='am' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag am" data-title="Amharic">Amharic</option>
	<option value='ar' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ar" data-title="Arabic">Arabic</option>
	<option value='an' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag an" data-title="Aragonese">Aragonese</option>
	<option value='hy' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag hy" data-title="Armenian">Armenian</option>
	<option value='as' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag as" data-title="Assamese">Assamese</option>
	<option value='av' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag av" data-title="Avaric">Avaric</option>
	<option value='ae' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ae" data-title="Avestan">Avestan</option>
	<option value='ay' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ay" data-title="Aymara">Aymara</option>
	<option value='az' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag az" data-title="Azerbaijani">Azerbaijani</option>
	<option value='bm' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag bm" data-title="Bambara">Bambara</option>
	<option value='ba' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ba" data-title="Bashkir">Bashkir</option>
	<option value='eu' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag eu" data-title="Basque">Basque</option>
	<option value='be' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag be" data-title="Belarusian">Belarusian</option>
	<option value='bn' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag bn" data-title="Bengali">Bengali</option>
	<option value='bh' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag bh" data-title="Bihari">Bihari</option>
	<option value='bi' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag bi" data-title="Bislama">Bislama</option>
	<option value='bs' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag bs" data-title="Bosnian">Bosnian</option>
	<option value='br' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag br" data-title="Breton">Breton</option>
	<option value='bg' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag bg" data-title="Bulgarian">Bulgarian</option>
	<option value='my' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag my" data-title="Burmese">Burmese</option>
	<option value='ca' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ca" data-title="Catalan">Catalan</option>
	<option value='ch' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ch" data-title="Chamorro">Chamorro</option>
	<option value='ce' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ce" data-title="Chechen">Chechen</option>
	<option value='ny' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ny" data-title="Chichewa">Chichewa</option>
	<option value='zh' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag zh" data-title="Chinese">Chinese</option>
	<option value='cu' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag cu" data-title="Church Slavic">Church Slavic</option>
	<option value='cv' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag cv" data-title="Chuvash">Chuvash</option>
	<option value='kw' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag kw" data-title="Cornish">Cornish</option>
	<option value='co' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag co" data-title="Corsican">Corsican</option>
	<option value='cr' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag cr" data-title="Cree">Cree</option>
	<option value='hr' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag hr" data-title="Croatian">Croatian</option>
	<option value='cs' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag cs" data-title="Czech">Czech</option>
	<option value='da' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag da" data-title="Danish">Danish</option>
	<option value='dv' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag dv" data-title="Divehi">Divehi</option>
	<option value='nl' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag nl" data-title="Dutch">Dutch</option>
	<option value='dz' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag dz" data-title="Dzongkha">Dzongkha</option>
	<option value='en' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag en" data-title="English">English</option>
	<option value='eo' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag eo" data-title="Esperanto">Esperanto</option>
	<option value='et' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag et" data-title="Estonian">Estonian</option>
	<option value='ee' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ee" data-title="Ewe">Ewe</option>
	<option value='fo' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag fo" data-title="Faroese">Faroese</option>
	<option value='fj' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag fj" data-title="Fijian">Fijian</option>
	<option value='fi' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag fi" data-title="Finnish">Finnish</option>
	<option value='fr' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag fr" data-title="French">French</option>
	<option value='ff' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ff" data-title="Fulah">Fulah</option>
	<option value='gl' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag gl" data-title="Galician">Galician</option>
	<option value='lg' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag lg" data-title="Ganda">Ganda</option>
	<option value='ka' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ka" data-title="Georgian">Georgian</option>
	<option value='de' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag de" data-title="German">German</option>
	<option value='el' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag el" data-title="Greek">Greek</option>
	<option value='gn' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag gn" data-title="Guarani">Guarani</option>
	<option value='gu' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag gu" data-title="Gujarati">Gujarati</option>
	<option value='ht' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ht" data-title="Haitian">Haitian</option>
	<option value='ha' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ha" data-title="Hausa">Hausa</option>
	<option value='he' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag he" data-title="Hebrew">Hebrew</option>
	<option value='hz' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag hz" data-title="Herero">Herero</option>
	<option value='hi' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag hi" data-title="Hindi">Hindi</option>
	<option value='ho' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ho" data-title="Hiri Motu">Hiri Motu</option>
	<option value='hu' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag hu" data-title="Hungarian">Hungarian</option>
	<option value='is' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag is" data-title="Icelandic">Icelandic</option>
	<option value='io' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag io" data-title="Ido">Ido</option>
	<option value='ig' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ig" data-title="Igbo">Igbo</option>
	<option value='id' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag id" data-title="Indonesian">Indonesian</option>
	<option value='ia' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ia" data-title="Interlingua">Interlingua</option>
	<option value='ie' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ie" data-title="Interlingue">Interlingue</option>
	<option value='iu' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag iu" data-title="Inuktitut">Inuktitut</option>
	<option value='ik' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ik" data-title="Inupiaq">Inupiaq</option>
	<option value='ga' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ga" data-title="Irish">Irish</option>
	<option value='it' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag it" data-title="Italian">Italian</option>
	<option value='ja' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ja" data-title="Japanese">Japanese</option>
	<option value='jv' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag jv" data-title="Javanese">Javanese</option>
	<option value='kl' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag kl" data-title="Kalaallisut">Kalaallisut</option>
	<option value='kn' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag kn" data-title="Kannada">Kannada</option>
	<option value='kr' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag kr" data-title="Kanuri">Kanuri</option>
	<option value='ks' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ks" data-title="Kashmiri">Kashmiri</option>
	<option value='kk' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag kk" data-title="Kazakh">Kazakh</option>
	<option value='km' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag km" data-title="Khmer">Khmer</option>
	<option value='ki' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ki" data-title="Kikuyu">Kikuyu</option>
	<option value='rw' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag rw" data-title="Kinyarwanda">Kinyarwanda</option>
	<option value='ky' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ky" data-title="Kirghiz">Kirghiz</option>
	<option value='rn' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag rn" data-title="Kirundi">Kirundi</option>
	<option value='kv' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag kv" data-title="Komi">Komi</option>
	<option value='kg' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag kg" data-title="Kongo">Kongo</option>
	<option value='ko' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ko" data-title="Korean">Korean</option>
	<option value='ku' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ku" data-title="Kurdish">Kurdish</option>
	<option value='kj' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag kj" data-title="Kwanyama">Kwanyama</option>
	<option value='lo' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag lo" data-title="Lao">Lao</option>
	<option value='la' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag la" data-title="Latin">Latin</option>
	<option value='lv' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag lv" data-title="Latvian">Latvian</option>
	<option value='li' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag li" data-title="Limburgish">Limburgish</option>
	<option value='ln' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ln" data-title="Lingala">Lingala</option>
	<option value='lt' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag lt" data-title="Lithuanian">Lithuanian</option>
	<option value='lu' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag lu" data-title="Luba-Katanga">Luba-Katanga</option>
	<option value='lb' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag lb" data-title="Luxembourgish">Luxembourgish</option>
	<option value='mk' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag mk" data-title="Macedonian">Macedonian</option>
	<option value='mg' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag mg" data-title="Malagasy">Malagasy</option>
	<option value='ms' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ms" data-title="Malay">Malay</option>
	<option value='ml' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ml" data-title="Malayalam">Malayalam</option>
	<option value='mt' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag mt" data-title="Maltese">Maltese</option>
	<option value='gv' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag gv" data-title="Manx">Manx</option>
	<option value='mi' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag mi" data-title="Maori">Maori</option>
	<option value='mr' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag mr" data-title="Marathi">Marathi</option>
	<option value='mh' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag mh" data-title="Marshallese">Marshallese</option>
	<option value='mn' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag mn" data-title="Mongolian">Mongolian</option>
	<option value='na' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag na" data-title="Nauru">Nauru</option>
	<option value='nv' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag nv" data-title="Navajo">Navajo</option>
	<option value='ng' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ng" data-title="Ndonga">Ndonga</option>
	<option value='ne' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ne" data-title="Nepali">Nepali</option>
	<option value='nd' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag nd" data-title="North Ndebele">North Ndebele</option>
	<option value='se' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag se" data-title="Northern Sami">Northern Sami</option>
	<option value='no' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag no" data-title="Norwegian">Norwegian</option>
	<option value='nb' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag nb" data-title="Norwegian Bokmal">Norwegian Bokmal</option>
	<option value='nn' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag nn" data-title="Norwegian Nynorsk">Norwegian Nynorsk</option>
	<option value='oc' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag oc" data-title="Occitan">Occitan</option>
	<option value='oj' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag oj" data-title="Ojibwa">Ojibwa</option>
	<option value='or' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag or" data-title="Oriya">Oriya</option>
	<option value='om' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag om" data-title="Oromo">Oromo</option>
	<option value='os' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag os" data-title="Ossetian">Ossetian</option>
	<option value='pi' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag pi" data-title="Pali">Pali</option>
	<option value='pa' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag pa" data-title="Panjabi">Panjabi</option>
	<option value='ps' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ps" data-title="Pashto">Pashto</option>
	<option value='fa' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag fa" data-title="Persian">Persian</option>
	<option value='pl' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag pl" data-title="Polish">Polish</option>
	<option value='pt' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag pt" data-title="Portuguese">Portuguese</option>
	<option value='qu' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag qu" data-title="Quechua">Quechua</option>
	<option value='rm' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag rm" data-title="Raeto-Romance">Raeto-Romance</option>
	<option value='ro' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ro" data-title="Romanian">Romanian</option>
	<option value='ru' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ru" data-title="Russian">Russian</option>
	<option value='sm' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag sm" data-title="Samoan">Samoan</option>
	<option value='sg' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag sg" data-title="Sango">Sango</option>
	<option value='sa' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag sa" data-title="Sanskrit">Sanskrit</option>
	<option value='sc' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag sc" data-title="Sardinian">Sardinian</option>
	<option value='gd' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag gd" data-title="Scottish Gaelic">Scottish Gaelic</option>
	<option value='sr' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag sr" data-title="Serbian">Serbian</option>
	<option value='sn' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag sn" data-title="Shona">Shona</option>
	<option value='ii' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ii" data-title="Sichuan Yi">Sichuan Yi</option>
	<option value='sd' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag sd" data-title="Sindhi">Sindhi</option>
	<option value='si' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag si" data-title="Sinhala">Sinhala</option>
	<option value='sk' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag sk" data-title="Slovak">Slovak</option>
	<option value='sl' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag sl" data-title="Slovenian">Slovenian</option>
	<option value='so' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag so" data-title="Somali">Somali</option>
	<option value='nr' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag nr" data-title="South Ndebele">South Ndebele</option>
	<option value='st' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag st" data-title="Southern Sotho">Southern Sotho</option>
	<option value='es' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag es" data-title="Spanish">Spanish</option>
	<option value='su' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag su" data-title="Sundanese">Sundanese</option>
	<option value='sw' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag sw" data-title="Swahili">Swahili</option>
	<option value='ss' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ss" data-title="Swati">Swati</option>
	<option value='sv' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag sv" data-title="Swedish">Swedish</option>
	<option value='tl' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag tl" data-title="Tagalog">Tagalog</option>
	<option value='ty' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ty" data-title="Tahitian">Tahitian</option>
	<option value='tg' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag tg" data-title="Tajik">Tajik</option>
	<option value='ta' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ta" data-title="Tamil">Tamil</option>
	<option value='tt' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag tt" data-title="Tatar">Tatar</option>
	<option value='te' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag te" data-title="Telugu">Telugu</option>
	<option value='th' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag th" data-title="Thai">Thai</option>
	<option value='bo' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag bo" data-title="Tibetan">Tibetan</option>
	<option value='ti' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ti" data-title="Tigrinya">Tigrinya</option>
	<option value='to' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag to" data-title="Tonga">Tonga</option>
	<option value='ts' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ts" data-title="Tsonga">Tsonga</option>
	<option value='tn' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag tn" data-title="Tswana">Tswana</option>
	<option value='tr' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag tr" data-title="Turkish">Turkish</option>
	<option value='tk' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag tk" data-title="Turkmen">Turkmen</option>
	<option value='tw' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag tw" data-title="Twi">Twi</option>
	<option value='ug' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ug" data-title="Uighur">Uighur</option>
	<option value='uk' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag uk" data-title="Ukrainian">Ukrainian</option>
	<option value='ur' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ur" data-title="Urdu">Urdu</option>
	<option value='uz' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag uz" data-title="Uzbek">Uzbek</option>
	<option value='ve' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ve" data-title="Venda">Venda</option>
	<option value='vi' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag vi" data-title="Vietnamese">Vietnamese</option>
	<option value='vo' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag vo" data-title="Volapuk">Volapuk</option>
	<option value='wa' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag wa" data-title="Walloon">Walloon</option>
	<option value='cy' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag cy" data-title="Welsh">Welsh</option>
	<option value='fy' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag fy" data-title="Western Frisian">Western Frisian</option>
	<option value='wo' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag wo" data-title="Wolof">Wolof</option>
	<option value='xh' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag xh" data-title="Xhosa">Xhosa</option>
	<option value='yi' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag yi" data-title="Yiddish">Yiddish</option>
	<option value='yo' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag yo" data-title="Yoruba">Yoruba</option>
	<option value='za' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag za" data-title="Zhuang">Zhuang</option>
	<option value='zu' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag zu" data-title="Zulu">Zulu</option>
      </select>
    </th><th>
      <select name="to" id="to" tabindex="-1">
	<!-- FIXME <?php
	foreach ($languageCodes as $key => $value)
	  if($key == $from) { 
	    echo "<option selected='selected' value='".$key."'>".$value." (".$key.")</option>";
	  } else {
	    echo "<option value='".$key."'>".$value." (".$key.")</option>";
	  }
	?> -->
	<option value='ab' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ab" data-title="Abkhazian">Abkhazian</option>
	<option value='aa' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag aa" data-title="Afar">Afar</option>
	<option value='af' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag af" data-title="Afrikaans">Afrikaans</option>
	<option value='ak' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ak" data-title="Akan">Akan</option>
	<option value='sq' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag sq" data-title="Albanian">Albanian</option>
	<option value='am' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag am" data-title="Amharic">Amharic</option>
	<option value='ar' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ar" data-title="Arabic">Arabic</option>
	<option value='an' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag an" data-title="Aragonese">Aragonese</option>
	<option value='hy' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag hy" data-title="Armenian">Armenian</option>
	<option value='as' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag as" data-title="Assamese">Assamese</option>
	<option value='av' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag av" data-title="Avaric">Avaric</option>
	<option value='ae' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ae" data-title="Avestan">Avestan</option>
	<option value='ay' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ay" data-title="Aymara">Aymara</option>
	<option value='az' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag az" data-title="Azerbaijani">Azerbaijani</option>
	<option value='bm' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag bm" data-title="Bambara">Bambara</option>
	<option value='ba' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ba" data-title="Bashkir">Bashkir</option>
	<option value='eu' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag eu" data-title="Basque">Basque</option>
	<option value='be' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag be" data-title="Belarusian">Belarusian</option>
	<option value='bn' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag bn" data-title="Bengali">Bengali</option>
	<option value='bh' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag bh" data-title="Bihari">Bihari</option>
	<option value='bi' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag bi" data-title="Bislama">Bislama</option>
	<option value='bs' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag bs" data-title="Bosnian">Bosnian</option>
	<option value='br' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag br" data-title="Breton">Breton</option>
	<option value='bg' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag bg" data-title="Bulgarian">Bulgarian</option>
	<option value='my' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag my" data-title="Burmese">Burmese</option>
	<option value='ca' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ca" data-title="Catalan">Catalan</option>
	<option value='ch' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ch" data-title="Chamorro">Chamorro</option>
	<option value='ce' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ce" data-title="Chechen">Chechen</option>
	<option value='ny' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ny" data-title="Chichewa">Chichewa</option>
	<option value='zh' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag zh" data-title="Chinese">Chinese</option>
	<option value='cu' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag cu" data-title="Church Slavic">Church Slavic</option>
	<option value='cv' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag cv" data-title="Chuvash">Chuvash</option>
	<option value='kw' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag kw" data-title="Cornish">Cornish</option>
	<option value='co' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag co" data-title="Corsican">Corsican</option>
	<option value='cr' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag cr" data-title="Cree">Cree</option>
	<option value='hr' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag hr" data-title="Croatian">Croatian</option>
	<option value='cs' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag cs" data-title="Czech">Czech</option>
	<option value='da' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag da" data-title="Danish">Danish</option>
	<option value='dv' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag dv" data-title="Divehi">Divehi</option>
	<option value='nl' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag nl" data-title="Dutch">Dutch</option>
	<option value='dz' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag dz" data-title="Dzongkha">Dzongkha</option>
	<option value='en' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag en" data-title="English">English</option>
	<option value='eo' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag eo" data-title="Esperanto">Esperanto</option>
	<option value='et' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag et" data-title="Estonian">Estonian</option>
	<option value='ee' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ee" data-title="Ewe">Ewe</option>
	<option value='fo' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag fo" data-title="Faroese">Faroese</option>
	<option value='fj' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag fj" data-title="Fijian">Fijian</option>
	<option value='fi' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag fi" data-title="Finnish">Finnish</option>
	<option value='fr' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag fr" data-title="French">French</option>
	<option value='ff' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ff" data-title="Fulah">Fulah</option>
	<option value='gl' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag gl" data-title="Galician">Galician</option>
	<option value='lg' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag lg" data-title="Ganda">Ganda</option>
	<option value='ka' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ka" data-title="Georgian">Georgian</option>
	<option value='de' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag de" data-title="German">German</option>
	<option value='el' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag el" data-title="Greek">Greek</option>
	<option value='gn' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag gn" data-title="Guarani">Guarani</option>
	<option value='gu' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag gu" data-title="Gujarati">Gujarati</option>
	<option value='ht' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ht" data-title="Haitian">Haitian</option>
	<option value='ha' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ha" data-title="Hausa">Hausa</option>
	<option value='he' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag he" data-title="Hebrew">Hebrew</option>
	<option value='hz' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag hz" data-title="Herero">Herero</option>
	<option value='hi' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag hi" data-title="Hindi">Hindi</option>
	<option value='ho' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ho" data-title="Hiri Motu">Hiri Motu</option>
	<option value='hu' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag hu" data-title="Hungarian">Hungarian</option>
	<option value='is' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag is" data-title="Icelandic">Icelandic</option>
	<option value='io' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag io" data-title="Ido">Ido</option>
	<option value='ig' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ig" data-title="Igbo">Igbo</option>
	<option value='id' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag id" data-title="Indonesian">Indonesian</option>
	<option value='ia' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ia" data-title="Interlingua">Interlingua</option>
	<option value='ie' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ie" data-title="Interlingue">Interlingue</option>
	<option value='iu' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag iu" data-title="Inuktitut">Inuktitut</option>
	<option value='ik' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ik" data-title="Inupiaq">Inupiaq</option>
	<option value='ga' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ga" data-title="Irish">Irish</option>
	<option value='it' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag it" data-title="Italian">Italian</option>
	<option value='ja' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ja" data-title="Japanese">Japanese</option>
	<option value='jv' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag jv" data-title="Javanese">Javanese</option>
	<option value='kl' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag kl" data-title="Kalaallisut">Kalaallisut</option>
	<option value='kn' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag kn" data-title="Kannada">Kannada</option>
	<option value='kr' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag kr" data-title="Kanuri">Kanuri</option>
	<option value='ks' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ks" data-title="Kashmiri">Kashmiri</option>
	<option value='kk' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag kk" data-title="Kazakh">Kazakh</option>
	<option value='km' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag km" data-title="Khmer">Khmer</option>
	<option value='ki' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ki" data-title="Kikuyu">Kikuyu</option>
	<option value='rw' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag rw" data-title="Kinyarwanda">Kinyarwanda</option>
	<option value='ky' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ky" data-title="Kirghiz">Kirghiz</option>
	<option value='rn' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag rn" data-title="Kirundi">Kirundi</option>
	<option value='kv' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag kv" data-title="Komi">Komi</option>
	<option value='kg' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag kg" data-title="Kongo">Kongo</option>
	<option value='ko' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ko" data-title="Korean">Korean</option>
	<option value='ku' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ku" data-title="Kurdish">Kurdish</option>
	<option value='kj' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag kj" data-title="Kwanyama">Kwanyama</option>
	<option value='lo' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag lo" data-title="Lao">Lao</option>
	<option value='la' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag la" data-title="Latin">Latin</option>
	<option value='lv' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag lv" data-title="Latvian">Latvian</option>
	<option value='li' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag li" data-title="Limburgish">Limburgish</option>
	<option value='ln' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ln" data-title="Lingala">Lingala</option>
	<option value='lt' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag lt" data-title="Lithuanian">Lithuanian</option>
	<option value='lu' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag lu" data-title="Luba-Katanga">Luba-Katanga</option>
	<option value='lb' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag lb" data-title="Luxembourgish">Luxembourgish</option>
	<option value='mk' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag mk" data-title="Macedonian">Macedonian</option>
	<option value='mg' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag mg" data-title="Malagasy">Malagasy</option>
	<option value='ms' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ms" data-title="Malay">Malay</option>
	<option value='ml' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ml" data-title="Malayalam">Malayalam</option>
	<option value='mt' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag mt" data-title="Maltese">Maltese</option>
	<option value='gv' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag gv" data-title="Manx">Manx</option>
	<option value='mi' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag mi" data-title="Maori">Maori</option>
	<option value='mr' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag mr" data-title="Marathi">Marathi</option>
	<option value='mh' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag mh" data-title="Marshallese">Marshallese</option>
	<option value='mn' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag mn" data-title="Mongolian">Mongolian</option>
	<option value='na' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag na" data-title="Nauru">Nauru</option>
	<option value='nv' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag nv" data-title="Navajo">Navajo</option>
	<option value='ng' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ng" data-title="Ndonga">Ndonga</option>
	<option value='ne' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ne" data-title="Nepali">Nepali</option>
	<option value='nd' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag nd" data-title="North Ndebele">North Ndebele</option>
	<option value='se' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag se" data-title="Northern Sami">Northern Sami</option>
	<option value='no' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag no" data-title="Norwegian">Norwegian</option>
	<option value='nb' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag nb" data-title="Norwegian Bokmal">Norwegian Bokmal</option>
	<option value='nn' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag nn" data-title="Norwegian Nynorsk">Norwegian Nynorsk</option>
	<option value='oc' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag oc" data-title="Occitan">Occitan</option>
	<option value='oj' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag oj" data-title="Ojibwa">Ojibwa</option>
	<option value='or' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag or" data-title="Oriya">Oriya</option>
	<option value='om' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag om" data-title="Oromo">Oromo</option>
	<option value='os' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag os" data-title="Ossetian">Ossetian</option>
	<option value='pi' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag pi" data-title="Pali">Pali</option>
	<option value='pa' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag pa" data-title="Panjabi">Panjabi</option>
	<option value='ps' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ps" data-title="Pashto">Pashto</option>
	<option value='fa' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag fa" data-title="Persian">Persian</option>
	<option value='pl' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag pl" data-title="Polish">Polish</option>
	<option value='pt' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag pt" data-title="Portuguese">Portuguese</option>
	<option value='qu' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag qu" data-title="Quechua">Quechua</option>
	<option value='rm' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag rm" data-title="Raeto-Romance">Raeto-Romance</option>
	<option value='ro' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ro" data-title="Romanian">Romanian</option>
	<option value='ru' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ru" data-title="Russian">Russian</option>
	<option value='sm' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag sm" data-title="Samoan">Samoan</option>
	<option value='sg' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag sg" data-title="Sango">Sango</option>
	<option value='sa' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag sa" data-title="Sanskrit">Sanskrit</option>
	<option value='sc' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag sc" data-title="Sardinian">Sardinian</option>
	<option value='gd' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag gd" data-title="Scottish Gaelic">Scottish Gaelic</option>
	<option value='sr' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag sr" data-title="Serbian">Serbian</option>
	<option value='sn' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag sn" data-title="Shona">Shona</option>
	<option value='ii' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ii" data-title="Sichuan Yi">Sichuan Yi</option>
	<option value='sd' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag sd" data-title="Sindhi">Sindhi</option>
	<option value='si' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag si" data-title="Sinhala">Sinhala</option>
	<option value='sk' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag sk" data-title="Slovak">Slovak</option>
	<option value='sl' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag sl" data-title="Slovenian">Slovenian</option>
	<option value='so' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag so" data-title="Somali">Somali</option>
	<option value='nr' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag nr" data-title="South Ndebele">South Ndebele</option>
	<option value='st' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag st" data-title="Southern Sotho">Southern Sotho</option>
	<option value='es' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag es" data-title="Spanish">Spanish</option>
	<option value='su' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag su" data-title="Sundanese">Sundanese</option>
	<option value='sw' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag sw" data-title="Swahili">Swahili</option>
	<option value='ss' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ss" data-title="Swati">Swati</option>
	<option value='sv' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag sv" data-title="Swedish">Swedish</option>
	<option value='tl' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag tl" data-title="Tagalog">Tagalog</option>
	<option value='ty' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ty" data-title="Tahitian">Tahitian</option>
	<option value='tg' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag tg" data-title="Tajik">Tajik</option>
	<option value='ta' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ta" data-title="Tamil">Tamil</option>
	<option value='tt' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag tt" data-title="Tatar">Tatar</option>
	<option value='te' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag te" data-title="Telugu">Telugu</option>
	<option value='th' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag th" data-title="Thai">Thai</option>
	<option value='bo' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag bo" data-title="Tibetan">Tibetan</option>
	<option value='ti' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ti" data-title="Tigrinya">Tigrinya</option>
	<option value='to' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag to" data-title="Tonga">Tonga</option>
	<option value='ts' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ts" data-title="Tsonga">Tsonga</option>
	<option value='tn' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag tn" data-title="Tswana">Tswana</option>
	<option value='tr' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag tr" data-title="Turkish">Turkish</option>
	<option value='tk' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag tk" data-title="Turkmen">Turkmen</option>
	<option value='tw' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag tw" data-title="Twi">Twi</option>
	<option value='ug' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ug" data-title="Uighur">Uighur</option>
	<option value='uk' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag uk" data-title="Ukrainian">Ukrainian</option>
	<option value='ur' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ur" data-title="Urdu">Urdu</option>
	<option value='uz' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag uz" data-title="Uzbek">Uzbek</option>
	<option value='ve' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag ve" data-title="Venda">Venda</option>
	<option value='vi' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag vi" data-title="Vietnamese">Vietnamese</option>
	<option value='vo' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag vo" data-title="Volapuk">Volapuk</option>
	<option value='wa' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag wa" data-title="Walloon">Walloon</option>
	<option value='cy' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag cy" data-title="Welsh">Welsh</option>
	<option value='fy' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag fy" data-title="Western Frisian">Western Frisian</option>
	<option value='wo' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag wo" data-title="Wolof">Wolof</option>
	<option value='xh' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag xh" data-title="Xhosa">Xhosa</option>
	<option value='yi' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag yi" data-title="Yiddish">Yiddish</option>
	<option value='yo' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag yo" data-title="Yoruba">Yoruba</option>
	<option value='za' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag za" data-title="Zhuang">Zhuang</option>
	<option value='zu' data-image="img/msdropdown/icons/blank.gif" data-imagecss="flag zu" data-title="Zulu">Zulu</option>
      </select>
    </th></tr>
  </thead>
  <tbody>
  <tr><td colspan="2"><p>Welcome to WikiDict.cc, the free and open online dictionary!</p></td></tr>
  </tbody>
  <tfoot style="display: none;"><tr><td colspan="4"><div id="paging"><ul><li><a href="#"><span>Previous</span></a></li><li><a href="#" class="active"><span>1</span></a></li><li><a href="#"><span>2</span></a></li><li><a href="#"><span>3</span></a></li><li><a href="#"><span>4</span></a></li><li><a href="#"><span>5</span></a></li><li><a href="#"><span>Next</span></a></li></ul></div></tr></tfoot>
</table>
</div>

  </form>

  </section>
  </div>
</body>
<?php 
	echo'<body onload="';
	if (isset($_GET['p'])) {
		echo 'showArticle(\''.$_GET['p'].'\');';
	} else {

	  	// Apply language settings from get parameter, if present.
	  	// Otherwise check cookies
		if(isset($_GET['from']) & isset($_GET['to'])){
		  	$from = $_GET['from'];
			$to = $_GET['to'];
			echo "$('#to').data('pre', '".$to."');";
			echo "$('#from').data('pre', '".$from."');";
			echo "$('#to').msDropdown().data('dd').set('value', '".$to."');";
			echo "$('#from').msDropdown().data('dd').set('value', '".$from."');";
			echo "$.cookie('from', '".$from."' , { expires: 7, path: '/' });";
			echo "$.cookie('to', '".$to."' , { expires: 7, path: '/' });";
			// Start translation if query string is present
			if ( isset($_GET['q']) ){
			  echo "$('#placeholder').hide();";
			  echo "$('form').submit()";
			}

	  	// Apply language settings from cookies, if present
		} else {
			if (isset($_COOKIE["from"]) & isset($_COOKIE["to"])) {
				$from = $_COOKIE["from"];
				$to = $_COOKIE["to"];
				echo "$('#to').data('pre', '".$to."');";
				echo "$('#from').data('pre', '".$from."');";
				echo "$('#to').msDropdown().data('dd').set('value', '".$to."');";
				echo "$('#from').msDropdown().data('dd').set('value', '".$from."');";
				// Start translation if query string is present
				if ( isset($_GET['q']) ){
				  echo "$('#placeholder').hide();";
				  echo "$('form').submit()";
				}
			}
		}
	}
	echo '">';
?>
</html>
