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

 	if (month == 0) month = "Січня";
   	if (month == 1) month = "Лютого";
    if (month == 2) month = "Березня";
    if (month == 3) month = "Квітня";
    if (month == 4) month = "Травня";
    if (month == 5) month = "Червня";
    if (month == 6) month = "Липня";
    if (month == 7) month = "Серпня";
    if (month == 8) month = "Вересня";
    if (month == 9) month = "Жовтня";
    if (month == 10) month = "Листопада";
    if (month == 11) month = "Грудня";

 	if (year<=99)year= "19"+year;
	if ((year>99) && (year<2000)) year+=1900;
 	date_holder = date + " " + month + " "+ year;

  	document.getElementById('jsTime').innerHTML = time_holder;
  	document.getElementById('jsDate').innerHTML = date_holder;
   	setTimeout(function(){clock(d);}, 1000);
   	}
