<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 11 May 2019 22:29:59 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Invoice
 * 
 * @property int $id
 * @property string $client_id
 * @property string $subscription_id
 * @property string $media_house_id
 * @property string $invoice_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Invoice extends Eloquent
{
	protected $fillable = [
		'client_id',
		'subscription_id',
		'media_house_id',
		'invoice_id'
	];
}
