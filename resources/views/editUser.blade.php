<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Edit user</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

 
        <link href="css/styles.css" rel="stylesheet"/>
        <style>
             
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
      
      .h-over-pic{
           width: 100%;
           text-align: center;
      }
      .navbar{
        padding: 8px 16px;
      }
a{
    text-decoration: none;
}
.btn-group>a{
    transition: 0.3s;
}
.btn-group>a:hover{
    background-color: white !important;
    color: black !important;
}
button[type="submit"]{
    transition: 0.3s;
}
button[type="submit"]:hover{
    background-color: white !important;
    color: black !important;
}
        @media(min-width:992px){
                body{
                    position: relative;
                }
                
                
                .color-red{
                    color: blue !important;
                }
                .pagination{
                   justify-content: center;
                }
            }
            
         .navbar{
            flex-wrap: nowrap;
         }
         .link-za-user{
            display: flex;
            align-items: center;
            min-width: fit-content;
            height: fit-content;
            padding: 0 !important;
         }  
         .user{
            font-size: 1.125em;
            
            
         }

         .flexara{
            display: flex;
            flex-wrap: nowrap;
            min-width: max-content;
         }
         .dropdown-content{
            display: none;
           
         }
         
         .dropdown:hover .dropdown-content{
            display: flex;
            justify-content: center;
            
         }
         .dropdown{
            margin-top: 0em;
            
            
         }
         .customclass{
            width: 100%;
            background-color: lightgray;
            justify-self: center;
            text-align: center;
            transition: 0.5s ;
         }
         .customclass:hover{
            background-color: wheat !important;

         }
        </style>
    </head>
    <body>
        <!-- Navigation-->
        
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="/post">Homepage</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto py-4 py-lg-0" style="align-items:center;">
                        @if ( ! auth()->user())


                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4 "  style="color:red;" href="{{route('register')}}">Register</a></li>
                        <li class="nav-item "><a class="nav-link px-lg-3 py-3 py-lg-4 " href="{{route('home')}}" style="color:red;">Login</a></li>
                        @else
                        
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4 " href="{{route('post.create')}}"><b>Create</b></a></li>

                        <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <b>{{ __('Logout') }}</b>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                        @csrf
                                    </form> </li>
                        @endif

                        <!-- treba pomjeriti -->
                       
                    </ul>
                    
                </div>
                
            </div>
            @if (auth()->user())
            <div class="dropdown">
            <a class="dropbtn link-za-user nav-link px-lg-3 py-3 py-lg-4 color-red" 
            href="posts/myposts">
            <div class="flexara">
                        <img style="width:30px;height:30px;border-radius:50%;" src="{{asset('storage/userPictures/'.auth()->user()->id.'/'.auth()->user()->picture)}}" alt=""> &nbsp; <b class="user">{{auth()->user()->name}}</b></div>
            <div class="dropdown-content">
                <a href="{{url('/post/myprofile')}}" class="customclass">My profile</a>
                </div>
            </a>
</div>
            
            @endif
                        
            
        </nav>
         <div class="container">

         <form method="post" action="{{url('post/user/update/'.$user->id)}}" enctype="multipart/form-data">

            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
 
    <div class="form-group">
        <label for="title">Name:</label>
        <input type="text" class="form-control" id="title" value="{{$user->name}}" name="name" required>
      </div>

        <label for="email">Email:</label>
        <input type="text" class="form-control" id="email" value="{{$user->email}}" name="email" required>

        <label for="about">About:</label>
        <textarea  class="form-control" id="about" name="about" required >{{$user->about}}</textarea>

        <div class="form-group">
          <label for="picture"> New picture(opt):</label>
          <input type="file" class="form-control" id="picture" placeholder="Attach the new picture" name="picture">
          <img style="width:100px;height:100px;border-radius:50%;" src="{{asset('storage/userPictures/'.$user->id.'/'.$user->picture)}}" alt="">
        </div>
 <br>
    <button type="submit" class="btn btn-primary" name="submit">Update profile</button>
  </form>
<br>




         </div>
                <!-- Footer-->
                <footer class="border-top">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                   
                        <div class="small text-center text-muted fst-italic">Copyright &copy; Luka Ljumovic {{date("Y")}}</div>
                    </div>
                </div>
            </div>
        </footer>
        </div>
        <!-- Bootstrap core JS-->
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>

    </body>
</html>
