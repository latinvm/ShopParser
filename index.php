<?php

/* get configuration */
require_once 'config.inc.php';

/* CSV helper functions */
require_once 'back/csv.php';

$shop_test_url_array = array(
	'http://www.bartsmit.com/nl/bsnl/bart-smit-1/sint-knallers/lego-duplo-basisstenen-deluxe-6176-1',
	'http://www.intertoys.nl/zoomer-kitty',
	'http://www.blokker.nl/nl/blknl/philips-lumea-essential-ipl-sc1983-00',
	'http://www.speelgoedindeton.nl/houten_winkeltje/pinolino-shopt-lucy.html',
	'http://www.fonq.nl/product/born-in-sweden-vogelhuis-bird-feeder/45759/',
	'http://www.leenbakker.nl/banken-en-stoelen/banken/hoekbanken/hoekbank-ravenna',
	'https://www.conrad.nl/nl/raspberry-pi-model-b-512-mb-zonder-besturingssysteem-1227449.html?sc.ref=Homepage',
	'https://www.degrotespeelgoedwinkel.nl/bekende-tv-figuren/planes/ravensburger-spel-memory-en-puzzel-planes/',
	'http://www.vtwonen.nl/coming-kids-zanzi-slaaphut-90-x-200-cm-p134080.html',
	'http://www.greenjump.nl/Product/Slapen/Slaapzak/Baby-slaapzak-biologische-wol',
	'http://www.bax-shop.nl/externe-harde-schijf/transcend-1-tb-shockproof-externe-hdd-mobiel-usb3-0',
	'http://www.decathlon.nl/skibril-kinderen-one-flake-s2-id_8317564.html',
	'http://www.ikenik.nl/kidsdepot-tipi-tent-wieber-mint.html',
	'http://www.travelbags.nl/samsonite-ultracore-upright-55-black.html',
	'http://www.liesjeshoutenspeelgoed.nl/p.7762/voetbaltafels/speeltafels/voetbaltafels/voetbaltafel-euro-groot.html',
	'http://www.presentsathome.nl/woonaccessoires/kapstokken/wandhaakje-the-zoo-hert-zwart',
	'http://www.megagadgets.nl/sumo-wrestler.html',
	'http://www.bakker.com/nl-nl/p/eetbare-bloemen-gemengd-M40390',
	'http://vivara.nl/ctrl/product:945;/vivara_pindablokpakket',
	'https://www.meesterslijpers.nl/keukenartikelen/hand-en-voet-verzorging/manicure-pedicure-producten/borduurschaar-alpen',
	'http://knuffelparadijs.nl/product/10049792/speelgoed-clownsvis-knuffel-49-cm-knuffelparadijs.html',
    'https://www.boumanonline.nl/horloges/bell-ross-brs-black-matte-ceramic-brs-blc-mat-srb',
    'http://www.prijsvergelijk.nl/led-televisie/philips-led-televisie/philips-32pfk5300.html',
	'http://www.meerdanlicht.nl/philips-hue-white-and-color-starterpack-(3-e27-lampen-en-bridge-20)-8718696461693.html',
	'https://www.internet-sportclubs.com/18904-ado-den-haag-sticker-klein-10x12cm/',
	'http://www.yoursurprise.nl/kleding-bedrukken/slabbetjes?artikelcode=22011',
	'http://www.geboortexpress.nl/a-20070186/stoeltje-met-naam-en-van-geboortekaartje/stoeltje-met-naam-afbeelding-en-kussentje/',
    'http://www.allekabels.nl/usb-20-kabel/172/1145722/usb-20-koppelstuk.html',
	'https://all4running.nl/nathan-trail-mix-4625nb.html',
	'http://www.drogisterij.net/verzorging/gezichtsverzorging/mondverzorging/slechte_adem/mondwater/listerine-mondwater-coolmint-5010123664534',
	'https://www.jachensen.nl/herenkleding/jac-hensen-winterjas-modern-fit-blauw-9090-85-29.html',
    'http://www.kijkshop.nl/product/163368/trampoline/',
	'https://www.decopleinxxl.nl/klok-romance-wit-vierkant-61-cm',
	'https://www.gadgethouse.nl/xtorm-powerbank-essential-12000-p134120.html',
	'http://baby-schoenen.nl/shop/babyslofjes/382-winterboot-africa.html',
	'http://www.nedgame.nl/pc-gaming/rainbow-six-siege--inclusief-pre-order-dlc-/6458883564/',
	'https://www.athleteshop.nl/gopro-helm-voorkant-bevestiging',
	'http://www.kunstspiegel.nl/boriana-betaalbare-moderne-zwarte-lijst.html',
	'https://www.vidaxl.nl/veilingen/index/viewProduct/id/98298/hash/784f1d115ddb32b9cd4647702a626359/',
	'http://www.tui.nl/zonvakantie/portugal/algarve/albufeira/club-albufeira/?_smState=1$42_509_39875',
	'https://www.coolgift.com/en/Keyfinder',
	'http://vindiqoffice.com/memoblokken-en-schriften/memoblokken/gele-notes/5-star-re-move-notes-ft-76-x-76-mm/i/10594/',
	'http://score.nl/g-star-3301sl-firro-denim-wash-1111500078-a26.html',
	'https://www.superwinkel.nl/dagaanbieding.php',
	'http://stoerekindjes.nl/uv-baby-badpak/25-uv-baby-badpak-pink-white-stripes.html',
    'http://www.cameranu.nl/nl/p458254/nikon-d3200-dslr-zwart-18-55mm-vr-ii',
	'http://www.gestrikt.nl/cadeau-voor-hem/voor-hem-thuis/point-virgule-set-van-2-barbeque-handschoenen',
    'http://www.everybodycare.com/men-expert-hydra-energetic.html',
	'https://www.persempretoys.nl/joy-toy-kralentafel-flat-corner',
	'https://vanbeeklederwaren.nl/the-bag-6692.html',
	'http://www.cadeau.nl/whistle-keyfinder.html',
	'https://www.centralpoint.nl/notebooks-laptops/dell/chromebook-13-art-7310-6740-num-5237063/',
	'http://www.coolsound.nl/pioneer-se-mj502t-w-on-ear-hoofdtelefoon-wit/P58431',
	'http://www.albelli.nl/producten/fotoboek/vierkant-medium',
    'https://www.gezelschapsspellenshop.nl/p/identity-games-squla-familiebordspel/212443/',
	'http://www.gyzs.nl/bouwbeslag/deurbeslag/deurbellen/beldrukker-rond-rvs-35376.html',
	'http://www.livera.nl/homewear/badjas_128130#subcategory1seo=homewear',
	'http://www.beddengoed.com/baby-en-peuters/hiccupes-junior-dekbedovertrek-little-red',
	'https://nicebeauty.com/eu/ghd-iv-styler-classic.html',
	'http://www.verkleedklerenonline.nl/kerstvrouw-mini-kerstkleding-kind-p-3496.html?osCsid=9e31974a3701b86a3c509989aecc83c8',
	'http://bellatio.nl/product/10057546/spaarpot-orka-10-cm-speelgoed-diversen.html',
	'http://www.bagageonline.nl/samsonite-aeris-spinner-75-cielo-blue.html',
	'https://www.posters.nl/bamboe-bos',
	'http://bestel.nl/fotocamera-kookwekker',
    'https://www.alternate.nl/ASUS/STRIX-CLAW-optical-gaming-mouse/html/product/1155683?tk=6980&lk=7007',
	'http://www.voetbalshop.nl/under-armour-speedform-crm-fg-cpr.html',
	'http://www.ako.nl/product/9789023495338/playground/',
	'https://www.ditverzinjeniet.nl/waterproof-spa-lampje',
	'https://www.ffshoppen.nl/speelgoed/spellen-en-puzzels/takkie-kakkie/',
    'http://www.bestekeus.nl/product_info-n-Alecto_Babyfoon_DECT_DBX_69_Analoog_geen_dect_st-pId-227249-ref-fpspec.html',
	'http://www.medion.com/nl/shop/performance-laptops-medion-akoya-p6659-i5-laptop-30020343a1.html',
	'http://www.replacedirect.nl/product/p0112733/yanec-301-xl-kleur-hp.html',
	'http://www.kinderlampenwinkel.nl/product/33737/tafellamp-philips-disney-pulley-soft.html#.VmE9loRZ6PR',
	'http://www.bresser-online.nl/Webwinkel-Product-11362058/Bresser-Pirsch-20-60x80-+-Statief-9569.html',
	'http://webwinkel.vandale.nl/home/home-nl/1000-vergeetwoorden-om-te-koesteren.html',
	'http://www.mamzel.eu/nl/wonen/keuken/d/drinkfles-sport-devon-insulated/16084',
	'http://www.tuinadvies.nl/tuinwinkel/product/9339',
	'http://www.trendhopper.nl/hoektafel-newark.html',
	'http://www.schattigebabykleertjes.nl/dirkje-babykleding-broek-vintage-15568304.html',
	'http://www.bjornborg.com/nl/pelsa-fz-hoody',
	'http://www.kayasieraden.nl/en/mom-me-bracelets-infinity-key-to-your-heart.html',
	'https://www.internet-bikes.com/102859-troy-basic-bakfiets-26-inch-unisex-7v-v-brake-bruin/',
	'http://www.prachtigkado.nl/badjas-borduren-met-naam',
);

