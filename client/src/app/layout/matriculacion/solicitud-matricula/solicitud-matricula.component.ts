import { LoginResult } from './../../../entidades/especifico/Login-Result';
import { Component, OnInit, ViewContainerRef } from '@angular/core';
import { ToastsManager } from 'ng2-toastr/ng2-toastr';

import { PersonaService } from 'app/CRUD/persona/persona.service';
import { Persona } from 'app/entidades/CRUD/Persona';
import { MatriculacionService } from 'app/layout/matriculacion/matriculacion.service';
import { DatosCupo } from 'app/entidades/especifico/Datos-Cupo';
import { DatosInstituto } from 'app/entidades/especifico/Datos-Instituto';
import { Asignatura } from 'app/entidades/CRUD/Asignatura';
import { PeriodoLectivoActual } from 'app/entidades/especifico/Periodo-Lectivo-Actual';
import { SolicitudMatricula } from 'app/entidades/CRUD/SolicitudMatricula';
import { SolicitudMatriculaService } from 'app/CRUD/solicitudmatricula/solicitudmatricula.service';

@Component({
    selector: 'app-solicitud-matricula',
    templateUrl: './solicitud-matricula.component.html',
    styleUrls: ['./solicitud-matricula.component.scss']
})
export class SolicitudMatriculaComponent implements OnInit {
    busy: Promise<any>;
    personaLogeada: Persona;
    rol: number;
    nombreCompleto: String;
    datosCupo: DatosCupo;
    datosInstituto: DatosInstituto;
    asignaturasMatriculables: Asignatura[];
    periodoLectivoActual: PeriodoLectivoActual;
    logo: String;
    fechaActual: Date;
    barcode: String;
    solicitudMatricula: SolicitudMatricula;
    constructor(public toastr: ToastsManager, vcr: ViewContainerRef,
        private personaDataService: PersonaService,
        private matriculacionDataService: MatriculacionService,
        private solicitudMatriculaDataService: SolicitudMatriculaService,
        ) {
            this.toastr.setRootViewContainerRef(vcr);
            const logedResult = JSON.parse(localStorage.getItem('logedResult')) as LoginResult;
            this.personaLogeada = logedResult.persona;
            this.rol = logedResult.idRol;
            this.datosCupo = new DatosCupo();
            this.datosInstituto = new DatosInstituto();
            this.periodoLectivoActual = new PeriodoLectivoActual();
            this.fechaActual = new Date();
            this.solicitudMatricula = new SolicitudMatricula();
    }

    ngOnInit() {
        this.getPeriodoLectivoActual();
        this.getDatosCupo(this.personaLogeada.id);
    }

    getAsignaturasMatriculables(idCarrera: number, idNivel: number): void {
        if ( idNivel === 1 ) {
            this.busy = this.matriculacionDataService.getAsignaturasMatriculablesPrimerNivel(idCarrera)
            .then(respuesta => {
                this.asignaturasMatriculables = respuesta;
            })
            .catch(error => {

            });
        }
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

    getPeriodoLectivoActual(): void {
        this.busy = this.matriculacionDataService.getPeriodoLectivoActual()
        .then(respuesta => {
            this.periodoLectivoActual = respuesta;
        })
        .catch(error => {

        });
    }

    getDatosCupo(idPersona: number): void {
        this.busy = this.matriculacionDataService.getDatosCupo(idPersona)
        .then(respuesta => {
            this.datosCupo = respuesta;
            this.getDatosInstituto(this.datosCupo.idCarrera);
            this.getAsignaturasMatriculables(this.datosCupo.idCarrera, 1);
            const meses = ['ENE', 'FEB', 'MAR', 'ABR', 'MAY', 'JUN', 'JUL', 'AGO', 'SEP', 'OCT', 'NOV', 'DIC'];
            this.barcode = this.fechaActual.getFullYear().toString() + '-' + meses[this.fechaActual.getMonth()] + '-' + this.datosCupo.idCarrera.toString() + '-' + this.datosCupo.identificacion;
        })
        .catch(error => {

        });
    }

    imprimir(): void {
        this.solicitudMatricula.id = 0;
        this.solicitudMatricula.codigo = this.barcode.toString();
        this.solicitudMatricula.fecha = this.fechaActual.getFullYear() + '-' + this.fechaActual.getMonth() + '-' + this.fechaActual.getDay() + ' ' + this.fechaActual.getHours() + ':' + this.fechaActual.getMinutes() + ':' + this.fechaActual.getSeconds();
        this.solicitudMatricula.idCarrera = this.datosCupo.idCarrera;
        this.solicitudMatricula.idEstadoSolicitud = 1;
        this.solicitudMatricula.idPeriodoLectivo = this.periodoLectivoActual.id;
        this.solicitudMatricula.idPersona = this.personaLogeada.id;
        this.guardar(this.solicitudMatricula);
    }

    guardar(solicitudMatricula: SolicitudMatricula): void {
        this.busy = this.solicitudMatriculaDataService.create(solicitudMatricula)
        .then(respuesta => {
           if ( respuesta ) {
              this.toastr.success('Solicitud de matrícula receptada', 'Matriculación');
           } else {
              this.toastr.warning('Se produjo un error', 'Matriculación');
           }
        })
        .catch(error => {
           this.toastr.warning('Se produjo un error', 'Matriculación');
        });
     }
}
