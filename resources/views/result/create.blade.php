@extends('layouts.layout')
@section('stylesheets')
<link href="{{ asset('css/add.css') }}" rel="stylesheet">
@endsection
@section('content')
<section>
    <form method="post" action="{{route('result.store')}}" enctype="multipart/form-data"> 
        
        @csrf 
        <div class ="container">
            <div class="titlebar">
                <h1>Add Marks</h1>
                {{-- <button>Save</button> --}}
            </div>
            <div class="card" >
            <div>
                {{-- <h5> Student Id </h5> 
                <select name="myDropdown">
                    <option value="option1"> </option>
                  </select> --}}

                <h5> Select Student Id </h5>
                <select name="student_id">
                    @foreach($students as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>

                <h5> Select Subject </h5>
                <select name="subject_id">
                    @foreach($subjects as $id => $name)
                    <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
                {{-- <select name="myDropdown">
                    <option value="option1"></option>
                </select> --}}
                 <label> <h5>Marks </h5></label>
                 <input type="text" name="score"> 
            </div>
            </div>
            <div class="titlebar">
                <h1></h1>
                <button>Save</button>
            </div>
        </div>
    </form>
</section>

    <script> 
        function showFile(event){
            var input = event.target;
            var reader = new FileReader();
            reader.onload = function(){
                var dataURL = reader.result;
                var output = document.getElementById('file-preview');
                output.src = dataURL;
            };
            reader.readAsDataURL(input.files[0]);
        }

    </script>
@endsection