<?php

class Holiday extends Eloquent {

	/**
	 * [$fillable description]
	 * @var [type]
	 */
	protected $fillable = ['title', 'start', 'end', 'type'];

	/**
	 * Columns guarded from being written with this model
	 * *
	 * @var [array]
	 */
	protected $guarded = ['*'];

	/**
	 * The attributes strictly included from the model's JSON form.
	 *
	 * @var [array]
	 */
	public $visible = ['title', 'start', 'end', 'type', 'from', 'to'];

	/**
	 * Accessors appended to the model's JSON form
	 * 
	 * @var [array]
	 */
	public $appends = ['from', 'to'];

	/**
	 * Alias to the ['start'] attribute
	 * 
	 * @return [string]
	 */
	public function getFromAttribute()
	{
		// $this->attributes['from'] = $this->start;
		return $this->attributes['start'];
	}

	/**
	 * Alias to the ['to'] attribute
	 * 
	 * @return 	[string]
	 */
	public function getToAttribute()
	{
		// $this->attributes['to'] = $this->end;
		return $this->attributes['end'];
	}
	
}