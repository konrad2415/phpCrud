<?php
	$srv ="localhost";
	$user="konrad";
	$pass="Hall0w33nday";
	$db  ="juegos";
    $query = "";
	$conn = new mysqli($srv,$user,$pass,$db); // host | user | password | database
	if($conn->connect_errno){
		echo "Error connecting to database:".$conn->connect_error;
	}
 
	$jStat= !empty($_REQUEST['st'])?$_REQUEST['st']:'';
	$name = !empty($_REQUEST['name'])?$_REQUEST['name']:'';
	$year = !empty($_REQUEST['yy'])?$_REQUEST['yy']:'';
	$Company = !empty($_REQUEST['co'])?$_REQUEST['co']:'';
	
    //--------------------------------------------------------------------
	echo "**************************************************************************************************<br/>";
	echo " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;How it works:" ;
	echo "<br/>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;It may receive values by all methods, POST or GET, ant it have a series of variables which defines its behavior:" ;
	echo "<br/> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;localhost project URL+ ==>>  index.php?st=a&name=4furious&yy=2012&co=MPVolt" ;
	echo "<br/> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; here we will be using GET method by fast and easy to test results" ;
	echo "<br/> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; In the url GET vars \"st\" defines operation st=a means add to database " ;
	echo "<br/> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; Later it will add to database with this string  st=a&name=4furious&yy=2012&co=MPVolt" ;
	echo "<br/> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; name=4furious" ;
	echo "<br/> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; yy=2012 for year of launch the game" ;
	echo "<br/> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; co=MPVolt for the company who created the game" ;
	echo "<br/> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; " ;
	echo "<br/> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; Now st=d&id=20 means st = d to delete or erase a row from database" ;
	echo "<br/> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; id identifyes the row id to delete" ;
	echo "<br/> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; " ;
	echo "<br/> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; And as a last exercide " ;
	echo "<br/> &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; " ;
	echo "<br/>**************************************************************************************************";
	

	echo "<hr/>";


	//---------------------------------------------------------------------
	
	// Insert
	if($jStat==='a'){ 
		$query= "INSERT INTO `t_juegos` (`id_juego`, `nombre`, `anio`, `empresa`) VALUES (NULL, '$name', '$year', '$Company')";
	   echo $query;
	   $conn ->query($query);
	}	
	// Delete																		
	if($jStat==='d'){
		// Prosess ID to delete row
		  $id  = !empty($_REQUEST['id'])?$_REQUEST['id']:"";

		   $query= "DELETE FROM `t_juegos` WHERE `t_juegos`.`id_juego` = $id";
		    $conn->query($query);
	}

	// List all elements on the table
	if($jStat==='l'){
		$query = "SELECT * from `t_juegos`";
		 $show = $conn -> query($query);
		 //echo $show ->num_rows;
		  //var_dump($show);
		   //var_dump($row=$show->fetch_row()) ;
			//echo "<br/>";
			//var_dump($row=$show->fetch_row()) ;
			//var_dump($row=$show->fetch_row() );
		
		
		$flag=0;	
         while($show ->num_rows > ++$flag )
		 {
		   echo "<br/> ";
		     $stop = count($row=$show->fetch_row()) ;
		        for($i=0;$i < $stop;$i++)
				{
			        echo $row[$i]."&nbsp;&nbsp;";
		        }
		}
		    
		}


	?>