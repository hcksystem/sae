import { Component, OnInit, ViewContainerRef } from '@angular/core';
import { ToastsManager } from 'ng2-toastr/ng2-toastr';
import { AsignacionAsignaturasCupoService } from './asignacion-asignaturas-cupo.service';

import 'rxjs/add/operator/toPromise';
import { ModalComponent } from 'app/layout/bs-component/components';
import { NgbModal, ModalDismissReasons } from '@ng-bootstrap/ng-bootstrap';
import { Message } from '@angular/compiler/src/i18n/i18n_ast';
import { Carrera } from 'app/entidades/CRUD/Carrera';
import { Jornada } from 'app/entidades/CRUD/Jornada';
import { PersonaCombo } from 'app/entidades/especifico/PersonaCombo';
import { MatriculacionService } from 'app/layout/matriculacion/matriculacion.service';
import { CarreraService } from 'app/CRUD/carrera/carrera.service';
import { PersonaService } from 'app/CRUD/persona/persona.service';
import { JornadaService } from 'app/CRUD/jornada/jornada.service';

@Component({
   selector: 'app-asignacion-asignaturas-cupo',
   templateUrl: './asignacion-asignaturas-cupo.component.html',
   styleUrls: ['./asignacion-asignaturas-cupo.component.scss']
})

export class AsignacionAsignaturasCupoComponent implements OnInit {
   busy: Promise<any>;
   pagina: 1;
   tamanoPagina: 20;
   paginaActual: number;
   paginaUltima: number;
   registrosPorPagina: number;
   esVisibleVentanaEdicion: boolean;
   jornadaSeleccionadaCombo: number;
   carreraSeleccionadaCombo: number;
   carreras: Carrera[] = [];
   jornadas: Jornada[] = [];
   personasMostradas: PersonaCombo[] = [];
   estudianteSeleccionadoCombo: number;
   constructor(public toastr: ToastsManager,
        vcr: ViewContainerRef,
        private dataService: PersonaService,
        private modalService: NgbModal,
        private matriculacionDataService: MatriculacionService,
        private carreraDataService: CarreraService,
        private jornadaDataService: JornadaService
    ) {
      this.toastr.setRootViewContainerRef(vcr);
   }

    filtroSeleccionado() {
        this.getAlumnosMatriculados(this.carreraSeleccionadaCombo, this.jornadaSeleccionadaCombo);
    }

    filtroPersonaSeleccionado() {

    }

    getJornadas() {
        this.busy = this.jornadaDataService
        .getAll()
        .then(entidadesRecuperadas => {
            if ( JSON.stringify(entidadesRecuperadas) == 'false' ) {
                return;
            }
            this.jornadas = entidadesRecuperadas;
        })
        .catch(error => {

        });
    }

    getCarreras() {
        this.busy = this.carreraDataService
        .getAll()
        .then(entidadesRecuperadas => {
            if ( JSON.stringify(entidadesRecuperadas) == 'false' ) {
                return;
            }
            this.carreras = entidadesRecuperadas;
        })
        .catch(error => {

        });
    }

    getAlumnosMatriculados(idCarrera: number, idJornada: number) {
        this.personasMostradas = [];
        this.busy = this.matriculacionDataService
        .getAlumnosMatriculados(idCarrera, idJornada)
        .then(entidadesRecuperadas => {
            if ( JSON.stringify(entidadesRecuperadas) == 'false' ) {
                return;
            }
            this.personasMostradas = entidadesRecuperadas;
        })
        .catch(error => {

        });
    }

    refresh(): void {
        this.getCarreras();
        this.getJornadas();
        this.getAlumnosMatriculados(this.carreraSeleccionadaCombo, this.jornadaSeleccionadaCombo);
    }

    ngOnInit() {
        this.carreraSeleccionadaCombo = 0;
        this.jornadaSeleccionadaCombo = 0;
        this.estudianteSeleccionadoCombo = 0;
        this.paginaActual = 1;
        this.registrosPorPagina = 5;
        this.refresh();
    }
}
