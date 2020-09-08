@extends('homepage.layouts.master')

@section('title', '1 ')

@push('after-styles')
  <style>
  </style>
@endpush

@section('section')
<div class="container">
  <div class="row">
    <div class="col-12">
      <table class="table table-dark" style="background:#ccc; border-radius: 4px;
">
        <thead>
          <tr >
            <th style="color:red;">الاسم</th>
            <th style="color:red;">البريد الالكتروني</th>
            <th style="color:red;">رقم الجوال</th>
            <th style="color:red;">المدينة</th>
            <th style="color:red;">العمر</th>
          </tr>
        </thead>
        <tbody>
          @foreach($students as $student)
          <tr>
            <td style="width:17%; text-align:center; padding:5px 5px 5px 5px;">{{$student->name}}</td>
            <td style="width:17%; text-align:center; padding:5px 5px 5px 5px;">{{$student->email}}</td>
            <td style="width:17%; text-align:center; padding:5px 5px 5px 5px;">{{$student->phone}}</td>
            @php
            $city = App\City::where('city_en',$student->city)->first();
            @endphp
            <td style="width:17%; text-align:center; padding:5px 5px 5px 5px;">{{$city->city_ar}}</td>
            <td style="width:17%; text-align:center; padding:5px 5px 5px 5px;">{{$student->age}}</td>
          </tr>
          @endforeach
        </tbody>

      </table>

    </div>
  </div>
</div>

@stop
