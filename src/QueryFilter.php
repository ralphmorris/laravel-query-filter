<?php

namespace RalphMorris\LaravelQueryFilter;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class QueryFilter
{
	protected $request;

	protected $builder;
	
	/**
	 * Query Filter Constructor
	 * 
	 * @param Illuminate\Http\Request $request
	 */
	function __construct(Request $request)
	{
		$this->request = $request;
	}

	/**
	 * Apply the filters that match the request
	 * 
	 * @param  Illuminate\Database\Eloquent\Builder $builder
	 * @return Illuminate\Database\Eloquent\Builder $builder
	 */
	public function apply(Builder $builder)
	{
		$this->builder = $builder;

		foreach ($this->filters() as $name => $value) {
			if ($value === null) {
				continue;
			}
			if (method_exists($this, $name)) {
				call_user_func_array([$this, $name], [$value]);
			}
		}

		return $this->builder;
	}

	/**	
	 * Get the request paramters
	 * 
	 * @return array
	 */
	public function filters()
	{
		return $this->request->all();
	}
}