	/*window.onload = function()
		{		alert("it works");
		a=document.getElementById("exam_mark1");
		b=document.getElementById("exam_mark2");
		c=document.getElementById("final_mark");
		a.onkeyup = b.onkeyup = function()
			{			c.value=(-1*a.value-b.value)*(-1);			}

		var links = document.getElementsByTagName("a");
		for (var i=0; i<links.length; i++)
			{
			if (links[i].className == "confirm")
				{
 				link.onclick = function()
 					{
					return confirm("Are you sure?");
					}
				}
			}
		}*/

	function showOSXModal()
    	{        document.getElementById("osx").click();
    	}

	function showInstitute()
    	{    	if (document.getElementById("ZDU").checked)
    		document.getElementById("otherInstitute").style.display = "none";
        if (document.getElementById("other").checked)
        	document.getElementById("otherInstitute").style.display = "block";
       	}

    function showRegistred()
    	{        if (document.getElementById("registred").checked)
        	document.getElementById("isRegistred").style.display = "block";
        else
			document.getElementById("isRegistred").style.display = "none";
    	}

   /* function showTargetStudy()
    	{        if (document.getElementById("zao").checked)
    		document.getElementById("target_study").style.display = "none";
        if (document.getElementById("stc").checked)
        	document.getElementById("target_study").style.display = "block";
    	}*/

    function showCountry()
    	{    	if (document.getElementById("nationality").value=="²םמחולוצü")
    		document.getElementById("other_country").style.display = "block";
    	else document.getElementById("other_country").style.display = "none";

    	}

    function showMilitary()
		{
		if (document.getElementById("military").checked)
        	document.getElementById("mil_block").style.display = "block";
	    else
			document.getElementById("mil_block").style.display = "none";
    	}

	function showBenefits()
		{
		if (document.getElementById("benefits").checked)
        	document.getElementById("benefit_block").style.display = "block";
	    else
			document.getElementById("benefit_block").style.display = "none";
    	}

    function showAdditional()
		{
		if (document.getElementById("additional").checked)
        	document.getElementById("add_block").style.display = "block";
	    else
			document.getElementById("add_block").style.display = "none";
    	}

    function showNewSpc()
		{
		if (document.getElementById("new_name").checked)
        	document.getElementById("new_spc").style.display = "block";
	    else
			document.getElementById("new_spc").style.display = "none";
    	}

    function setNewSpc()
		{
		var list=document.getElementById("speciality");
		var new_cat=document.getElementById("new_speciality");
		new_cat.value= list.options[list.selectedIndex].value;
		}

	function setNewFac()
		{
		var list=document.getElementById("edit_faculty");
		var new_cat=document.getElementById("new_faculty");
		new_cat.value= list.options[list.selectedIndex].value;
		}

	function setNewTrn()
		{
		var list=document.getElementById("edit_training");
		var new_cat=document.getElementById("new_training");
		new_cat.value= list.options[list.selectedIndex].value;
		}

	function setNewSubSpc()
		{
		var list=document.getElementById("edit_specialization");
		var new_cat=document.getElementById("new_specialization");
		new_cat.value= list.options[list.selectedIndex].value;
		}


	function showAgree()
		{
		document.getElementById("agreement").style.display = "block";
		document.getElementById("agree_but").style.display = "none";
		}
