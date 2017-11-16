import { Component, OnInit, ViewContainerRef } from '@angular/core';
import { Router } from '@angular/router';
import { ToastsManager } from 'ng2-toastr/ng2-toastr';
import { Estudiante } from './estudiante';
import { EstudianteService } from './estudiante.service';
import 'rxjs/add/operator/toPromise';

declare var jQuery: any;

@Component({
    selector: 'app-estudiante',
    templateUrl: './estudiante.component.html',
    styleUrls: ['./estudiante.component.css', './cool-loading-indicator.css']
})
export class EstudianteComponent implements OnInit {
    busy: Promise<any>;
    entidades: Estudiante[];
    entidadSeleccionada: Estudiante;

    constructor(public toastr: ToastsManager, vcr: ViewContainerRef,
        private dataService: EstudianteService,
        private router: Router) {
        this.toastr.setRootViewContainerRef(vcr);
        this.entidades = Estudiante[0];
        this.entidadSeleccionada = this.
            crearEntidad();
    }

    resetEntidadSeleccionada(): void {
        this.entidadSeleccionada = this.crearEntidad();
    }

    crearEntidad(): Estudiante {
        return new Estudiante();
    }

    getAll(): void {
        this.busy = this.dataService
            .getAll()
            .then(entidadesTransporte => {
                this.entidades = entidadesTransporte
                if (entidadesTransporte == null || entidadesTransporte.length === 0) {
                    this.toastr.success('¡No hay datos!', 'Consulta');
                } else {
                    this.toastr.success('La consulta fue exitosa', 'Consulta');
                }
            })
            .catch(error => {
                this.toastr.success('Se produjo un error', 'Consulta');
            });
    }

    isNullOrEmpty(stringValue: string): boolean {
        return stringValue == null || stringValue.length === 0;
    }

    isValid(entidadTransporte: Estudiante): boolean {
        return true;
    }

    aceptar(): void {
        if (!this.isValid(this.entidadSeleccionada)) {
            return;
        }

        if (this.entidadSeleccionada.EstudianteId === undefined || this.entidadSeleccionada.EstudianteId === 0) {
            this.add(this.entidadSeleccionada);
        } else {
            this.update(this.entidadSeleccionada);
        }
        jQuery('#modal').modal('hide');
    }

    add(entidadTransporte: Estudiante): void {
        this.busy = this.dataService.create(entidadTransporte)
            .then(entidadRespuesta => {
                this.entidades.push(entidadRespuesta);
                this.entidadSeleccionada = this.crearEntidad();
                this.toastr.success('La creación fue exitosa', 'Creación');
            })
            .catch(error => {
                this.toastr.success('Se produjo un error', 'Creación');
            });
    }

    update(entidadTransporte: Estudiante): void {
        this.busy = this.dataService.update(entidadTransporte)
            .then(entidadRespuesta => {
                const index = this.entidades.findIndex(entidad => entidad.EstudianteId === entidadRespuesta.EstudianteId);
                this.entidades[index] = entidadRespuesta;
                this.entidadSeleccionada = this.crearEntidad();
                this.toastr.success('La actualización fue exitosa', 'Actualización');
            })
            .catch(error => {
                this.toastr.success('Se produjo un error', 'Actualización');
            });
    }

    delete(entidadTransporte: Estudiante): void {
        if (this.entidadSeleccionada.EstudianteId === 0) {
            this.toastr.success('No está seleccionado ningún registro');
            return;
        }
        this.busy = this.dataService
            .remove(entidadTransporte.EstudianteId)
            .then(() => {
                this.entidades = this.entidades.filter(entidad => entidad !== entidadTransporte);
                if (this.entidadSeleccionada === entidadTransporte) { this.entidadSeleccionada = this.crearEntidad(); }
                this.toastr.success('La eliminación fue exitosa', 'Eliminación');
                return true;
            })
            .catch(() => {
                this.toastr.success('Se produjo un error', 'Eliminación');
                return true;
            });
    }

    refresh(): void {
        this.entidades = Estudiante[0];
        this.entidadSeleccionada = new Estudiante();
        this.getAll();
    }

    ngOnInit(): void {
        this.refresh();
    }

    onSelect(entidadTransporte: Estudiante): void {
        this.entidadSeleccionada = entidadTransporte;
    }

    gotoDetail(): void {
        if (this.entidadSeleccionada.EstudianteId === 0) {
            this.toastr.success('No está seleccionado ningún registro');
            return;
        }
        this.router.navigate(['/estudiantedetail', this.entidadSeleccionada.EstudianteId]);
    }
}
