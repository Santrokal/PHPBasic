
<?php
//error_reporting(E_PARSE);
$dob = "";
$age = 0;

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Age Calculation using Ajax</title>

<script type="text/javascript">
        var xmlHttp;
        function getAge(){
			var dob = document.getElementById("dob").value;	

				if (typeof XMLHttpRequest != "undefined"){
                    xmlHttp= new XMLHttpRequest();
                }else if (window.ActiveXObject){
                    xmlHttp= new ActiveXObject("Microsoft.XMLHTTP");
                }
                if (xmlHttp==null){
                    alert("Browser does not support XMLHTTP Request")
                    return;
                } 
          var url = "getAge.php?dob=" + dob+"";
          xmlHttp.onreadystatechange = showage;
          xmlHttp.open("GET", url, true);
          xmlHttp.send(null);
    }
      
      function showage(){   
          if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){							  
              document.getElementById('agevalue').innerHTML = xmlHttp.responseText;              
          }   
      }
      
      
   
   
</script>

</head>

<body>
		<form action="" method="post">
        <table>	
			      	
            <tr>
            	<td>
                	Enter Your DOB:                
				</td>  	
            
            	<td>
                	<input type="text" id="dob" name="dob" value="<?php echo $dob;?>" onchange ="return getAge()"/>                
				</td>
        	</tr>
			</table>
			<table id="agevalue">
			<tr>
            	<td>
                	Your Age:                
				</td>
			</tr>			
			
        </table>
	</form>
		
		
		
</body>


</html>

<?php


?>
