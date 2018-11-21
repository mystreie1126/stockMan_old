<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>LaravelAnswer</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      
  </head>
  <body>
    <div class="container">
        <h1>Ask a Question</h1>
      
        <hr/>
        <form action="{{route('question.store')}}" method="POST">
          
          <label for="title">Title</label>
          <input type="text" for="title" name="title" class="form-control"> 

          <label for="description">Description</label>
          <textarea for="description" name="description" class="form-control" rows="4"></textarea>
          <input type="submit" value="Submit Question" class="btn btn-primary">

          {{csrf_field()}}
        </form>
        
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>