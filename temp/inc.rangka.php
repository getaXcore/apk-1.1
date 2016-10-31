<?php
class rangka{
	function view_login($title,$source,$alt){
		echo "\n<html>";
		echo "\n<head>";
		echo "\n<title>$title</title>";
		echo "\n<link rel=\"stylesheet\" type=\"text/css\" href=\"css/login_style.css\" />";
		echo "\n</head>";
		echo "\n<body>";
		echo "\n<center>";
		echo "\n<div class=\"logo\">";
		echo $this->front_logo($source,$alt,$title);
		echo "\n</div>";
		echo "\n\t<form action=\"check.login.php\" method=\"POST\">";
		echo "\n\t<table class=\"login\">";
		echo "\n\t<tr>";
		echo "\n\t\t<td>";
		echo "\n\t\t\t<table cellspacing=\"2\" cellpadding=\"2\" class=\"form\">";
		echo "\n\t\t\t<tr>";
		echo "\n\t\t\t\t<td class=\"text-form\">User Id</td>";
		echo "\n\t\t\t\t<td><input type=\"text\" name=\"uid\" autocomplete=\"off\" required=\"required\"></td>";
		echo "\n\t\t\t</tr>";
		echo "\n\t\t\t<tr>";
		echo "\n\t\t\t\t<td class=\"text-form\">Password</td>";
		echo "\n\t\t\t\t<td><input type=\"password\" name=\"pwd\" required=\"required\"></td>";
		echo "\n\t\t\t</tr>";
		echo "\n\t\t\t<tr>";
		echo "\n\t\t\t\t<td>&nbsp;</td>";
		echo "\n\t\t\t\t<td><input type=\"submit\" name=\"submit\" value=\"Login\"></td>";
		echo "\n\t\t\t</tr>";
		echo "\n\t\t\t</table>";
		echo "\n\t\t</td>";
		echo "\n\t</tr>";
		echo "\n\t</table>";
		echo "\n\t</form>";
		echo "\n<div class=\"footer\">Developed by getaufan Copyright&copy;".date('Y')."</div>";
		echo "\n</center>";
		echo "\n</body>";
		echo "\n</html>";
	}
	function front_logo($source,$alt=null,$title=null){
		$display="<img src=\"$source\" alt=\"$alt\" title=\"$title\"></img>";
		return $display;
	}
	function temp_admin($title,$source,$alt,$titlemenuprofile,$linkview,$linkupdate,$titlemenuadmin,$linknew,$linkconfig,$linkhistory,$page,$titlecontent,$detailcontent){
		echo "
		<html lang=\"en\">
		<head>
			<meta charset=\"utf-8\"/>
			<title>$title</title>
			<!--[if lt IE 9]>
			<link rel=\"stylesheet\" href=\"css/ie.css\" type=\"text/css\" media=\"screen\" />
			<script src=\"http://html5shim.googlecode.com/svn/trunk/html5.js\"></script>
			<![endif]-->
			<link rel=\"stylesheet\" href=\"css/layout.css\" type=\"text/css\" media=\"screen\" />
			<link rel=\"stylesheet\" href=\"css/layout_preview.css\" type=\"text/css\" media=\"screen\" />
			<script src=\"js/jquery-1.5.2.min.js\" type=\"text/javascript\"></script>
			<script src=\"js/hideshow.js\" type=\"text/javascript\"></script>
			<script src=\"js/jquery.tablesorter.min.js\" type=\"text/javascript\"></script>
			<script type=\"text/javascript\" src=\"js/jquery.equalHeight.js\"></script>
			<script type=\"text/javascript\" src=\"./js/jquery.pratinjau.js\"></script>
			<script type=\"text/javascript\">
			$(document).ready(function() 
    			{ 
      				$(\".tablesorter\").tablesorter(); 
   				} 
			);
			$(document).ready(function() {

			//When page loads...
			$(\".tab_content\").hide(); //Hide all content
			$(\"ul.tabs li:first\").addClass(\"active\").show(); //Activate first tab
			$(\".tab_content:first\").show(); //Show first tab content

			//On Click Event
			$(\"ul.tabs li\").click(function() {

			$(\"ul.tabs li\").removeClass(\"active\"); //Remove any active class
			$(this).addClass(\"active\"); //Add active class to selected tab
			$(\".tab_content\").hide(); //Hide all tab content

			var activeTab = $(this).find(\"a\").attr(\"href\"); //Find the href attribute value to identify the active tab + content
			$(activeTab).fadeIn(); //Fade in the active ID content
			return false;
			});

			});
			</script>
			<script type=\"text/javascript\">
			$(function(){
				$('.column').equalHeight();
			});
			</script>
		</head>
		<body>
		<header id=\"header\">
			<hgroup>
				<h1 class=\"site_title\">".$this->front_logo($source,$alt,$title)."</h1>
				<h2 class=\"section_title\">Dashboard</h2><div class=\"btn_view_site\"><a href=\"logout.php?".paramEncrypt('uid='.$_REQUEST['uid'])."\">Logout</a></div>
			</hgroup>
		</header> <!-- end of header bar -->
	
		<section id=\"secondary_bar\">
			<div class=\"user\">
				<p>Admin</p>
				<!-- <a class=\"logout_user\" href=\"#\" title=\"Logout\">Logout</a> -->
			</div>
			<div class=\"breadcrumbs_container\">
				<article class=\"breadcrumbs\"><a href=\"#\">Admin</a> <div class=\"breadcrumb_divider\"></div> <a class=\"current\">$page</a></article>
			</div>
		</section><!-- end of secondary bar -->
	
		<aside id=\"sidebar\" class=\"column\">
			<hr/>
			".$this->sidebarmenuprofile($titlemenuprofile,$linkview,$linkupdate)."
			".$this->sidebarmenuadmin($titlemenuadmin,$linknew,$linkconfig,$linkhistory)."
			<footer>
			<hr />
				<p><strong>Developed by <a href=\"http://getaufansepta.wordpress.com\" target=\"_blank\">getaufan</a> &copy; 2012</strong></p>
				<p>Theme by <a href=\"http://www.medialoot.com\" target=\"_blank\">MediaLoot</a></p>
			</footer>
		</aside><!-- end of sidebar -->
		<!--this place for replace content-->
	";
	}
	function sidebarmenuprofile($titlemenu,$linkview,$linkupdate){
		$display= "<h3>$titlemenu</h3>
				<ul class=\"toggle\">
					<li class=\"icn_view_users\"><a href=\"?".paramEncrypt('page=1&uid='.$_REQUEST['uid'])."\">$linkview</a></li>
					<li class=\"icn_profile\"><a href=\"?".paramEncrypt('page=2&uid='.$_REQUEST['uid'])."\">$linkupdate</a></li>
				</ul>
		";
		return $display;
	}
	function sidebarmenuadmin($titlemenuadmin,$linknew,$linkconfig,$linkhistory){
		$display= "<h3>$titlemenuadmin</h3>
				<ul class=\"toggle\">
					<li class=\"icn_settings\"><a href=\"?".paramEncrypt('page=3&uid='.$_REQUEST['uid'])."\">$linknew</a></li>
					<li class=\"icn_security\"><a href=\"?".paramEncrypt('page=5&uid='.$_REQUEST['uid'])."\">$linkconfig</a></li>
					<li class=\"icn_jump_back\"><a href=\"?".paramEncrypt('page=9&uid='.$_REQUEST['uid'])."\">$linkhistory</a></li>
				</ul>
		";
		return $display;
	}
	function contentindexadmin($titlecontent,$detailcontent){
		$display ="\n\t\t<section id=\"main\" class=\"column\">";
		$display.="\n\t\t\t<h4 class=\"alert_info\">$titlecontent</h4>";
		$display.="\n\t\t</section>";
		$display.="\n\t\t</body>";
		$display.="\n\t\t</html>";
		return $display;

	}
	function contentpageview($titlecontent,$detailcontent){
		$display ="\n\t\t<section id=\"main\" class=\"column\">";
		$display.="\n\t\t\t<article class=\"module width_full\">";
		$display.="\n\t\t\t\t<header><h3>$titlecontent</h3></header>";
		$display.="\n\t\t\t\t<div class=\"module_content\">";
		$display.="\n\t\t\t\t".$detailcontent;
		$display.="\n\t\t\t\t</div>";
		$display.="\n\t\t\t</article><!-- end of styles article -->	";
		$display.="\n\t\t</section>";
		$display.="\n\t\t</body>";
		$display.="\n\t\t</html>";
		return $display;
	}


}
?>
