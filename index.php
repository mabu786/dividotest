<?php
class Config{
	public function jsongetandremove(){
		$path    = './fixtures';
		//"scandir" is used to get all files in "fixtures" floder
		$files = scandir($path);
		//"array_diff" it results different values in the array.
		$files = array_diff(scandir($path), array('.', '..'));
		$load_file='';
		foreach($files as $file){
			//"file_get_contents" To Read the JSON file
			$json = file_get_contents('./fixtures/'.$file);
			//"json_decode" To Decode the JSON file
			$json_data = json_decode($json,true);
			//"is_array" If the array is set in the file it results valid otherwise invalid.
			if(!is_array($json_data))
			{
				echo 'Invalid file : '.$file.'<br>';
			}else{
				if($json_data['environment'] == 'development')
				{	//If the environment is set to delevelopmet, then development congfig file sets.
					$load_file = file_get_contents('./fixtures/'.$file);
				}elseif($json_data['environment'] == 'production'){
					//If the environment is set to production, then production congfig file sets.
					$load_file = file_get_contents('./fixtures/'.$file);
				}
			}
		}
		$result = json_decode($load_file,true);
		if(isset($result['environment']) && isset($result['database'])){
			//it prints hsot and cache results
			echo $host = $result['database']['host'];
			echo "<pre>";print_r($result['cache']);
		}else{
			//Incase the JSON file formate is wrong, it displays invalid json
			echo "Invalid JSON File";
		}
	}
}
$obj = new Config();
$obj->jsongetandremove();
?>