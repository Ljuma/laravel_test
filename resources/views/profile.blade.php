<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <section style="background-color: #eee;">
        <div class="container py-5">
          <div class="row">

            <div class="col">
                <nav  class="bg-light rounded-3 p-3 mb-4">
           <a class="nav-link px-lg-3 py-3 py-lg-4 " href="/post">Homepage</a>
        </nav>
            </div>
                
             @if(auth()->user())
             @if(auth()->user()->id==$user->id)
                    <div class="col">
                        <nav  class="bg-light rounded-3 p-3 mb-4">
                   <a class="nav-link px-lg-3 py-3 py-lg-4 " href="{{route('post.create')}}">Create</a>
                </nav>
                    </div>
                    @endif

                    <div  class="col">
                        <nav  class="bg-light rounded-3 p-3 mb-4">
                    <a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                    @csrf
                                </form> 
                            </nav> 
                    </div>
                    @endif
                
               
          </div>
      
          <div class="row">
            <div class="col-lg-4">
              <div class="card mb-4">
                <div class="card-body text-center">
                  <img src="{{asset('storage/userPictures/'.$user->id."/".$user->picture)}}" alt="avatar"
                    class="rounded-circle img-fluid" style="height:150px; width: 150px;">
                  <h5 class="my-3">{{$user->name}}</h5>
                  <p class="text-muted mb-1">
                    @if($user->admin=="yes")
                    <h5>Admin</h5>
                    @else
                    <h5>User</h5>
                    @endif
                
                </p>
                @if(auth()->user()) 
                @if(auth()->user()->id==$user->id)
                  <div class="d-flex justify-content-center mb-2">
                    <a href="/post/user/edit/{{$user->id}}"  class="btn btn-primary">Edit</a>
                    
                    <a href="/post/user/{{$user->id}}"  class="btn btn-outline-primary ms-1">View posts</a>
                  </div>
                  @endif
                  @endif
                 


                </div>
              </div>
            
            </div>
            <div class="col-lg-8">
              <div class="card mb-4">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Full Name</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{$user->name}}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Email</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{$user->email}}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">About</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{$user->about}}</p>
                    </div>
                  </div>
                 
                </div>
              </div>
              
                
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</body>
</html>