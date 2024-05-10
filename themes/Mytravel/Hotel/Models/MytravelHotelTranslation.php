<?php
namespace Themes\Mytravel\Hotel\Models;

class MytravelHotelTranslation extends \Modules\Hotel\Models\HotelTranslation
{

    protected $fillable = [
        'title',
        'content',
        'address',
        'policy',
        'surrounding',
        'badge_tags'
    ];
    protected $casts = [
        'policy'  => 'array',
        'surrounding' => 'array',
        'badge_tags' => 'array',
    ];

}
