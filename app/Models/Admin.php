<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 11 May 2019 22:29:59 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Admin
 * 
 * @property int $id
 * @property string $admin_id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $job_title
 * @property string $admin_type
 * @property bool $status
 * @property string $media_house_id
 * @property string $password
 * @property string $logo
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
		'admin_id',
		'name',
		'email',
		'phone',
		'job_title',
		'admin_type',
		'status',
		'media_house_id',
		'password',
		'logo',
		'remember_token'
	];
}
