@extends('homepage.layouts.master')

@section('title', '5')

@push('after-styles')
  <style>
  </style>
@endpush

@section('section')
  <section class="slide slide--gender">




    <section class="slide__section">
      <div class="container">

        <div class="row">
          <div class="col-12 text-center">
            <h2 style="color:black;">هل ترغب بان تكون احد رواد تقنية المستقبل؟ </h2>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="slide--choices__wrapper">

              <div class="male">
                <div class="male__outline">
                  <form action="/6" method="POST">
                    @csrf
                    <input type="hidden" name="would_be_future" value="yes">
                    <input type="hidden" name="from" value="5">
                    <button>
                      @if (file_exists( asset('assets/img/icons/male.svg') ))
                        {!! file_get_contents(asset('assets/img/icons/male.svg')) !!}
                      @endif
                      <strong>نعم</strong>

                      <span class="current" style="background:#8899ff;"></span>
                      <span class="smaller" style="background:#8899ff;"></span>
                      <span class="bigger" style="background:#8899ff;"></span>
                    </button>
                  </form>
                </div>
              </div>

              <span class="or">أو</span>

              <div class="female">
                <div class="female__outline">
                  <form action="/6" method="POST">
                    @csrf
                    <input type="hidden" name="would_be_future" value="no">
                    <input type="hidden" name="from" value="5">
                    <button>
                      @if (file_exists( asset('assets/img/icons/female.svg') ))
                        {!! file_get_contents(asset('assets/img/icons/female.svg')) !!}
                      @endif
                      <strong>لا</strong>

                      <span class="current" style="background:#ff8899;"></span>
                      <span class="smaller" style="background:#ff8899;"></span>
                      <span class="bigger" style="background:#ff8899;"></span>
                    </button>
                  </form>
                </div>
              </div>

            </div>
          </div>
        </div>

        @include('homepage.includes.progress', ['number_of_points' => 6, 'done_points' => 4, 'current_point' => 5])
      </div>
    </section>








  </section>
@endsection

@push('after-script')
  <script>
  </script>
@endpush
