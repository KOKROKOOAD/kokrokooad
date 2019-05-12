<?php

namespace App;

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class RateCardTitles
 *
 * @property int $id
 * @property string $client_id
 * @property string $rate_card_title_id
 *  * @property string $rate_card_title
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class RateCardTitles extends Eloquent
{

    protected $fillable = [
        'client_id',
        'rate_card_title_id',
        'rate_card_title'

    ];

    protected  $primaryKey = 'rate_card_title_id';
    protected $keyType = 'string';
    public $incrementing = false;

}
