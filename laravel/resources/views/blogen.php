<html>  
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>       
    </head>
    <body>
      <div class="container">
      <?php
          if($innlegg->bilde != ""){              
              echo "<div><img width='800' src='https://s3-eu-west-1.amazonaws.com/eyegotest/".$innlegg->bilde."' alt='' border='+' /></div>";
          }
   
          echo "<h1>".$innlegg->overskrift."</h1>";
          echo "<i>Skrevet av ".$innlegg->navn."</i><br />";
          echo "<p>".$innlegg->tekst."</p><br />";
     
      
      ?>
      </div>
   </body>
</html>
