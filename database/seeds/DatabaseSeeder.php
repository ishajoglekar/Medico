<?php

use App\Category;
use App\City;
use App\College;
use App\Degree;
use App\Doctor;
use App\Ingredient;
use App\Manufacturer;
use App\Notification_type;
use App\Product;
use App\RegCouncil;
use App\Speciality;
use App\Subcategory;
use App\Type;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        factory(User::class,15)->create();


        $regcouncils = fopen('C:\practocsv\regcouncil.csv', 'r');
        $degrees = fopen('C:\practocsv\degree.csv', 'r');
        $cities = fopen('C:\practocsv\city.csv', 'r');
        $specializations = fopen('C:\practocsv\specialization.csv', 'r');
        $colleges = fopen('C:\practocsv\college.csv', 'r');

        $categories = fopen('C:\practocsv\category.csv', 'r');
        $subcategories = fopen('C:\practocsv\subcategory.csv', 'r');
        $manufacturers = fopen('C:\practocsv\manufacture.csv', 'r');
        $ingredients = fopen('C:\practocsv\ingredients.csv', 'r');
        $products = fopen('C:\practocsv\product.csv', 'r');

        $faker = \Faker\Factory::create();

        $regcouncil_id = 0;
        $city_id = 0;
        $degree_id = 0;
        $specialization_id = 0;
        $college_id = 0;

        Type::create([
            'name'=>'video'
        ]);
        Type::create([
            'name'=>'chat'
        ]);
        $type = Type::create([
            'name'=>'clinic'
        ]);

        while(($reg = fgetcsv($regcouncils)) !== FALSE){
            $regcouncil = Regcouncil::create([
                'name'=>$reg[0]
            ]);
            $regcouncil_id = $regcouncil->id;
        }

        while(($deg = fgetcsv($degrees)) !== FALSE){
            $degree = Degree::create([
                'name'=>$deg[0]
            ]);
            $degree_id = $degree->id;
        }

        while(($cit = fgetcsv($cities)) !== FALSE){
            $city = City::create([
                'name'=>$cit[0]
            ]);
            $city_id = $city->id;
        }

        while(($reg = fgetcsv($specializations)) !== FALSE){
            $speciality = Speciality::create([
                'name'=>$reg[0]
            ]);
            $specialization_id = $speciality->id;
        }

        while(($clg = fgetcsv($colleges)) !== FALSE){
            $college = College::create([
                'name'=>$clg[0]
            ]);
            $college_id = $college->id;
        }

        for($i=0 ; $i<50 ; $i++){
            $doctor = Doctor::create([
                'fullname' => $faker->name,
                'description' => $faker->sentence(rand(5,6)),
                'fees' => rand(1000,10000),
                'phone_no' => rand(1000000000,9999999999),
                'password' => '$2y$10$ckpf//racepEDB9TGR2ZLu3JkVrPKUlaXorZIiWF4eZf87O83lPX2',
                'email'=> $faker->unique()->safeEmail,
                'city_id' => rand(1,$city_id),
                'address' => $faker->sentence(rand(5,6)),
                'gender' => 'male',
                'country_code' => '+91',
                'years_of_exp' => rand(5,20),
                'slot_duration' => 15,
                'speciality_id' => rand(1,$specialization_id),
                'reg_no' => rand(1,200000),
                'regcouncil_id' => rand(1,$regcouncil_id),
                'degree_id' => rand(1,$degree_id),
                'college_id' => rand(1,$college_id),
                'establishment_name' =>  $faker->word,
                'establishment_address' =>  $faker->sentence(rand(5,6)),
                'establishment_city_id' => rand(1,$city_id),
                'establishment_pincode' => rand(1000,999999),
            ]);

            $user = User::create([
                'name' => $doctor->fullname,
                'email' => $doctor->email,
                'email_verified_at' => now(),
                'password' => '$2y$10$ckpf//racepEDB9TGR2ZLu3JkVrPKUlaXorZIiWF4eZf87O83lPX2' , // password
                'gender'=> $doctor->gender,
                'role'=>'doctor',
                'age'=>rand(20,50),
                'phone_no'=> $doctor->phone_no,
                'remember_token' => Str::random(10),
                'doctor_id'=>$doctor->id
            ]);
            $doctor->type()->attach(rand(1,$type->id));
        }

        while(($cat = fgetcsv($categories)) !== FALSE){
            $category = Category::create([
                'name'=>$cat[0]
            ]);
            $category_id = $category->id;
        }

        while(($subcat = fgetcsv($subcategories)) !== FALSE){
            $subcategory = Subcategory::create([
                'name'=>$subcat[0],
                'category_id'=>rand(1,$category_id),
            ]);
            $subcategory_id = $subcategory->id;
        }

        // $i=1;
        // while($i<15){
        //     $i++;
        //     $manufacturer = Manufacturer::create([
        //         'name'=>$faker->name,
        //         'user_id'=>$i
        //     ]);
        //     $manufacture_id = $manufacturer->id;
        // }


        $manufacturer = Manufacturer::create([
            'name'=>"John Doe",
            'user_id'=>1,
            
        ]);

        $manufacture_id = 1;


        // while(($ing = fgetcsv($ingredients)) !== FALSE){
        //     $ingredient = Ingredient::create([
        //         'name'=>$ing[0]
        //     ]);
        //     $ingredient_id = $ingredient->id;
        // }

        while(($pro = fgetcsv($products)) !== FALSE){
            $product = Product::create([
                'name'=>$pro[0],
                'price'=>rand(100,1000),
                'size'=>"200 ml",
                'quantity'=>rand(20,50),
                'category_id'=>rand(1,$category_id),
                'subcategory_id'=>rand(1,$subcategory_id),
                'description'=>$faker->sentence(rand(3,4)),
                'how_to_use'=>$faker->sentence(rand(2,3)),
                'benefits'=>$faker->sentence(rand(2,3)),
                'highlights'=>$faker->sentence(rand(1,2)),
                'manufacturer_id'=>rand(1,$manufacture_id),
                'prescription_required'=>rand(0,1),
            ]);
            $product_id = $product->id;
        }

        $products = fopen('C:\practocsv\product.csv', 'r');
        while(($pro = fgetcsv($products)) !== FALSE){
            $product = Product::create([
                'name'=>$pro[0],
                'price'=>rand(100,1000),
                'size'=>"200 ml",
                'quantity'=>rand(20,50),
                'category_id'=>rand(1,$category_id),
                'subcategory_id'=>rand(1,$subcategory_id),
                'description'=>$faker->sentence(rand(3,4)),
                'how_to_use'=>$faker->sentence(rand(2,3)),
                'benefits'=>$faker->sentence(rand(2,3)),
                'highlights'=>$faker->sentence(rand(1,2)),
                'manufacturer_id'=>rand(1,$manufacture_id),
                'prescription_required'=>rand(0,1),
            ]);
            $product_id = $product->id;
        }

        Notification_type::create([
            'name' => 'appointment-made',
            'message' => 'You have Received a new appointment!'
        ]);

        Notification_type::create([
            'name' => 'appointment-accepted',
            'message' => 'Your appointment is confirmed!'
        ]);

        Notification_type::create([
            'name' => 'appointment-rejected',
            'message' => 'Sorry, your appointment is rejected'
        ]);

        Notification_type::create([
            'name' => 'feedback',
            'message' => 'you have received a new feedback'
        ]);

        Notification_type::create([
            'name' => 'report',
            'message' => 'Your report has been generated'
        ]);

        Notification_type::create([
            'name' => 'manufacturer-request',
            'message' => 'you have a new manufacturer registration'
        ]);

        Notification_type::create([
            'name' => 'product-request',
            'message' => 'you have a new product request'
        ]);

        Notification_type::create([
            'name' => 'product-accept',
            'message' => 'Your product is now approved'
        ]);

        Notification_type::create([
            'name' => 'prescription',
            'message' => 'You have received a prescription'
        ]);


        fclose($specializations);
        fclose($cities);
        fclose($degrees);
        fclose($regcouncils);
        fclose($colleges);
    }
}
