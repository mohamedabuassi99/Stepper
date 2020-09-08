<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('assets/admin') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="{{ route('home') }}" class="simple-text logo-normal dietix-logo">
      <img src="{{ asset('assets/img/dietix/logo.png') }}" alt="Dietix Logo">
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      @if(! empty(auth()->user()->avatar))
        <li class="nav-item">
          <div class="avatar">
            <a class="nav-link" href="{{ route('admin.profile.edit') }}">
              <img src="{{ '/storage/' . auth()->user()->avatar }}" alt="صورة شخصية">
            </a>
          </div>
        </li>
      @endif
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('admin.index') }}">
          <i class="material-icons">dashboard</i>
          <p>الرئيسية</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('admin.profile.edit') }}">
          <i class="material-icons">person</i>
          <span class="sidebar-normal">المعلومات الشخصية</span>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'inbox' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('admin.contactus.index') }}">
          <i class="material-icons">inbox</i>
          <p>البريد الوارد</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'diet_plan' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('admin.diet-plan.index') }}">
          <i class="material-icons">content_paste</i>
          <p>البرامج الغدائية</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'sport_plan' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('admin.sport-plan.index') }}">
          <i class="material-icons">fitness_center</i>
          <p>البرامج الرياضية</p>
        </a>
      </li>

      <li class="nav-item{{ $activePage == 'followup' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('admin.followup.index') }}">
          <i class="material-icons">perm_contact_calendar</i>
          <p>المتابعة الاسبوعية</p>
        </a>
      </li>

      @if (false)
        <li class="nav-item{{ $activePage == 'progress' ? ' active' : '' }}">
          <a class="nav-link" href="{{ route('progress') }}">
            <i class="material-icons">history</i>
            <p>متابعة التطور اليومي</p>
          </a>
        </li>
        <li class="nav-item{{ $activePage == 'measurement' ? ' active' : '' }}">
          <a class="nav-link" href="{{ route('progress') }}">
            <i class="material-icons">change_history</i>
            <p>القياسات</p>
          </a>
        </li>
      @endif

      <li class="nav-item{{ $activePage == 'order' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('admin.order.index') }}">
          <i class="material-icons">shopping_basket</i>
          <span class="sidebar-normal">ادارة الطلبات</span>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'payment' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('admin.payment.index') }}">
          <i class="material-icons">show_chart</i>
          <span class="sidebar-normal">المبيعات</span>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'bank-transfer' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('admin.bank-transfer.index') }}">
          <i class="material-icons">account_balance</i>
          <span class="sidebar-normal">ادارة التحويلات البنكية</span>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'invoice' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('admin.invoice.index') }}">
          <i class="material-icons">featured_play_list</i>
          <span class="sidebar-normal">الفواتير</span>
        </a>
      </li>

      <li class="nav-item{{ $activePage == 'meal-components-management' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('admin.meal_component.index') }}">
          <i class="material-icons">sentiment_very_satisfied</i>
          <span class="sidebar-normal">ادارة مكونات الوجبات</span>
        </a>
      </li>

      <li class="nav-item{{ $activePage == 'manage-exercises' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('admin.exercise.index') }}">
          <i class="material-icons">directions_run</i>
          <span class="sidebar-normal">ادارة تمارين التدريبات</span>
        </a>
      </li>

      <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('admin.user.index') }}">
          <i class="material-icons">people</i>
          <span class="sidebar-normal">ادارة المستخدمين</span>
        </a>
      </li>

      <li class="nav-item{{ $activePage == 'settings' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('admin.setting.index') }}">
          <i class="material-icons">settings_applications</i>
          <span class="sidebar-normal">اعدادات الموقع</span>
        </a>
      </li>
    </ul>
  </div>
</div>
