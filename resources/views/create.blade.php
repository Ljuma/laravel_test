<!DOCTYPE html>
<html lang="en">
<head>
  <title>Create post</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Create Post</h2>
  <form action="{{route('post.store')}} " method="POST" enctype="multipart/form-data">
    @csrf
    @method('post')
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" placeholder="Enter the title" name="title" required>
    </div>

 

      <label for="short_description">Short Description:</label>
      <textarea  class="form-control" id="short_description" name="short_description" rows="20" cols="20" required></textarea>
      <label for="content">Content:</label>
      <textarea  class="form-control" id="content" name="content" rows="20" cols="20" required></textarea>


      <div class="form-group">
        <label for="picture">Picture:</label>
        <input type="file" class="form-control" id="picture" name="picture" required>
      </div>

 
    <button type="submit" class="btn btn-default">Create</button>
  </form>
</div>

</body>
</html>
