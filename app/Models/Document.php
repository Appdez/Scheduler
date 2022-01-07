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
 * Class Document
 * 
 * @property int $id
 * @property string|null $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|ClientDocument[] $client_documents
 *
 * @package App\Models
 */
class Document extends Model
{
	use HasFactory;
	
	protected $table = 'documents';

	protected $fillable = [
		'name'
	];

	public function client_documents()
	{
		return $this->hasMany(ClientDocument::class);
	}
}
