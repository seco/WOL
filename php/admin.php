

 <!DOCTYPE html>
 <html>
 <head>
   <meta charset="UTF-8">
   <title>WOL</title>
   <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css'>
   <link rel="stylesheet" href="style.css">
   <?php
     include "config.php";
     //get the selected list item
     $selectedComputer = $_POST['computerName'];
     //instance of the xml DB
     $data = new SimpleXMLElement($xmlstr);
     //get the parent of the selectedComputer name with xpath
     $nodes = $data->xpath('//wolDB/computer/name[.="'. $selectedComputer .'"]/parent::*');
     $result = $nodes[0];
     $adress = $result->onAdress;
    ?>
 </head>
<body>
  <div class="container">
    <div class="jumbotron">
      <h2>Wake On Lan server config <?php echo $selectedComputer ?></h2>
      <form action="xmlUpdate.php" method="POST" id="form1">
        <div class="form-group">
          <div class="row">
            <div class="col-sm-4">
              <label>Name: <input type="text" id="computerNameTextBox" name="computerNameTextBox"></label>
            </div>
            <div class="col-sm-4">
              <label>on address: <input type="text" id="onAdressTextBox" name="onAdressTextBox"></label>
            </div>
            <div class="col-sm-4">
              <label>off address: <input type="text"  id="offAdressTextBox" name="offAdressTextBox"></label>
            </div>
          </div>
          <div class="row justify-content-end">
            <div class="col-sm-1">
              <input type="submit" value="send">
            </div>
            <div class="col-sm-1">
              <input type="button" value="delete">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>



</body>
</html>
