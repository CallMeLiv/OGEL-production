<?php
session_start();
 require_once "connect.php";
  
  $polaczenie= @new mysqli($host, $db_user, $db_password,$db_name);
  if($polaczenie->connect_errno!=0)
  {
	  echo "Error:".$polaczenie->connect_errno;
  }
  else
  {
	  
	{
		  $sql="SELECT SUM(value) FROM production WHERE machine_name='4x2 brick mould'AND variable_name='production'"; // Production Sum Machine 1
	  $result=@$polaczenie->query($sql);
	  while(($product=$result->fetch_assoc())!==null)
	    {
		 $produkt=$product["SUM(value)"];
	    }

	 }
	 
	 {
		   $sql="SELECT SUM(value) FROM production WHERE machine_name='4x2 brick mould' AND variable_name='scrap'"; // Scrap sum of machine 2
		   $result=@$polaczenie->query($sql);
		  while(($scrap=$result->fetch_assoc())!==null)
		  {
			  $skrap=$scrap["SUM(value)"];
		  }
	 }
	 
	 {
		  $sql="SELECT SUM(value) FROM production WHERE machine_name='3x2 brick mould' AND variable_name='production'"; //Production Sum Machine 2
		   $result=@$polaczenie->query($sql);
		  while(($product2=$result->fetch_assoc())!==null)
		  {
			  $produkt2=$product2["SUM(value)"];
		  }
		 
	 }
	 
	 {
		 $sql="SELECT SUM(value) FROM production WHERE machine_name='3x2 brick mould' AND variable_name='scrap'"; // Scrap Sum from machine 2
		  $result=@$polaczenie->query($sql);
	  while(($scrap2=$result->fetch_assoc())!==null)
	    {
		   $skrap2=$scrap2["SUM(value)"];
	    }
		
	 {
				  $sql="SELECT SUM(value) FROM production WHERE machine_name='2x2 brick mould' AND variable_name='production'"; // Production Sum for machine 3
	$result=@$polaczenie->query($sql);
		  while(($product3=$result->fetch_assoc())!==null)
		  {
			  $produkt3=$product3["SUM(value)"];
		  }
	 }
	 
	 {
				  $sql="SELECT SUM(value) FROM production WHERE machine_name='2x2 brick mould' AND variable_name='scrap'"; // scrap Sum for machine 3
	$result=@$polaczenie->query($sql);
		  while(($scrap3=$result->fetch_assoc())!==null)
		  {
			  $skrap3=$scrap3["SUM(value)"];
		  }
	 }
	 {
		  $sql="SELECT COUNT(isrunning) FROM runtime WHERE machine_name='4x2 brick mould'"; // Counting Runtime from machine 1
          $result=@$polaczenie->query($sql);
	  while(($runtime1=$result->fetch_assoc())!==null)
	    {
		   $score1=$runtime1["COUNT(isrunning)"];
	    }
	 }
	 }
	 {
		  $sql="SELECT COUNT(isrunning) FROM runtime WHERE machine_name='4x2 brick mould' AND isrunning='0'"; // Counting Downtime for machine 1
          $result=@$polaczenie->query($sql);
	  while(($downtime1=$result->fetch_assoc())!==null)
	    {
		   $outcome1=$downtime1["COUNT(isrunning)"];
	    }
		{
		  $sql="SELECT COUNT(isrunning) FROM runtime WHERE machine_name='3x2 brick mould'"; // Counting Runtime for machine 2
          $result=@$polaczenie->query($sql);
	  while(($runtime2=$result->fetch_assoc())!==null)
	    {
		   $score2=$runtime2["COUNT(isrunning)"];
	    }
	 }
	 }
	 {
		  $sql="SELECT COUNT(isrunning) FROM runtime WHERE machine_name='3x2 brick mould' AND isrunning='0'"; // Counting downtime for machine2 
          $result=@$polaczenie->query($sql);
	  while(($downtime2=$result->fetch_assoc())!==null)
	    {
		   $outcome2=$downtime2["COUNT(isrunning)"];
	    }
		{
		  $sql="SELECT COUNT(isrunning) FROM runtime WHERE machine_name='2x2 brick mould'"; // Counting runtime for machine 3
          $result=@$polaczenie->query($sql);
	  while(($runtime3=$result->fetch_assoc())!==null)
	    {
		   $score3=$runtime3["COUNT(isrunning)"];
	    }
	 }
	 }
	 {
		  $sql="SELECT COUNT(isrunning) FROM runtime WHERE machine_name='2x2 brick mould' AND isrunning='0'";  // Counting downtime for machine 3
          $result=@$polaczenie->query($sql);
	  while(($downtime3=$result->fetch_assoc())!==null)
	    {
		   $outcome3=$downtime3["COUNT(isrunning)"];
	    }
	 }
	 $polaczenie->close(); 
  }
?>
<!DOCTYPE HTML>

<html lang="en">
<head>
<meta charset="utf-8"/>
<title> OGEL </title>
<meta name="description"content="OGEL"/>
<meta name="author" content="Oliwia Wojcieszak"/>
<meta http-equiv="X-UA-Compatible"content="IE=edge,chrome=1"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />  <!-- responsiveness -->
<link rel="stylesheet" href="main.css" type="text/css"/> <!-- CSS -->
<link href="https://fonts.googleapis.com/css?family=Montserrat+Subrayada&display=swap" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!-- Counting effect -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.js"></script>  <!-- Counting effect -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>  <!-- Counting effect -->

