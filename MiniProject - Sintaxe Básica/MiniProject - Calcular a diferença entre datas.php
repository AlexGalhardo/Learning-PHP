<?php
class Tempo {

	static public function diferenca($dt) {
		$time = strtotime($dt);
		$now = time();
		$dif = $now - $time;

		if($dif > ((24*60)*60)) {
			// dias
			$dif = (($dif / 60) / 60);

			$t = floor($dif/24);
			return $t.' dia'.(($t==1)?'':'s');
		} else {
			// horas
			$dif = (($dif / 60) / 60);

			if(floor($dif*60*60) < 60) {
				$t = floor($dif*60*60);
				return $t.' segundo'.(($t==1)?'':'s');
			} elseif($dif < 1) {
				$t = floor($dif*60);
				return $t.' minuto'.(($t==1)?'':'s');
			} else {
				$t = floor($dif);
				return $t.' hora'.(($t==1)?'':'s');
			}
		}

		return $dif;
	}

}

// require 'Tempo.class.php';

$t = '2019-01-13 17:00:00';
$data = date('d/m/Y H:i:s', strtotime($t));

echo $data.'<br/>foi há '.Tempo::diferenca($t).' atrás';