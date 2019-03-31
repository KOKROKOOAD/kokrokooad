<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 25 Nov 2018 16:33:19 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AdType
 * 
 * @property int $id
 * @property string $client_id
 * @property string $adTitle
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class AdType extends Eloquent
{
	protected $fillable = [
		'client_id',
		'adTitle'
	];
}
