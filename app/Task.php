<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\task
 *
 * @mixin \Eloquent
 * @property int                             $id
 * @property int                             $user_id
 * @property mixed                           $parameters
 * @property string                          $execute
 * @property string|null                     $completed
 * @property string|null                     $error
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Task whereCompleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Task whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Task whereError($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Task whereExecute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Task whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Task whereParameters($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Task whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Task whereUserId($value)
 */
class Task extends Model
{
  public function user()
  {
    return $this->belongsTo(User::class);

  }

  public function feeding()
  {
    return $this->hasOne(Feeding::class);
  }

}
