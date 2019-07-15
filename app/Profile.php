<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $guarded = [];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function profileImage()
  {
    $imagePath = ($this->profile_image) ? $this->profile_image : 'png/default_profile_image.png';
    return '/storage/' . $imagePath;
  }
}
