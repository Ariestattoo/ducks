<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\food
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $portion
 * @property string $name
 * @property string $description
 * @property string $nutritious_quality
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Food whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Food whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Food whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Food whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Food whereNutritiousQuality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Food wherePortion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Food whereUpdatedAt($value)
 */
class Food extends Model
{
    public function feeding()
    {
      return $this->hasMany(Feeding::class);
    }
}
