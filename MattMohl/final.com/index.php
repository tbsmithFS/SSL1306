<?php

	$query = $_GET;

	if(empty($query['action'])) {
		$action = "default";
	}else {
		$action = $query['action'];
	}

	if($action == "default") {
		echo '<form action="?action=show_results" enctype="multipart/form-data" method="post">'.
				'<input type="text" name="phrase" placeholder="Enter Phrase">'.
				'<select name="lang">'.
					'<option value="fra">French</option>'.
					'<option value="spa">Spanish</option>'.
					'<option value="rus">Russian</option>'.
					'<option value="cmn">Chinese</option>'.
					'<option value="jpn">Japanese</option>'.
				'</select>'.
				'<input type="submit" value="Translate">'.
			'</form>';
	}else if($action == "show_results") {
		$form_data = $_POST;
		$dest = $form_data['lang'];
		$word = $form_data['phrase'];

		var_dump($form_data['phrase'], $form_data['lang']);

		$url = "http://glosbe.com/gapi/translate?from=eng&dest=".$dest."&format=json&phrase=".$word."&pretty=true";

		$contents = file_get_contents($url);

		$data = json_decode($contents);

		var_dump($data->tuc[0]->meanings[0]->text);

		if($data->result == "ok") {
			$word = $data->phrase;
			$transWord = $data->tuc[0]->phrase->text;
			$def = $data->tuc[0]->meanings[0]->text;
			$transLanguage = $data->dest;
			echo "<ul><li>Original Word: ".$word."</li>".
			"<li>To This Language: ".$transLanguage."</li>".
			"<li>Translated Word: ".$transWord."</li>".
			"<li>Definition: ".$def."</li>";

			include "DBConnector.php";
			$db = new DBConnector();

			$db->addData($word, $transWord, $def, $transLanguage);
		}else {
			echo "<p>Sorry, there were no results. Go back and try again";
		}
		
	};
?>