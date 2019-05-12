<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 11 May 2019 22:29:59 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Message
 * 
 * @property int $id
 * @property int $user_id
 * @property string $message
 * @property string $channel
 * @property string $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Message extends Eloquent
{
	protected $casts = [
		'user_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'message',
		'channel',
		'status'
	];
}
