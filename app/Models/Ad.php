<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 08 Nov 2018 15:37:53 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Ad
 *
 * @property int $id
 * @property string $subscription_id
 * @property string $client_id
 * @property string $ad_title
 * @property string $ad_description
 * @property string $media
 * @property string $media_house
 * @property string $spots
 * @property string $program
 * @property string $file_name
 * @property string $file_path
 * @property string $file_size
 * @property string $file_type
 * @property string $status
 * @property \Carbon\Carbon $publish_at
 * @property string $rate
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Ad extends Eloquent
{
	protected $dates = [
		'publish_at'
	];

	protected $fillable = [
		'subscription_id',
		'client_id',
		'ad_title',
		'ad_description',
		'media',
		'media_house',
		'spots',
		'program',
		'file_name',
		'file_path',
		'file_size',
		'file_type',
		'status',
		'publish_at',
		'rate'
	];
}
