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

var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "สมัครสมาชิก";
  } else {
    document.getElementById("nextBtn").innerHTML = "ต่อไป";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}



