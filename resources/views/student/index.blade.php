@extends("layouts.layout")
@section('stylesheets')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
@endsection
@section('content')
<section>
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
          <th>Conatct </th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <!-- Loop through $students and display table rows -->
        @foreach($students as $student)
        <tr>
          <td><img src="{{asset('storage/' . $student->image)}}" alt="Image" class="img-thumbnail"  style="width: 100px; height: 100px;"></td>
          <td>{{ $student->stuname }}</td>
          <td>{{ $student->address }}</td>
          <td>{{ $student->contact}}</td>
          <td>
            <button class="btn btn-primary" > 
                <a href="{{ route('student.edit', ['id' => $student->id]) }}"class="btn btn-primary" >
                    <i class="fas fa-pencil-alt" ></i> 
                </a>
            </button>

            {{-- <form method="post" action="{{route('student.destroy', $student->id) }}">
                @method('delete')
                @csrf
                    <button class="btn btn-danger"  onclick="deleteConfirm(e)">
                        <i class="far fa-trash-alt"></i>
                    </button>
            </form> --}}

            <button class="btn btn-danger"  onclick="deleteConfirm({{$student->id}})">
              <i class="far fa-trash-alt"></i>
            </button>

            <button> 
                <a href="{{ route('result.index', ['id' => $student->id]) }}" >
                    <i class="fas fa-eye"></i>
                </a>
            </button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    {{ $students->links() }}

  </div>
</section>

<script>
        function deleteConfirm(id){
        console.log("ok");
        var form = $(this).closest('form');
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
              $.ajax({
                    url: "{{ route('student.destroy', '') }}" +'/'+ id,
                    type: 'POST',
                    // headers: {
                    //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    // },
                    success: function (response) {
                        // Handle success response
                        console.log(response);
                        swal("Deleted successfully").then(() => {
                            // Perform any necessary actions after successful delete
                            // For example, redirect to another page
                            window.location.href = "{{ route('student.index') }}";
                        });
                    },
                    error: function (xhr) {
                        // Handle error response
                        console.error(xhr);
                        swal("Error occurred while deleting");
                    }
                });
            } else {
                swal("It is safe");
            }
        });
        }
</script>
@endsection