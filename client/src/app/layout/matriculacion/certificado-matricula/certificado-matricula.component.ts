import { Component, OnInit, ViewContainerRef } from '@angular/core';
import { Persona } from 'app/entidades/CRUD/Persona';
import { DatosCupo } from 'app/entidades/especifico/Datos-Cupo';
import { DatosInstituto } from 'app/entidades/especifico/Datos-Instituto';
import { Asignatura } from 'app/entidades/CRUD/Asignatura';
import { PeriodoLectivo } from 'app/entidades/CRUD/PeriodoLectivo';
import { SolicitudMatricula } from 'app/entidades/CRUD/SolicitudMatricula';
import { ToastsManager } from 'ng2-toastr/src/toast-manager';
import { MatriculacionService } from 'app/layout/matriculacion/matriculacion.service';
import { SolicitudMatriculaService } from 'app/CRUD/solicitudmatricula/solicitudmatricula.service';
import { AsignaturaSolicitudMatriculaService } from 'app/CRUD/asignaturasolicitudmatricula/asignaturasolicitudmatricula.service';
import { LoginResult } from 'app/entidades/especifico/Login-Result';
import { PeriodoLectivoService } from 'app/CRUD/periodolectivo/periodolectivo.service';
import { AsignaturaService } from 'app/CRUD/asignatura/asignatura.service';
import { Jsonp } from '@angular/http/src/http';
import { Matricula } from 'app/entidades/CRUD/Matricula';
import { MatriculaService } from 'app/CRUD/matricula/matricula.service';
import { MatriculaAsignatura } from 'app/entidades/CRUD/MatriculaAsignatura';
import { MatriculaAsignaturaService } from 'app/CRUD/matriculaasignatura/matriculaasignatura.service';

@Component({
    selector: 'app-certificado-matricula',
    templateUrl: './certificado-matricula.component.html',
    styleUrls: ['./certificado-matricula.component.scss']
})
export class CertificadoMatriculaComponent implements OnInit {
    busy: Promise<any>;
    personaLogeada: Persona;
    rol: number;
    datosCupo: DatosCupo;
    datosInstituto: DatosInstituto;
    asignaturasMatriculables: Asignatura[];
    periodoLectivo: PeriodoLectivo;
    logo: String;
    fechaActual: Date;
    barcode: String;
    solicitudMatricula: SolicitudMatricula;
    nivel: String;
    numeroMatricula: String;
    numeroFolio: String;
    matricula: Matricula;
    constructor(public toastr: ToastsManager, vcr: ViewContainerRef,
        private matriculacionDataService: MatriculacionService,
        private solicitudMatriculaDataService: SolicitudMatriculaService,
        private periodoLectivoDataService: PeriodoLectivoService,
        private asignaturaDataService: AsignaturaService,
        private matriculaDataService: MatriculaService,
        private matriculaAsignaturaDataService: MatriculaAsignaturaService,
        private asignaturaSolicitudMatriculaDataService: AsignaturaSolicitudMatriculaService
        ) {
            this.toastr.setRootViewContainerRef(vcr);
    }

    ngOnInit() {
        const logedResult = JSON.parse(localStorage.getItem('logedResult')) as LoginResult;
        this.personaLogeada = logedResult.persona;
        this.rol = logedResult.idRol;
        this.datosCupo = new DatosCupo();
        this.datosInstituto = new DatosInstituto();
        this.periodoLectivo = new PeriodoLectivo();
        this.fechaActual = new Date();
        this.solicitudMatricula = new SolicitudMatricula();
        this.matricula = new Matricula();
        this.asignaturasMatriculables = [];
        this.getSolicitudMatricula(2);
    }

    getDatosInstituto(idCarrera: number): void {
        this.busy = this.matriculacionDataService.getDatosInstituto(idCarrera)
        .then(respuesta => {
            this.datosInstituto = respuesta;
            this.logo = './../../../../assets/images/logos/' + this.datosInstituto.nombre + '.png';
        })
        .catch(error => {

        });
    }

