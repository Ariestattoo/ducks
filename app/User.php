<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\HasApiTokens;

/**
 * App\User
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[]
 *                    $clients
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[]
 *                $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[]
 *                    $tokens
 * @mixin \Eloquent
 * @property int
 *               $id
 * @property string
 *               $name
 * @property string
 *               $email
 * @property string|null
 *               $email_verified_at
 * @property string
 *               $password
 * @property string|null
 *               $remember_token
 * @property \Illuminate\Support\Carbon|null
 *               $created_at
 * @property \Illuminate\Support\Carbon|null
 *               $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
class User extends Authenticatable
{
  use HasApiTokens, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name',
    'email',
    'password',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  public function feeding()
  {
    return $this->hasMany(Feeding::class);
  }

  public function recentFeedings($last=false)
  {
    $query = <<<EOD
 SELECT 
    f.*, l.address AS location,
    fs.name as food,
    fs.portion as portion
FROM
    ducks.feedings f
        JOIN
    ducks.locations l ON f.location_id = l.id
        JOIN
    ducks.foods fs ON f.food_id = fs.id
WHERE
    f.user_id = ?
ORDER BY f.created_at DESC limit ?;
EOD;
    return DB::select($query,[$this->id,$last?1:10]);

  }

  public function location()
  {
    $query = <<<EOD
SELECT 
    *
FROM
    ducks.locations l
        JOIN
    ducks.feedings f ON f.location_id = l.id
WHERE
    f.user_id = 1 order by l.created_at desc;
EOD;
    return DB::select($query,[$this->id]);
  }
}
