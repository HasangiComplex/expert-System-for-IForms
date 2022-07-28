<?php 
include("database.php");
$select ="select * from knowledgebase";
$d = $db->query($select);
$no = mysqli_num_rows($d);
//$rows = mysqli_fetch_assoc($d);
//$question= $rows['question'];

//$alternative= $rows['alternative'];
//$yes = $rows['yes'];
//$no = $rows['no'];


//----------------------------------------------------------------   

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
#banner{
	width: 100%;
	height:50px;
	line-height:50px;
	background-color:#369;
	color:#FFF;
	font-size:24px;
	
}
*{
margin: 0px;	
}
#dd{
	width: 100%;
	height: 50px;
	line-height:50px;
	background-color:#09C;
	
	
}
#f{
	width: 60%;
	height: 200px;
	/*border: 1px solid #333;*/
	margin: 0 auto;
	
}
#dd a{
color: #white;
text-decoration: none;	
}

.r {
	color: #FFF;
}
#footer{
	width: 100%;
	height:50px;
	line-height: 50px;
	margin: 0 auto;
	color:#FFF;
	background:#069;
	
}
/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}





/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}


</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>...::Home::...</title>
</head>

<body>

  
  <div id="dd"><p><a href="admin.php">Expert System </a>  | <a href="admin.php"> Questions and Answers  </a> </div> 
    
  </p>
    
  </p>

  </div>
  
  <div align="center">
    <table width="749" border="1">
      <tr class="r">
        <td width="57" bgcolor="#0066FF">S/N</td>
        <td width="457" bgcolor="#0066FF">QUESTIONS</td>
        <td width="213" bgcolor="#0066FF"><strong>Further Explanation</strong></td>
      </tr>
      <tr>
      <?php  
		
		for($i=1; $i<=$no; $i++){
			$rows = mysqli_fetch_assoc($d); ?>
        <td>
			
			<?php
		
		echo $i;
		
		
		?></td>
        <td><?php echo  $rows['question']; ?></td>
        <td><a href="check_answer.php?id=<?php echo $rows['id']; ?>"><!--click to check see answer --></a> |<button style ="background-color:yellow" class="open-button " onclick="openForm()"> ?</button>
</td>
      </tr>
      <?php  } ?>





  </table>
  </div>









<div class="form-popup" id="myForm">
 <form action="" method="post" class="form">
  <div align="center">
    <p>&nbsp;</p>
   
    <table width="546" height="115" border="1">
      <tr>
         <?php
		
		if(isset($_POST['next'])){
			
			
			@$checkbox_yes = $_POST['checkbox_yes'];
	@$checkbox_no = $_POST['checkbox_no'];
	
	 if(!$checkbox_yes and !$checkbox_no){
		?>
        <script>   alert("Please make Selection!") ;</script>
        
        <?php
	 }
	else{
		
              header("location:yes_no2.php"); }
		
			
		}
		
		?>
        
        
        <td width="105">Question : </td>
        <td width="234"><?php echo $rows['q1'];    ?></td>
        <td width="79"><p>Yes
          </p>
          <p>
            <input type="checkbox" name="checkbox_yes" id="checkbox" />
          </p></td>
        <td width="100"><p> No
          </p>
          <p>
            <input type="checkbox" name="checkbox_no" id="checkbox2" />
           
          </p></td>
        </tr>
      <tr>
        <td>Answer:   </td>
        <td colspan="3"><input type="submit" name="next" id="next" value="Next &gt;&gt;" /></td>
        </tr>
      
    </table>
    <p>&nbsp;</p>
    
  </div>
  </form>
</div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>





  <p><?php 
    
  ?></p>
</div>

</body>
</html>