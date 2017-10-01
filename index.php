<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>WOL</title>
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css'>
  <link rel="stylesheet" href="css/style.css">
</head>

    <body>
      <div class="container">
        <div class="jumbotron">
          <h2>Wake On Lan server</h2>
          <form action="src.php" method="post" id="form1">
            <div class="form-group">
              <div class="row">
                <div class="col-sm-4">
                  <select class="form-control" name="computerName" id="computerName" title="Select Computer to wake">
                    <?php
                      include "php/config.php";
                      $wolDB = new SimpleXMLElement($xmlstr);
                      /* pour chaque computer on affiche name*/
                      foreach ($wolDB->computer as $computer) {
                         echo "<option>". $computer->name;
                      }
                    ?>

                  </select>
                </div>
                <div class="col-sm-2">
                  <button type="button" class="btn btn-primary" title="Wake Up" onclick ="submitForm('php/src.php')">Wake Up</button>
                </div>
                <div class="col-sm-2">
                  <button type="button" class="btn btn-primary" title="Shut Down" onclick ="submitForm('php/off.php')">Shut Down</button>
                </div>
                <div class="col-sm-2">
                  <button type="button" class="btn" title="Ping" onclick ="submitForm('index.php')">Ping</button>
                </div>
                <div class="col-sm-2">
                  <button type="button" class="btn" title="Config" onclick ="submitForm('php/admin.php')">Config</button>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-2">
                  <?php
                    if(isset($_POST['computerName']) && !empty($_POST['computerName'])){
                      //get the selected list item
                      $selectedComputer = $_POST['computerName'];
                      //instance of the xml DB
                      $data = new SimpleXMLElement($xmlstr);
                      //get the parent of the selectedComputer name with xpath
                      $nodes = $data->xpath('//wolDB/computer/name[.="'. $selectedComputer .'"]/parent::*');
                      $result = $nodes[0];
                      $adress = $result->offAdress;

                      exec("ping -c 3 $adress", $output, $status);
                      //echo "$status";
                      if($status == "0"){
                        echo $selectedComputer." is on.";
                        $state = "power off";
                      }
                      elseif($status == "1" OR $status =="2"){
                        echo $selectedComputer." is off.";
                        $state = "power on";
                      }
                      else{
                        echo $selectedComputer."no status";
                        $state = "power on.";
                      }
                    }
                   ?>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </body>

    <footer id="foot">
      <h6>Designed by Thetheos</h6>
    </footer>

    <script type="text/javascript">
      function submitForm(action) {
        var form = document.getElementById('form1');
        form.action = action;
        form.submit();
      }
    </script>

</html>
