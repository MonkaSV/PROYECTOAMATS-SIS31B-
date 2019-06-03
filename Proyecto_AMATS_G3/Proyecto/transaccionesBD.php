<?php
require_once('Conexion.php');

class transaccionBD{

	protected $c;
	public function transaccionBD(){
		//inicializar lo necesario
		$this->c = new Conexion ();
	}

	public function agregarRespuesta($id,$respuesta){
		
		$sql= "insert into respuestas values($id,'$respuesta')";


		//POR SI QUEDA TIEMPO
		/*$n=count($datos);
		$values.="'$datos[0]'"; 
		for ($i=1; $i < $n; $i++) { 
			$values.=",'".$datos[$n]."'"; 
			
		}
		$sql="insert into $tabla values ($values)";*/

		$this->c->ejecutar($sql);
	}
	public function agregarPreguntaNormal($id,$pregunta,$id_tipo,$numero){
		$sql="INSERT INTO preguntas(ID_pregunta,pregunta,ID_tipo,numero_respuestas) VALUES ($id,'$pregunta',$id_tipo,$numero)";

		$this->c->ejecutar($sql);
	}

	public function guardarEncuestaxPregunta($idEncuesta,$idPregunta){
		$sql="INSERT INTO preguntas_por_encuesta VALUES('$idEncuesta','$idPregunta')";
		$this->c->ejecutar($sql);
	}
	public function guardarRespuestaxPregunta($idPregunta,$idRespuesta)
	{
		$sql="INSERT INTO respuestas_por_preguntas
            (ID_pregunta,ID_respuesta)VALUES ('$idPregunta', '$idRespuesta')";
            $this->c->ejecutar($sql);


	}

	public function guardarEncuesta($idEncuesta,$nombreEncuesta,$cantidadPreguntas,$comentario,$tipoEncuesta,$fechaCreacion,$fechaInicio,$fechaFin){
		$sql= "
			INSERT INTO encuesta
            (ID_encuesta,
             Nombre_encuesta,
             Cantidad_preguntas,
             Comentario,
             Tipo_encuesta,
             fecha_creacion,
             fecha_inicio,
             fecha_finalizacion)
VALUES ('$idEncuesta',
        '$nombreEncuesta',
        '$cantidadPreguntas',
        '$comentario',
        '$tipoEncuesta',
        '$fechaCreacion',
        '$fechaInicio',
        '$fechaFin');
		 ";

		 $this->c->ejecutar($sql);
	}

	public function numeroPreguntasxEncuesta($id){
		$sql="SELECT Cantidad_preguntas FROM encuesta WHERE ID_encuesta='$id'";
		$respuesta=$this->c->consultar($sql);
		return $respuesta;
	}





}

?>