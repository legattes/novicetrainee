<?php
class Session{
	protected $id;
	protected $path;
	protected $location = '';

	protected function write(){
		$filename = $this->filename($this->id);

		$file = $this->path . '/' . $filename;

		$stream = $this->open($file);

		$json = [
			'session_id' => '2',
			'loggedUntil' => time()];

		fwrite($stream, json_encode($json));
	}

	public function __construct($id, $path){
		$this->path = $path;
		$this->id = $id;
		//$this->expire($path . '/' . $this->filename($id));
		//$this->write();
	}

	protected function filename($info){
		return md5($info);
	}

	protected function open($path){
			return fopen($path, 'w');
	}

	public function forget($path){
		return unlink($path);
	}

	protected function expire($path){
		$dates = $this->getDates($path);

		if($dates['date'] < $dates['now']){
			$this->forget($path);			
		}
	}

	protected function getContents($path){
		return file_get_contents($path);
	}

	protected function logged($file){
		$dates = $this->getDates($path);

		if($dates['date'] > $dates['now']){
			return true;			
		} else {
			$this->destroy($file);
		}
	}

	protected function destroy($file){
		$this->forget($file);
		$this->redirect($this->location);
	}

	protected function redirect(){
		header('Location:');
	}

	protected function getDates($path){
		$file = json_decode($this->getContents($path));

		$date = date('Y:m:d H:i:s', $file->loggedUntil);

		$now = date('Y:m:d H:i:s', time());

		return [$date, $now];
	}

}

?>