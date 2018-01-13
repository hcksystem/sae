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
import { JornadaService } from 'app/CRUD/jornada/jornada.service';
import { AsignacionAsignaturaCupo } from 'app/entidades/especifico/Asignacion_Asignatura_Cupo';
import { AsignaturaCupoService } from 'app/CRUD/asignaturacupo/asignaturacupo.service';
import { AsignaturaCupo } from 'app/entidades/CRUD/AsignaturaCupo';
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
   entidadSeleccionada: AsignaturaCupo;
   constructor(public toastr: ToastsManager,
        vcr: ViewContainerRef,
        private dataService: AsignaturaCupoService,
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

    open(content, nuevo){
        if(nuevo){
        this.resetEntidadSeleccionada();
        }
        this.modalService.open(content)
        .result
        .then((result => {
        if(result=="save"){
            this.aceptar();
        }
        }),(result => {
        //Esto se ejecuta si la ventana se cierra sin aceptar los cambios
        }));
    }

    estaSeleccionado(porVerificar): boolean {
        if (this.entidadSeleccionada == null) {
        return false;
        }
        return porVerificar.id === this.entidadSeleccionada.id;
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
        /*this.busy = this.noContactadosDataService
        .getAll(this.carreraSeleccionadaCombo)
        .then(entidadesRecuperadas => {
        if ( JSON.stringify(entidadesRecuperadas) == 'false' ) {
            return;
        }
        this.entidades = entidadesRecuperadas
        if (entidadesRecuperadas == null || entidadesRecuperadas.length === 0) {
            this.toastr.success('¡No hay datos!', 'Consulta');
        } else {
            this.toastr.success('La consulta fue exitosa', 'Consulta');
        }
        })
        .catch(error => {
        this.toastr.success('Se produjo un error', 'Consulta');
        });*/
    }

    getPagina(pagina: number, tamanoPagina: number): void {
        /*this.busy = this.noContactadosDataService
        .getPagina(pagina, tamanoPagina, this.carreraSeleccionadaCombo)
        .then(entidadesRecuperadas => {
        if ( JSON.stringify(entidadesRecuperadas) == 'false' ) {
            return;
        }
        this.entidades = entidadesRecuperadas
        if (entidadesRecuperadas == null || entidadesRecuperadas.length === 0) {
            this.toastr.success('¡No hay datos!', 'Consulta');
        } else {
            this.toastr.success('La consulta fue exitosa', 'Consulta');
        }
        })
        .catch(error => {
        this.toastr.success('Se produjo un error', 'Consulta');
        });*/
    }

    getNumeroPaginas(tamanoPagina: number): void{
        /*this.busy = this.noContactadosDataService
        .getNumeroPaginas(tamanoPagina, this.carreraSeleccionadaCombo)
        .then(respuesta => {
            if ( JSON.stringify(respuesta) == 'false' ) {
            return;
            }
            this.paginaUltima = respuesta.paginas;
        })
        .catch(error => {
        //Error al leer las paginas
        });*/
    }

    isValid(entidadPorEvaluar: AsignaturaCupo): boolean {
        return true;
    }

    aceptar(): void {
        if (!this.isValid(this.entidadSeleccionada)) {return;}
        if (this.entidadSeleccionada.id === undefined || this.entidadSeleccionada.id === 0) {
        this.add(this.entidadSeleccionada);
        } else {
        this.update(this.entidadSeleccionada);
        }
        this.cerrarVentanaEdicion();
    }

    add(entidadNueva: AsignaturaCupo): void {
        this.busy = this.dataService.create(entidadNueva)
        .then(respuesta => {
        if(respuesta){
            this.toastr.success('La creación fue exitosa', 'Creación');
        }else{
            this.toastr.warning('Se produjo un error', 'Creación');
        }
        this.refresh();
        })
        .catch(error => {
        this.toastr.warning('Se produjo un error', 'Creación');
        });
    }

    crearEntidad(): AsignaturaCupo {
        const nuevoAsignaturaCupo = new AsignaturaCupo();
        nuevoAsignaturaCupo.id = 0;
        return nuevoAsignaturaCupo;
    }

    update(entidadParaActualizar: AsignaturaCupo): void {
        this.busy = this.dataService.update(entidadParaActualizar)
        .then(respuesta => {
        if(respuesta){
            this.toastr.success('La actualización fue exitosa', 'Actualización');
        }else{
            this.toastr.warning('Se produjo un error', 'Actualización');
        }
        this.refresh();
        })
        .catch(error => {
        this.toastr.warning('Se produjo un error', 'Actualización');
        });
    }

    getPaginaPrimera():void {
        this.paginaActual = 1;
        this.refresh();
    }

    getPaginaAnterior():void {
        if(this.paginaActual>1){
        this.paginaActual = this.paginaActual - 1;
        this.refresh();
        }
    }

    getPaginaSiguiente():void {
        if(this.paginaActual < this.paginaUltima){
        this.paginaActual = this.paginaActual + 1;
        this.refresh();
        }
    }

    getPaginaUltima():void {
        this.paginaActual = this.paginaUltima;
        this.refresh();
    }

    onSelect(entidadActual: AsignaturaCupo): void {
        this.entidadSeleccionada = entidadActual;
    }
}
