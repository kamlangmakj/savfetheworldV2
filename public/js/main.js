/*/////////////////////// datentime ///////////////////////*/
function datentime(){
  var d = new Date();
  var hours = d.getHours();
  var minutes = d.getMinutes();
  var seconds =d.getSeconds();
  // var day = d.getDay();
  var dates = d.getDate();
  var months = d.getMonth();
  var year = d.getFullYear()+543;
  // var dayname = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
  // var monthname = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
  // var dayname = ["อาทิตย์", "จันทร์", "อังคาร", "พุธ", "พฤหัสบดี", "ศุกร์", "เสาร์"];
  var monthname = ["ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ตุ.ค.", "พ.ย.", "ธ.ค."];
  if (dates < 10) {
    dates = "0" + dates;
  }
  // document.getElementById('dayndate').innerHTML= dayname[day] + ", "+ dates +" "+ monthname[months] +" "+ year;
  document.getElementById('dayndate').innerHTML=  dates +" "+ monthname[months] +" "+ year;

  if (seconds<10) {
    seconds = "0" + seconds;
  }
  if (minutes<10) {
    minutes = "0" + minutes;
  }
  if (hours<10) {
    hours = "0" + hours;
  }
  if (hours > 12) {
    hours = hours-12;
    if (hours<10) {
      hours = "0" + hours;
    }
    document.getElementById('time').innerHTML= hours + ":"+ minutes +":"+ seconds+ " PM";
  } else if(hours < 12) {
    document.getElementById('time').innerHTML= hours + ":"+ minutes +":"+ seconds+ " AM";
  } else if(hours = 12) {
    document.getElementById('time').innerHTML= hours + ":"+ minutes +":"+ seconds+ " PM";
  }
}
setInterval( function() {
  datentime();
},1000);

/*/////////////////////// end datentime ///////////////////////*/

/*/////////////////////// back-to-top ///////////////////////*/
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

/*/////////////////////// end back-to-top ///////////////////////*/

