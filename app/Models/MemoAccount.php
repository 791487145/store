<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MemoAccount
 *
 * @property int $id
 * @property int|null $admin_id
 * @property string|null $name
 * @property string|null $account
 * @property string|null $psw
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|MemoAccount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemoAccount newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MemoAccount query()
 * @method static \Illuminate\Database\Eloquent\Builder|MemoAccount whereAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoAccount whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoAccount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoAccount whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MemoAccount wherePsw($value)
 * @mixin \Eloquent
 */
class MemoAccount extends Model
{
	protected $table = 'memo_account';
	public $timestamps = false;

	protected $casts = [
		'admin_id' => 'int'
	];

	protected $fillable = [
		'admin_id',
		'name',
		'account',
		'psw'
	];
}
