<?php  
// Created by yudha tira pamungkas

function get($url = null, $headers = null) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	if ($headers != "") {
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	}

	return $result = curl_exec($ch);
	curl_close($ch);
}


function create_netflix() {
	$name_fake = get('https://name-fake.com/id_ID');
	preg_match('/<div class="subj_div_45g45gg" id="copy1">(.*?)<\/div>/s', $name_fake, $name);
	preg_match('/<div id="copy4">(.*?)<\/div>/s', $name_fake, $email);


	$register = get('http://api.ydcode.team/netflix.php?email='.$email[1].'&password=yudhagans');

	if ($register == "0") {
		echo $data = "[+] Success create account | ".$email[1]." | yudhagans\n";
		$fh = fopen("result_netflix.txt", "a");
        fwrite($fh, $data);
        fclose($fh);
	} else {
		echo "[!] Something wrong\n";
	}
}


echo "Netflix Account Creator\n";
echo "Created by https://www.facebook.com/yudha.t.pamungkas.3\n";
echo "How many u want to create? ";
$banyak = trim(fgets(STDIN));
for ($i = 0; $i < $banyak ; $i++) {
	create_netflix();
}
echo "Result save in result_netflix.txt\n";


?>
