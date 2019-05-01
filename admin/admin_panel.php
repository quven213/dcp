<?php
include 'database.php';
  session_start();
  if(!isset($_SESSION['status']) || $_SESSION['status'] == 1){
    echo '<script>window.location="index.php"</script>';
  }else{
    $obj = new database();
    $host = "localhost";
    $username = "root";
    $password = "";
    $db = "dcp";
    $con = $obj->connect($host,$username,$password,$db);
    $sql = "SELECT * FROM admin";
    $result = mysqli_query($con,$sql);
    if(!$result){
      die(mysqli_error($con));
    }else{
      $rows = mysqli_fetch_assoc($result);
      $status = $rows['status'];
    }
  }
?>
<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>HCMN-DCP</title>
  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"/>
  <script src="password_validation.js"></script>
  <style>

    #edit-pass{
      width: 400px;
      height=:200px;
      border-radius: 15px;
      padding: 20px;
      background-color: #FFFFFF;
      margin-top: 30px;
    }
    #control{
      margin-top: 150px;
    }
    .widget{
      height: 300px;
      padding: 30px;
      border-radius: 15px;
      padding-top: 110px;
      cursor: pointer;
      color: #FFFFFF;
      font-weight: bold;
    }
    .widget:hover{
      opacity: 0.7;
    }
    .gly{
      font-size: 60px;
      color: #FFFFFF;
    }
    .single_result{
      width: 100%;
      height: auto;
      padding: 10px;
      border-radius: 10px;
      background-color: #AAF3FF;
      margin-top: 15px;
    }
    #warning{
      width: auto;
      height: auto;
      padding: 10px;
      background-color: #FF0000;
      color: #FFFFFF;
      margin-top: 10px;
      border-radius: 5px;
    }

  </style>

  <script>
    window.onload = function(){
      var status = "<?php echo $status; ?>";
      if(status == "N"){
        document.getElementById('edit-pass').style.display = "block";
        document.getElementById('control').style.display = "none";
      }else{
        document.getElementById('edit-pass').style.display = "none";
        document.getElementById('control').style.display = "block";
      }
    }
  </script>

