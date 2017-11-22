<?php
include_once('../routers/RouterBase.php');
function cargarRouters() {
   define("routersPath", "../routers/");
   $files = glob(routersPath."CRUD/*.php");
   foreach ($files as $filename) {
      include_once($filename);
   }
   $files = glob(routersPath."especificos/*.php");
   foreach ($files as $filename) {
      include_once($filename);
   }
}
cargarRouters();

class RouterPrincipal extends RouterBase
{
   function route(){
      switch(strtolower($this->datosURI->controlador)){
         case "asignatura":
            $routerAsignatura = new RouterAsignatura();
            return json_encode($routerAsignatura->route());
            break;
         case "asignaturasolicitudmatricula":
            $routerAsignaturaSolicitudMatricula = new RouterAsignaturaSolicitudMatricula();
            return json_encode($routerAsignaturaSolicitudMatricula->route());
            break;
         case "asistencia":
            $routerAsistencia = new RouterAsistencia();
            return json_encode($routerAsistencia->route());
            break;
         case "aula":
            $routerAula = new RouterAula();
            return json_encode($routerAula->route());
            break;
         case "aulasasignaturas":
            $routerAulasAsignaturas = new RouterAulasAsignaturas();
            return json_encode($routerAulasAsignaturas->route());
            break;
         case "carrera":
            $routerCarrera = new RouterCarrera();
            return json_encode($routerCarrera->route());
            break;
         case "categorianota":
            $routerCategoriaNota = new RouterCategoriaNota();
            return json_encode($routerCategoriaNota->route());
            break;
         case "contacto":
            $routerContacto = new RouterContacto();
            return json_encode($routerContacto->route());
            break;
         case "cuenta":
            $routerCuenta = new RouterCuenta();
            return json_encode($routerCuenta->route());
            break;
         case "cupo":
            $routerCupo = new RouterCupo();
            return json_encode($routerCupo->route());
            break;
         case "datosestudiante":
            $routerDatosEstudiante = new RouterDatosEstudiante();
            return json_encode($routerDatosEstudiante->route());
            break;
         case "detallenotas":
            $routerDetalleNotas = new RouterDetalleNotas();
            return json_encode($routerDetalleNotas->route());
            break;
         case "discapacidad":
            $routerDiscapacidad = new RouterDiscapacidad();
            return json_encode($routerDiscapacidad->route());
            break;
         case "docente":
            $routerDocente = new RouterDocente();
            return json_encode($routerDocente->route());
            break;
         case "docenteasignatura":
            $routerDocenteAsignatura = new RouterDocenteAsignatura();
            return json_encode($routerDocenteAsignatura->route());
            break;
         case "documento":
            $routerDocumento = new RouterDocumento();
            return json_encode($routerDocumento->route());
            break;
         case "educacioncontinua":
            $routerEducacionContinua = new RouterEducacionContinua();
            return json_encode($routerEducacionContinua->route());
            break;
         case "enfermedad":
            $routerEnfermedad = new RouterEnfermedad();
            return json_encode($routerEnfermedad->route());
            break;
         case "estado":
            $routerEstado = new RouterEstado();
            return json_encode($routerEstado->route());
            break;
         case "estadocivil":
            $routerEstadoCivil = new RouterEstadoCivil();
            return json_encode($routerEstadoCivil->route());
            break;
         case "estadopersona":
            $routerEstadoPersona = new RouterEstadoPersona();
            return json_encode($routerEstadoPersona->route());
            break;
         case "estadosolicitud":
            $routerEstadoSolicitud = new RouterEstadoSolicitud();
            return json_encode($routerEstadoSolicitud->route());
            break;
         case "estudiante":
            $routerEstudiante = new RouterEstudiante();
            return json_encode($routerEstudiante->route());
            break;
         case "etnia":
            $routerEtnia = new RouterEtnia();
            return json_encode($routerEtnia->route());
            break;
         case "experiencialaboral":
            $routerExperienciaLaboral = new RouterExperienciaLaboral();
            return json_encode($routerExperienciaLaboral->route());
            break;
         case "genero":
            $routerGenero = new RouterGenero();
            return json_encode($routerGenero->route());
            break;
         case "hobbies":
            $routerHobbies = new RouterHobbies();
            return json_encode($routerHobbies->route());
            break;
         case "horasclase":
            $routerHorasClase = new RouterHorasClase();
            return json_encode($routerHorasClase->route());
            break;
         case "institucion":
            $routerInstitucion = new RouterInstitucion();
            return json_encode($routerInstitucion->route());
            break;
         case "instituto":
            $routerInstituto = new RouterInstituto();
            return json_encode($routerInstituto->route());
            break;
         case "jornada":
            $routerJornada = new RouterJornada();
            return json_encode($routerJornada->route());
            break;
         case "jornadacarrera":
            $routerJornadaCarrera = new RouterJornadaCarrera();
            return json_encode($routerJornadaCarrera->route());
            break;
         case "malla":
            $routerMalla = new RouterMalla();
            return json_encode($routerMalla->route());
            break;
         case "matricula":
            $routerMatricula = new RouterMatricula();
            return json_encode($routerMatricula->route());
            break;
         case "matriculaasignatura":
            $routerMatriculaAsignatura = new RouterMatriculaAsignatura();
            return json_encode($routerMatriculaAsignatura->route());
            break;
         case "modalidad":
            $routerModalidad = new RouterModalidad();
            return json_encode($routerModalidad->route());
            break;
         case "motivosalida":
            $routerMotivoSalida = new RouterMotivoSalida();
            return json_encode($routerMotivoSalida->route());
            break;
         case "niveltitulo":
            $routerNivelTitulo = new RouterNivelTitulo();
            return json_encode($routerNivelTitulo->route());
            break;
         case "notas":
            $routerNotas = new RouterNotas();
            return json_encode($routerNotas->route());
            break;
         case "ocupacion":
            $routerOcupacion = new RouterOcupacion();
            return json_encode($routerOcupacion->route());
            break;
         case "paralelo":
            $routerParalelo = new RouterParalelo();
            return json_encode($routerParalelo->route());
            break;
         case "parcial":
            $routerParcial = new RouterParcial();
            return json_encode($routerParcial->route());
            break;
         case "periodoacademico":
            $routerPeriodoAcademico = new RouterPeriodoAcademico();
            return json_encode($routerPeriodoAcademico->route());
            break;
         case "periodolectivo":
            $routerPeriodoLectivo = new RouterPeriodoLectivo();
            return json_encode($routerPeriodoLectivo->route());
            break;
         case "persona":
            $routerPersona = new RouterPersona();
            return json_encode($routerPersona->route());
            break;
         case "ponderacion":
            $routerPonderacion = new RouterPonderacion();
            return json_encode($routerPonderacion->route());
            break;
         case "requisito":
            $routerRequisito = new RouterRequisito();
            return json_encode($routerRequisito->route());
            break;
         case "roles":
            $routerRoles = new RouterRoles();
            return json_encode($routerRoles->route());
            break;
         case "solicitudmatricula":
            $routerSolicitudMatricula = new RouterSolicitudMatricula();
            return json_encode($routerSolicitudMatricula->route());
            break;
         case "tipoaula":
            $routerTipoAula = new RouterTipoAula();
            return json_encode($routerTipoAula->route());
            break;
         case "tipodiscapacidad":
            $routerTipoDiscapacidad = new RouterTipoDiscapacidad();
            return json_encode($routerTipoDiscapacidad->route());
            break;
         case "tipoeducacioncontinua":
            $routerTipoEducacionContinua = new RouterTipoEducacionContinua();
            return json_encode($routerTipoEducacionContinua->route());
            break;
         case "tipoingresos":
            $routerTipoIngresos = new RouterTipoIngresos();
            return json_encode($routerTipoIngresos->route());
            break;
         case "tipoinstitucionprocedencia":
            $routerTipoInstitucionProcedencia = new RouterTipoInstitucionProcedencia();
            return json_encode($routerTipoInstitucionProcedencia->route());
            break;
         case "tiporequisito":
            $routerTipoRequisito = new RouterTipoRequisito();
            return json_encode($routerTipoRequisito->route());
            break;
         case "tiposangre":
            $routerTipoSangre = new RouterTipoSangre();
            return json_encode($routerTipoSangre->route());
            break;
         case "titulo":
            $routerTitulo = new RouterTitulo();
            return json_encode($routerTitulo->route());
            break;
         case "tutorcarrera":
            $routerTutorCarrera = new RouterTutorCarrera();
            return json_encode($routerTutorCarrera->route());
            break;
         case "ubicacion":
            $routerUbicacion = new RouterUbicacion();
            return json_encode($routerUbicacion->route());
            break;
      }
   }
}
