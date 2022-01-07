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
 * Class ScheduleService
 * 
 * @property int $id
 * @property string|null $name
 * @property string|null $requirement
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|AvgQueue[] $avg_queues
 * @property Collection|ClientScheduler[] $client_schedulers
 *
 * @package App\Models
 */
class ScheduleService extends Model
{
	use HasFactory;
	protected $table = 'schedule_services';

	protected $fillable = [
		'name',
		'requirement'
	];

	public function avg_queues()
	{
		return $this->hasMany(AvgQueue::class, 'service_id');
	}

	public function client_schedulers()
	{
		return $this->hasMany(ClientScheduler::class, 'service_id');
	}
}
