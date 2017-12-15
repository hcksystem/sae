import { LoginResult } from './../../../entidades/especifico/Login-Result';
import { Component, OnInit, ViewContainerRef } from '@angular/core';
import { ToastsManager } from 'ng2-toastr/ng2-toastr';

import { PersonaService } from 'app/CRUD/persona/persona.service';
import { Persona } from 'app/entidades/CRUD/Persona';
import { MatriculacionService } from 'app/layout/matriculacion/matriculacion.service';
import { DatosCupo } from 'app/entidades/especifico/Datos-Cupo';
import { DatosInstituto } from 'app/entidades/especifico/Datos-Instituto';
import { Asignatura } from 'app/entidades/CRUD/Asignatura';
import { PeriodoLectivoActual } from 'app/entidades/especifico/Periodo-Academico-Actual';

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

    constructor(public toastr: ToastsManager, vcr: ViewContainerRef,
        private personaDataService: PersonaService,
        private matriculacionDataService: MatriculacionService,
        ) {
            this.toastr.setRootViewContainerRef(vcr);
            const logedResult = JSON.parse(localStorage.getItem('logedResult')) as LoginResult;
            this.personaLogeada = logedResult.persona;
            this.rol = logedResult.idRol;
            this.datosCupo = new DatosCupo();
            this.datosInstituto = new DatosInstituto();
            this.periodoLectivoActual = new PeriodoLectivoActual();
            this.fechaActual = new Date();
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
        })
        .catch(error => {

        });
    }
}
