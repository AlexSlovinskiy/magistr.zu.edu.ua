function clock(d)
	{
    var today = new Date(d);
	d+=1000;

	var hours = today.getHours();
	var minutes = today.getMinutes();
	var seconds = today.getSeconds();

	var month=today.getMonth();
	var date=today.getDate();
	var year=today.getYear();

	var time_holder;
	var date_holder;

	// add a leading zero if less than 10
 	hours = ((hours < 10) ? "0" + hours : hours);
	minutes = ((minutes < 10) ? "0" + minutes : minutes);
	seconds = ((seconds < 10) ? "0" + seconds : seconds);
 	time_holder = hours + ":" + minutes + ":" + seconds;

 	if (month == 0) month = "ѳ���";
   	if (month == 1) month = "������";
    if (month == 2) month = "�������";
    if (month == 3) month = "�����";
    if (month == 4) month = "������";
    if (month == 5) month = "������";
    if (month == 6) month = "�����";
    if (month == 7) month = "������";
    if (month == 8) month = "�������";
    if (month == 9) month = "������";
    if (month == 10) month = "���������";
    if (month == 11) month = "������";

 	if (year<=99)year= "19"+year;
	if ((year>99) && (year<2000)) year+=1900;
 	date_holder = date + " " + month + " "+ year;

  	document.getElementById('jsTime').innerHTML = time_holder;
  	document.getElementById('jsDate').innerHTML = date_holder;
   	setTimeout(function(){clock(d);}, 1000);
   	}
