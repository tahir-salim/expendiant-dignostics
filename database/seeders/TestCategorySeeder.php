<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name'=>'Cardiac',
            'is_active'=>1,
            'icon'=>"assets/images/heartbeat.png",
            'created_at'=>Carbon::now(),
        ],);
        DB::table('categories')->insert([
            'name'=>'General Chemistry',
            'is_active'=>1,
            'icon'=>"assets/images/chemistry.png",
            'created_at'=>Carbon::now(),
        ],);
        DB::table('categories')->insert([
            'name'=>'Renal',
            'is_active'=>1,
            'icon'=>"assets/images/kidneys.png",
            'created_at'=>Carbon::now(),
        ],);
        DB::table('categories')->insert([
            'name'=>'Therepeutic Drug Monitoring',
            'is_active'=>1,
            'icon'=>"assets/images/medicine.png",
            'created_at'=>Carbon::now(),
        ],);
        DB::table('categories')->insert([
            'name'=>'Oncology',
            'is_active'=>1,
            'icon'=>"assets/images/cancer.png",
            'created_at'=>Carbon::now(),
        ],);
        DB::table('categories')->insert([
            'name'=>'Nutritional Assessment',
            'is_active'=>1,
            'icon'=>"assets/images/nutrition.png",
            'created_at'=>Carbon::now(),
        ],);
        DB::table('categories')->insert([
            'name'=>'Bone Disease',
            'is_active'=>1,
            'icon'=>"assets/images/bones.png",
            'created_at'=>Carbon::now(),
        ],);
        DB::table('categories')->insert([
            'name'=>'Prenatal',
            'is_active'=>1,
            'icon'=>"assets/images/pregnant.png",
            'created_at'=>Carbon::now(),
        ],);
        DB::table('categories')->insert([
            'name'=>'Hepatic',
            'is_active'=>1,
            'icon'=>"assets/images/hepatic.png",
            'created_at'=>Carbon::now(),
        ],);
        DB::table('categories')->insert([
            'name'=>'Inflammatory',
            'is_active'=>1,
            'icon'=>"assets/images/skin-problems.png",
            'created_at'=>Carbon::now(),
        ],);
        DB::table('categories')->insert([
            'name'=>'Anemia',
            'is_active'=>1,
            'icon'=>"assets/images/anemia.png",
            'created_at'=>Carbon::now(),
        ],);
        DB::table('categories')->insert([
            'name'=>'Respiratory',
            'is_active'=>1,
            'icon'=>"assets/images/respiratory.png",
            'created_at'=>Carbon::now(),
        ],);
        DB::table('categories')->insert([
            'name'=>'Spinal',
            'is_active'=>1,
            'icon'=>"assets/images/spinal-cord.png",
            'created_at'=>Carbon::now(),
        ],);
        DB::table('categories')->insert([
            'name'=>'Drugs of Abuse (Urine)',
            'is_active'=>1,
            'icon'=>"assets/images/drugs.png",
            'created_at'=>Carbon::now(),
        ],);
        DB::table('categories')->insert([
            'name'=>'Infectious Disease',
            'is_active'=>1,
            'icon'=>"assets/images/bacteria.png",
            'created_at'=>Carbon::now(),
        ],);
        DB::table('categories')->insert([
            'name'=>'Lipids',
            'is_active'=>1,
            'icon'=>"assets/images/lipid-profile.png",
            'created_at'=>Carbon::now(),
        ],);
        DB::table('categories')->insert([
            'name'=>'Pancreatic',
            'is_active'=>1,
            'icon'=>"assets/images/pancreas.png",
            'created_at'=>Carbon::now(),
        ],);
        DB::table('categories')->insert([
            'name'=>'Toxicology',
            'is_active'=>1,
            'icon'=>"assets/images/toxic.png",
            'created_at'=>Carbon::now(),
        ],);
        DB::table('categories')->insert([
            'name'=>'Thyroid/Metabolic',
            'is_active'=>1,
            'icon'=>"assets/images/thyroid.png",
            'created_at'=>Carbon::now(),
        ],);
        DB::table('categories')->insert([
            'name'=>'Diabetes',
            'is_active'=>1,
            'icon'=>"assets/images/measurement.png",
            'created_at'=>Carbon::now(),
        ],);
        DB::table('categories')->insert([
            'name'=>'Reproductive Endocrinology',
            'is_active'=>1,
            'icon'=>"assets/images/womb.png",
            'created_at'=>Carbon::now(),
        ],);
        DB::table('categories')->insert([
            'name'=>'Immunosuppressant Drugs',
            'is_active'=>1,
            'icon'=>"assets/images/immunosuppressant-drugs.png",
            'created_at'=>Carbon::now(),
        ],);
        DB::table('categories')->insert([
            'name'=>'Urine',
            'is_active'=>1,
            'icon'=>"assets/images/urology.png",
            'created_at'=>Carbon::now(),
        ],);
    }
}