    getDatosCupo(idPersona: number): void {
        this.busy = this.matriculacionDataService.getDatosCupo(idPersona)
        .then(respuesta => {
            this.datosCupo = respuesta;
            this.getDatosInstituto(this.datosCupo.idCarrera);
            const meses = ['ENE', 'FEB', 'MAR', 'ABR', 'MAY', 'JUN', 'JUL', 'AGO', 'SEP', 'OCT', 'NOV', 'DIC'];
            this.barcode = this.fechaActual.getFullYear().toString() + '-' + meses[this.fechaActual.getMonth()] + '-' + this.datosCupo.siglasCarrera + '-' + this.datosCupo.identificacion;
            this.numeroFolio = this.fechaActual.getFullYear().toString() + '-' + meses[this.fechaActual.getMonth()] + '-' + this.datosCupo.siglasCarrera;
            this.numeroMatricula = this.datosCupo.identificacion;
        })
        .catch(error => {

        });
    }

    getSolicitudMatricula(id: number): void {
        this.busy = this.solicitudMatriculaDataService.get(id)
        .then(respuesta => {
            this.solicitudMatricula = respuesta;
            this.getDatosCupo(this.solicitudMatricula.idPersona);
            this.getPeriodoLectivo(this.solicitudMatricula.idPeriodoLectivo);
            this.getAsignaturasSolicitudMatricula(id);
        })
        .catch(error => {

        });
    }

    getPeriodoLectivo(id: number): void {
        this.busy = this.periodoLectivoDataService.get(id)
        .then(respuesta => {
            this.periodoLectivo = respuesta;
        })
        .catch(error => {

        });
    }

    getAsignaturasSolicitudMatricula(idSolicitudMatricula: number) {
        this.busy = this.asignaturaSolicitudMatriculaDataService.getFiltrado('idSolicitudMatricula', 'coincide', idSolicitudMatricula.toString())
        .then(respuesta => {
            respuesta.forEach(element => {
                this.getAsignatura(element.idAsignatura);
            });
        })
        .catch(error => {

        });
    }

    getAsignatura(id: number): void {
        let menorNivel = 10;
        const nivelToExport = ['PRIMER NIVEL', 'SEGUNDO NIVEL', 'TERCER NIVEL', 'CUARTO NIVEL', 'QUINTO NIVEL', 'SEXTO NIVEL'];
        this.busy = this.asignaturaDataService.get(id)
        .then(respuesta => {
            if (menorNivel > respuesta.nivel) {
                menorNivel = respuesta.nivel - 1;
            }
            this.asignaturasMatriculables.push(respuesta);
            this.nivel = nivelToExport[menorNivel];
        })
        .catch(error => {

        });
    }

    imprimir(): void {
        this.matricula.id = 0;
        this.matricula.codigo = this.barcode.toString();
        this.matricula.fecha = this.fechaActual;
        this.matricula.idCarrera = this.datosCupo.idCarrera;
        this.matricula.idJornada = this.datosCupo.idJornada;
        this.matricula.idPeriodoLectivo = this.periodoLectivo.id;
        this.matricula.idPersona = this.personaLogeada.id;
        this.matricula.folio = this.numeroFolio.toString();
        this.matricula.numeroMatricula = this.numeroMatricula.toString();
        this.guardar(this.matricula);
    }

    guardar(matricula: Matricula): void {
        this.busy = this.matriculaDataService.create(matricula)
        .then(respuesta => {
           if ( respuesta ) {
              this.toastr.success('Alumno Matriculado', 'Matriculación');
              this.leerMatriculaRegistrada(matricula.codigo);
           } else {
              this.toastr.warning('Se produjo un error', 'Matriculación');
           }
        })
        .catch(error => {
           this.toastr.warning('Se produjo un error', 'Matriculación');
        });
    }

    leerMatriculaRegistrada(codigoMatricula: string): void {
        this.busy = this.matriculaDataService.getFiltrado( 'codigo', 'coincide', codigoMatricula)
        .then(respuesta => {
            const id = respuesta[0].id;
            this.asignaturasMatriculables.forEach(asignatura => {
                const asignaturaMatricula = new MatriculaAsignatura();
                asignaturaMatricula.idAsignatura = asignatura.id;
                asignaturaMatricula.idMatricula = id;
                this.guardarAsignaturaMatricula(asignaturaMatricula);
            });
        })
        .catch(error => {

        });
    }

    guardarAsignaturaMatricula(asignaturaMatricula: MatriculaAsignatura): void {
        this.busy = this.matriculaAsignaturaDataService.create(asignaturaMatricula)
        .then(respuesta => {})
        .catch(error => {});
    }
}
