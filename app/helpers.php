<?php
namespace App\helpers;
if (!function_exists('bmi_category')) {
  function bmi_category($bmi)
  {
    $category = '';

    if ($bmi < 15.0) {
      $category = 'نقص حاد جدا';
    } else if ($bmi >= 15.0 && $bmi < 16.0) {
      $category = 'نقص حاد';
    } else if ($bmi >= 16.0 && $bmi < 18.5) {
      $category = 'نقص في الوزن';
    } else if ($bmi >= 18.5 && $bmi < 25.0) {
      $category = 'وزن طبيعي';
    } else if ($bmi >= 25.0 && $bmi < 30.0) {
      $category = 'زيادة في الوزن';
    } else if ($bmi >= 30.0 && $bmi < 35.0) {
      $category = 'سمنة خفيفة (سمنة من الدرجة الأولى)';
    } else if ($bmi >= 35.0 && $bmi < 40.0) {
      $category = 'سمنة متوسطة (سمنة من الدرجة الثانية)';
    } else if ($bmi >= 40) {
      $category = 'سمنة مفرطة (سمنة من الدرجة الثالثة)';
    }

    return $category;
  }
}

if (!function_exists('get_total_price')) {
  function get_total_price($order = null)
  {
    $prices = Setting::where('key', 'prices')->first();
    $prices = unserialize($prices->value);

    $basic_price = $prices->price_basic;

    $program_prices = [
      'diet-program' => $prices->programs['price_diet_program'],
      'sport-program' => $prices->programs['price_sport_program'],
      'both-programs' => $prices->programs['price_both_programs'],
    ];

    $followup_prices = [
      'one-time' => $prices->followup['price_followup_one_time'],
      'once-week' => $prices->followup['price_followup_once_week'],
      'twice-week' => $prices->followup['price_followup_twice_week'],
      '3-times-week' => $prices->followup['price_followup_3_times_week'],
    ];

    $total_price = $basic_price;

    if (!session()->has('designurprogram-program')) {
      throw new Exception('Session variable "designurprogram-program" is not defined');
    }

    $designurprogram_program = $order ? $order->options->designurprogram_program : session('designurprogram-program');
    $total_price += $program_prices[$designurprogram_program];

    $isSport = strcasecmp($designurprogram_program, 'sport-program') === 0;

    if (!$isSport) {
      $followup = $order ? $order->options->followup : session('followup');
      $total_price += $followup_prices[$followup];
    }

    return $total_price;
  }
}

if (!function_exists('get_total_price_after_discount')) {
  function get_total_price_after_discount($order = null)
  {
    $prices = Setting::where('key', 'prices')->first();
    $prices = unserialize($prices->value);

    $basic_price = $prices->price_basic;

    $program_prices = [
      'diet-program' => $prices->programs['price_diet_program'],
      'sport-program' => $prices->programs['price_sport_program'],
      'both-programs' => $prices->programs['price_both_programs'],
    ];

    $followup_prices = [
      'one-time' => $prices->followup['price_followup_one_time'],
      'once-week' => $prices->followup['price_followup_once_week'],
      'twice-week' => $prices->followup['price_followup_twice_week'],
      '3-times-week' => $prices->followup['price_followup_3_times_week'],
    ];

    $total_price = $basic_price;

    $designurprogram_program = $order ? $order->options->designurprogram_program : session('designurprogram-program');
    $total_price += $program_prices[$designurprogram_program];

    $isSport = strcasecmp($designurprogram_program, 'sport-program') === 0;

    if (!$isSport) {
      $followup = $order ? $order->options->followup : session('followup');
      $total_price += $followup_prices[$followup];
    }

    $dicounted_amount = 0;
    $discount = Setting::where('key', 'discount')->first();
    $discount = unserialize($discount->value);

    if (strcasecmp($discount['discount_status'], 'active') === 0) {
      $dicounted_amount = round($total_price * $discount['discount_amount'] / 100);
    }

    return $total_price - $dicounted_amount;
  }
}

if (!function_exists('get_discount_amount')) {
  function get_discount_amount()
  {
    $dicounted_amount = 0;
    $discount = Setting::where('key', 'discount')->first();
    $discount = unserialize($discount->value);

    if (strcasecmp($discount['discount_status'], 'active') === 0) {
      $dicounted_amount = $discount['discount_amount'];
    }

    return $dicounted_amount;
  }
}

if (!function_exists('generate_unique_key')) {
  function generate_unique_key($length = 7)
  {
    if ($length > 26) $length = 7;
    else if ($length <= 0) $length = 7;

    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    return substr(str_shuffle($str_result), rand(0, 26), $length);
  }
}

if (!function_exists('slide_name')) {
  function slide_name($prefix, $slide_number)
  {
    return config("data.slides.$prefix.$slide_number");
  }
}

if (!function_exists('progress_percentage')) {
  function progress_percentage($number_points, $active_points)
  {
    $percentage = $active_points * 100 / $number_points;
    return $percentage;
  }
}

if (!function_exists('weight_difference')) {
  function weight_difference()
  {
    $weight = session()->get('personaldata-2')['weight'];
    $goal = session()->get('personaldata-2')['goal'];

    return $weight - $goal;
  }
}

if (!function_exists('proposed_program_duration')) {
  function proposed_program_duration()
  {
    $difference = abs(weight_difference());
    $months = round($difference / 4);

    return $months;
  }
}

if (!function_exists('clear_order_sessions')) {
  function clear_order_sessions()
  {
    session()->forget('gender');
    session()->forget('personaldata-1');
    session()->forget('personaldata-2');
    session()->forget('healthdata');
    session()->forget('sport');
    session()->forget('description');
    session()->forget('designurprogram-goal');
    session()->forget('designurprogram-program');
    session()->forget('followup');
    session()->forget('protein-sources');
    session()->forget('vegetables');
    session()->forget('fruits');
    session()->forget('water-volume');
  }
}

if (!function_exists('is_sick')) {
  function is_sick($healthdata)
  {
    foreach ($healthdata as $key => $value) {
      if (strcasecmp($value, 'yes') === 0) {
        return true;
        break;
      }
    }

    return false;
  }
}

if (!function_exists('str_start_with')) {
  function str_start_with($haystack, $needle)
  {
    $length = strlen($needle);
    if ($length == 0) return true;
    return (substr($haystack, 0, $length) === $needle);
  }
}

if (!function_exists('str_end_with')) {
  function str_end_with($haystack, $needle)
  {
    $length = strlen($needle);
    if ($length == 0) return true;
    return (substr($haystack, -$length) === $needle);
  }
}

if (!function_exists('calculate_needed_columns')) {
  function calculate_needed_columns($total_columns)
  {
    $needed_columns = $total_columns;
    while ($needed_columns % 3 != 0) {
      $needed_columns++;
    }

    return $needed_columns - $total_columns;
    die;
  }
}

/**
 * Optional
 **/
if (!function_exists('pre')) {
  function pre($array, $die = false)
  {
    echo '<pre>';
    print_r($array);
    echo '</pre>';

    if ($die) die;
  }
}
