<?php
ini_set("max_execution_time", 0);
include "fonksiyon.php";
//set_time_limit(60);


    // Xml Çıktı
$dom      = new DOMDocument('1.0', 'UTF-8');
// Elementler Konular İçin
 $tarihBas      = strtotime('15.11.2017'); // date Start
   $tarihSon      = strtotime('03.02.2018'); // date End
   $rastgeleTarih = rand($tarihBas, $tarihSon); // create random
   $atesle = date('d.m.Y H:i', $rastgeleTarih);
$ns0feed  = $dom->createElement('ns0:feed');
$ns0feed  ->setAttribute('xmlns:ns0', 'http://www.w3.org/2005/Atom');
$ns0tit   = $dom->createElement('ns0:title','BotPress');
$ns0tit   ->setAttribute('type', 'html');
$ns0gen   = $dom->createElement('ns0:generator','Blogger');
$ns0lin   = $dom->createElement('ns0:link');
$ns0lin   ->setAttribute('href', 'http://localhost/blog');
$ns0lin   ->setAttribute('rel','self');
$ns0lin   ->setAttribute('type','application/atom+xml');
$ns0lik   = $dom->createElement('ns0:link');
$ns0lik   ->setAttribute('href', 'http://localhost/blog');
$ns0lik   ->setAttribute('rel','alternate');
$ns0lik   ->setAttribute('type','text/html');
$ns0lup   = $dom->createElement('ns0:updated',$atesle);
// Childler
    $dom    ->appendChild($ns0feed);
    $ns0feed->appendChild($ns0tit);
    $ns0feed->appendChild($ns0gen);
    $ns0feed->appendChild($ns0lin);
    $ns0feed->appendChild($ns0lik);
    $ns0feed->appendChild($ns0lup);

    for ($k=1; $k<=1 ; $k++) { 

 if ($k==1) { 
     $url ="http://gamersonlinux.com/forum/forums/guides.20/"; }else { 
     $url = "http://gamersonlinux.com/forum/forums/guides.20/page-$k";
 }

  	$tmm = "http://gamersonlinux.com/forum/";
  	$site = "http://gamersonlinux.com/forum/forums/guides.20/";

$bag = Baglan($url);
preg_match_all('@<ol class="discussionListItems">(.*?)</ol>@si',$bag,$konular);


for ($i=0; $i <count($konular[1]) ; $i++) { preg_match_all( '@<h3 class="title">(.*?)</h3>@si',$konular[1][$i],$basliklar);  preg_match_all( '@<h3 class="title"><a href="(.*?)"(.*?)</h3>@si',$konular[1][$i],$linkler);  
$baslik= duzenle($basliklar[0]); 
$temizbas=preg_replace( '/<a href=\"(.*?)\">(.*?)<\/a>/', "\\2", $baslik); 

for ($z=0; $z<=7; $z++) {
    $linkbas=$tmm. '/'.$linkler[1][$z]; $bag= Baglan($linkbas); 
    preg_match_all( '@<div class="messageContent">(.*?)</div>@si',$bag,$icerik); 
    preg_match_all( '@<div class="titleBar"><h1>(.*?)</h1>@si',$bag,$baslik); 
   
   $tarihBas      = strtotime('15.11.2017'); // date Start
   $tarihSon      = strtotime('03.02.2018'); // date End
   $rastgeleTarih = rand($tarihBas, $tarihSon); // create random
   $atesle = date('d.m.Y H:i', $rastgeleTarih);
   
    $salla =$baslik[0][0]; 
    $sic   =$icerik[0][0]; 
 

$nsoentry = $dom->createElement('ns0:entry');
$nsocate  = $dom->createElement('ns0:category');
$nsocate  ->setAttribute('scheme', 'http://www.blogger.com/atom/ns#');
$nsocate  ->setAttribute('term','LinuxGames');
$nsocat   = $dom->createElement('ns0:category');
$nsocat   ->setAttribute('scheme', 'http://schemas.google.com/g/2005#kind');
$nsocat   ->setAttribute('term','http://schemas.google.com/blogger/2008/kind#post');
$nsid     = $dom->createElement('ns0:id','post-'.rasgeleKod());
$nsau     = $dom->createElement('ns0:author');
$nsak     = $dom->createElement('ns0:name','amdin');
$nsco     = $dom->createElement('ns0:content',strip_tags($sic));
$nsco     ->setAttribute('type', 'html');
$nspu     = $dom->createElement('ns0:published',$atesle);
$nsti     = $dom->createElement('ns0:title',strip_tags($salla));
$nsti     ->setAttribute('type', 'html');
$nsli     = $dom->createElement('ns0:link');
$nsli    ->setAttribute('href', 'http://localhost/blog/?p='.rasgeleKod().'');
$nsli    ->setAttribute('rel','self');
$nsli    ->setAttribute('type','application/atom+xml');
$nsil     = $dom->createElement('ns0:link');
$nsil    ->setAttribute('href', 'http://localhost/blog/?p='.rasgeleKod().'');
$nsil    ->setAttribute('rel','alternate');
$nsil    ->setAttribute('type','text/html');


    $ns0feed ->appendChild($nsoentry);
    $nsoentry->appendChild($nsocate);
    $nsoentry->appendChild($nsocat);
    $nsoentry->appendChild($nsid);
    $nsoentry->appendChild($nsau);
    $nsoentry ->appendChild($nsak);
    $nsoentry->appendChild($nsco);
    $nsoentry->appendChild($nspu);
    $nsoentry->appendChild($nsti);
    $nsoentry->appendChild($nsli);
    $nsoentry->appendChild($nsil);
   } 
        }
        
        }
$dom->formatOutput = true;
$dom->preserveWhiteSpace = false;
$xml = new SimpleXMLElement($dom->saveXML());
$xml->saveXML("simple_xml_create.xml");
header('content-type:text/xml');
echo $dom->saveXML();

       

?>
