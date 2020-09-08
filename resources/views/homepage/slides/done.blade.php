@extends('homepage.layouts.master')

@section('title', 'التسجيل')

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
            <h2 class="title" style="color:#f48f84;">
              @if (file_exists( asset('assets/img/icons/sport-program/personaldata-1.svg') ))
                {!! file_get_contents(asset('assets/img/icons/sport-program/personaldata-1.svg')) !!}
              @endif
              لإستكمال البيانات قم بتعبئة الفراغات
            </h2>
          </div>
        </div>

        <form action="{{route('student.store')}}" method="POST">
          @csrf
          <input type="hidden" name="from" value="done">

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
                  <input type="text" placeholder="الاسم" required name="name" id="choice-1" @error('name') class="invalid" @enderror
                  value="{{ old('name', session()->has('personaldata-1') && isset(session('personaldata-1')['name']) ? session('personaldata-1')['name'] : '') }}">

                  @error('name')
                    <span class="input--error__message">{!! $message !!}</span>
                  @enderror
                </label>

                <label for="choice-2">
                  <input type="tel" name="phone" required id="choice-2" style="text-align:right; padding-right:-5px;" placeholder="رقم الجوال" @error('phone') class="invalid" @enderror>
                  <input type="hidden" name="tel-country-code"  id="tel-country-code">

                  @error('phone')
                    <span class="input--error__message">تم استخدام هذا البريد الالكتروني مسبقا</span>
                  @enderror
                </label>

               <label for="choice-3">
                  <input type="email" required placeholder="الايميل" name="email" id="choice-3" @error('email') class="invalid" @enderror
                  value="{{ old('email', session()->has('personaldata-1') && isset(session('personaldata-1')['email']) ? session('personaldata-1')['email'] : '') }}">

                  @error('email')
                    <span class="input--error__message">{!! $message !!}</span>
                  @enderror
                </label>

                <label for="choice-4">
                  <select name="city"  >
                    <option value="">المدينة</option>
                    @php
                    $cities = App\City::all();
                    @endphp
                    @foreach($cities as $city)
                    <option value="{{$city->city_en}}" name="city">{{$city->city_ar}}</option>
                    @endforeach
                  </select>

                  @error('city')
                    <span class="input--error__message">{!! $message !!}</span>
                  @enderror
                </label>

               <label for="choice-5">
                  <input type="number" placeholder="العمر" required name="age" id="choice-5" @error('age') class="invalid" @enderror
                  value="{{ old('age', session()->has('personaldata-1') && isset(session('personaldata-1')['age']) ? session('personaldata-1')['age'] : '') }}">

                  @error('age')
                    <span class="input--error__message">{!! $message !!}</span>
                  @enderror
                </label>


              </div>
            </div>

          <div class="row">
            <div class="col-12">
              <button>تسجيل
                @if (file_exists( asset('assets/img/icons/signs/left-arrow.svg') ))
                  {!! file_get_contents(asset('assets/img/icons/signs/left-arrow.svg')) !!}
                @endif
              </button>
            </div>
          </div>
        </form>

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

      @elseif(session()->has('1'))
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
