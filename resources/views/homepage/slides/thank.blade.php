@extends('homepage.layouts.master')

@section('title', 'التسجيل')

@push('after-styles')
  <style>
  </style>
@endpush

@section('section')
<div class="container">
  <div class="row">
    <div class="col-12 " style="text-align:center; margin:auto;">
      <h1 style="margin:auto;">  شكرا  {{$student->name ?? '' }}  للتسجيل
        <br>
         سوف يتم التوصل معك في اقرب وقت </h1>

    </div>
  </div>
</div>

@endsection
