import { Component, OnInit, ViewContainerRef } from '@angular/core';
import { ToastsManager } from 'ng2-toastr/ng2-toastr';
import { Etnia } from '../entidades/Etnia';
import { EtniaService } from './etnia.service';

import 'rxjs/add/operator/toPromise';
import { Message } from '@angular/compiler/src/i18n/i18n_ast';

@Component({
   selector: 'app-etnia',
   templateUrl: './etnia.component.html',
   styleUrls: ['./etnia.component.scss']
})

export class EtniaComponent implements OnInit {

   busy: Promise<any>;
   entidades: Etnia[];
   entidadSeleccionada: Etnia;
   pagina: 1;
   tamanoPagina: 20;
   paginaActual: number;
   paginaUltima: number;
   esVisibleVentanaEdicion: boolean;

   constructor(public toastr: ToastsManager, vcr: ViewContainerRef, private dataService: EtniaService) {
      this.toastr.setRootViewContainerRef(vcr);
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

   getNumeroPaginas(tamanoPagina: number): void{
      this.busy = this.dataService
      .getNumeroPaginas(tamanoPagina)
      .then(respuesta => {
         if(respuesta>0){
            this.paginaUltima = respuesta[0].paginas;
         } else {
            this.paginaUltima = 1;
         }
      })
      .catch(error => {
         //Error al leer las paginas
      });
   }

   isValid(entidadPorEvaluar: Etnia): boolean {
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

   crearEntidad(): Etnia {
      const nuevoEtnia = new Etnia();
      nuevoEtnia.id = 0;
      return nuevoEtnia;
   }

   add(entidadNueva: Etnia): void {
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

   update(entidadParaActualizar: Etnia): void {
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

   delete(entidadParaBorrar: Etnia): void {
      this.busy = this.dataService.remove(entidadParaBorrar.id)
      .then(respuesta => {
         if(respuesta){
            this.toastr.success('La eliminación fue exitosa', 'Eliminación');
         }else{
            this.toastr.warning('Se produjo un error', 'Eliminación');
         }
         this.refresh();
      })
      .catch(error => {
         this.toastr.success('Se produjo un error', 'Eliminación');
      });
   }

   refresh(): void {
      this.entidades = Etnia[0];
      this.entidadSeleccionada = this.crearEntidad();
      this.getPagina(1,5);
      this.getNumeroPaginas(5);
   }

   ngOnInit() {
      this.refresh();
      this.paginaActual=1;
   }

   onSelect(entidadActual: Etnia): void {
      this.entidadSeleccionada = entidadActual;
   }
}