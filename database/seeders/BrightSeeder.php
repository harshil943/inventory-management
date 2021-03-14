<?php

namespace Database\Seeders;

use App\Models\brightContainersDetails;
use Illuminate\Database\Seeder;

class BrightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //bright seeder
        $bright = new brightContainersDetails();
        $bright->id = '1';
        $bright->name = 'Bright Containers';
        $bright->email = 'brightcontainers@gmail.com';
        $bright->head_office_address = '1st Floor, \r\nTribhuvan, Station Rd,\r\nNadiad, Gujarat 387001';
        $bright->gst_number = '123456755444444';
        $bright->pan_number = '1234567890';
        $bright->state_code = 'Gujarat - 24';
        $bright->contact_number = '1234567890';
        $bright->alternate_contact_number = NULL;
        $bright->facebook_link = 'https://github.com/harshil943/inventory-management';
        $bright->instagram_link = 'https://github.com/harshil943/inventory-management';
        $bright->whatsapp_link = 'https://github.com/harshil943/inventory-management';
        $bright->google_business_link = 'https://github.com/harshil943/inventory-management';
        $bright->google_maps_link_factory = 'https://github.com/harshil943/inventory-management';
        $bright->google_maps_link_office = 'https://github.com/harshil943/inventory-management';
        $bright->youtube_link = 'https://github.com/harshil943/inventory-management';
        $bright->gst_percentage = '18';
        $bright->logo_name = 'bright_containers.jpg';

        $bright->save();
    }
}
