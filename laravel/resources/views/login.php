<html>
        <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>       
    </head>
   <body>
   <div class="container">
      <?php
         echo $feilbeskjed;
         echo Form::open(array('url' => '/admin/login'));
            echo "Brukernavn: ";
            echo Form::text('brukernavn');
            echo '<br/>';
            
            echo "Passord: ";
            echo Form::password('passord');
            echo '<br/>';           
            
            echo Form::submit('Log Inn');
         echo Form::close();
      ?>
   </div>
      
   </body>
</html>

