<?php
	if(!isset($_POST['base_img'])){
		die("{\"error\": \" Flopou. Cadê o base_img?\"}");
	}

	$result = [];
	$data = str_replace(" ","+",$_POST['base_img']); //O envio do dado pelo XMLHttpRequest tende a trocar o + por espaço, por isso a necessidade de substituir. 
	$name = md5(time().uniqid()); 
	$path = "snaps/{$name}.jpg";

	//data
	$data = explode(',', $data);
	
	//Save data
	file_put_contents($path, base64_decode(trim($data[1])));
	
	//Print Data
	$result['img'] = $path;
	echo json_encode($result, JSON_PRETTY_PRINT);
?>