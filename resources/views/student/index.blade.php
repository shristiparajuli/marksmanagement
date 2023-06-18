@extends("layouts.layout")

@section('stylesheets')
<link href="{{ asset('css/add.css') }}" rel="stylesheet">
@endsection

@section('content')

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
        <div class="table-product-body">
            @if (!empty($students) && count($students) > 0)
            {{-- @if (count($students)>0) --}}
                @foreach ($students as $student)
                <img src="{{asset('storage/' . $student->image)}}"/>
                <p> {{$student->stuname}} </p>
                <p>{{$student->address}}</p>
                <p>{{$student->contact}}</p>
                <div>    
                    {{-- <a href="{{ route('student.edit', ['id' => $student->id]) }}">Edit</a> --}}
                    
 
                    <a href="{{ route('student.edit', ['id' => $student->id]) }}"class="btn btn-success" >
                        <i class="fas fa-pencil-alt" ></i> 
                    </a>

                    <form method="post" action="{{route('student.destroy', $student->id) }}">
                        @method('delete')
                        @csrf
                            <button class="btn btn-danger" id="deletethis" onClick="deleteConfirm(e)">
                                <i class="far fa-trash-alt"></i>
                            </button>
                    </form>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // $(document).ready(function (e)
    // {   
    //     e.preventDefault()
    //     function deleteConfirm(e){
    //     console.log("ok")
            
    //     var form = e.target.form;
    //         swal({
    //         title: "Are you sure?",
    //         text: "Once deleted, you will not be able to recover this imaginary file!",
    //         icon: "warning",
    //         buttons: true,
    //         dangerMode: true,
    //         })
    //         .then((willDelete) => {
    //         if (willDelete) {
    //             form.submit();
    //         } else {
    //             swal("Your imaginary file is safe!");
    //         }
    //         });
    //     }
        
    // });
    
    // window.deleteConfirm = function(e)

    $(document).ready(function () {
    $('#deletethis').click(function (event) {
        event.preventDefault();
        console.log("ok");
        var form = $(this).closest('form');
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                form.submit();
            } else {
                swal("Your imaginary file is safe!");
            }
        });
    });
});

</script>
@endsection