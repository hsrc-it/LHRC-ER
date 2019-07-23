<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
  protected $table = 'sources';
  protected $fillable = [
    'educational_resource_id	',
    'source_name',
    'source_email',
    'source_phone'
  ];
  public function resources()
  {
      return $this->belongsTo('App\EducationalResource');
  }

}
