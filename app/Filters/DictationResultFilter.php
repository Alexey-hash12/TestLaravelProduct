<?php 

namespace App\Filters;

class DictationResultFilter extends QueryFilter {
	public function title_of_dictation($title) {
		return $this->builder->where('title_of_dictation', $title);
	}
}


