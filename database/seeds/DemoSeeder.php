<?php

use App\Data\Models\Activity;
use App\Data\Models\BlockOut;
use App\Data\Models\ContactType;
use App\Data\Models\Coupon;
use App\Data\Models\Package;
use App\Data\Models\PackageCost;
use App\Data\Models\PackageExclusive;
use App\Data\Models\PackageFeedback;
use App\Data\Models\PackageInclusive;
use App\Data\Models\PackageItinerary;
use App\Data\Models\PackagePolicy;
use App\Data\Models\PackageRating;
use App\Data\Models\PackageRequirement;
use App\Data\Models\PackageSubActivity;
use App\Data\Models\PaymentMethod;
use App\Data\Models\PromotionType;
use App\Data\Models\SubActivity;
use App\Data\Models\TravelDestination;
use App\Data\Models\TravelDestinationContact;
use App\Data\Models\TravelDestinationGallery;
use App\Data\Models\TravelDestinationPolicy;
use App\Data\Models\UserAddress;
use App\Data\Models\UserBucketList;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!app()->environment('production')) {
            Schema::disableForeignKeyConstraints();
            $this->truncateTables();
            $this->setupSystem();
            $this->createAdmin();
            Schema::enableForeignKeyConstraints();
        }
    }

    public function createAdmin()
    {
        factory(User::class, 1)->create()->each(function ($user) {
            factory(UserAddress::class, 2)->create(['user_id' => $user->id]);
            SubActivity::all()->random(4)->each(function ($item) use ($user) {
                factory(UserBucketList::class, 1)->create(['activity_id' => $item->activity_id, 'sub_activity_id' => $item->id, 'user_id' => $user->id]);
            });
        });
    }

    public function setUpSystem()
    {
        $activities = [
            [
                'name' => 'Nature & Adventure',
                'image' => 'https://www.rumbleadventures.com/wp-content/uploads/2020/01/Tsavo-National-Park-Kenya.jpg',
                'sub_activities' => [
                    [
                        'image' => 'https://hikemaniak.co.ke//wp-content/uploads/2019/11/1F5DF2BB-AADB-4F52-B266-C5ED14CC788E-1024x683.jpeg',
                        'name' => 'Hiking'
                    ],
                    [
                        'image' => 'https://magicalkenya.com/wp-content/uploads/2014/08/mountainbikingimg2.jpg',
                        'name' => 'Forest biking'
                    ]
                ]
            ],
            [
                'name' => 'Water Activities',
                'image' => 'https://nation.africa/resource/image/3204404/landscape_ratio16x9/1600/900/3d1d8fc8f6f01e4cd548c9882193cbbf/TQ/jangwani-5.jpg',
                'sub_activities' => [
                    [
                        'image' => 'https://nation.africa/resource/image/3204404/landscape_ratio16x9/1600/900/3d1d8fc8f6f01e4cd548c9882193cbbf/TQ/jangwani-5.jpg',
                        'name' => 'Kayaking'
                    ],
                    [
                        'image' => 'http://jangwani.co.ke/wp-content/uploads/2018/12/Jangwani_Swimming_Small.jpg',
                        'name' => 'Swimming'
                    ]
                ]
            ],
            [
                'name' => 'Mall Activities',
                'image' => 'https://i1.wp.com/nairobifashionhub.co.ke/wp-content/uploads/2018/01/Nairobi-Fashion-Hub-Two-Rivers-Mall.jpg?ssl=1',
                'sub_activities' => [
                    [
                        'image' => 'https://i2.wp.com/yapptotos.com/wp-content/uploads/job-manager-uploads/main_image/2019/03/53397790_2568355083179120_3442154857379659776_n-1.jpg?fit=960%2C640&ssl=1',
                        'name' => 'Bowling',
                    ],
                    [
                        'image' => 'https://nomadicfoxcom.files.wordpress.com/2019/01/img_1604.jpg?w=1200',
                        'name' => 'Trampoline'
                    ],
                    [
                        'image' => 'http://bkenya.com/wp-content/uploads/2015/02/IMG_9421.jpg',
                        'name' => 'Ice skating'
                    ]
                ]
            ],
            [
                'name' => 'Team building',
                'image' => 'https://turnup.travel/wp-content/uploads/2021/02/IMG_1400-scaled.jpg',
                'sub_activities' => [
                    [
                        'image' => 'http://jangwani.co.ke/wp-content/uploads/2018/12/JangwaniCamp_Archery.jpg',
                        'name' => 'Archery'
                    ],
                    [
                        'image' => 'http://jangwani.co.ke/wp-content/uploads/2017/08/17239961_347083792353276_1920466196968698769_o.jpg',
                        'name' => 'Bonfires'
                    ],
                    [
                        'image' => 'https://turnup.travel/wp-content/uploads/2021/02/IMG_1400-scaled.jpg',
                        'name' => 'Team building'
                    ]
                ]
            ]
        ];

        foreach ($activities as $activity) {
            $model = Activity::updateOrCreate([
                'name' => $activity['name'],
                'cover_photo' => $activity['image'],
                'added_by' => 1
            ]);
            collect($activity['sub_activities'])->each(function ($item) use ($model) {
                SubActivity::updateOrCreate([
                    'activity_id' => $model->id,
                    'name' => $item['name'],
                    'cover_photo' => $item['image'],
                    'added_by' => 1
                ]);
            });
        }
        factory(ContactType::class, 2)->create();
        factory(PaymentMethod::class, 3)->create();
        factory(TravelDestination::class, 20)->create()
            ->each(function ($destination) {
                factory(TravelDestinationPolicy::class, 1)->create(['travel_destination_id' => $destination->id]);
                factory(TravelDestinationGallery::class, 5)->create(['travel_destination_id' => $destination->id]);
                factory(TravelDestinationContact::class, 2)->create(['travel_destination_id' => $destination->id]);
                factory(Package::class, 3)->create(['travel_destination_id' => $destination->id])->each(function ($package) {
                    factory(PackageInclusive::class, 1)->create(['package_id' => $package->id]);
                    factory(PackageExclusive::class, 1)->create(['package_id' => $package->id]);
                    factory(PackagePolicy::class, 1)->create(['package_id' => $package->id]);
                    factory(PackageCost::class, 3)->create(['package_id' => $package->id]);
                    factory(PackageRequirement::class, 1)->create(['package_id' => $package->id]);
                    factory(PackageItinerary::class, 1)->create(['package_id' => $package->id]);
                    SubActivity::all()->random(4)->each(function ($item) use ($package) {
                        factory(PackageSubActivity::class, 1)->create(['sub_activity_id' => $item->id, 'package_id' => $package->id]);
                    });
                });
            });
    }

    public function truncateTables()
    {
        Activity::truncate();
        BlockOut::truncate();
        ContactType::truncate();
        Coupon::truncate();
        PackageCost::truncate();
        Package::truncate();
        PackageFeedback::truncate();
        PackageInclusive::truncate();
        PackageExclusive::truncate();
        PackageItinerary::truncate();
        PackagePolicy::truncate();
        PackageRating::truncate();
        PackageRequirement::truncate();
        PackageSubActivity::truncate();
        PaymentMethod::truncate();
        PromotionType::truncate();
        SubActivity::truncate();
        TravelDestination::truncate();
        TravelDestinationContact::truncate();
        TravelDestinationGallery::truncate();
        TravelDestinationPolicy::truncate();
        UserAddress::truncate();
        UserBucketList::truncate();

    }
}
