import { LoginResult } from './../../../entidades/especifico/Login-Result';
import { Component, OnInit, ViewContainerRef } from '@angular/core';
import { ToastsManager } from 'ng2-toastr/ng2-toastr';

import { PersonaService } from 'app/CRUD/persona/persona.service';
import { Persona } from 'app/entidades/CRUD/Persona';
import { Estudiante } from 'app/entidades/CRUD/Estudiante';
import { Genero } from 'app/entidades/CRUD/Genero';
import { GeneroService } from 'app/CRUD/genero/genero.service';
import { EstudianteService } from 'app/CRUD/estudiante/estudiante.service';

@Component({
    selector: 'app-solicitud-matricula',
    templateUrl: './solicitud-matricula.component.html',
    styleUrls: ['./solicitud-matricula.component.scss']
})
export class SolicitudMatriculaComponent implements OnInit {
    busy: Promise<any>;
    personaLogeada: Persona;
    rol: number;
    estudiante: Estudiante;
    genero: Genero;
    nombreCompleto: String;

    constructor(public toastr: ToastsManager, vcr: ViewContainerRef,
        private personaDataService: PersonaService,
        private generoDataService: GeneroService,
        private estudianteDataService: EstudianteService
        ) {
            this.estudiante = new Estudiante();
            this.toastr.setRootViewContainerRef(vcr);
            const logedResult = JSON.parse(localStorage.getItem('logedResult')) as LoginResult;
            this.personaLogeada = logedResult.persona;
            this.rol = logedResult.idRol;
            this.nombreCompleto = this.personaLogeada.nombre1 + ' ' + this.personaLogeada.nombre2 + ' ' + this.personaLogeada.apellido1 + ' ' + this.personaLogeada.apellido2;
    }

    ngOnInit() {

    }
}
