<!DOCTYPE html>
<html>
<head>
  <link rel="{{ asset('css/add.css') }}" rel="stylesheet">
  {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
</head>
<body>
  <div class="container">
    <h1>Student List </h1>
        <a href="{{ route('student.create') }}" class="btn btn-primary">Add Student</a>
    <div class="form-group">
      <input type="text" class="form-control" name="search" placeholder="Search" value="{{ request('search') }}">
    </div>
    <button type="submit" class="btn btn-primary">Search</button>
    {{-- </form> --}}

    <table class="table">
      <thead>
        <tr>
          <th>Image</th>
          <th>Name</th>
          <th>Address</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <!-- Loop through $students and display table rows -->
        @foreach($students as $student)
        <tr>
          <td><img src="{{asset('storage/' . $student->image)}}" alt="Image" class="img-thumbnail" class="table-image"></td>
          <td>{{ $student->stuname }}</td>
          <td>{{ $student->address }}</td>
          <td>
            <button class="btn btn-primary">Edit</button>
            <button class="btn btn-danger">Delete</button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <!-- Display pagination links if needed -->
    {{ $students->links() }}
  </div>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
























<section>
  <div class="titlebar">
      <h1>Student List </h1>
      <a href="{{ route('student.create') }}" class="btn btn-primary">Add Student</a>
      {{-- <button> Add Student </button> --}}
  </div>
  <div class="table">
      <div class="table-filter">
          <div>
              <ul class="table-filter-list">
                  <li>
                      <p class="table-filter-link link-active">All</p>
                  </li>
              </ul>
          </div>
      </div>
      <form method="GET" action="{{ route('student.index')}}" accept-charset="UTF-8" role="search">
          <div class="table-search">   
              <div>
                  <button class="search-select">
                  Search Student
                  </button>
                  <span class="search-select-arrow">
                      <i class="fas fa-caret-down"></i>
                  </span>
              </div>
              <div class="relative">
                  <input class="search-input" type="text" name="search" placeholder="Search student..." value="{{ request('search') }}">
              </div>
          </div>
      </form>
      <div class="table-product-head">
          <p>Image</p>
          <p>Name</p>
          <p>Address</p>
          <p>Contact</p>
          <p>Actions</p>
      </div>
      <div class="table-image">
          @if (!empty($students) && count($students) > 0)
          {{-- @if (count($students)>0) --}}
              @foreach ($students as $student)
              <img src="{{asset('storage/' . $student->image)}}"/>
              <p> {{$student->stuname}} </p>
              <p>{{$student->address}}</p>
              <p>{{$student->contact}}</p>
              
              <div class = "">    
                  <a href="{{ route('student.edit', ['id' => $student->id]) }}"class="btn btn-primary" >
                      <i class="fas fa-pencil-alt" ></i> 
                  </a>
                  <form method="post" action="{{route('student.destroy', $student->id) }}" class="">
                      @method('delete')
                      @csrf
                          <button  id="deletethis" onClick="deleteConfirm(e)" class="btn btn-danger">
                              <i class="far fa-trash-alt"></i>
                          </button>
                  </form>
                  <a href="{{ route('result.index', ['id' => $student->id]) }}"class="" >
                      {{-- <i class="fa-solid fa-file"></i> --}}
                      <i class="fas fa-file"></i>
                  </a>
              </div>
              @endforeach
              
              
          {{-- <div> 
              No data found
          </div> --}}
          @endif
          
      </div>
      <div class="row">
          
      </div>
      <div class="paginations">
          {{$students->links()}}
      </div>
  </div>
</section>
