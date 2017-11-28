import { Component, OnInit, ViewContainerRef } from '@angular/core';
import { ToastsManager } from 'ng2-toastr/ng2-toastr';
import { Aula } from '../../entidades/CRUD/Aula';
import { AulaService } from './aula.service';

import 'rxjs/add/operator/toPromise';
import { Message } from '@angular/compiler/src/i18n/i18n_ast';
import { ModalComponent } from 'app/layout/bs-component/components';
import { NgbModal, ModalDismissReasons } from '@ng-bootstrap/ng-bootstrap';

@Component({
    selector: 'app-aula',
    templateUrl: './aula.component.html',
    styleUrls: ['./aula.component.scss']
})

export class AulaComponent implements OnInit {

    busy: Promise<any>;
    entidades: Aula[];
    entidadSeleccionada: Aula;
    pagina: 1;
    tamanoPagina: 20;
    paginaActual: number;
    paginaUltima: number;
    registrosPorPagina: number;
    closeResult: string;

    constructor(public toastr: ToastsManager, private modalService: NgbModal, 
        vcr: ViewContainerRef, private dataService: AulaService) {
        this.toastr.setRootViewContainerRef(vcr);
    }

    open(content, nuevo) {
        if (nuevo) {
            this.resetEntidadSeleccionada();
        }

        this.modalService.open(content).result.then((result) => {
            if (result == "Save") {
                this.aceptar();
            }
        }, (reason) => {
            // this.closeResult = `Dismissed ${this.getDismissReason(reason)}`;
        });
    }

    private getDismissReason(reason: any): string {
        if (reason === ModalDismissReasons.ESC) {
            return 'by pressing ESC';
        } else if (reason === ModalDismissReasons.BACKDROP_CLICK) {
            return 'by clicking on a backdrop';
        } else {
            return `with: ${reason}`;
        }
    }

    estaSeleccionado(porVerificar): boolean {
        if (this.entidadSeleccionada == null) {
            return false;
        }
        return porVerificar.id === this.entidadSeleccionada.id;
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

    getNumeroPaginas(tamanoPagina: number): void {
        this.busy = this.dataService
            .getNumeroPaginas(tamanoPagina)
            .then(respuesta => {
                this.paginaUltima = respuesta.paginas;
            })
            .catch(error => {
                //Error al leer las paginas
            });
    }

    isValid(entidadPorEvaluar: Aula): boolean {
        // TODO : aqui van validaciones respecto a obligatoriedad, unicidad y otras
        return true;
    }

    aceptar(): void {
        if (!this.isValid(this.entidadSeleccionada)) { 
            this.toastr.warning('Los datos son inválidos', 'Información');
            return; 
        }

        if (this.entidadSeleccionada.id === undefined || this.entidadSeleccionada.id === 0) {
            this.add(this.entidadSeleccionada);
        } else {
            this.update(this.entidadSeleccionada);
        }
    }

    crearEntidad(): Aula {
        const nuevoAula = new Aula();
        nuevoAula.id = 0;
        return nuevoAula;
    }

    add(entidadNueva: Aula): void {
        this.busy = this.dataService.create(entidadNueva)
            .then(respuesta => {
                if (respuesta) {
                    this.toastr.success('La creación fue exitosa', 'Creación');
                } else {
                    this.toastr.warning('Se produjo un error', 'Creación');
                }
                this.refresh();
            })
            .catch(error => {
                this.toastr.warning('Se produjo un error', 'Creación');
            });
    }

    update(entidadParaActualizar: Aula): void {
        this.busy = this.dataService.update(entidadParaActualizar)
            .then(respuesta => {
                if (respuesta) {
                    this.toastr.success('La actualización fue exitosa', 'Actualización');
                } else {
                    this.toastr.warning('Se produjo un error', 'Actualización');
                }
                this.refresh();
            })
            .catch(error => {
                this.toastr.warning('Se produjo un error', 'Actualización');
            });
    }

    delete(entidadParaBorrar: Aula): void {
        this.busy = this.dataService.remove(entidadParaBorrar.id)
            .then(respuesta => {
                if (respuesta) {
                    this.toastr.success('La eliminación fue exitosa', 'Eliminación');
                } else {
                    this.toastr.warning('Se produjo un error', 'Eliminación');
                }
                this.refresh();
            })
            .catch(error => {
                this.toastr.success('Se produjo un error', 'Eliminación');
            });
    }

    refresh(): void {
        this.getNumeroPaginas(this.registrosPorPagina);
        this.getPagina(this.paginaActual, this.registrosPorPagina);
        this.entidades = Aula[0];
        this.entidadSeleccionada = this.crearEntidad();
    }

    getPaginaPrimera(): void {
        this.paginaActual = 1;
        this.refresh();
    }

    getPaginaAnterior(): void {
        if (this.paginaActual > 1) {
            this.paginaActual = this.paginaActual - 1;
            this.refresh();
        }
    }

    getPaginaSiguiente(): void {
        if (this.paginaActual < this.paginaUltima) {
            this.paginaActual = this.paginaActual + 1;
            this.paginaActual = this.paginaUltima;
            this.refresh();
        }
    }

    getPaginaUltima(): void {
        this.paginaActual = this.paginaUltima;
        this.refresh();
    }

    ngOnInit() {
        this.paginaActual = 1;
        this.registrosPorPagina = 5;
        this.refresh();
    }

    onSelect(entidadActual: Aula): void {
        this.entidadSeleccionada = entidadActual;
    }
}