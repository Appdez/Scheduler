<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AvgQueue
 * 
 * @property int $id
 * @property int|null $minutes
 * @property int $service_id
 * 
 * @property ScheduleService $schedule_service
 *
 * @package App\Models
 */
class AvgQueue extends Model
{
	use HasFactory;
	protected $table = 'avg_queues';
	public $timestamps = false;

	protected $casts = [
		'minutes' => 'int',
		'service_id' => 'int'
	];

	protected $fillable = [
		'minutes',
		'service_id'
	];

	public function schedule_service()
	{
		return $this->belongsTo(ScheduleService::class, 'service_id');
	}
}
