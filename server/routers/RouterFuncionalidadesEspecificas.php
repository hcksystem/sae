<?php

function cargarRoutersEspecificos() {
    define("routersEspecificosPath", "../routers/especificos/");
    $files = glob(routersEspecificosPath."*.php");
    foreach ($files as $filename) {
       include_once($filename);
    }
 }
 cargarRoutersEspecificos();
 
 class RouterFuncionalidadesEspecificas extends RouterBase
 {
    function route(){
       switch(strtolower($this->datosURI->controlador)){
          case "login":
            $routerLogin = new RouterLogin();
            return json_encode($routerLogin->route());
            break;
          case "asistencia_estudiante":
            $routerAsistenciaEstudiante = new RouterAsistenciaEstudiante();
            return json_encode($routerAsistenciaEstudiante->route());
            break; 
          case "datos_cupo":
            $routerDatosCupo = new RouterDatosCupo();
            return json_encode($routerDatosCupo->route());
            break;
          case "datos_instituto":
            $routerDatosInstituto = new RouterDatosInstituto();
            return json_encode($routerDatosInstituto->route());
            break;
          case "periodo_lectivo_actual":
            $routerPeriodoLectivoActual = new RouterPeriodoLectivoActual();
            return json_encode($routerPeriodoLectivoActual->route());
            break;
          case "asignaturas_matriculables_primer_nivel":
            $routerAsignaturasMatriculablesPrimerNivel = new RouterAsignaturasMatriculablesPrimerNivel();
            return json_encode($routerAsignaturasMatriculablesPrimerNivel->route());
            break;
          case "estudiantes_matriculados":
            $routerEstudiantesMatriculados = new RouterEstudiantesMatriculados();
            return json_encode($routerEstudiantesMatriculados->route());
            break;

          case "estudiantes_solicitud_matricula":
            $routerEstudiantesSolicitud = new RouterEstudiantesSolicitudMatricula();
            return json_encode($routerEstudiantesSolicitud->route());
            break;
          
          case "estudiantes_solicitud_matricula_revisados":
            $routerEstudiantesSolicitudRevisados = new RouterEstudiantesSolicitudMatriculaRevisados();
            return json_encode($routerEstudiantesSolicitudRevisados->route());
            break;
          
          case "asignacion_roles_secundarios_roles":
            $routerAsignacionRolesSecundariosRoles = new RouterAsignacionRolesSecundariosRoles();
            return json_encode($routerAsignacionRolesSecundariosRoles->route());
            break;
          
            case "asignacion_roles_secundarios_personas":
            $routerAsignacionRolesSecundariosPersonas = new RouterAsignacionRolesSecundariosPersonas();
            return json_encode($routerAsignacionRolesSecundariosPersonas->route());
            break;
       }
    }
 }
 