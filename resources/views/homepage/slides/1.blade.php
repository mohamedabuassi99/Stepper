@extends('homepage.layouts.master')

@section('title', '1 ')

@push('after-styles')
  <style>
  </style>
@endpush

@section('section')
  <section class="slide slide--personaldata-1">
    <header class="slide__header">
      <div class="container slide__header--background">
        <div class="row">
          <div class="col-12">
            <div class="dietix_logo">
                <!-- <img src="{{ asset('assets/img/dietix/logo.png') }}" alt="Dietix Logo"> -->
              </a>
            </div>
          </div>
        </div>
      </div>
    </header>



    <section class="slide__section">
      <div class="container">
        <div class="row">
          <div class="col-8">
            <h2 class="title" >
              @if (file_exists( asset('assets/img/icons/sport-program/personaldata-1.svg') ))
                {!! file_get_contents(asset('assets/img/icons/sport-program/personaldata-1.svg')) !!}
              @endif
              البيانات الشخصية
            </h2>
          </div>
        </div>

        <form action="/2" method="POST">
          @csrf
          <input type="hidden" name="from" value="2">

          @if (session('error'))
            <div class="row">
              <div class="col-12 error-msg">
                <span class="input--error__message">{!! session('error') !!}</span>
              </div>
            </div>
          @endif

            <div class="row">
              <div class="col-8">
                <label for="choice-1">
                  <input type="text" placeholder="الاسم" name="fullname" id="choice-1" @error('fullname') class="invalid" @enderror
                  value="{{ old('fullname', session()->has('personaldata-1') && isset(session('personaldata-1')['fullname']) ? session('personaldata-1')['fullname'] : '') }}">

                  @error('fullname')
                    <span class="input--error__message">{!! $message !!}</span>
                  @enderror
                </label>

                <!-- <label for="choice-2">
                  <input type="tel" name="tel" id="choice-2" @error('tel') class="invalid" @enderror>

                  <input type="hidden" name="tel-country-code" id="tel-country-code">

                  @error('tel')
                    <span class="input--error__message">{!! $message !!}</span>
                  @enderror
                </label> -->

                <!-- <label for="choice-3">
                  <input type="email" placeholder="الايميل" name="email" id="choice-3" @error('email') class="invalid" @enderror
                  value="{{ old('email', session()->has('personaldata-1') && isset(session('personaldata-1')['email']) ? session('personaldata-1')['email'] : '') }}">

                  @error('email')
                    <span class="input--error__message">{!! $message !!}</span>
                  @enderror
                </label> -->


              </div>
            </div>


          <div class="row">
            <div class="col-12">
              <button >التالي
                @if (file_exists( asset('assets/img/icons/signs/left-arrow.svg') ))
                  {!! file_get_contents(asset('assets/img/icons/signs/left-arrow.svg')) !!}
                @endif
              </button>
            </div>
          </div>
        </form>

        @include('homepage.includes.progress', ['number_of_points' => 6, 'done_points' => 0, 'current_point' => 1])
      </div>
    </section>
  </section>
@endsection

@guest
  @push('after-script')
    <script>
      var input = document.getElementById("choice-2");
      var iti = window.intlTelInput(input, {
        initialCountry: "auto",
        geoIpLookup: function(callback) {
          $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
            var countryCode = (resp && resp.country) ? resp.country : "";
            callback(countryCode);
          });
        },
        utilsScript: '{{ asset('assets/js/lib/intlTelInput/utils.js') }}',
      });

      input.addEventListener("countrychange", function() {
        var countryCodeInput = document.getElementById('tel-country-code');
        countryCodeInput.value = JSON.stringify( iti.getSelectedCountryData() );
      });

      // remove strings
      input.addEventListener('keyup', function(e) {
        if(isNaN(e.key)) {
          input.value = input.value.replace(/\D/g,'');
        }
      });

      function decodeHTMLEntities(text) {
        var textArea = document.createElement('textarea');
        textArea.innerHTML = text;
        return textArea.value;
      }

      // Set old values
      @if (! $errors->isEmpty())
        // Set Number, CountryCode, ..
        var oldNumber = '{{ old('original-tel') }}';
        iti.setNumber(oldNumber);

        var oldCountry = JSON.parse(decodeHTMLEntities('{{ old('tel-country-code') }}')).iso2;
        iti.setCountry(oldCountry);

        // Set countryCode in the hidden input
        document.getElementById('tel-country-code').value = decodeHTMLEntities('{{ old('tel-country-code') }}');

      @elseif(session()->has('personaldata-1'))
        // Set Number, CountryCode, ..
        var oldNumber = '{{ session()->has('personaldata-1') && isset(session('personaldata-1')['original-tel']) ? session('personaldata-1')['original-tel'] : '' }}';
        iti.setNumber(oldNumber);

        var telCountryCode = decodeHTMLEntities('{{ session()->has('personaldata-1') && isset(session('personaldata-1')['tel-country-code']) ? session('personaldata-1')['tel-country-code'] : '' }}');
        var oldCountry = JSON.parse(decodeHTMLEntities(telCountryCode)).iso2;
        iti.setCountry(oldCountry);

        // Set countryCode in the hidden input
        document.getElementById('tel-country-code').value = telCountryCode;
      @endif
    </script>
  @endpush
@endguest

@section('footer')
@endsection
