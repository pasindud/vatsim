<?php	                                       				                     
/*
@Version V 1.1
@author Brian Beach (915973) V1.0
@author Pasindu De Silva (1165770)V 1.1
*/


class Vatsim
	{

	function clients()
	{
		//require_once("VatsimPHPfiles/customization.txt");

		$file=file("http://fsproshop.com/servinfo/vatsim-data.txt");
		$allowed="no";
		$data="";
		$i=0;

		$dom = new DOMDocument("1.0");
		$node = $dom->createElement("markers");
		$parnode = $dom->appendChild($node); 

		foreach($file as $ifile)
			{
				if(substr($ifile,0,1) != ";")
					{
						$ifile=rtrim($ifile);
					
						if($allowed == "yes" && substr($ifile,0,1) != "!")
							{
							 
								$data[$i][count($data)]=explode(":", $ifile);
								
							
					++$i;
							}
						else
							{
								if($ifile == "!CLIENTS:")
									{
										$allowed="yes";
									}
								else
									{
										$allowed="no";
									}
							}
					}
			}

		return $data;
	}


	}
?>