@extends('homepage.layouts.master')

@section('title', '3')

@push('after-styles')
  <style>
  </style>
@endpush

@section('section')
  <section class="slide slide--gender">




    <section class="slide__section">
      <div class="container">

        <div class="row">
          <div class="col-12">
            <h2 style="color:#7e7473;">الجنس</h2>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="slide--choices__wrapper">

              <div class="male">
                <div class="male__outline">
                  <form action="/4" method="POST">
                    @csrf
                    <input type="hidden" name="gender" value="male">
                    <input type="hidden" name="from" value="3">
                    <button>
                      @if (file_exists( asset('assets/img/icons/male.svg') ))
                        {!! file_get_contents(asset('assets/img/icons/male.svg')) !!}
                      @endif
                      <strong>ذكر</strong>

                      <span class="current" style="background:#3d5465;"></span>
                      <span class="smaller" style="background:#3d5465;"></span>
                      <span class="bigger" style="background:#3d5465;"></span>
                    </button>
                  </form>
                </div>
              </div>

              <span class="or">أو</span>

              <div class="female">
                <div class="female__outline">
                  <form action="/4" method="POST">
                    @csrf
                    <input type="hidden" name="gender" value="female">
                    <input type="hidden" name="from" value="3">
                    <button>
                      @if (file_exists( asset('assets/img/icons/female.svg') ))
                        {!! file_get_contents(asset('assets/img/icons/female.svg')) !!}
                      @endif
                      <strong>انثى</strong>

                      <span class="current" style="background:#f48e85;"></span>
                      <span class="smaller" style="background:#f48e85;"></span>
                      <span class="bigger" style="background:#f48e85;"></span>
                    </button>
                  </form>
                </div>
              </div>

            </div>
          </div>
        </div>

        @include('homepage.includes.progress', ['number_of_points' => 6, 'done_points' => 2, 'current_point' => 3])
      </div>
    </section>








  </section>
@endsection

@push('after-script')
  <script>
  </script>
@endpush
