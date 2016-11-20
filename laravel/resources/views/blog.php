<html>  
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>       
    </head>
    <body>
    <div class="container">
       
      <?php
      
      foreach($innlegg as $innlegget){
          echo "<div class=\"row\">";
          echo "<h1>".$innlegget->overskrift."</h1>";
          echo "<i>Skrevet av ".$innlegget->navn."</i><br />";
          echo "<p>".$innlegget->tekst."</p><br />";
          echo "<a href='/LaravelBlog/laravel/public/blog/innlegg/".$innlegget->id."'>Les mer</a><br /><br /><br />";
          echo "</div>";
      }
      
      ?>
    </div>
   </body>
</html>