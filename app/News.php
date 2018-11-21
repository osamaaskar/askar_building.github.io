<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
  use SoftDeletes;
  protected $date =['deleted_at'];
  protected $fillable = ['title', 'add_by', 'desc', 'content','status'];
    //
}
