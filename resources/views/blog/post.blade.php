<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>One post</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <style>
            @media(min-width:992px){
                    body{
                        position: relative;
                    }
                    .slika{
                        position: absolute;
                        top: 0;
                        z-index: -1;
                    }
                    .wrappper{
                        position:relative;
                        top:50vh;
                    }
                    .color-red{
                        color: red !important;
                    }
                    .pagination{
                       justify-content: center;
                    }
                }
            </style>

    
    
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a  style="color:black;" class="navbar-brand " href="/post"><b>Homepage</b></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto py-4 py-lg-0">
                        @if ( !auth()->user())


                        <li class="nav-item "><a class="nav-link px-lg-3 py-3 py-lg-4 color-red"   href="{{route('register')}}"><b>Registration</b></a></li>
                        <li class="nav-item "><a class="nav-link px-lg-3 py-3 py-lg-4 color-red" href="{{route('home')}}"  ><b>Login<b></a></li>
                        @else
                        
                        <h5><li class="nav-item "><a  style="color:black;"  class="nav-link px-lg-3 py-3 py-lg-4 " href="{{route('post.create')}}"><b>Create</b></a></li></h5>

                        <li class="nav-item">
                        <a style="color:black;"class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <h5><b>Logout</b></h5>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                        @csrf
                                    </form> </li>
                        @endif
                    

                    </ul>
                </div>
            </div>
        </nav>
        <img class="slika" src="{{asset('storage/photos/home-bg.jpg')}}" style="object-fit:cover;width:100%;max-height:50vh;">
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('assets/img/post-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading" style="color: rgb(0, 0, 0);">
                            <h1>{{$post->title}}</h1>
                            <h2 class="subheading">{{$post->short_description}}</h2>
                            <span class="meta">
                                Posted by 
                                <a href="/post/profile/{{$user->id}}">{{$user->name}}</a>
                                on {{$post->created_at}}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="wrappper">
        <!-- Post Content-->
        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        
                    
                        <h2 class="section-heading">{{$post->title}}</h2>
                        <br>
                        <h4>{{$post->short_description}}</h4>
                        <br>
                        <img height="40%" width="100%" src="{{asset('pictures/'.$post->picture)}}" alt=" "> 
                        <br>
                        <br>
                        <p>{{$post->content}}</p>
                        
                    </div>
                </div>
            </div>
        </article>
        <!-- Footer-->
        <footer class="border-top">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <ul class="list-inline text-center">
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="small text-center text-muted fst-italic">Copyright &copy; Luka Ljumovic 2022</div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
