<?php
$subNav = array(
	"Search Campaign ; search/searchCampaign.php ; #008000;",
	"Search Emails ; search/searchEmail.php ; #008000;",
	"Search Content ; search/searchContent.php ; #008000;",

);

set_include_path("../");
include("../../inc/essentials.php");


?>
<script>
$mainNav.set("Search") // this line colors the top button main nav with the text "home"
</script>
<h1 class="margin-t-0">Campaign Search</h1>


 <form name="aContent" method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>">
 <table width="450px">
 
 	<tr>
		<td>Search for campaign:</td>
		<td><select name="field">
 		<option value="">Select a field:</option>
 		<option value="OwnedByName">Owner</option>
 		<option value="Name">Name</option>
 		<option value="Keywords">Key Word</option>
 		<option value="CreatedByName">Created By</option>
 		

 		</select>
 		</td>
	</tr>
 	<tr>
		<td>Value:</td>
		<td><input type="text" name="value" /></td>
	</tr>
	
	
	
		</table>
 <input name="Submit1" type="submit" value="Search" />
 </form>

 <div id="foundtable">
 <?php 
 if (isset($_GET['Type'])){
 	include("../../pages/search/searchclass.php");
 	$search = new Search();
	$found = $search->get_campaign($_GET['Type'], $_GET['Field'], $_GET['Value'],$orderby,$dir);
 	
}else{
	
 	echo "<p>No search performed.  When complete this text will be replaced with a table of results.</p>";

}

?>

</div>

<?php

if (isset($_POST['Submit1'])){
	
session_start();
$uid = $_SESSION['ID'];
$type = 'tbl_campaigns';
$field = $_POST['field'];
$word = $_POST['value'];

include_once '../../config/general.php';
header('Location: '.$siteUrl.'member.php#!/url=search/searchcampaign.php?Type='.$type.'&Field='.$field.'&Value='.$word);

}

 ?> 