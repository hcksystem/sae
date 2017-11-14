<?php
function cargarRouters() {
   define("routersPath", "../routers/");
   $files = glob(routersPath."*.php");
   foreach ($files as $filename) {
      if($filename!=routersPath."Router.php"||$filename!=routersPath."RouterBase.php"){
         include_once($filename);
      }
   }
}
cargarRouters();

class RouterPrincipal extends RouterBase
{
   function route(){
      switch(strtolower($this->datosURI->controlador)){
         case "asignatura":
            $routerAsignatura = new RouterAsignatura();
            echo json_encode($routerAsignatura->route());
            break;
         case "asignaturasolicitudmatricula":
            $routerAsignaturaSolicitudMatricula = new RouterAsignaturaSolicitudMatricula();
            echo json_encode($routerAsignaturaSolicitudMatricula->route());
            break;
         case "asistencia":
            $routerAsistencia = new RouterAsistencia();
            echo json_encode($routerAsistencia->route());
            break;
         case "aula":
            $routerAula = new RouterAula();
            echo json_encode($routerAula->route());
            break;
         case "aulasasignaturas":
            $routerAulasAsignaturas = new RouterAulasAsignaturas();
            echo json_encode($routerAulasAsignaturas->route());
            break;
         case "carrera":
            $routerCarrera = new RouterCarrera();
            echo json_encode($routerCarrera->route());
            break;
         case "categorianota":
            $routerCategoriaNota = new RouterCategoriaNota();
            echo json_encode($routerCategoriaNota->route());
            break;
         case "contacto":
            $routerContacto = new RouterContacto();
            echo json_encode($routerContacto->route());
            break;
         case "cuenta":
            $routerCuenta = new RouterCuenta();
            echo json_encode($routerCuenta->route());
            break;
         case "cupo":
            $routerCupo = new RouterCupo();
            echo json_encode($routerCupo->route());
            break;
         case "datosestudiante":
            $routerDatosEstudiante = new RouterDatosEstudiante();
            echo json_encode($routerDatosEstudiante->route());
            break;
         case "detallenotas":
            $routerDetalleNotas = new RouterDetalleNotas();
            echo json_encode($routerDetalleNotas->route());
            break;
         case "discapacidad":
            $routerDiscapacidad = new RouterDiscapacidad();
            echo json_encode($routerDiscapacidad->route());
            break;
         case "docente":
            $routerDocente = new RouterDocente();
            echo json_encode($routerDocente->route());
            break;
         case "docenteasignatura":
            $routerDocenteAsignatura = new RouterDocenteAsignatura();
            echo json_encode($routerDocenteAsignatura->route());
            break;
         case "documento":
            $routerDocumento = new RouterDocumento();
            echo json_encode($routerDocumento->route());
            break;
         case "educacioncontinua":
            $routerEducacionContinua = new RouterEducacionContinua();
            echo json_encode($routerEducacionContinua->route());
            break;
         case "enfermedad":
            $routerEnfermedad = new RouterEnfermedad();
            echo json_encode($routerEnfermedad->route());
            break;
         case "estado":
            $routerEstado = new RouterEstado();
            echo json_encode($routerEstado->route());
            break;
         case "estadocivil":
            $routerEstadoCivil = new RouterEstadoCivil();
            echo json_encode($routerEstadoCivil->route());
            break;
         case "estadopersona":
            $routerEstadoPersona = new RouterEstadoPersona();
            echo json_encode($routerEstadoPersona->route());
            break;
         case "estadosolicitud":
            $routerEstadoSolicitud = new RouterEstadoSolicitud();
            echo json_encode($routerEstadoSolicitud->route());
            break;
         case "estudiante":
            $routerEstudiante = new RouterEstudiante();
            echo json_encode($routerEstudiante->route());
            break;
         case "etnia":
            $routerEtnia = new RouterEtnia();
            echo json_encode($routerEtnia->route());
            break;
         case "experiencialaboral":
            $routerExperienciaLaboral = new RouterExperienciaLaboral();
            echo json_encode($routerExperienciaLaboral->route());
            break;
         case "genero":
            $routerGenero = new RouterGenero();
            echo json_encode($routerGenero->route());
            break;
         case "hobbies":
            $routerHobbies = new RouterHobbies();
            echo json_encode($routerHobbies->route());
            break;
         case "horasclase":
            $routerHorasClase = new RouterHorasClase();
            echo json_encode($routerHorasClase->route());
            break;
         case "institucion":
            $routerInstitucion = new RouterInstitucion();
            echo json_encode($routerInstitucion->route());
            break;
         case "instituto":
            $routerInstituto = new RouterInstituto();
            echo json_encode($routerInstituto->route());
            break;
         case "jornada":
            $routerJornada = new RouterJornada();
            echo json_encode($routerJornada->route());
            break;
         case "jornadacarrera":
            $routerJornadaCarrera = new RouterJornadaCarrera();
            echo json_encode($routerJornadaCarrera->route());
            break;
         case "malla":
            $routerMalla = new RouterMalla();
            echo json_encode($routerMalla->route());
            break;
         case "matricula":
            $routerMatricula = new RouterMatricula();
            echo json_encode($routerMatricula->route());
            break;
         case "matriculaasignatura":
            $routerMatriculaAsignatura = new RouterMatriculaAsignatura();
            echo json_encode($routerMatriculaAsignatura->route());
            break;
         case "modalidad":
            $routerModalidad = new RouterModalidad();
            echo json_encode($routerModalidad->route());
            break;
         case "motivosalida":
            $routerMotivoSalida = new RouterMotivoSalida();
            echo json_encode($routerMotivoSalida->route());
            break;
         case "niveltitulo":
            $routerNivelTitulo = new RouterNivelTitulo();
            echo json_encode($routerNivelTitulo->route());
            break;
         case "notas":
            $routerNotas = new RouterNotas();
            echo json_encode($routerNotas->route());
            break;
         case "ocupacion":
            $routerOcupacion = new RouterOcupacion();
            echo json_encode($routerOcupacion->route());
            break;
         case "paralelo":
            $routerParalelo = new RouterParalelo();
            echo json_encode($routerParalelo->route());
            break;
         case "parcial":
            $routerParcial = new RouterParcial();
            echo json_encode($routerParcial->route());
            break;
         case "periodoacademico":
            $routerPeriodoAcademico = new RouterPeriodoAcademico();
            echo json_encode($routerPeriodoAcademico->route());
            break;
         case "periodolectivo":
            $routerPeriodoLectivo = new RouterPeriodoLectivo();
            echo json_encode($routerPeriodoLectivo->route());
            break;
         case "persona":
            $routerPersona = new RouterPersona();
            echo json_encode($routerPersona->route());
            break;
         case "ponderacion":
            $routerPonderacion = new RouterPonderacion();
            echo json_encode($routerPonderacion->route());
            break;
         case "requisito":
            $routerRequisito = new RouterRequisito();
            echo json_encode($routerRequisito->route());
            break;
         case "roles":
            $routerRoles = new RouterRoles();
            echo json_encode($routerRoles->route());
            break;
         case "solicitudmatricula":
            $routerSolicitudMatricula = new RouterSolicitudMatricula();
            echo json_encode($routerSolicitudMatricula->route());
            break;
         case "tipoaula":
            $routerTipoAula = new RouterTipoAula();
            echo json_encode($routerTipoAula->route());
            break;
         case "tipodiscapacidad":
            $routerTipoDiscapacidad = new RouterTipoDiscapacidad();
            echo json_encode($routerTipoDiscapacidad->route());
            break;
         case "tipoeducacioncontinua":
            $routerTipoEducacionContinua = new RouterTipoEducacionContinua();
            echo json_encode($routerTipoEducacionContinua->route());
            break;
         case "tipoingresos":
            $routerTipoIngresos = new RouterTipoIngresos();
            echo json_encode($routerTipoIngresos->route());
            break;
         case "tipoinstitucionprocedencia":
            $routerTipoInstitucionProcedencia = new RouterTipoInstitucionProcedencia();
            echo json_encode($routerTipoInstitucionProcedencia->route());
            break;
         case "tiporequisito":
            $routerTipoRequisito = new RouterTipoRequisito();
            echo json_encode($routerTipoRequisito->route());
            break;
         case "tiposangre":
            $routerTipoSangre = new RouterTipoSangre();
            echo json_encode($routerTipoSangre->route());
            break;
         case "titulo":
            $routerTitulo = new RouterTitulo();
            echo json_encode($routerTitulo->route());
            break;
         case "tutorcarrera":
            $routerTutorCarrera = new RouterTutorCarrera();
            echo json_encode($routerTutorCarrera->route());
            break;
         case "ubicacion":
            $routerUbicacion = new RouterUbicacion();
            echo json_encode($routerUbicacion->route());
            break;
      }
   }
}
