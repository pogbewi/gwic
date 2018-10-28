<?php

use Illuminate\Database\Seeder;
use App\Models\Setting;
class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * For The Front End.
         */
        $settings = new Setting();
        $settings->key = 'site_title';
        $settings->display_name = "Site Title";
        $settings->value= "";
        $settings->details = "";
        $settings->type = "text";
        $settings->order = 1;
        $settings->save();

        $settings = new Setting();
        $settings->key = 'site_description';
        $settings->display_name = "Site Description";
        $settings->value= "";
        $settings->details = "";
        $settings->type = "text_area";
        $settings->order = 2;
        $settings->save();

        $settings = new Setting();
        $settings->key = 'site_keywords';
        $settings->display_name = "Keywords for this site";
        $settings->value= "";
        $settings->details = "";
        $settings->type = "text";
        $settings->order = 36;
        $settings->save();

        $settings = new Setting();
        $settings->key = 'site_logo';
        $settings->display_name = "Site Logo (png only 128X45)";
        $settings->value= "";
        $settings->details = json_encode(['resize'=>['width'=>128,'height'=>45]]);
        $settings->type = "image";
        $settings->order = "3";
        $settings->save();

        /**
         * For Admin BackEnd.
         */


    }
}
