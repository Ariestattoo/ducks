<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\feeding
 *
 * @mixin \Eloquent
 * @property int                             $id
 * @property float                           $quantity
 * @property int                             $duck_count
 * @property int                             $location_id
 * @property int                             $food_id
 * @property int                             $user_id
 * @property int|null                        $task_id
 * @property string                          $time
 * @property string                          $comment
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Feeding whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Feeding whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Feeding whereDuckCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Feeding whereFoodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Feeding whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Feeding whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Feeding whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Feeding whereTaskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Feeding whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Feeding whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Feeding whereUserId($value)
 */
class Feeding extends Model
{


  /**
   * @return \Illuminate\Database\Eloquent\Relations\belongsTo
   */
  public function task()
  {
    return $this->belongsTo(Task::class);

  }

  /**
   * @return \Illuminate\Database\Eloquent\Relations\belongsTo
   */
  public function location()
  {
    return $this->belongsTo(Location::class);

  }

  /**
   * @return \Illuminate\Database\Eloquent\Relations\belongsTo
   */
  public function food()
  {
    return $this->belongsTo(Food::class);

  }

  /**
   * @return \Illuminate\Database\Eloquent\Relations\belongsTo
   */
  public function user()
  {
    return $this->belongsTo(User::class);

  }


}
