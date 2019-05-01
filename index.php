<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>HCMN-DCP</title>
  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"/>
  <link rel="stylesheet" href="css/index.css"/>

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>

  <script src="js/verify.js"></script>
</head>
<body>

  <nav class="navbar navbar-inverse">
    <header onclick="window.location='https://www.towson.edu'" class="navbar-brand">Towson University</header>
  </nav>

  <main>

    <div class="container-fluid">
      <h1><b>HCMN(Health Care Management) DCP Tool</b></h1><hr/>

      <div class="container-fluid">
        <div class="row" id="wrapper">

          <!--contain the forms and main functions-->
          <div class="col-sm-9 col-md-9 col-lg-9 col-xl-9 left" id="left">

            <!--form-->

            <div class="row">
              <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                <input class="form-control" type="text" id="name" placeholder="Full Name"/>
              </div>

              <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                <input class="form-control" type="number" id="id" placeholder="Towson Student ID #"/>
              </div>

              <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                <input class="form-control" type="number" id="year" placeholder="Catalog Year"/>
              </div>

              <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                <select class="form-control" id="transfer">
                  <option value="">Admitted as Transfer</option>
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
                </select>
              </div>
            </div><br/>

            <div class="row">
              <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                <input class="form-control disabled" type="text" id="major" value="Health Care Management"/>
              </div>

              <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                <input class="form-control" type="text" id="track" placeholder="Concentration Track"/>
              </div>

              <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                <select class="form-control" id="advisor">
                  <option value="">Advisors</option>
                  <script>
                    /*all the names of professors are stored in advisor.txt stored in core directory*/
                    $.get('core/advisor.txt', function(data) {
                      var lines = data.split("\n");
                      lines.pop();
                      $.each(lines, function(n, urlRecord) {
                        if(urlRecord != ''){
                          $('#advisor').append('<option value='+urlRecord+'>' + urlRecord + '</option>');
                        }
                      });
                    });
                  </script>
                </select>
              </div>

              <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                <input class="form-control" type="number" id="units" placeholder="Total Units Earned"/>
              </div>
            </div><br/>

            <!--after user click submit button to verify the form, an ajax js function named verify will be fired externally-->
            <button onclick="verify()" style="float:right" class="btn btn-primary">Verify</button>

            <div id="space">
            </div>

          </div>

          <!--right side panel contains advisary information-->
          <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 right">
            <div id="f-plan">
              <center>
                <h2 style="padding: 15px"><b>Academic Plan</b></h2>
              </center>
              <a onclick="window.location='four_year_plan.html'" style="padding: 15px;cursor:pointer;color:#000000">Four-Year Plan</a><br/><br/>
            </div>

            <!--prerequisites for the major-->
            <div id="info">
              <center>
                <h2 style="padding: 15px"><b>Prerequisite</b></h2>
              </center>
              <p style="padding: 10px">
                HLTH 207(Core 11)<br/><br/>
                ENGL 317(Core 9) prerequisite is ENGL 102<br/><br/>
                HCMN 305 prerequisite is HLTH 207<br/><br/>
                HCMN 413 prerequisite is HLTH 207 or concent of instructor<br/><br/>
                HCMN 415 prerequisite is HLTH 207 or HCMN 305<br/><br/>
                HCMN 441(Core 14) prerequisite is HLTH 207<br/><br/>
                AHLT 445(Core 3), junior/senior standing, GERO, AHLT, or HCMN major, or consent of department<br/><br/>
                HCMN 495 prerequisite is completion of all required courses with 2.00 or higher grade equivalent and permission of department chair. Graded S/U<br/><br/>
                ACCT 202 prerequisite is ACCT 201 or ACCT 211<br/><br/>
                MATH 231 and ECON 205(Core 3) are equivalent<br/><br/>
                GERO 350 prerequisite is GERO 101<br/><br/>
                HCMN 417 prerequisite is HLTH 207 or consent of instructor<br/><br/>
                HCMN 419 prerequisite is HLTH 207, HCMN 305, and HCMN 413 or consent of instructor<br/><br/>
              </p>
            </div>

            <!--overlapping major and core courses-->
            <div id="overlap">
              <center>
                <h3 style="padding: 15px"><b>Overlapping Major/Core Courses</b></h3>
              </center>
              <p style="padding: 10px">
                Core 3 Mathematics - MATH 231 or ECON 205<br/><br/>
                Core 6 Social & Behavioral Science - GERO 101, ECON 201, ECON 202<br/><br/>
                Core 9 Advanced Writing Seminar - ENGL 317<br/><br/>
                Core 11 The United States as a Nation - HLTH 207<br/><br/>
                Core 14 Ethical Issues & Perspectives - HCMN 441<br/><br/>
              </p>
            </div>

            <!--instrumental video-->
            <div id="video">
              <center>
                <h2 style="padding: 5px"><b>Demo</b></h2>
                <video style="margin-top:-30px" width="90%" height="240" controls>
                 <source src="src/record.mp4" type="video/mp4">
                 Your browser does not support the video tag.
                </video>
              </center>
            </div>

          </div>

        </div>
      </div>

    </div>

  </main>

  <!--pop up modal contains course selection menus-->
  <div class="modal" tabindex="-1" role="dialog" id="course">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div style="padding-bottom:50px" class="modal-body">

          <!--dropddown menus includes general course categories-->
          <select class='form-control' id="select-type">
            <option value="">Select Type</option>
            <option value="major">Major</option>
            <option value="minor">Minor</option>
            <option value="long-term-care-track">Long-Term-Care-Track</option>
            <option value="core-1">Core-1</option>
            <option value="core-2">Core-2</option>
            <option value="core-3">Core-3</option>
            <option value="core-4">Core-4</option>
            <option value="core-5">Core-5</option>
            <option value="core-6">Core-6</option>
            <option value="core-7">Core-7</option>
            <option value="core-8">Core-8</option>
            <option value="core-9">Core-9</option>
            <option value="core-10">Core-10</option>
            <option value="core-11">Core-11</option>
            <option value="core-12">Core-12</option>
            <option value="core-13">Core-13</option>
            <option value="core-14">Core-14</option>

          </select>

          <div style="margin-top:20px" class="row">
            <div style="height:350px;overflow:scroll;border:1px solid #EEEEEE;padding:20px" class="col-sm-6 col-md-6 col-lg-6 col-xl-6" id="course-list">
              <script>

                /*store user's selection into variable types and switch it to determine which course category user selected*/
                $("#select-type").on('blur',function(){
                  $('#confirmed-type').html($(this).val());

                  var types = $(this).val();

                  switch (types) {
                    /*if user's selection is core-1 then pull all the course information from the file, core_1.txt, stored in the directory core*/
                    case "core-1":
                      $.get('core/core_1.txt', function(data) {
                        var lines = data.split("\n");
                        lines.pop();
                        $('#course-list').html(' ');
                        $.each(lines, function(n, urlRecord) {
                             $('#course-list').append('<div class="single-course">' + urlRecord + '</div>');
                             /*give each course in the list a click event; when click, it will appear in the course description box*/
                             $('.single-course').on('click',function(){
                               $('#confirmed-course').html($(this).html());
                               $('#course-descript').html('<div class="single-course">' + $(this).html() + '</div>');
                             });
                        });
                      });
                      break;

                    /*all remaining cases are same as the first one*/
                    case "core-2":
                      $.get('core/core_2.txt', function(data) {
                        var lines = data.split("\n");
                        lines.pop();
                        $('#course-list').html(' ');
                        $.each(lines, function(n, urlRecord) {
                             $('#course-list').append('<div class="single-course">' + urlRecord + '</div>');
                             $('.single-course').on('click',function(){
                               $('#confirmed-course').html($(this).html());
                               $('#course-descript').html('<div class="single-course">' + $(this).html() + '</div>');
                             });
                        });
                      });
                      break;

                    case "core-3":
                      $.get('core/core_3.txt', function(data) {
                        var lines = data.split("\n");
                        lines.pop();
                        $('#course-list').html(' ');
                        $.each(lines, function(n, urlRecord) {
                             $('#course-list').append('<div class="single-course">' + urlRecord + '</div>');
                             $('.single-course').on('click',function(){
                               $('#confirmed-course').html($(this).html());
                               $('#course-descript').html('<div class="single-course">' + $(this).html() + '</div>');
                             });
                        });
                      });
                      break;

                    case "core-4":
                      $.get('core/core_4.txt', function(data) {
                        var lines = data.split("\n");
                        lines.pop();
                        $('#course-list').html(' ');
                        $.each(lines, function(n, urlRecord) {
                             $('#course-list').append('<div class="single-course">' + urlRecord + '</div>');
                             $('.single-course').on('click',function(){
                               $('#confirmed-course').html($(this).html());
                               $('#course-descript').html('<div class="single-course">' + $(this).html() + '</div>');
                             });
                        });
                      });
                      break;

                    case "core-5":
                      $.get('core/core_5.txt', function(data) {
                        var lines = data.split("\n");
                        lines.pop();
                        $('#course-list').html(' ');
                        $.each(lines, function(n, urlRecord) {
                             $('#course-list').append('<div class="single-course">' + urlRecord + '</div>');
                             $('.single-course').on('click',function(){
                               $('#confirmed-course').html($(this).html());
                               $('#course-descript').html('<div class="single-course">' + $(this).html() + '</div>');
                             });
                        });
                      });
                      break;

                    case "core-6":
                      $.get('core/core_6.txt', function(data) {
                        var lines = data.split("\n");
                        lines.pop();
                        $('#course-list').html(' ');
                        $.each(lines, function(n, urlRecord) {
                             $('#course-list').append('<div class="single-course">' + urlRecord + '</div>');
                             $('.single-course').on('click',function(){
                               $('#confirmed-course').html($(this).html());
                               $('#course-descript').html('<div class="single-course">' + $(this).html() + '</div>');
                             });
                        });
                      });
                      break;

                    case "core-7":
                      $.get('core/core_7.txt', function(data) {
                        var lines = data.split("\n");
                        lines.pop();
                        $('#course-list').html(' ');
                        $.each(lines, function(n, urlRecord) {
                             $('#course-list').append('<div class="single-course">' + urlRecord + '</div>');
                             $('.single-course').on('click',function(){
                               $('#confirmed-course').html($(this).html());
                               $('#course-descript').html('<div class="single-course">' + $(this).html() + '</div>');
                             });
                        });
                      });
                      break;

                    case "core-8":
                      $.get('core/core_8.txt', function(data) {
                        var lines = data.split("\n");
                        lines.pop();
                        $('#course-list').html(' ');
                        $.each(lines, function(n, urlRecord) {
                             $('#course-list').append('<div class="single-course">' + urlRecord + '</div>');
                             $('.single-course').on('click',function(){
                               $('#confirmed-course').html($(this).html());
                               $('#course-descript').html('<div class="single-course">' + $(this).html() + '</div>');
                             });
                        });
                      });
                      break;

                    case "core-9":
                      $.get('core/core_9.txt', function(data) {
                        var lines = data.split("\n");
                        lines.pop();
                        $('#course-list').html(' ');
                        $.each(lines, function(n, urlRecord) {
                             $('#course-list').append('<div class="single-course">' + urlRecord + '</div>');
                             $('.single-course').on('click',function(){
                               $('#confirmed-course').html($(this).html());
                               $('#course-descript').html('<div class="single-course">' + $(this).html() + '</div>');
                             });
                        });
                      });
                      break;

                    case "core-10":
                      $.get('core/core_10.txt', function(data) {
                        var lines = data.split("\n");
                        lines.pop();
                        $('#course-list').html(' ');
                        $.each(lines, function(n, urlRecord) {
                             $('#course-list').append('<div class="single-course">' + urlRecord + '</div>');
                             $('.single-course').on('click',function(){
                               $('#confirmed-course').html($(this).html());
                               $('#course-descript').html('<div class="single-course">' + $(this).html() + '</div>');
                             });
                        });
                      });
                      break;

                    case "core-11":
                      $.get('core/core_11.txt', function(data) {
                        var lines = data.split("\n");
                        lines.pop();
                        $('#course-list').html(' ');
                        $.each(lines, function(n, urlRecord) {
                             $('#course-list').append('<div class="single-course">' + urlRecord + '</div>');
                             $('.single-course').on('click',function(){
                               $('#confirmed-course').html($(this).html());
                               $('#course-descript').html('<div class="single-course">' + $(this).html() + '</div>');
                             });
                        });
                      });
                      break;

                    case "core-12":
                      $.get('core/core_12.txt', function(data) {
                        var lines = data.split("\n");
                        lines.pop();
                        $('#course-list').html(' ');
                        $.each(lines, function(n, urlRecord) {
                             $('#course-list').append('<div class="single-course">' + urlRecord + '</div>');
                             $('.single-course').on('click',function(){
                               $('#confirmed-course').html($(this).html());
                               $('#course-descript').html('<div class="single-course">' + $(this).html() + '</div>');
                             });
                        });
                      });
                      break;

                    case "core-13":
                      $.get('core/core_13.txt', function(data) {
                        var lines = data.split("\n");
                        lines.pop();
                        $('#course-list').html(' ');
                        $.each(lines, function(n, urlRecord) {
                             $('#course-list').append('<div class="single-course">' + urlRecord + '</div>');
                             $('.single-course').on('click',function(){
                               $('#confirmed-course').html($(this).html());
                               $('#course-descript').html('<div class="single-course">' + $(this).html() + '</div>');
                             });
                        });
                      });
                      break;

                    case "core-14":
                      $.get('core/core_14.txt', function(data) {
                        var lines = data.split("\n");
                        lines.pop();
                        $('#course-list').html(' ');
                        $.each(lines, function(n, urlRecord) {
                             $('#course-list').append('<div class="single-course">' + urlRecord + '</div>');
                             $('.single-course').on('click',function(){
                               $('#confirmed-course').html($(this).html());
                               $('#course-descript').html('<div class="single-course">' + $(this).html() + '</div>');
                             });
                        });
                      });
                      break;

                    case "major":
                      $.get('core/major.txt', function(data) {
                        var lines = data.split("\n");
                        lines.pop();
                        $('#course-list').html(' ');
                        $.each(lines, function(n, urlRecord) {
                             $('#course-list').append('<div class="single-course">' + urlRecord + '</div>');
                             $('.single-course').on('click',function(){
                               $('#confirmed-course').html($(this).html());
                               $('#course-descript').html('<div class="single-course">' + $(this).html() + '</div>');
                             });
                        });
                      });
                      break;

                    case "minor":
                      $.get('core/minor.txt', function(data) {
                        var lines = data.split("\n");
                        lines.pop();
                        $('#course-list').html(' ');
                        $.each(lines, function(n, urlRecord) {
                             $('#course-list').append('<div class="single-course">' + urlRecord + '</div>');
                             $('.single-course').on('click',function(){
                               $('#confirmed-course').html($(this).html());
                               $('#course-descript').html('<div class="single-course">' + $(this).html() + '</div>');
                             });
                        });
                      });
                      break;

                    case "long-term-care-track":
                      $.get('core/long_term_care_track.txt', function(data) {
                        var lines = data.split("\n");
                        lines.pop();
                        $('#course-list').html(' ');
                        $.each(lines, function(n, urlRecord) {
                             $('#course-list').append('<div class="single-course">' + urlRecord + '</div>');
                             $('.single-course').on('click',function(){
                               $('#confirmed-course').html($(this).html());
                               $('#course-descript').html('<div class="single-course">' + $(this).html() + '</div>');
                             });
                        });
                      });
                      break;
                  }

                });
              </script>
            </div>

            <div style="height:350px;overflow:scroll;border:1px solid #EEEEEE;padding:20px" class="col-sm-6 col-md-6 col-lg-6 col-xl-6" id="course-descript">
            </div>
          </div>

          <div class="row">
            <div style="height:50px;border:2px solid #EEEEEE;padding:5px" class="col-sm-6 col-md-6 col-lg-6 col-xl-6" id="confirmed-type">
            </div>

            <div style="height:50px;border:2px solid #EEEEEE;padding:5px" class="col-sm-6 col-md-6 col-lg-6 col-xl-6" id="confirmed-course">
            </div>
          </div><br/>

          <button type="button" class="close" data-dismiss="modal" id="btn" style="float:right" class="btn btn-primary">Submit</button>

        </div>
      </div>
    </div>
  </div>

  <script>
    var saved = "";

    function edit(number){

      var type = [1,4,7,10,13,16,19,22];
      var prefix = '#t';
      var id = prefix.concat(number);

      if(type.indexOf(number%100) >= 0){
        if(number%100 == 22){
          var range = (number - (number%100));

          if($(prefix.concat(range+3)).html() == ''){
            var e_1 = 0
          }else{
            var e_1 = parseInt($(prefix.concat(range+3)).html());
          }
          if($(prefix.concat(range+6)).html() == ''){
            var e_2 = 0
          }else{
            var e_2 = parseInt($(prefix.concat(range+6)).html());
          }
          if($(prefix.concat(range+9)).html() == ''){
            var e_3 = 0
          }else{
            var e_3 = parseInt($(prefix.concat(range+9)).html());
          }
          if($(prefix.concat(range+12)).html() == ''){
            var e_4 = 0
          }else{
            var e_4 = parseInt($(prefix.concat(range+12)).html());
          }
          if($(prefix.concat(range+15)).html() == ''){
            var e_5 = 0
          }else{
            var e_5 = parseInt($(prefix.concat(range+15)).html());
          }
          if($(prefix.concat(range+18)).html() == ''){
            var e_6 = 0
          }else{
            var e_6 = parseInt($(prefix.concat(range+18)).html());
          }
          if($(prefix.concat(range+21)).html() == ''){
            var e_7 = 0
          }else{
            var e_7 = parseInt($(prefix.concat(range+21)).html());
          }


          $(id).html(e_1 + e_2 + e_3 + e_4 + e_5 + e_6 + e_7);
        }else{
          saved = id;
        }
      }
    }
  </script>

  <script>
    $("#btn").on('click',function(){
      $(saved).html($('#confirmed-type').html());
      $(saved).next().html($('#confirmed-course').html());

      var four_credits = ['ASTR 161','ASTR 162','ASTR 181','BIOL 117','BIOL 120','BIOL 191','BIOL 192','BIOL 200','BIOL 202','CHEM 104','CHEM 115','CHEM 121','CHEM 131','CHEM 132','GEOL 121','GEOL 122','PHSC 101','PHYS 131','PHYS 143','PHYS 212','PHYS 241','PHYS 242','PHYS 251','PHYS 252'];

      if($('#confirmed-course').html().substring(0,8) == "HCMN 495"){
        $(saved).next().next().html(12);
      }else if(four_credits.indexOf($('#confirmed-course').html().substring(0,8)) >= 0){
        $(saved).next().next().html(4);
      }else if($('#confirmed-course').html().substring(0,8) == "PHYS 202"){
        $(saved).next().next().html(5);
      }else{
        $(saved).next().next().html(3);
      }

    });
  </script>

  <script>
    function total_credits(num){
      var subtotal = 0;
      for(var i = 1; i <= num; i++){
        var prefix = "#t";
        var nid = prefix.concat(i*100+22);
        subtotal += parseInt($(nid).html());
      }
      $("#total_credits").html(subtotal);
    }
  </script>

  <script>
    function condit(condition){
      if(condition == 101){
        clearInterval(time);
        $("#table_place").html('<div style="background-color:#F3D845;padding:15;text-align:center;margin-bottom:15px;border-radius:10px" class="bubble">Click to select a course</div>');
        var time = setTimeout(function(){
          $('.bubble').hide();
        },2000);
      }
    }

    function getSum(condition){
      if(condition == 122){
        clearInterval(time);
        $("#table_bottom").html('<div style="background-color:#F3D845;padding:15;text-align:center;margin-bottom:15px;border-radius:10px" class="bubble">Click to get the sum of credits</div>');
        var time = setTimeout(function(){
          $('.bubble').hide();
        },2000);
      }
    }

    function getTotal(condition){
      clearInterval(time);
      $("#table_total").html('<div style="background-color:#F3D845;padding:15;text-align:center;margin-bottom:15px;border-radius:10px;width:400px" class="bubble">Click to get the sum of all credits</div>');
      var time = setTimeout(function(){
        $('.bubble').hide();
      },2000);
    }
  </script>

  <script>

    function savePDF(){
      var pdf = new jsPDF('p', 'pt', 'letter');
      source = $('#left').html();
      specialElementHandlers = {
          '#bypassme': function(element, renderer) {
              return true
          }
      };
      margins = {
          top: 80,
          bottom: 60,
          left: 80,
          width: 522
      };
      pdf.fromHTML(
              source, // HTML string or DOM elem ref.
              margins.left, // x coord
              margins.top, {// y coord
                  'width': margins.width, // max width of content on PDF
                  'elementHandlers': specialElementHandlers
              },
      function(dispose) {
          pdf.save('Test.pdf');
      }
      , margins);
    }

  </script>


</body>
</html>
