@extends('layouts.layout')
@section('stylesheets')
<link href="{{ asset('css/add.css') }}" rel="stylesheet">
@endsection
@section('content')
<section>
    <form method="post" action="{{route('student.store')}}" enctype="multipart/form-data"> 
        @csrf 
        <div class ="container">
            <div class="titlebar">
                <h1>Add Student</h1>
                {{-- <button>Save</button> --}}
            </div>
            <div class="card" >
            <div>
                    <label>Name</label>
                    <input type="text" name="stuname">
                    {{-- <label>Description (optional)</label>
                    <textarea cols="10" rows="5" ></textarea> --}}
                    <label>Add Image</label>
                    <img src="" alt="" class="img-product"  id="file-preview"/>
                    <input type="file" name="image" accept="image/*" onchange="showFile(event)">
                </div>
            <div>
                    {{-- <label>Category</label> --}}
                    {{-- <select  name="" id="" >
                        <option value="" >Email Subscription</option>
                    </select> --}}
                    <hr>
                    <label>Address</label>
                    <input type="text" class="input" name="address">
                    <hr>
                    <label>Contact</label>
                    <input type="text" class="input" name="contact">
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