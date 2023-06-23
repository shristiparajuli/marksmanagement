<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Marksheet </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
    @yield('stylesheets')
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12"> 
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">`
              <div class="navbar"> 
              <a class="navbar-brand" href="#"> <h3> Student Grading System </h3></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              {{-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Login</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                  </li>
                </ul>
              </div> --}}
            </div>
          </div>
          </nav>
      </div>
    </div>
  </div>

  <div class="offcanvas offcanvas-start w-25" tabindex="-1" id="offcanvas" data-bs-keyboard="false" data-bs-backdrop="false">
    <div class="offcanvas-header">
        <h6 class="offcanvas-title d-none d-sm-block" id="offcanvas">Menu</h6>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body px-0">
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-start" id="menu">
            <li class="nav-item">
                <a href="{{route('student.index')}}" class="nav-link text-truncate">
                    <i class="fs-5 bi-house"></i><span class="ms-1 d-none d-sm-inline">Students </span>
                </a>
            </li>
           
            <li>
                <a href="{{route('student.create')}}" class="nav-link text-truncate">
                    <i class="fs-5 bi-table"></i><span class="ms-1 d-none d-sm-inline">Add Students </span></a>
            </li>
            <li>
              <a href="{{route('result.create')}}"  class="nav-link text-truncate">
                  <i class="fs-5 bi-speedometer2"></i><span class="ms-1 d-none d-sm-inline">Add Marks</span> </a>
            </li>
            <li>
                <a href="#" class="nav-link text-truncate">
                    <i class="fs-5 bi-grid"></i><span class="ms-1 d-none d-sm-inline">Products</span></a>
            </li>
            <li>
                <a href="#" class="nav-link text-truncate">
                    <i class="fs-5 bi-people"></i><span class="ms-1 d-none d-sm-inline">Customers</span> </a>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link dropdown-toggle  text-truncate" id="dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fs-5 bi-bootstrap"></i><span class="ms-1 d-none d-sm-inline">Bootstrap</span>
              </a>
              <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdown">
                  <li><a class="dropdown-item" href="#">New project...</a></li>
                  <li><a class="dropdown-item" href="#">Settings</a></li>
                  <li><a class="dropdown-item" href="#">Profile</a></li>
                  <li>
                      <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="#">Sign out</a></li>
              </ul>
          </li>
        </ul>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col min-vh-100 py-3">
            <!-- toggler -->
            <button class="btn btn-success float-end" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" role="button">
                <i class="fa fa-arrow-right"></i>
            </button>
            @yield('content')
        </div>
    </div>
</div>

  {{-- <div class="row" style="margin-top: 50px;">
    <div class="col-md-3">
      <div class="sidebar">
        <a class="active" href="{{route('student.index')}}">Home</a>
        <a href="{{route('student.create')}}">Add Student</a>
        <a href="#contact">Teacher</a>
        <a href="#about">About</a>
      </div>
    </div>
    
    <div class="col-md-9" style="margin-top: 50px;">
      <div class="content">
        @yield('content')
      </div>
    </div>
  </div> --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>