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
        <h2> This is {{$student->stuname}}'s result</h2>
        <table>
          <thead>
            <tr>
              <th>Subject Code</th>
              <th> Subjects</th>
              <th>Marks</th>
              <th>Grade </th>
            <tr>  
          </thead>
          <tbody>
            <tr> 
              @foreach ($student->grades as $grade)
                <td>{{$grade->subject->code}}</td>
                <td>{{$grade->subject->name}}</td>
                <td>{{$grade->score}}</td>
                <td> 
                  @if ($grade->score >=90) A+
                  @elseif($grade->score >=80) A
                  @elseif($grade->score >=70) B+
                  @elseif($grade->score >=60) B
                  @elseif($grade->score >=50) C+
                  @elseif($grade->score >=40) D
                  @else F
                  @endif
                </td>
            </tr>
              @endforeach
          </tbody>    
        </table>
      </div>
      <div class="container">
        <table>
          <thead>
            <tr>
              <th> Total  </th>
              <th> {{$sum}} </th>
            </tr>
          </thead>
          <tbody>
            <tr >
              <td> Average </td>
              <td> {{$average}} </td>
            </tr>
          </tbody>

          <thead>
            <tr>
              <td> Grade </td>
              <td> 
                @if ($average >=90) A+
                  @elseif($average >=80) A
                  @elseif($average >=70) B+
                  @elseif($average >=60) B
                  @elseif($average >=50) C+
                  @elseif($average >=40) D
                  @else F
                @endif
              </td>
            </tr>
          </thead>
        </table>
      </div>
</section>>
@endsection