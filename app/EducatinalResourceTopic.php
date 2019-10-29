<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducatinalResourceTopic extends Model
{
  protected $table = "educational_resource_topic";
  protected $fillable = array("educational_resource_id","topic_id");
}
