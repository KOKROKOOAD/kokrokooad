<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 11 May 2019 22:29:59 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class MediaType
 * 
 * @property int $id
 * @property string $mediaType
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class MediaType extends Eloquent
{
	protected $fillable = [
		'mediaType'
	];
}
