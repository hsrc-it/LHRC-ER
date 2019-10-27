<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgeGroups extends Model
{
    protected $table = 'age_groups';
    protected $fillable = ['age_group'];

    public static function getAgeGroups()
    {
        $ageGroups = AgeGroups::pluck('age_group', 'id');
        return $ageGroups;
    }

    public function resources()
    {
        return $this->belongsToMany('App\EducationalResource', 'age_group_educational_resource', 'age_group_id', 'educational_resource_id');
    }
}
