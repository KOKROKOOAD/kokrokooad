<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 09 Jul 2018 08:01:46 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Receipt
 * 
 * @property int $id
 * @property int $transaction_id
 * @property string $amount
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Receipt extends Eloquent
{
	protected $casts = [
		'transaction_id' => 'int'
	];

	protected $fillable = [
		'transaction_id',
		'amount'
	];
}
