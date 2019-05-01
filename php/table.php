<?php
  //receive the number of tables passed from js through ajax
  $number = $_GET['number'];
  for($i = 1; $i <= $number; $i++){
    //loop through the number of tables to create the tables by for-loop
    echo '<div style="width:400px;height:auto" id="table">';
    echo '<div id="table_place"></div>';
    //selecting terms manually until year 2030
    echo '<select style="width:400px" class="form-control" id="term">';
    echo '<option value="">--Select Term--</option>';
    echo '<option value="Summer-2019">Summer-2019</option>';
    echo '<option value="Fall-2019">Fall-2019</option>';

    echo '<option value="Mini-2020">Mini-2020</option>';
    echo '<option value="Spring-2020">Spring-2020</option>';
    echo '<option value="Summer-2020">Summer-2020</option>';
    echo '<option value="Fall-2020">Fall-2020</option>';

    echo '<option value="Mini-2021">Mini-2021</option>';
    echo '<option value="Spring-2021">Spring-2021</option>';
    echo '<option value="Summer-2021">Summer-2021</option>';
    echo '<option value="Fall-2021">Fall-2021</option>';

    echo '<option value="Mini-2022">Mini-2022</option>';
    echo '<option value="Spring-2022">Spring-2022</option>';
    echo '<option value="Summer-2022">Summer-2022</option>';
    echo '<option value="Fall-2022">Fall-2022</option>';

    echo '<option value="Mini-2023">Mini-2023</option>';
    echo '<option value="Spring-2023">Spring-2023</option>';
    echo '<option value="Summer-2023">Summer-2023</option>';
    echo '<option value="Fall-2023">Fall-2023</option>';

    echo '<option value="Mini-2024">Mini-2024</option>';
    echo '<option value="Spring-2024">Spring-2024</option>';
    echo '<option value="Summer-2024">Summer-2024</option>';
    echo '<option value="Fall-2024">Fall-2024</option>';

    echo '<option value="Mini-2025">Mini-2025</option>';
    echo '<option value="Spring-2025">Spring-2025</option>';
    echo '<option value="Summer-2025">Summer-2025</option>';
    echo '<option value="Fall-2025">Fall-2025</option>';

    echo '<option value="Mini-2026">Mini-2026</option>';
    echo '<option value="Spring-2026">Spring-2026</option>';
    echo '<option value="Summer-2026">Summer-2026</option>';
    echo '<option value="Fall-2026">Fall-2026</option>';

    echo '<option value="Mini-2027">Mini-2027</option>';
    echo '<option value="Spring-2027">Spring-2027</option>';
    echo '<option value="Summer-2027">Summer-2027</option>';
    echo '<option value="Fall-2027">Fall-2027</option>';

    echo '<option value="Mini-2028">Mini-2028</option>';
    echo '<option value="Spring-2028">Spring-2028</option>';
    echo '<option value="Summer-2028">Summer-2028</option>';
    echo '<option value="Fall-2028">Fall-2028</option>';

    echo '<option value="Mini-2029">Mini-2029</option>';
    echo '<option value="Spring-2029>Spring-2029</option>';
    echo '<option value="Summer-2029">Summer-2029</option>';
    echo '<option value="Fall-2029">Fall-2029</option>';

    echo '<option value="Mini-2030">Mini-2030</option>';
    echo '<option value="Spring-2030">Spring-2030</option>';
    echo '<option value="Summer-2030">Summer-2030</option>';
    echo '<option value="Fall-2030">Fall-2030</option>';
    echo '</select>';

    echo '<table class="table table-bordered">';
    //table mainly include columns of type, course, and unit
    echo '<thead>';
    echo '<tr>';
    echo '<th></th>';
    echo '<th>Type</th>';
    echo '<th>Course</th>';
    echo '<th>Unit</th>';
    echo '</tr>';
    echo '</thead>';

    echo '<tbody>';
    echo '<tr>';
    echo '<td>1</td>';
    /*
    every cell in a table is given an id with t concatenate a number by the algorithm $i(number of table) * 100 + 2, + 3, + 4, .... + until 22,
    each of id is base on multiplication of 100 to keep the id of each cell distinct
    */
    echo '<td style="cursor:pointer" onmouseover="condit('.($i*100+1).')" data-toggle="modal" data-target="#course" class="cell" onclick="edit('.($i*100+1).')" id="t'.($i*100+1).'"></td>';
    //when mouse over the first cell fires function condit which can be found in index.php
    echo '<td id="t'.($i*100+2).'"></td>';
    echo '<td id="t'.($i*100+3).'"></td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>2</td>';
    echo '<td data-toggle="modal" data-target="#course" class="cell" onclick="edit('.($i*100+4).')" id="t'.($i*100+4).'"></td>';
    echo '<td id="t'.($i*100+5).'"></td>';
    echo '<td id="t'.($i*100+6).'"></td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>3</td>';
    echo '<td data-toggle="modal" data-target="#course" class="cell" onclick="edit('.($i*100+7).')" id="t'.($i*100+7).'"></td>';
    echo '<td id="t'.($i*100+8).'"></td>';
    echo '<td id="t'.($i*100+9).'"></td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>4</td>';
    echo '<td data-toggle="modal" data-target="#course" class="cell" onclick="edit('.($i*100+10).')" id="t'.($i*100+10).'"></td>';
    echo '<td id="t'.($i*100+11).'"></td>';
    echo '<td id="t'.($i*100+12).'"></td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>5</td>';
    echo '<td data-toggle="modal" data-target="#course" class="cell" onclick="edit('.($i*100+13).')" id="t'.($i*100+13).'"></td>';
    echo '<td id="t'.($i*100+14).'"></td>';
    echo '<td id="t'.($i*100+15).'"></td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>6</td>';
    echo '<td data-toggle="modal" data-target="#course" class="cell" onclick="edit('.($i*100+16).')" id="t'.($i*100+16).'"></td>';
    echo '<td id="t'.($i*100+17).'"></td>';
    echo '<td id="t'.($i*100+18).'"></td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>7</td>';
    echo '<td data-toggle="modal" data-target="#course" class="cell" onclick="edit('.($i*100+19).')" id="t'.($i*100+19).'"></td>';
    echo '<td id="t'.($i*100+20).'"></td>';
    echo '<td id="t'.($i*100+21).'"></td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td>Total</td>';
    echo '<td style="cursor:pointer" onmouseover="getSum('.($i*100+22).')" class="cell end" onclick="edit('.($i*100+22).')" id="t'.($i*100+22).'" colspan="3"></td>';
    echo '</tr>';
    echo '</tbody>';

    echo '</table>';
    echo '<div id="table_bottom"></div>';
    echo '</div>';
  }

  echo '<div id="note">';
  echo '<label>Total Credits</label>';
  echo '<div onmouseover="getTotal()" onclick="total_credits('.$number.')" id="total_credits"></div><br/>';
  echo '<div id="table_total"></div>';
  echo '<label>Advisor Notes</label>';
  echo '<textarea col="15" rows="5" class="form-control"></textarea><br/>';
  echo '<label>Student Notes</label>';
  echo '<textarea col="15" rows="5" class="form-control"></textarea><br/>';

  echo '<div class="row">';

  echo '<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">';
  echo '<input class="form-control type="text" placeholder="Student Signature"/>';
  echo '</div>';

  echo '<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">';
  echo '<input class="form-control type="date" name="date" placeholder="Date"/>';
  echo '</div>';

  echo '</div><br/>';

  echo '<div class="row">';

  echo '<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">';
  echo '<input class="form-control type="text" placeholder="Advisor Signature"/>';
  echo '</div>';

  echo '<div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">';
  echo '<input class="form-control type="date" name="date" placeholder="Date"/>';
  echo '</div><br/></br><br/><br/>';

  echo '<button onclick="savePDF()" type="button" class="btn btn-primary" id="pdf_btn" style="float:right">Save</button>';

  echo '</div><br/>';

  echo '</div>';



?>
