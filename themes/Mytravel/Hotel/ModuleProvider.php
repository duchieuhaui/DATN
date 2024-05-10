<?php
namespace Themes\Mytravel\Hotel;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Modules\Hotel\Hook;
use Modules\Hotel\Models\Hotel;
use Modules\Hotel\Models\HotelTranslation;

class ModuleProvider extends ServiceProvider
{
    public function boot(){
        add_action(Hook::FORM_AFTER_POLICY,[$this,'extra_info']);
        add_action(Hook::AFTER_SAVING,[$this,'save_extra_info']);
    }

    public function extra_info(Hotel $hotel){
        $translation = $hotel->translate(\request('lang'));
        echo view("Hotel::admin.hotel.mytravel.badge",['row'=>$hotel,'translation'=>$translation])->render();
    }

    public function save_extra_info(Hotel $hotel,Request $request){
        if($request->input('mytravel_save_extra'))
        {
            $hotel->badge_tags = $request->input('badge_tags');
            $hotel->saveOriginOrTranslation($request->input('lang'));
        }
    }

    public function register()
    {
        $this->app->bind(Hotel::class,\Themes\Mytravel\Hotel\Models\MytravelHotel::class);
        $this->app->bind(HotelTranslation::class,\Themes\Mytravel\Hotel\Models\MytravelHotelTranslation::class);
    }
}
