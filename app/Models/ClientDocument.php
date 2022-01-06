<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ClientDocument
 * 
 * @property int $document_id
 * @property int $client_schedule_id
 * @property string|null $value
 * 
 * @property ClientScheduler $client_scheduler
 * @property Document $document
 *
 * @package App\Models
 */
class ClientDocument extends Model
{
	protected $table = 'client_documents';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'document_id' => 'int',
		'client_schedule_id' => 'int'
	];

	protected $fillable = [
		'value'
	];

	public function client_scheduler()
	{
		return $this->belongsTo(ClientScheduler::class, 'client_schedule_id');
	}

	public function document()
	{
		return $this->belongsTo(Document::class);
	}
}
