<?php

use Illuminate\Database\Seeder;
use App\City;
class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
      // $ciry = City::create([
      //   'city_ar'=>'المدينة',
      //   'city_en'=>'almadena',
      // ]);
      // $ciry = City::create([
      //   'city_ar'=>'جدة',
      //   'city_en'=>'jedah',
      // ]);
      // $ciry = City::create([
      //   'city_ar'=>'الرياض',
      //   'city_en'=>'al riad',
      // ]);
      $cities = [
          [
              "id" => 1,
              "city_ar" => "الرياض",
              "city_en" => "Riyadh",
          ],
          [
              "id" => 2,
              "city_ar" => "مكة المكرمة",
              "city_en" => "Makkah Al Mukarramah",
          ],
          [
              "id" => 3,
              "city_ar" => "المدينة المنورة",
              "city_en" => "Al Madinah Al Munawwarah",
          ],
          [
              "id" => 4,
              "city_ar" => "بريدة",
              "city_en" => "Buraydah",
          ],
          [
              "id" => 5,
              "city_ar" => "تبوك",
              "city_en" => "Tabuk",
          ],
          [
              "id" => 6,
              "city_ar" => "الدمام",
              "city_en" => "Dammam",
          ],
          [
              "id" => 7,
              "city_ar" => "الاحساء",
              "city_en" => "Al Ahsa",
          ],
          [
              "id" => 8,
              "city_ar" => "القطيف",
              "city_en" => "Al Qatif",
          ],
          [
              "id" => 9,
              "city_ar" => "خميس مشيط",
              "city_en" => "Khamis Mushayt",
          ],
          [
              "id" => 10,
              "city_ar" => "الطائف",
              "city_en" => "At Taif",
          ],
          [
              "id" => 11,
              "city_ar" => "نجران",
              "city_en" => "Najran",
          ],
          [
              "id" => 12,
              "city_ar" => "حفر الباطن",
              "city_en" => "Hafar Al Batin",
          ],
          [
              "id" => 13,
              "city_ar" => "الجبيل",
              "city_en" => "Al Jubail",
          ],
          [
              "id" => 14,
              "city_ar" => "ضباء",
              "city_en" => "Duba",
          ],
          [
              "id" => 15,
              "city_ar" => "الخرج",
              "city_en" => "Al Kharj",
          ],
          [
              "id" => 16,
              "city_ar" => "الثقبة",
              "city_en" => "Ath Thuqbah",
          ],
          [
              "id" => 17,
              "city_ar" => "ينبع",
              "city_en" => "Yanbu",
          ],
          [
              "id" => 18,
              "city_ar" => "الخبر",
              "city_en" => "Al Khobar",
          ],
          [
              "id" => 19,
              "city_ar" => "عرعر",
              "city_en" => "Ar'ar",
          ],
          [
              "id" => 20,
              "city_ar" => "الحوية",
              "city_en" => "Al Hawiyah",
          ],
          [
              "id" => 21,
              "city_ar" => "عنيزة",
              "city_en" => "Unayzah",
          ],
          [
              "id" => 22,
              "city_ar" => "سكاكا",
              "city_en" => "Sakaka",
          ],
          [
              "id" => 23,
              "city_ar" => "جازان",
              "city_en" => "Jazan",
          ],
          [
              "id" => 24,
              "city_ar" => "القريات",
              "city_en" => "Al Qurayyat",
          ],
          [
              "id" => 25,
              "city_ar" => "الظهران",
              "city_en" => "Dhahran",
          ],
          [
              "id" => 26,
              "city_ar" => "الباحة",
              "city_en" => "Al Baha",
          ],
          [
              "id" => 27,
              "city_ar" => "الزلفي",
              "city_en" => "Az Zulfi",
          ],
          [
              "id" => 28,
              "city_ar" => "الرس",
              "city_en" => "Ar Rass",
          ],
          [
              "id" => 29,
              "city_ar" => "وادي الدواسر",
              "city_en" => "Wadi Ad Dawasir",
          ],
          [
              "id" => 30,
              "city_ar" => "بيشه",
              "city_en" => "Bisha",
          ],
          [
              "id" => 31,
              "city_ar" => "سيهات",
              "city_en" => "Sayhat",
          ],
          [
              "id" => 32,
              "city_ar" => "شروره",
              "city_en" => "Sharorah",
          ],
          [
              "id" => 33,
              "city_ar" => "بحره",
              "city_en" => "Bahrah",
          ],
          [
              "id" => 34,
              "city_ar" => "تاروت",
              "city_en" => "Tarut",
          ],
          [
              "id" => 35,
              "city_ar" => "الدوادمي",
              "city_en" => "Ad Duwadimi",
          ],
          [
              "id" => 36,
              "city_ar" => "صبياء",
              "city_en" => "Sabya'",
          ],
          [
              "id" => 37,
              "city_ar" => "بيش",
              "city_en" => "Bish",
          ],
          [
              "id" => 38,
              "city_ar" => "أحد رفيدة",
              "city_en" => "Ahad Rafidah",
          ],
          [
              "id" => 39,
              "city_ar" => "الفريش",
              "city_en" => "Al Furaysh",
          ],
          [
              "id" => 40,
              "city_ar" => "بارق",
              "city_en" => "Bariq",
          ],
          [
              "id" => 41,
              "city_ar" => "الحوطة",
              "city_en" => "Al Hawtah",
          ],
          [
              "id" => 42,
              "city_ar" => "الأفلاج",
              "city_en" => "Al Aflaj",
          ],
      ];

      DB::table('cities')->insert($cities);


    }
}
