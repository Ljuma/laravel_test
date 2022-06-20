<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit post</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Edit</h2>
  <form method="post" action="{{route('post.update',$post->id)}}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_method" value="PUT">
 
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" class="form-control" id="title" value="{{$post->title}}" name="title" required>
      </div>
  
    
  
        <label for="short_description">Short Description:</label>
        <textarea  class="form-control" id="short_description" name="short_description" rows="20" cols="20" required>{{$post->short_description}}  </textarea>
        <label for="content">Content:</label>
        <textarea  class="form-control" id="content" name="content" rows="20" cols="20" required>{{$post->content}}</textarea>

        <div class="form-group">
          <label for="picture"> New picture(opt):</label>
          <input type="file" class="form-control" id="picture"  name="picture" >
          <img height="100px" width="100px" src="{{asset('pictures/'.$post->picture)}}" >       
        </div>
 
    <button type="submit" class="btn btn-default">Save</button>
  </form>
</div>

</body>
</html>