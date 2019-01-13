<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 08 Nov 2018 15:37:53 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Admin
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $title
 * @property string $user_type
 * @property bool $status
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Admin extends Eloquent
{
	protected $casts = [
		'status' => 'bool'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'phone',
		'title',
		'user_type',
		'status',
		'password',
		'remember_token'
	];
}
