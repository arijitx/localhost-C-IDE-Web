<html>
<title>
C Compiler
</title>
	<body>
		<head>
			<script language="Javascript" type="text/javascript" src="edit_area/edit_area_full.js"></script>
			<script language="Javascript" type="text/javascript">
			editAreaLoader.init({
			id: "codebox"	// id of the textarea to transform		
			,start_highlight: true	// if start with highlight
			,allow_resize: "both"
			,word_wrap: true
			,language: "en"
			,syntax: "c"	
		});
			</script>

		</head>
 <font face="Comic Sans MS" size="4" color="white">
          <div style="margin-left:25%;width: 50%; height: 150%; background-color: #4582C4; float:left;">
          <center>
          	<img src="go.png">
          	</center>
          	 <form name="form" method="post">
		
		
		<center>

		<?php 
			
			//ini_set('display_startup_errors',1);
			//ini_set('display_errors',1);
			//error_reporting(-1);
			$date=time();
			$input=$_POST['input'];
	 	
    	if(isset($_POST['text_box'])) { //only do file operations when appropriate

        	$a = $_POST['text_box'];
        	$user="admin";
        	
        	$filename=$user.$date.'.c';
        	
        	$myfile = fopen($filename, "w") or die("Unable to open file!");
        	
        	if(strpos($a,"system"))
        	{
        		
        		
        		echo "<br><img src='lo.png'>";
        	}
        	
        	else
        	{
			fwrite($myfile, $a);

			fclose($myfile);
		
			exec('gcc '.$filename.' -o '.$user.$date.' 2>&1', $outputErr, $return_value);
			exec('chmod 777 '.$filename);
			
			$return_value == 0 ? $comp=1: $comp=0;
			if($return_value!=0){
			
			echo "COMPILATION ERROR";
			echo "<br>";
			echo "<textarea rows='6' cols='80'>";
			echo 'ERROR: ' . PHP_EOL . implode(PHP_EOL, $outputErr);
			echo "</textarea>";
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
				
				echo "<textarea rows='4' cols='80'>";
				echo PHP_EOL . implode(PHP_EOL, $output);
				echo "</textarea>";
			}
			unlink($filename);
			unlink($user.$date);
			unlink($inputFile);
			}
		}
		
		?>
		
		<br>ENTER CODE HERE<br>
        <textarea id="codebox" rows="29" cols="80" name="text_box"><?php
		if(isset($_POST['text_box'])) {
	 		$a = $_POST['text_box'];
			echo $a;
	
		}
		else
			echo "#include<stdio.h>
int main()
{
	//YOur Codes here!
	return 0;
}";
		?>
		</textarea>
		<br>
		<textarea id="inputBox" rows="5" cols="80" name="input"></textarea>
		<table>
		<tr>
        <td width="200"><input type="submit" id="search-submit" value="Run" /></td></form>
        
        </tr>
        </table>
        <br><br><br><br>
    	by ---r3v0
    	</center>
          </div>  
                 </font>

        </div>
	</body>
</html>