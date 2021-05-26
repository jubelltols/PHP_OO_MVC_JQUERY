
<?php
	if ((isset($_GET['page'])) && ($_GET['page']==="controller_home") ){
		include("view/inc/top_page_home.php");
	}else if ((isset($_GET['page'])) && ($_GET['page']==="controller_shop") ){
		include("view/inc/top_page_shop.php");
	}else if ((isset($_GET['page'])) && ($_GET['page']==="controller_crud") ){
		include("view/inc/top_page_crud.php");
	}else if ((isset($_GET['page'])) && ($_GET['page']==="controller_contact") ){
		include("view/inc/top_page_contact.php");
	}else if ((isset($_GET['page'])) && ($_GET['page']==="controller_login") ){
		include("view/inc/top_page_login.php");
	}else if ((isset($_GET['page'])) && ($_GET['page']==="controller_cart") ){
		include("view/inc/top_page_cart.php");
	}else{
		include("view/inc/top_page.php");
	} 
?>
<div id="wrapper">		
    <div id="header">    	
    	<?php
			include("view/inc/header.html");
    	?>        
    </div>  
    <div id="pages">
    	<?php 
			include("view/inc/pages.php"); 
		?>        
        <br style="clear:both;" />
    </div>
    <div id="footer">   	   
	    <?php
	        include("view/inc/footer.html");
	    ?>        
    </div>
</div>
<?php
    include("view/inc/bottom_page.php");
?>