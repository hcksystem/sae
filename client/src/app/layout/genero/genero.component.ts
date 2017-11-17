import { Component, OnInit, ViewContainerRef } from '@angular/core';
import { ToastsManager } from 'ng2-toastr/ng2-toastr';

import { Genero } from '../entidades/Genero';
import { GeneroService } from './genero.service';

import 'rxjs/add/operator/toPromise';

@Component({
    selector: 'app-genero',
    templateUrl: './genero.component.html',
    styleUrls: ['./genero.component.scss']
})
export class GeneroComponent implements OnInit {
    busy: Promise<any>;
    entidades: Genero[];
    entidadSeleccionada: Genero;
    pagina: 1;
    tamanoPagina: 20;
    esVisibleVentanaEdicion: boolean;

    constructor(public toastr: ToastsManager, vcr: ViewContainerRef,
        private dataService: GeneroService) {
        this.toastr.setRootViewContainerRef(vcr);
    }

    estaSeleccionado(porVerificar): boolean {
        if (this.entidadSeleccionada == null) {
            return false;
        }
        return porVerificar.id === this.entidadSeleccionada.id
    }

    cerrarVentanaEdicion(): void {
        this.esVisibleVentanaEdicion = false;
    }

    mostrarVentanaNuevo(): void {
        this.resetEntidadSeleccionada();
        this.esVisibleVentanaEdicion = true;
    }

    mostrarVentanaEdicion(): void {
        this.esVisibleVentanaEdicion = true;
    }

    resetEntidadSeleccionada(): void {
        this.entidadSeleccionada = this.crearEntidad();
    }

    getAll(): void {
        this.busy = this.dataService
            .getAll()
            .then(entidadesRecuperadas => {
                this.entidades = entidadesRecuperadas
                if (entidadesRecuperadas == null || entidadesRecuperadas.length === 0) {
                    this.toastr.success('¡No hay datos!', 'Consulta');
                } else {
                    this.toastr.success('La consulta fue exitosa', 'Consulta');
                }
            })
            .catch(error => {
                this.toastr.success('Se produjo un error', 'Consulta');
            });
    }

    getPagina(pagina: number, tamanoPagina: number): void {
        this.busy = this.dataService
            .getPagina(pagina, tamanoPagina)
            .then(entidadesRecuperadas => {
                this.entidades = entidadesRecuperadas
                if (entidadesRecuperadas == null || entidadesRecuperadas.length === 0) {
                    this.toastr.success('¡No hay datos!', 'Consulta');
                } else {
                    this.toastr.success('La consulta fue exitosa', 'Consulta');
                }
            })
            .catch(error => {
                this.toastr.success('Se produjo un error', 'Consulta');
            });
    }

    isValid(entidadPorEvaluar: Genero): boolean {
        return true;
    }

    aceptar(): void {
        if (!this.isValid(this.entidadSeleccionada)) {
            return;
        }

        if (this.entidadSeleccionada.id === undefined || this.entidadSeleccionada.id === 0) {
            this.add(this.entidadSeleccionada);
        } else {
            this.update(this.entidadSeleccionada);
        }
        this.cerrarVentanaEdicion();
    }

    crearEntidad(): Genero {
        return new Genero();
    }

    add(entidadNueva: Genero): void {
        this.busy = this.dataService.create(entidadNueva)
            .then(entidadRespuesta => {
                this.entidades.push(entidadRespuesta);
                this.entidadSeleccionada = this.crearEntidad();
                this.toastr.success('La creación fue exitosa', 'Creación');
            })
            .catch(error => {
                this.toastr.success('Se produjo un error', 'Creación');
            });
    }

    update(entidadParaActualizar: Genero): void {
        this.busy = this.dataService.update(entidadParaActualizar)
            .then(entidadRespuesta => {
                const index = this.entidades.findIndex(entidad => entidad.id === entidadRespuesta.id);
                this.entidades[index] = entidadRespuesta;
                this.entidadSeleccionada = this.crearEntidad();
                this.toastr.success('La actualización fue exitosa', 'Actualización');
            })
            .catch(error => {
                this.toastr.success('Se produjo un error', 'Actualización');
            });
    }

    delete(entidadParaBorrar: Genero): void {
        if (this.entidadSeleccionada.id === 0) {
            this.toastr.success('No está seleccionado ningún registro');
            return;
        }

        this.busy = this.dataService
            .remove(entidadParaBorrar.id)
            .then(() => {
                this.entidades = this.entidades.filter(entidad => entidad !== entidadParaBorrar);
                if (this.entidadSeleccionada === entidadParaBorrar) { this.entidadSeleccionada = this.crearEntidad(); }
                this.toastr.success('La eliminación fue exitosa', 'Eliminación');
                return true;
            })
            .catch(() => {
                this.toastr.success('Se produjo un error', 'Eliminación');
                return true;
            });
    }

    refresh(): void {
        this.entidades = Genero[0];
        this.entidadSeleccionada = this.crearEntidad();
        // this.getPagina(this.pagina, this.tamanoPagina);
        this.getAll();
    }

    ngOnInit() {
        this.refresh();
    }

    onSelect(entidadActual: Genero): void {
        this.entidadSeleccionada = entidadActual;
    }
}
