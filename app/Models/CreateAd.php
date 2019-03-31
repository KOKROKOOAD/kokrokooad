<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 25 Nov 2018 17:20:58 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class CreateAd
 * 
 * @property int $id
 * @property int $ad_types_id
 * @property string $client_id
 * @property array $created_ads
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class CreateAd extends Eloquent
{
	protected $casts = [
		'ad_types_id' => 'int',
		'created_ads' => 'json'
	];

	protected $fillable = [
		'ad_types_id',
		'client_id',
		'created_ads'
	];
}
