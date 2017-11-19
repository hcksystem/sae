import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { LayoutComponent } from './layout.component';

const routes: Routes = [
    {
        path: '', component: LayoutComponent,
        children: [
            { path: 'yavirac', loadChildren: './yavirac/yavirac.module#YaviracModule' },
            { path: 'dashboard', loadChildren: './dashboard/dashboard.module#DashboardModule' },
            { path: 'charts', loadChildren: './charts/charts.module#ChartsModule' },
            { path: 'tables', loadChildren: './tables/tables.module#TablesModule' },
            { path: 'forms', loadChildren: './form/form.module#FormModule' },
            { path: 'bs-element', loadChildren: './bs-element/bs-element.module#BsElementModule' },
            { path: 'grid', loadChildren: './grid/grid.module#GridModule' },
            { path: 'components', loadChildren: './bs-component/bs-component.module#BsComponentModule' },
            { path: 'blank-page', loadChildren: './blank-page/blank-page.module#BlankPageModule' },
            { path: 'asignatura', loadChildren: './asignatura/asignatura.module#AsignaturaModule' },
            {
                path: 'asignaturasolicitudmatricula',
                loadChildren: './asignaturasolicitudmatricula/asignaturasolicitudmatricula.module#AsignaturaSolicitudMatriculaModule'
            },
            { path: 'asistencia', loadChildren: './asistencia/asistencia.module#AsistenciaModule' },
            { path: 'asistencia-registro', loadChildren: './asistencia-registro/asistencia-registro.module#AsistenciaRegistroModule' },
            { path: 'aula', loadChildren: './aula/aula.module#AulaModule' },
            { path: 'aulasasignaturas', loadChildren: './aulasasignaturas/aulasasignaturas.module#AulasAsignaturasModule' },
            { path: 'carrera', loadChildren: './carrera/carrera.module#CarreraModule' },
            { path: 'categorianota', loadChildren: './categorianota/categorianota.module#CategoriaNotaModule' },
            { path: 'contacto', loadChildren: './contacto/contacto.module#ContactoModule' },
            { path: 'cuenta', loadChildren: './cuenta/cuenta.module#CuentaModule' },
            { path: 'cupo', loadChildren: './cupo/cupo.module#CupoModule' },
            { path: 'datosestudiante', loadChildren: './datosestudiante/datosestudiante.module#DatosEstudianteModule' },
            { path: 'detallenotas', loadChildren: './detallenotas/detallenotas.module#DetalleNotasModule' },
            { path: 'discapacidad', loadChildren: './discapacidad/discapacidad.module#DiscapacidadModule' },
            { path: 'docente', loadChildren: './docente/docente.module#DocenteModule' },
            { path: 'docenteasignatura', loadChildren: './docenteasignatura/docenteasignatura.module#DocenteAsignaturaModule' },
            { path: 'documento', loadChildren: './documento/documento.module#DocumentoModule' },
            { path: 'educacioncontinua', loadChildren: './educacioncontinua/educacioncontinua.module#EducacionContinuaModule' },
            { path: 'enfermedad', loadChildren: './enfermedad/enfermedad.module#EnfermedadModule' },
            { path: 'estado', loadChildren: './estado/estado.module#EstadoModule' },
            { path: 'estadocivil', loadChildren: './estadocivil/estadocivil.module#EstadoCivilModule' },
            { path: 'estadopersona', loadChildren: './estadopersona/estadopersona.module#EstadoPersonaModule' },
            { path: 'estadosolicitud', loadChildren: './estadosolicitud/estadosolicitud.module#EstadoSolicitudModule' },
            { path: 'estudiante', loadChildren: './estudiante/estudiante.module#EstudianteModule' },
            { path: 'etnia', loadChildren: './etnia/etnia.module#EtniaModule' },
            { path: 'experiencialaboral', loadChildren: './experiencialaboral/experiencialaboral.module#ExperienciaLaboralModule' },
            { path: 'genero', loadChildren: './genero/genero.module#GeneroModule' },
            { path: 'hobbies', loadChildren: './hobbies/hobbies.module#HobbiesModule' },
            { path: 'horasclase', loadChildren: './horasclase/horasclase.module#HorasClaseModule' },
            { path: 'institucion', loadChildren: './institucion/institucion.module#InstitucionModule' },
            { path: 'instituto', loadChildren: './instituto/instituto.module#InstitutoModule' },
            { path: 'jornada', loadChildren: './jornada/jornada.module#JornadaModule' },
            { path: 'jornadacarrera', loadChildren: './jornadacarrera/jornadacarrera.module#JornadaCarreraModule' },
            { path: 'malla', loadChildren: './malla/malla.module#MallaModule' },
            { path: 'matricula', loadChildren: './matricula/matricula.module#MatriculaModule' },
            { path: 'matriculaasignatura', loadChildren: './matriculaasignatura/matriculaasignatura.module#MatriculaAsignaturaModule' },
            { path: 'modalidad', loadChildren: './modalidad/modalidad.module#ModalidadModule' },
            { path: 'motivosalida', loadChildren: './motivosalida/motivosalida.module#MotivoSalidaModule' },
            { path: 'niveltitulo', loadChildren: './niveltitulo/niveltitulo.module#NivelTituloModule' },
            { path: 'notas', loadChildren: './notas/notas.module#NotasModule' },
            { path: 'ocupacion', loadChildren: './ocupacion/ocupacion.module#OcupacionModule' },
            { path: 'paralelo', loadChildren: './paralelo/paralelo.module#ParaleloModule' },
            { path: 'parcial', loadChildren: './parcial/parcial.module#ParcialModule' },
            { path: 'periodoacademico', loadChildren: './periodoacademico/periodoacademico.module#PeriodoAcademicoModule' },
            { path: 'periodolectivo', loadChildren: './periodolectivo/periodolectivo.module#PeriodoLectivoModule' },
            { path: 'persona', loadChildren: './persona/persona.module#PersonaModule' },
            { path: 'ponderacion', loadChildren: './ponderacion/ponderacion.module#PonderacionModule' },
            { path: 'requisito', loadChildren: './requisito/requisito.module#RequisitoModule' },
            { path: 'roles', loadChildren: './roles/roles.module#RolesModule' },
            { path: 'solicitudmatricula', loadChildren: './solicitudmatricula/solicitudmatricula.module#SolicitudMatriculaModule' },
            { path: 'tipoaula', loadChildren: './tipoaula/tipoaula.module#TipoAulaModule' },
            { path: 'tipodiscapacidad', loadChildren: './tipodiscapacidad/tipodiscapacidad.module#TipoDiscapacidadModule' },
            {
                path: 'tipoeducacioncontinua',
                loadChildren: './tipoeducacioncontinua/tipoeducacioncontinua.module#TipoEducacionContinuaModule'
            },
            { path: 'tipoingresos', loadChildren: './tipoingresos/tipoingresos.module#TipoIngresosModule' },
            {
                path: 'tipoinstitucionprocedencia',
                loadChildren: './tipoinstitucionprocedencia/tipoinstitucionprocedencia.module#TipoInstitucionProcedenciaModule'
            },
            { path: 'tiporequisito', loadChildren: './tiporequisito/tiporequisito.module#TipoRequisitoModule' },
            { path: 'tiposangre', loadChildren: './tiposangre/tiposangre.module#TipoSangreModule' },
            { path: 'titulo', loadChildren: './titulo/titulo.module#TituloModule' },
            { path: 'tutorcarrera', loadChildren: './tutorcarrera/tutorcarrera.module#TutorCarreraModule' },
            { path: 'ubicacion', loadChildren: './ubicacion/ubicacion.module#UbicacionModule' },
        ]
    }
];

@NgModule({
    imports: [RouterModule.forChild(routes)],
    exports: [RouterModule]
})

export class LayoutRoutingModule { }
