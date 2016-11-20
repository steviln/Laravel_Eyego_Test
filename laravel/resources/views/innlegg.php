<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>       
    </head>
   <body>
       <div class="container"><br /><br />
           <?php
         echo Form::open(array('url' => '/admin/innlegg', 'files' => 'true'));
            echo Form::hidden('id',$verdier['id']);
            echo "<div class=\"form-group\">";
            echo "<label>Overskrift: </label>";
            echo Form::text('overskrift',$verdier['overskrift']);
            echo '</div><br/>';
            
            echo "<div class=\"form-group\">";
            echo "<label>Innlegg: </label><br />";
            echo Form::textarea('innlegg',$verdier['tekst']);
            echo '</div><br/>';
            
            echo "<div class=\"form-group\">";
            echo "<label>Bilde: </label>";
            echo Form::file('bilde',$verdier['bilde']);
            echo '</div><br/>';           
            
            echo Form::submit('Post Innlegg');
         echo Form::close();
      ?>
   </div>
      
   </body>
</html>
