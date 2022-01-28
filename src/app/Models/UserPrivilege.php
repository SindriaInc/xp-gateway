<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserPrivilege
 *
 * @property int $id
 * @property string $name
 * @property string $short
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserPrivilege newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserPrivilege newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserPrivilege query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserPrivilege whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserPrivilege whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserPrivilege whereShort($value)
 * @mixin \Eloquent
 */
class UserPrivilege extends Model
{
    public $timestamps = false;
}
