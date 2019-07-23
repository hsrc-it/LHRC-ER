<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducationalResource extends Model
{
    protected $table = 'educational_resources';
    protected $fillable = [
      'title',
      'gender',
      'age_group',
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
    public function sources()
    {
        return $this->hasMany('App\Source');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
