import { Component, OnInit, ViewContainerRef } from '@angular/core';
import { ToastsManager } from 'ng2-toastr/ng2-toastr';

import { CuentaLocalService } from '../cuentalocal/cuentalocal.service';
import { AsignaturaExtendedService } from '../../data-services/asignatura-extended.service';
import { Asignatura } from '../../entidades/CRUD/Asignatura';

import 'rxjs/add/operator/toPromise';

@Component({
    selector: 'app-asistencia-curso',
    templateUrl: './asistencia-curso.component.html',
    styleUrls: ['./asistencia-curso.component.scss']
})
export class AsistenciaCursoComponent implements OnInit {
    busy: Promise<any>;
    idDocente: number;
    asignaturas: Asignatura[];

    constructor(public toastr: ToastsManager,
        vcr: ViewContainerRef,
        private cuentaLocalService: CuentaLocalService,
        private asignaturaExtendedService: AsignaturaExtendedService) {
        this.toastr.setRootViewContainerRef(vcr);
    }

    onChangeAsignatura(asignatura: Asignatura): void {
    }

    leerDocente(): void {
        let cuentaLocal1 = this.cuentaLocalService.leer();
        this.idDocente = cuentaLocal1.idPersona;
        this.getAsignaturas(this.idDocente);
    }

    getAsignaturas(idDocente: number): void {
        this.busy = this.asignaturaExtendedService
            .getPorDocente(idDocente)
            .then(entidadesRecuperadas => {
                this.asignaturas = entidadesRecuperadas
                if (entidadesRecuperadas == null || entidadesRecuperadas.length === 0) {
                    this.toastr.success('¡El docente no tiene asignaturas!', 'Consulta');
                }
            })
            .catch(error => {
                this.toastr.warning('Se produjo un error al consultar las asignaturas del docente', 'Consulta');
            });
    }

    ngOnInit() {
        this.leerDocente();
    }
}