<div class="row">
  <div class="col-12">
    <div class="progress-desktop">
      <div class="progress-bar">

        @php
        function progress_percentage($number_points, $active_points)
  {
    $percentage = $active_points * 100 / $number_points;
    return $percentage;
  }
        @endphp
        <span class="percentage">{{ round(progress_percentage($number_of_points, $done_points)) }}%</span>

        <div class="bar_outer">
          {{-- 'number_of_points' => 6, 'done_points' => 0, 'current_point' => 1 --}}

          <div class="labels">
            @for($i=1; $i<=$number_of_points; $i++)
              <span class="label @if($i == $current_point) current @elseif($i<=$done_points) done @else todo @endif">{{ $i }}</span>
            @endfor
          </div>
        </div>

      </div>
    </div>

    <div class="progress-mobile">
      <span class="percentage">{{ round(progress_percentage($number_of_points, $done_points)) }}%</span>
    </div>
  </div>
</div>

@push('after-styles')
  <style>
    .bar_progress {
      width: {{ progress_percentage($number_of_points, $done_points) }}%;
      transition: width 2s ease;
    }

    .bar_progress.ready {
      width: {{ progress_percentage($number_of_points, $done_points) }}%;
    }
  </style>
@endpush

@push('after-script')
  <script>
    $(function() {
      $('#bar_progress').addClass('ready');
    });
  </script>
@endpush
