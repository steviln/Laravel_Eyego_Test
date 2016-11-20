<html>
        <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>       
    </head>
   <body>
       <div class="container">
      <h1>Administrasjon av blogg</h1>
      <a href="/LaravelBlog/laravel/public/admin/innlegg">Skriv nytt innlegg</a>
      <h1>Tidligere innlegg</h1>
      <?php
      
      foreach($innlegg as $innlegget){
          echo "<a href='/LaravelBlog/laravel/public/admin/innlegg/".$innlegget->id."'>".$innlegget->overskrift."</a><br />";
      }
      
      ?>
      </div>
      
   </body>
</html>