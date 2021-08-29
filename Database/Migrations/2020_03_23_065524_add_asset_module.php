<?php

use App\Company;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Module;
use App\ModuleSetting;

class AddAssetModule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Module::insert([
            ['module_name' => 'hr']
        ]);
        $companies = Company::get();
        foreach($companies as $company){

            ModuleSetting::firstOrCreate([
                'company_id' => $company->id,
                'module_name'=> 'hr',
                'status' =>'active',
                'type' => 'client',
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Module::where('module_name', 'hr')->delete();

    }
}
