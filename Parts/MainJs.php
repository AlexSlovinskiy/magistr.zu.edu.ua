					<script language="JavaScript">
                       		yes="url(../img/lb_true.png) no-repeat";
							no="url(../img/lb_false.png) no-repeat";
							B="url(../img/B.png) no-repeat";
							K="url(../img/K.png) no-repeat";
							Y="url(../img/Y.png) no-repeat";
							D="url(../img/D.png) no-repeat";
                            changed=document.getElementById("changed");

                       		function changeField(id,field)
                       			{
                                //alert("1");
                                JsHttpRequest.query
                       				(
                       				'MainPageBackend.php',
                       					{
                       					'id' : id,
                       					'field' : field
                       					},
                       				function (result, errors)
                       					{
                       					document.getElementById("debug").value = errors+result.dip_orig+result.recommend+result.finans+result.pact+result.apply+result.take_away;
                                        if (result.dip_orig=="-") document.getElementById("dip_orig"+id).style.background = no;
                                        if (result.dip_orig=="+") document.getElementById("dip_orig"+id).style.background = yes;
                                        if (result.recommend=="-") document.getElementById("recommend"+id).style.background = no;
                                        if (result.recommend=="+") document.getElementById("recommend"+id).style.background = yes;
										if (result.finans=="-") document.getElementById("finans"+id).style.background = no;
                                        if (result.finans=="b") document.getElementById("finans"+id).style.background = B;
                                        if (result.finans=="c") document.getElementById("finans"+id).style.background = K;
                                        if (result.pact=="-") document.getElementById("pact"+id).style.background = no;
                                        if (result.pact=="y") document.getElementById("pact"+id).style.background = Y;
                                        if (result.pact=="d") document.getElementById("pact"+id).style.background = D;
                                        if (result.apply=="-") document.getElementById("apply"+id).style.background = no;
                                        if (result.apply=="+") document.getElementById("apply"+id).style.background = yes;
                                        if (result.take_away=="-") document.getElementById("take_away"+id).style.background = no;
                                        if (result.take_away=="+") document.getElementById("take_away"+id).style.background = yes;
										},

                       				true
                       				);
                       			}
            			</script>