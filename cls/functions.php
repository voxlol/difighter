<?

function get_percentage($skill_point) {
	switch($skill_point) {
		default:
			$percent = 0;
		break;
		case 1:
			$percent = 33;
		break;
		case 2:
			$percent = 66;
		break;
		case 3:
			$percent = 100;
		break;
	}

	return $percent;
}

function cmp($a, $b) {
  return $b->win - $a->win;
}