

<?php 
			
	ini_set('display_startup_errors',1);
	ini_set('display_errors',1);
	error_reporting(-1);
	$outputA=array('status'=>'none','output'=>'none');
		$date=time();
		//$input=$_GET['input'];
	 	$input;
    	if(isset($_GET['code'])) { //only do file operations when appropriate

        	$code = $_GET['code'];
        	echo $code;
        	$user="admin";
        	
        	$filename=$user.$date.'.c';
        	
        	$myfile = fopen($filename, "w") or die("Unable to open file!");
        	
        	if(strpos($code,"system"))
        	{
        		
        		$ouputA['status']='System Used In Code';
        		
        	}
        	
        	else
        	{
			fwrite($myfile, $code);

			fclose($myfile);
		
			exec('gcc '.$filename.' -o '.$user.$date.' 2>&1', $outputErr, $return_value);
			exec('chmod 777 '.$filename);
			
			$return_value == 0 ? $comp=1: $comp=0;
			if($return_value!=0){
			
			//Compilation err
			$outputA['status']='Compilation Err';
			$outputA['output']=$outputErr;
			//echo "<textarea rows='6' cols='80'>";
			//echo 'ERROR: ' . PHP_EOL . implode(PHP_EOL, $outputErr);
			//echo "</textarea>";
			}
			if($return_value==0){
				
				
    			exec('chmod 777 '.$user.$date);
    			echo "OUTPUT";
    			$inputFile=$user.$date.'.txt';
    			exec ('chmod 777 '.$inputFile);
    			$file = fopen($inputFile, "w") or die("Unable to open file!");
    			fwrite($file, $input);

				fclose($file);
    			echo "<br>";
				echo "</textarea>";
				exec('./'.$user.$date.'<'.$inputFile, $output, $return_value);
				
				$outputA['status']='OK';
				$outputA['output']=$output;
				//echo "<textarea rows='4' cols='80'>";
				//echo PHP_EOL . implode(PHP_EOL, $output);
				//echo "</textarea>";

			}

			//unlink($filename);
			//unlink($user.$date);
			//unlink($inputFile);

			}
		}
	header('Content-Type: application/json');
	echo json_encode($outputA);	
?>
	