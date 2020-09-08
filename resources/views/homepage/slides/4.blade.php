@extends('homepage.layouts.master')

@section('title', '4')

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
            <h2>هل لديك خبرة برمجية </h2>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="slide--choices__wrapper">

              <div class="male">
                <div class="male__outline">
                  <form action="/5" method="POST">
                    @csrf
                    <input type="hidden" name="experience" value="yes">
                    <input type="hidden" name="from" value="1">
                    <button>
                      @if (file_exists( asset('assets/img/icons/male.svg') ))
                        {!! file_get_contents(asset('assets/img/icons/male.svg')) !!}
                      @endif
                      <strong>نعم</strong>

                      <span class="current"></span>
                      <span class="smaller"></span>
                      <span class="bigger"></span>
                    </button>
                  </form>
                </div>
              </div>

              <span class="or">أو</span>

              <div class="female">
                <div class="female__outline">
                  <form action="/5" method="POST">
                    @csrf
                    <input type="hidden" name="experience" value="no">
                    <input type="hidden" name="from" value="1">
                    <button>
                      @if (file_exists( asset('assets/img/icons/female.svg') ))
                        {!! file_get_contents(asset('assets/img/icons/female.svg')) !!}
                      @endif
                      <strong>لا</strong>

                      <span class="current"></span>
                      <span class="smaller"></span>
                      <span class="bigger"></span>
                    </button>
                  </form>
                </div>
              </div>

            </div>
          </div>
        </div>

        @include('homepage.includes.progress', ['number_of_points' => 6, 'done_points' => 3, 'current_point' => 4])
      </div>
    </section>








  </section>
@endsection

@push('after-script')
  <script>
  </script>
@endpush
