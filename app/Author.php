<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
  protected $table = 'authors';
  protected $fillable = [
    'educational_resource_id	',
    'name',
    'email',
    'phone'
  ];
  public function resources()
  {
      return $this->belongsTo('App\EducationalResource');
  }

}
