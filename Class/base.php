<?php 
include_once '../Common/funciones.php';

class dataBase{
	protected $dataHost;

	public $sqlMsg = '';
	public $sqlDuplicado = false;

	private $tipoBase = 'mysql';
	private $host = 'localhost';
	private $user = 'root';
	private $pass = 'nome21';

	public function commit(){
		return $this->dataHost->commit();
	}

	public function begin_transaction(){
		return $this->dataHost->begin_transaction();
	}

	public function rollBack(){
		return $this->dataHost->roolBack();
	}

	public function close(){
		return $this->dataHost->close();
	}

	public function query($sqlSelect){
		// return $this->dataHost->query($sqlSelect);
		$this->sqlMsg = '';
		$resultado = '';

		$exeConsulta = $this->ejecutar($sqlSelect);
		$resultado = $exeConsulta->get_result();
		if ($this->sqlMsg == '') {
			$row = $exeConsulta->fetch();
			displaylog($row);
			if ( !$row ) {
				displaylog("sin registro");
				$exeConsulta->close();
			}
			return  $resultado;
		} else {
			return "";	
		}
	}

	public function json($sqlSelect){
		// Ejecuta la conuslta y retorna un String tipo json.
		$exeConsulta = $this->ejecutar($sqlSelect);

		if ($this->sqlMsg == '') {
			$row = $exeConsulta->fetchAll();
			return $this->safe_json_encode($row);
		} else {
			return "";
		}
		
	}

	public function lastInsertId(){
		return $this->dataHost->insert_id();
	}

	function __construct($nombreBase){
			//Sobreescribo el metodo constructor.
		$this->sqlMsg = "";
		try {
			$this->tipoBase = 'mysql';
			$this->dataHost = new mysqli($this->host, $this->user, $this->pass, $nombreBase);
			$this->dataHost->set_charset('utf8');
		} catch (Exception $e) {
			//Capturar errores en la coneccion.
			$msgLog = "Ha ocurrido un error y no se pudo conectar a la base de datos. ". $e->getMessage() ."\r\n";
			$msgLog .= "	Detalle getTraceAsString: ". $e->getTraceAsString() ."\r\n";
			$msgLog .= "	Detalle getFile: ". $e->getFile() ."\r\n";
			$msgLog .= "	Detalle getLine: ". $e->getLine() ."\r\n";
			$msgLog .= "	Detalle errorInfo: ". $e->errorInfo() ."\r\n";
			$msgLog .= "	Ruta: ". $ruta;
			displaylog($msgLog);

		}
	}
	public function ejecutar($sql){
		$this->sqlMsg = '';
		$this->sqlDuplicado = false;
		$res = new stdClass();

		try {
			$resultado = $this->dataHost->prepare($sql);
			displaylog($sql);
			$resultado->execute();
			return $resultado;
		} catch (Exception $e) {
			if ($e->getCode() == 23000) {
				$msgLog = "Registro Duplicado en Instruccion SQL: ". $sql;
				displaylog($msgLog);
				$this->sqlDuplicado = true;
				$this->sqlMsg = "Registro Duplicado ";
			} else {
				$msgLog = "Ha ocurrido un error al ejecutar SQL en base de datos. ". $e->getMessage() . "\r\n";
				$msgLog .= "	Detalle getTraceAsString: ". $e->getTraceAsString() ."\r\n";
				$msgLog .= "	Detalle getFile: ". $e->getFile() ."\r\n";
				$msgLog .= "	Detalle getLine: ". $e->getLine() ."\r\n";
				$msgLog .= "	Scrip: ". $sql ."\r\n";
				displaylog($msgLog);
				echo $msgLog;
				$this->sqlMsg = "ErrorTry: Al ejecutar SQL - ". $e->getMessage();
			}
		}
	}

	private function safe_json_encode($value){
		if (version_compare(PHP_VERSION, '5.4.0') >= 0) {
			$encoded = json_encode($value, JSON_PRETTY_PRINT);
		} else {
			$encoded = json_encode($value);
		}
		switch (json_last_error()) {
			case JSON_ERROR_NONE:
				return $encoded;
			case JSON_ERROR_DEPTH:
				return 'Maximum stack depth exceeded'; // or trigger_error() or throw new Exception()
			case JSON_ERROR_STATE_MISMATCH:
				return 'Underflow or the modes mismatch'; // or trigger_error() or throw new Exception()
			case JSON_ERROR_CTRL_CHAR:
				return 'Unexpected control character found';
			case JSON_ERROR_SYNTAX:
				return 'Syntax error, malformed JSON'; // or trigger_error() or throw new Exception()
			case JSON_ERROR_UTF8:
				$clean = $this->utf8ize($value);
				return $this->safe_json_encode($clean);
			default:
				return 'Unknown error'; // or trigger_error() or throw new Exception()
	
		}
	}

	private function utf8ize($mixed) {
		if (is_array($mixed)) {
			foreach ($mixed as $key => $value) {
				$mixed[$key] = $this->utf8ize($value);
			}
		} else if (is_string ($mixed)) {
			return utf8_encode($mixed);
		}
		return $mixed;
	}
	
}

?>