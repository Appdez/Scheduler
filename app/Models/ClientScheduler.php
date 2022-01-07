<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ClientScheduler
 * 
 * @property int $id
 * @property string|null $key
 * @property string|null $qr_code
 * @property string|null $contact
 * @property string|null $email
 * @property Carbon|null $scheduled_at
 * @property Carbon|null $scheduled_end_at
 * @property Carbon|null $scheduled_for
 * @property Carbon|null $scheduled_ended_at
 * @property int $client_id
 * @property int $service_id
 * 
 * @property ScheduleService $schedule_service
 * @property User $user
 * @property Collection|ClientDocument[] $client_documents
 *
 * @package App\Models
 */
class ClientScheduler extends Model
{
	use HasFactory;
	protected $table = 'client_schedulers';
	public $timestamps = false;

	protected $casts = [
		'client_id' => 'int',
		'service_id' => 'int'
	];

	protected $dates = [
		'scheduled_at',
		'scheduled_end_at',
		'scheduled_for',
		'scheduled_ended_at'
	];

	protected $fillable = [
		'key',
		'qr_code',
		'contact',
		'email',
		'scheduled_at',
		'scheduled_end_at',
		'scheduled_for',
		'scheduled_ended_at',
		'client_id',
		'service_id'
	];

	public function schedule_service()
	{
		return $this->belongsTo(ScheduleService::class, 'service_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'client_id');
	}

	public function client_documents()
	{
		return $this->hasMany(ClientDocument::class, 'client_schedule_id');
	}
}
