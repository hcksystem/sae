import { LoginResult } from 'app/entidades/especifico/Login-Result';
import { Component, OnInit, ViewContainerRef } from '@angular/core';
import { ToastsManager } from 'ng2-toastr/ng2-toastr';
import { Router } from '@angular/router';
import { CarlosService } from './carlos.service';
import { ListaEstudiante } from '../../entidades/especifico/Lista-Estudiante';


@Component({
    selector: 'app-carlos',
    templateUrl: './carlos.component.html',
    styleUrls: ['./carlos.component.scss']
})
export class CarlosComponent implements OnInit {
    busy: Promise<any>;
    listaEstudiante: ListaEstudiante[];
    miNumero: number;
    miTexto: string;
    miFecha: Date;
    mostrarContenedor2: boolean;
    indexLista: number;
    

    constructor(public toastr: ToastsManager, vcr: ViewContainerRef, 
        private carlosDataService: CarlosService, public router: Router) {
            this.toastr.setRootViewContainerRef(vcr);
    }

    ngOnInit() {
        this.miNumero = 8;
        this.mostrarContenedor2 = false;
        this.indexLista = 0;
        this.lista(1);
    }

    lista(idCarrera: number) {
        this.busy = this.carlosDataService.leerLista(idCarrera)
        .then(respuesta => {
            this.listaEstudiante = respuesta;
        })
        .catch(error => {

        });
    }
    
    mostrarContenedor() {
        this.mostrarContenedor2 = true;
    }

    ocultarContenedor() {
        this.mostrarContenedor2 = false;
    }
}
