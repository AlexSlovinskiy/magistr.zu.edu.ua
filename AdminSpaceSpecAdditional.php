<?php
include ("Parts/Header.php");
//Изменение стиля страницы на всю ширину
echo '<style type="text/css">
  		.main {	background:transparent url(img/bg_main_withoutnav.jpg) repeat-y;	}
		.main-content {	width:840px;}
		.column1-unit {	width:840px;}
		.clear-contentunit {width:840px;}
	 </style>';
include ("MySQL/MysqlConnect.php");

if (!isset($_SESSION["login"]) || $_SESSION["status"]=="user")
	{
	print "<meta http-equiv=\"Refresh\" content=\"0;URL=index.php\">";
	exit();
	}

$page_title="Додаткові відомості про спеціальності";



 /*if (isset($_POST["save"]))
 	{
    $lic_stc=intval($_POST["lic_stc"]);
    $lic_zao=intval($_POST["lic_zao"]);
	$budg_stc=intval($_POST["budg_stc"]);
	$budg_zao=intval($_POST["budg_zao"]);
	$price_stc=intval($_POST["price_stc"]);
	$price_zao=intval($_POST["price_zao"]);
	$price_short=intval($_POST["price_short"]);
	$operator=intval($_POST["operator"]);
	$spc_id=intval($_POST["spc_id"]);

	$query = "UPDATE `specialities`
				SET `lic_stc` = '".$lic_stc."' , `lic_zao` ='".$lic_zao."' , `budg_stc` = '".$budg_stc."' , `budg_zao` = '".$budg_zao."',
					`price_stc` = '".$price_stc."' , `price_zao` = '".$price_zao."' , `price_short` = '".$price_short."' , `operator` = '".$operator."'
				WHERE `speciality_id` = '".$spc_id."' LIMIT 1";
	$sql = mysql_query($query) or die(mysql_error());
	$success='<h1 class="block"> ДАНІ ПО СПЕЦІАЛЬНОСТІ &bdquo;'.$_POST["spc_name"].'&ldquo; ЗБЕРЕЖЕНО!</h1>';
	unset($_POST);
 	}*/



	//$element_error="border:solid 2px rgb(212,12,12);";

?>

<!-- B.2 MAIN CONTENT -->
      		<div class="main-content">
        	<!-- Pagetitle -->
        		<h1 class="pagetitle"><?echo $page_title." ".$msg?> </h1>
					<div class="column1-unit">
						<?php
						echo $success;
						/*echo "<pre>";
						print_r($_POST);
						echo"</pre>";*/
						include("Parts/FormSpecialityAdditional.php");
  						?>

					</div>
            		<hr class="clear-contentunit" />
            	</div>
        	</div>

			<input type="hidden" name="debug" id="debug" class="field" value=""/>

                   			<script language="JavaScript">
                       		function SaveSpc(spc_id)
                       			{                                var lic_stc=document.getElementById("lic_stc"+spc_id).value;
    							var lic_zao=document.getElementById("lic_zao"+spc_id).value;
								var budg_stc=document.getElementById("budg_stc"+spc_id).value;
								var budg_zao=document.getElementById("budg_zao"+spc_id).value;
								var quota_stc=document.getElementById("quota_stc"+spc_id).value;
								var quota_zao=document.getElementById("quota_zao"+spc_id).value;
								var price_stc=document.getElementById("price_stc"+spc_id).value;
								var price_zao=document.getElementById("price_zao"+spc_id).value;
								//var price_short=document.getElementById("price_short"+spc_id).value;
								var price_stc_p=document.getElementById("price_stc_p"+spc_id).value;
								var price_zao_p=document.getElementById("price_zao_p"+spc_id).value;
								//var price_short_p=document.getElementById("price_short_p"+spc_id).value;
								var day_stc=document.getElementById("day_stc"+spc_id).value;
								var month_stc=document.getElementById("month_stc"+spc_id).value;
								var year_stc=document.getElementById("year_stc"+spc_id).value;
								var day_zao=document.getElementById("day_zao"+spc_id).value;
								var month_zao=document.getElementById("month_zao"+spc_id).value;
								var year_zao=document.getElementById("year_zao"+spc_id).value;
								var operator_stc=document.getElementById("operator_stc"+spc_id).value;
								var operator_zao=document.getElementById("operator_zao"+spc_id).value;
                                //alert (spc_id);
                                JsHttpRequest.query
                       				(
                       				'SpecialityBackend.php',
                       					{
                       					'spc_id' : spc_id,
                       					'lic_stc' : lic_stc,
                                        'lic_zao' : lic_zao,
                                        'budg_stc' : budg_stc,
                                        'budg_zao' : budg_zao,
                                        'quota_stc' : quota_stc,
                                        'quota_zao' : quota_zao,
                                        'price_stc' : price_stc,
                                        'price_zao' : price_zao,
                                        'price_stc_p' : price_stc_p,
                                        'price_zao_p' : price_zao_p,
                                        'day_stc' : day_stc,
                                        'month_stc' : month_stc,
                                        'year_stc' : year_stc,
                                        'day_zao' : day_zao,
                                        'month_zao' : month_zao,
                                        'year_zao' : year_zao,
                                        'operator_stc' : operator_stc,
										'operator_zao' : operator_zao
                       					},
                       				function (result, errors)
                       					{
                       					document.getElementById("debug").value = errors;

										},

                       				false
                       				);
                       			}
            			</script>
<?php


include ("Parts/Footer.php");

?>
