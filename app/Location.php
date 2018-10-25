<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\location
 *
 * @mixin \Eloquent
 * @property int                             $id
 * @property string                          $address
 * @property string                          $latitude
 * @property string                          $longitude
 * @property string|null                     $description
 * @property string|null                     $place_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location wherePlaceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location whereUpdatedAt($value)
 */
class Location extends Model
{
  public function feeding()
  {
    return $this->hasMany(Feeding::class);
  }
}
