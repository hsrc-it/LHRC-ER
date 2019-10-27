<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducationalResource extends Model
{
    protected $table = 'educational_resources';
    protected $fillable = [
      'title',
      'gender',
      'language',
      'url',
      'format',
      'keywords',
      'date_of_approval',
      'user_id'
    ];
    public function topics()
    {
        return $this->belongsToMany('App\Topic');
    }
    public function ageGroups()
    {
        return $this->belongsToMany('App\AgeGroups', 'age_group_educational_resource', 'educational_resource_id', 'age_group_id');
    }
    public function authors()
    {
        return $this->hasMany('App\Author');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