$logfile = 'parse.log';
$csvfile = 'report.csv';
$jsonfile = 'shops.json';

$shop_array = array();

$handle = fopen($csvfile,"r");
while ($data = fgetcsv($handle, 0, ',', '"')) {
    $shop_array[$data[5]] = array_map("utf8_encode", $data); //added
}
echo 'Shop array contains '.count($shop_array).' shops.'."\n";


$shops_configured = array();
foreach ($parserules as $domain => $parserule){

    // check if domain in test array
    $url = false;
    foreach ($shop_test_url_array as $test_url){
        if (stristr($test_url, $domain)){
            $url = $test_url;
            break;
        }
    }

    $output = '';
    if ($url){
        $parser = new parseSite($url,$parserules,$debug);
        $metadata_array = $parser->retrieve_metadata();
        if (isset($metadata_array['shop']) && isset($metadata_array['title']) && isset($metadata_array['image']) && isset($metadata_array['price'])) {
            $output .= sprintf("%-30s", $metadata_array['shop']);
            // check if shop has been accepted
            $accepted = false;
            foreach ($shop_array as $shop => $shop_settings){
                if (stristr($shop,$metadata_array['shop'])){
                    $accepted = true;
                    $shops_configured[$shop] = $shop_settings;
                }
            }

            if ($accepted === true){
                $output .= 'Accepted'."\n";
            } else {
                $output .= 'Not accepted, remove from config'."\n";
            }

            if (trim($metadata_array['title']) == '' || trim($metadata_array['image']) == '' || trim($metadata_array['price']) == ''){

            }

            $output .= "\t".'URL: '.$url."\n";

            if (trim($metadata_array['title']) != ''){
                $output .= "\t".'Title: '.$metadata_array['title']."\n";
            } else {
                $output .= "\t".'Title: missing!'."\n";
            }

            if (trim($metadata_array['image']) != ''){
                $output .= "\t".'Image: '.$metadata_array['image']."\n";
            } else {
                $output .= "\t".'Image: missing!'."\n";
            }

            if (trim($metadata_array['price']) != ''){
                $output .= "\t".'Price: '.$metadata_array['price']."\n";
            } else {
                $output .= "\t".'Price: missing!'."\n";
            }
        } else {
            $output .= 'Failed to parse '.$url."\n";
            if (isset($metadata_array['error'])){
                if ($metadata_array['error'] == '404' || $metadata_array['error'] == '403'){
                    $output .= 'Could not find page, please update test url'."\n";
                } else {
                    $output .= var_export($metadata_array,true)."\n";
                }
            }
        }

        unset($parser);
    } else {
        $output .= 'Could not find test url for domain '.$domain."\n";
    }

    $output .= "\n";

    file_put_contents($logfile, $output, FILE_APPEND | LOCK_EX);
    echo $output;
}

$shops_configured_json = json_encode($shops_configured, JSON_PRETTY_PRINT);
file_put_contents($jsonfile, $shops_configured_json, LOCK_EX);