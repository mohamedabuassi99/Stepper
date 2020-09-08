<footer id="page-footer">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="page--copyright__wrapper">

          <div class="copyright-credit">
            <p class="iframe-outer">
              <iframe src="https://maroof.sa/Business/GetStamp?bid=90341" style="width: 100%; height: 250px; overflow-y:hidden; "  frameborder="0" seamless='seamless' scrollable="no"></iframe>
            </p>
          </div>

          <div class="social-links">
            <ul>
              <!-- @foreach (config('data.socialmedia') as $social)
                @if ( file_exists( 'assets/img/icons/social-media/instagram.svg' ) && ! empty($social['path']))
                  <li>
                    <a href="{{ $social['path'] }}" class="{{ $social['social'] }}">{!! file_get_contents( $social['icon'] ) !!}</a>
                  </li>
                @endif
              @endforeach -->
            </ul>
          </div>

          <div class="copyright-text">
            جميع الحقوق محفوظة &copy; <span class="number"><script> document.write(new Date().getFullYear()) </script></span>
          </div>

          <!-- <div class="copyright-links">
            <ul>
              <li><a href="{{ route('policy') }}">سياسات دايتيكس</a></li>
              <li class="vertline"></li>
              <li><a href="{{ route('rules.conditions') }}">الشروط والأحكام</a></li>
              <li class="vertline"></li>
              <li><a href="{{ route('contactus.index') }}">تواصل معنا </a></li>
            </ul>
          </div> -->

        </div>
      </div>
    </div>
  </div>
</footer>
