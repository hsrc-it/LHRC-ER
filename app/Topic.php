<?php

namespace App;

// use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
  protected $table = 'topics';
  protected $fillable = [
      'english_name', 'arabic_name'
  ];

  public static function getTopics()
  {
      $topics = Topic::pluck('english_name', 'id');
      return $topics;
  }
  public function resources()
  {
      return $this->belongsToMany('App\EducationalResource');
  }
}