</head>
<body style="background-color: #D2EEFA">

  <nav class="navbar navbar-inverse">
    <header onclick="window.location='https://www.towson.edu'" class="navbar-brand">Towson University</header>
    <span style="float:right;margin-top:15px;margin-right:50px" class="badge">Hello <?php echo $rows['name']; ?></span>
  </nav>

  <main>

    <div class="container">

      <center>
        <div id="edit-pass">
          <form class="form-group" onsubmit="return pass_validate()" action="update_pass.php" method="post">
            <center><h3><b>Update Password</b></h3></center><br/>
            <span id="space" style="color:#FF0000;padding:10px;margin-bottom:10px"></span>
            <input class="form-control" type="password" name="password" id="password" placeholder="New Password"/><br/>
            <input class="form-control" type="password" name="c-password" id="c-password" placeholder="Confirm Password"/><br/>
            <input style="float:right" class="btn btn-primary" type="submit" value="Submit" name="submit" id="submit"/><br/>
          </form>
        </div>
      </center>

      <center>
        <div id="control">
          <div class="row">

            <div data-toggle="modal" data-target="#advisor" style="background-color:#F56242" class="col-sm-4 col-md-4 col-lg-4 widget">
              <span class="glyphicon glyphicon-user gly"></span>
              <h3>Advisors</h3>
            </div>

            <div data-toggle="modal" data-target="#files" style="background-color:#1F88EE" class="col-sm-4 col-md-4 col-lg-4 widget">
              <span class="glyphicon glyphicon-file gly"></span>
              <h3>Files</h3>
            </div>

            <div data-toggle="modal" data-target="#role-shift" style="background-color:#35F594" class="col-sm-4 col-md-4 col-lg-4 widget">
              <span class="glyphicon glyphicon-sort gly"></span>
              <h3>Roles</h3>
            </div>

          </div>
        </div>
      </center>

    </div>

  </main>

  <div class="modal" tabindex="-1" role="dialog" id="advisor">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div style="padding-bottom:50px" class="modal-body" id="modal_body">

          <button id="add" style="float:right" class="btn btn-primary">Add Advisor</button><br/><br/><br/>
          <div id="new_space"></div>

          <script>
            $('#add').on('click',function(){
              $('#new_space').append('<input class="form-control" id="new_advisor" type="text" placeholder="New Advisor Name"/><br/><button style="float:right" class="btn btn-primary" onclick="add()">Submit</button><br/><br/>');
            });

            $.get('../core/advisor.txt', function(data) {
              var lines = data.split("\n");
              lines.pop();
              window.count = 0;
              $.each(lines, function(n, urlRecord) {
                   count++;
                   var sr = "sr";
                   srid = sr.concat(count);
                   if(urlRecord != ''){
                     $('#modal_body').append('<div class="single_result" id="'+srid+'">' + urlRecord + '<span onclick="remove('+count+')" style="color:#FF0000;float:right;cursor:pointer">Remove</span></div>');
                   }
              });
              $("#modal_body").append('<div id="free-space"></div>');
              $("#modal_body").append('<br/><button class="close" data-dismiss="modal" onclick="submit()" style="float:right" class="btn btn-primary end-btn">Submit</button>');
            });

            function remove(num){
              var srr = "#sr";
              srrid = srr.concat(num);
              if(confirm("Do you want to remove this advisor?")){
                $(srrid).remove();
              }
            }

            function add(){
              var value = $('#new_advisor').val();
              $('#new_advisor').val('');
              var sr = "sr";
              count+=1;
              var srid = sr.concat(count);
              if(value != ''){
                $('#free-space').append('<div class="single_result" id="'+srid+'">' + value + '<span onclick="remove('+count+')" style="color:#FF0000;float:right;cursor:pointer">Remove</span></div>');
                var xml = new XMLHttpRequest();
                xml.open("GET","addAdvisor.php?value="+value,true);
                xml.onreadystatechange = function(){
                  if(xml.readyState == 4 && xml.status == 200){
                    var response = xml.responseText;
                  }
                }
                xml.send(null);
              }
            }

            function submit(){
              var srrr = "#sr";
              var values = [];
              for(var i = 1; i < count + 1; i++){
                srrrid = srrr.concat(i);
                values.push($(srrrid).text().substr(0,$(srrrid).text().length-6));
              }
              var test= "hey";
              var xml = new XMLHttpRequest();
              xml.open("GET","writeAdvisor.php?pa="+values,true);
              xml.onreadystatechange = function(){
                if(xml.readyState == 4 && xml.status == 200){
                  var response = xml.responseText;
                }
              }
              xml.send(null);
            }

          </script>

        </div>
      </div>
    </div>
  </div>

  <div class="modal" tabindex="-1" role="dialog" id="files">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div style="padding-bottom:50px" class="modal-body" id="modal_body">

          <div style="height:150px;margin-top:20px" id="file-wrapper">
            <div style="float:left;margin-left:100px" id="major">
              <span data-toggle="modal" data-target="#majors-display" style="font-size:150px;color:#AAAAAA;cursor:pointer" class="glyphicon glyphicon-file gly-file" data-dismiss="modal"></span>
              <center>Major</center>
            </div>

            <div style="float:left;margin-left:100px" id="ltc">
              <span data-toggle="modal" data-target="#ltc-display" style="font-size:150px;color:#AAAAAA;cursor:pointer" class="glyphicon glyphicon-file gly-file" data-dismiss="modal"></span>
              <center>Long Term Care</center>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="modal" tabindex="-1" role="dialog" id="majors-display">
    <div style="width:800px" class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div style="padding-bottom:50px" class="modal-body">

          <textarea style="height:350px;overflow:scroll" class="form-control" id="textarea"></textarea><br/>
          <button style="float:right" class="close" data-dismiss="modal" id="edit_btn">Submit</button>

          <script>
            $.get('../core/major.txt', function(data) {
              var lines = data.split("\n");
              $.each(lines, function(n, urlRecord) {
                   if(urlRecord != ''){
                     $('#textarea').append(urlRecord+"\n");
                   }
              });
            });

            $('#edit_btn').on('click',function(){
              var courses = $('#textarea').val().split("\n");
              var xml = new XMLHttpRequest();
              xml.open("GET","writeMajor.php?courses="+courses,true);
              xml.onreadystatechange = function(){
                if(xml.readyState == 4 && xml.status == 200){
                  var response = xml.responseText;
                }
              }
              xml.send(null);
            });
          </script>

        </div>
      </div>
    </div>
  </div>

  <div class="modal" tabindex="-1" role="dialog" id="ltc-display">
    <div style="width:800px" class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div style="padding-bottom:50px" class="modal-body">

          <textarea style="height:350px;overflow:scroll" class="form-control" id="ltc_textarea"></textarea><br/>
          <button style="float:right" class="close" data-dismiss="modal" id="ltc_btn">Submit</button>

          <script>
            $.get('../core/long_term_care_track.txt', function(data) {
              var lines = data.split("\n");
              $.each(lines, function(n, urlRecord) {
                   if(urlRecord != ''){
                     $('#ltc_textarea').append(urlRecord+"\n");
                   }
              });
            });

            $('#ltc_btn').on('click',function(){
              var ltc_courses = $('#ltc_textarea').val().split("\n");
              var xml = new XMLHttpRequest();
              xml.open("GET","writeLtc.php?courses="+ltc_courses,true);
              xml.onreadystatechange = function(){
                if(xml.readyState == 4 && xml.status == 200){
                  var response = xml.responseText;
                }
              }
              xml.send(null);
            });
          </script>

        </div>
      </div>
    </div>
  </div>

  <div class="modal" tabindex="-1" role="dialog" id="role-shift">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div style="padding-bottom:50px" class="modal-body">

          <center>
            <div id="warning">
              <p>You will no longer able to log back after role shift unless the current administrator shift role back to you! Please provide new administrator the username and the temporary password after you done role shift</p>
            </div><br/>
          </center>

          <center><span style='color:#FF0000' id="error_space"></span></center>
          <center><span style='color:#0000FF' id="handle_space"></span></center>

          <input class="form-control inputs" type="text" id="new_user" placeholder="New Admin Name"/><br/>
          <input class="form-control inputs" type="text" id="new_username" placeholder="New Admin Username"/><br/>
          <input class="form-control inputs" type="password" id="new_password" placeholder="New Admin Temporary Password"/><br/>
          <input class="form-control inputs" type="password" id="confirm_password" placeholder="Confirm New Admin Temporary Password"/><br/>
          <buttont class="btn btn-primary inputs" id="role-btn" style="float:right">Submit</button>

          <script>
            document.getElementById('role-btn').addEventListener('click',function(){
              var name = document.getElementById('new_user');
              var username = document.getElementById('new_username');
              var password = document.getElementById('new_password');
              var c_password = document.getElementById('confirm_password');
              if(name.value == '' || username.value == '' || password.value == '' || c_password.value == '' || password.value != c_password.value){
                if(name.value == ''){
                  name.style.border = "1px solid #FF0000";
                }else{
                  name.style.color = "1px solid #CCC";
                }
                if(username.value == ''){
                  username.style.border = "1px solid #FF0000";
                }else{
                  username.style.color = "1px solid #CCC";
                }
                if(password.value == ''){
                  password.style.border = "1px solid #FF0000";
                }else{
                  password.style.color = "1px solid #CCC";
                }
                if(c_password.value == ''){
                  c_password.style.border = "1px solid #FF0000";
                }else{
                  c_password.style.color = "1px solid #CCC";
                }
                if(password.value != c_password.value){
                  document.getElementById('error_space').innerHTML = "Password and Confirmed password do not match";
                }else{
                  document.getElementById('error_space').innerHTML = "";
                }
              }else{
                var xml = new XMLHttpRequest();
                xml.open("POST","newAdmin.php",true)
                xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xml.onreadystatechange = function(){
                  if(xml.readyState == 4 && xml.status == 200){
                    var response = xml.responseText;
                    if(response == 0){
                      $('.inputs').hide();
                      document.getElementById('handle_space').innerHTML = "New admin created successfully, and you will not able to log in after you log out";
                    }else{
                      reponse = 1;
                    }
                  }
                }
                xml.send("username="+username.value+"&password="+password.value+"&name="+name.value);
              }
            });
          </script>

        </div>
      </div>
    </div>
  </div>

</body>
</html>
