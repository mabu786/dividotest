<?php
$path    = './fixtures';
$files = scandir($path);
$files = array_diff(scandir($path), array('.', '..'));
$load_file='';
foreach($files as $file){
	// Read the JSON file 
	$json = file_get_contents('./fixtures/'.$file);
	// Decode the JSON file
	$json_data = json_decode($json,true);
	if(!is_array($json_data))
	{
		echo 'Invalid file : '.$file.'<br>';
	}else{
		if($json_data['environment'] == 'development')
		{
			$load_file = file_get_contents('./fixtures/'.$file);
		}elseif($json_data['environment'] == 'production'){
			$load_file = file_get_contents('./fixtures/'.$file);
		}
	}
}
echo $load_file;
?>