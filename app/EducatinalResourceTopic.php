<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducatinalResourceTopic extends Model
{
  protected $table = "educational_resource_topic";
  //protected $primaryKey  = ['at_id'];
  protected $fillable = array("educational_resource_id","topic_id");
}
