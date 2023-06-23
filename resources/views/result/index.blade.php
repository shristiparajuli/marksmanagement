@extends('layouts.layout')
@section('content')
<section>
    <div class="main-page">
        <div class="container-fluid">
            <div class="row page-title-div">
                <div class="col-md-12">
                    <h2 class="title" align="center">Result </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h2> Thi is "{{$student->stuname}}" students' result</h2>
        <table>
          <thead>
            <tr>
              <th>Subject Code</th>
              <th> Subjects</th>
              <th>Marks</th>
              <th>Total</th>
              <th>Max Marks</th>
              <th>Grade </th>
            <tr>  
          </thead>
          <tbody>
            <tr> 
              @foreach ($student->grades as $grade)
                <td>{{$grade->subject->code}}</td>
                <td>{{$grade->subject->name}}</td>
                <td>{{$grade->score}}</td>
            </tr>
              @endforeach
          </tbody>    
        </table>
      </div>
</section>>
@endsection