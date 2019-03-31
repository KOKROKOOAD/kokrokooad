<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 09 Jul 2018 08:00:14 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Transaction
 * 
 * @property int $id
 * @property int $invoice_id
 * @property string $Payment_method
 * @property string $Amount
 * @property string $transaction_status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Transaction extends Eloquent
{
	protected $casts = [
		'invoice_id' => 'int'
	];

	protected $fillable = [
		'invoice_id',
		'Payment_method',
		'Amount',
		'transaction_status'
	];
}
