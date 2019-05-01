function verify(){

  var name = document.getElementById('name');
  var id = document.getElementById('id');
  var transfer = document.getElementById('transfer');
  var major = document.getElementById('major');
  var advisor = document.getElementById('advisor');
  var units = document.getElementById('units');
  var space = document.getElementById('space');

  //get the value of each field from the form and validating it if it is empty then change the field border color to remind the user
  if(name.value == '' || id.value == '' || transfer.value == '' || major.value == '' || advisor.value == '' || units.value == ''){
    if(name.value == ''){
      name.style.border = "1px solid #FF0000";
    }else{
      name.style.border = "1px solid #CCC";
    }
    if(id.value == ''){
      id.style.border = "1px solid #FF0000";
    }else{
      id.style.border = "1px solid #CCC";
    }
    if(transfer.value == ''){
      transfer.style.border = "1px solid #FF0000";
    }else{
      transfer.style.border = "1px solid #CCC";
    }
    if(major.value == ''){
      major.style.border = "1px solid #FF0000";
    }else{
      major.style.border = "1px solid #CCC";
    }
    if(advisor.value == ''){
      advisor.style.border = "1px solid #FF0000";
    }else{
      advisor.style.border = "1px solid #CCC";
    }
    if(units.value == ''){
      units.style.border = "1px solid #FF0000";
    }else{
      units.style.border = "1px solid #CCC";
    }
  }else{
    //the variable number,stores the number of tables by round up the result by deividing the total credit - input credit by 7 because 7 is the number of rows in a table
    var number = Math.ceil((122-units.value)/7);
    //xml is an ajax object for communication between js and php without refrshing the page
    var xml = new XMLHttpRequest();
    //modify http request and pass the number of tables to php for further process
    xml.open("GET","php/table.php?number="+number,true);
    xml.onreadystatechange = function(){
      if(xml.readyState == 4 && xml.status == 200){
        //check for http request data, both 4 and 200 means connection established succesfully
        var response = xml.responseText;
        space.innerHTML = response;
      }
    }
    xml.send(null);
  }

}
