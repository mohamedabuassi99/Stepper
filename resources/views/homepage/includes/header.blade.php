<header class="page__header">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="dietix_logo">


          <h3>      <a href="/">الرئيسية </a>
</h3>
          </div>

            <div class="dietix_links">
              <ul>
                  @if(!auth()->id())
                <li>
                    <a href="/login">الدخول</a>
                </li>
                @endif
                @if(auth()->id())
                <li>
                    <a href="">تسجيل خروج</a>
                </li>
                @endif

              </ul>
            </div>


        </div>
      </div>
    </div>
  </header>
