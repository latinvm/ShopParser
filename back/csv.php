<?php

// Comparison function for sorting by count (descending)
function cmpCount($a, $b) {
    return $b['count'] - $a['count'];
}

// Read a CSV and return an array
function readCSV($file,$delimiter=';',$enclosure='"'){
	$array = array();

	if (($handle = fopen($file, "r")) !== FALSE) {
	    while (($data = fgetcsv($handle,0,"$delimiter","$enclosure")) !== FALSE) {
            $data = array_map("utf8_encode", $data); //added
	    	$array[] = $data;
	    }
	    fclose($handle);
	}

	return $array;
}

// autodetect and return CSV delimiters
function detectCSV($file){
    $delimiters = array(
        'comma'=>array('char'=>',','count'=>0),
        'semicolon'=>array('char'=>';','count'=>0)
    );

    $enclosures = array(
        'quote'=>array('char'=>'\'','count'=>0),
        'doublequote'=>array('char'=>"\"",'count'=>0)
    );

    $line_count = 0;

    $handle = fopen($file, "r") or exit("Unable to open file!");
    while(!feof($handle)) {
        $line = fgets($handle);
        foreach ($delimiters as $delimiter_key => $delimiter){
            if ($line != ''){
                $count_del = substr_count($line, $delimiter['char'], 0, strlen($line));
                $delimiters[$delimiter_key]['count'] += $count_del;
            }
        }

        foreach ($enclosures as $enclosure_key => $enclosure){
            if ($line != ''){
                $count_enc = substr_count($line, $enclosure['char'], 0, strlen($line));
                $enclosures[$enclosure_key]['count'] += $count_enc;
            }
        }

        $line_count++;
    }
    fclose($handle);

    uasort($delimiters, 'cmpCount');
    reset($delimiters);
    $selected_del = current($delimiters);
    $selected_delimiter = $selected_del['char'];

    uasort($enclosures, 'cmpCount');
    reset($enclosures);
    $selected_enc = current($enclosures);
    $selected_enclosure = $selected_enc['char'];

    return array('delimiter'=>$selected_delimiter,'enclosure'=>$selected_enclosure);
}
