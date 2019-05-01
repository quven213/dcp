<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>HCMN-DCP</title>
  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"/>

  <style>

    #panel{
      width: 400px;
      height: 270px;
      border-radius: 10px;
      background-color: #FFFFFF;
      padding: 15px;
      margin-top: 150px;
    }
    #space{
      color: #FF0000;
      margin-top: 150px;
    }

  </style>

</head>
<body style="background-color:#FC0">

  <nav class="navbar navbar-inverse">
    <header onclick="window.location='https://www.towson.edu'" class="navbar-brand">Towson University</header>
  </nav>

  <main>

    <center>
      <span id="space"></span>
      <div id="panel">
        <h2>Admin Panel</h2><br/>
        <input class="form-control" type="text" id="username" placeholder="Username"/><br/>
        <input class="form-control" type="password" id="password" placeholder="Password"/><br/>
        <button style="float:right" type="button" class="btn btn-primary" id="btn">Log In</button>
      </div>
    </center>

    <script>

      var btn = document.getElementById('btn');
      var username = document.getElementById('username');
      var password = document.getElementById('password');
      var space = document.getElementById('space');

      btn.addEventListener('click',function(){

        if(username.value == '' || password.value == ''){
          if(username.value == ''){
            username.style.border = "1px solid #FF0000";
          }else{
            username.style.border = "1px solid #CCC";
          }
          if(password.value == ''){
            password.style.border = "1px solid #FF0000";
          }else{
            password.style.border = "1px solid #CCC";
          }
        }else{
          var xml = new XMLHttpRequest();
          xml.open("POST","login.php",true)
          xml.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xml.onreadystatechange = function(){
            if(xml.readyState == 4 && xml.status == 200){
              var response = xml.responseText;
              if(response == 0){
                window.location = "admin_panel.php";
              }else{
                space.innerHTML = "Username and password do not match";
              }
            }
          }
          xml.send("username="+username.value+"&password="+password.value);
        }

      });

    </script>

  </main>

</body>
</html>
