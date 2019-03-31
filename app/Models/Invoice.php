<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 08 Nov 2018 15:37:53 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Invoice
 * 
 * @property int $id
 * @property int $user_id
 * @property int $ads_id
 * @property string $amount
 * @property string $payment_method
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Invoice extends Eloquent
{
	protected $casts = [
		'user_id' => 'int',
		'ads_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'ads_id',
		'amount',
		'payment_method'
	];
}