</head>
<body>
       <h1>Machine Statuses</h1> <!-- header -->
   <div class="machine1">         <!-- First machine data production-->
       <h2> 4x2 bricks mould </h2>
	   <h3> Total production </h3>
	      <main>
		  <div class="counting-sec"><!-- Counting effect -->
          <div class="inner-width">  <!-- Counting effect -->
		  <div class="num"> <!-- Counting effect -->
	       <?php
	        echo $produkt; // result
	       ?>
		  </div>
	      </main>
	    <h3> Total scrap </h3> <!-- First machine data scrap-->
	      <main> 
		  <div class="counting-sec">
          <div class="inner-width">
		  <div class="num">
	       <?php
	        echo $skrap; //result
	       ?>
		   </div>
	      </main>
	    <h3> Total net production </h3> <!-- First machine data net production-->
	      <main>
		  <div class="counting-sec">
          <div class="inner-width">
		  <div class="num">
	       <?php
	        echo $produkt-$skrap; //result
	       ?>
		  </div>
	      </main>
		<h3>The percentage of scrap vs gross production</h3> <!-- First machine data scrap vs gross production-->
		  <main>
		  <div class="counting-sec">
          <div class="inner-width">
		  <div class="num">
		   <?php
	        echo round ((($skrap/$produkt)*100),5); //result
	       ?>
		  </div>
		  </main>
		 <h3>The percentage of downtime for a machine</h3> <!-- First machine downtime and runtime data -->
		  <main>
		  <div class="counting-sec">
          <div class="inner-width">
		  <div class="num">
	       <?php
	        echo ($outcome1/$score1)*100; //result
	       ?>
		  </div>
	      </main>
   </div>
   <div class="machine2">  <!-- Second machine data -->
        <h2> 3x2 bricks mould </h2>
        <h3>Total production </h3> <!-- Second machine data production-->
           <main>
		   <div class="counting-sec">
          <div class="inner-width">
		  <div class="num">
            <?php
	         echo $produkt2;
	        ?>
			</div>
	       </main>
		 <h3> Total scrap </h3> <!-- Second machine data scrap-->
		   <main>
		   <div class="counting-sec">
          <div class="inner-width">
		  <div class="num">
	        <?php
	         echo $skrap2;
	        ?>
			</div>
	       </main>
		 <h3> Total net production </h3> <!-- Second machine data net production-->
		   <main>
		   <div class="counting-sec">
          <div class="inner-width">
		  <div class="num">
	        <?php
	         echo $produkt2-$skrap2;
	        ?>
			</div>
	       </main>
		 <h3>The percentage of scrap vs gross production</h3> <!-- Second machine data scrap vs gross production-->
		   <main>
		   <div class="counting-sec">
          <div class="inner-width">
		  <div class="num">
		    <?php
	         echo round ((($skrap2/$produkt2)*100),5);
	        ?>
			</div>
		  </main>
		 <h3>The percentage of downtime for a machine</h3> <!-- Second machine data of runtime and downtime-->
		  <main>
		  <div class="counting-sec">
          <div class="inner-width">
		  <div class="num">
	       <?php
	        echo round ((($outcome2/$score2)*100),3);
	       ?>
		   </div>
	      </main>
    </div>
    <div class="machine3"> <!-- Third machine data -->
         <h2> 2x2 bricks mould </h2>
         <h3>Total production </h3>  <!-- Third machine data production -->
            <main>
			<div class="counting-sec">
          <div class="inner-width">
		  <div class="num">
	         <?php
	          echo $produkt3;
	         ?>
			 </div>
	        </main>
		 <h3> Total scrap </h3> <!-- Third machine data scrap -->
	        <main>
			<div class="counting-sec">
          <div class="inner-width">
		  <div class="num">
	         <?php
	          echo $skrap3;
	         ?>
			 </div>
	        </main>
		<h3> Total net production </h3> <!-- Third machine data net production -->
		    <main>
			<div class="counting-sec">
          <div class="inner-width">
		  <div class="num">
	         <?php
	          echo $produkt3-$skrap3;
	         ?>
			 </div>
	        </main>
		<h3>The percentage of scrap vs gross production</h3> <!-- Third machine data scrap vs gross production -->
		    <main>
			<div class="counting-sec">
          <div class="inner-width">
		  <div class="num">
		     <?php
	          echo round ((($skrap3/$produkt3)*100),5);
	         ?>
			 </div>
		    </main>
		<h3>The percentage of downtime for a machine</h3> <!-- Third machine data downtime and runtime -->
		    <main>
			<div class="counting-sec">
          <div class="inner-width">
		  <div class="num">
	         <?php
	          echo round ((($outcome3/$score3)*100),3);
	         ?>
			 </div>
	        </main>
<div style="clear:both"></div>
</div>
<script type="text/javascript">
$(".num").counterUp({delay:5,time:1000}); <!-- Counting effect -->
</script>
</body>
</html>