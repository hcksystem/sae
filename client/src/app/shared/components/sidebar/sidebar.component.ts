import { Component, OnInit } from '@angular/core';
import { LoginResult } from 'app/entidades/especifico/Login-Result';
@Component({
    selector: 'app-sidebar',
    templateUrl: './sidebar.component.html',
    styleUrls: ['./sidebar.component.scss']
})
export class SidebarComponent implements OnInit {
    isActive = false;
    showMenu = '';
    estudiante: Boolean;
    secretariaAcademica: Boolean;
    tutor: Boolean;
    sec: Boolean;
    rol: number;
    rolMatriculacion: Boolean;
    constructor() {}

    ngOnInit() {
        const logedResult = JSON.parse(localStorage.getItem('logedResult')) as LoginResult;
        this.rol = logedResult.idRol;
        this.estudiante = false;
        this.tutor = false;
        this.secretariaAcademica = false;
        this.rolMatriculacion = false;
        switch (this.rol) {
            case 1:
                this.rolMatriculacion = false;
                break;
            case 2:
                this.estudiante = true;
                this.rolMatriculacion = true;
                break;
            case 3:
                this.rolMatriculacion = false;
                break;
            case 4:
                this.tutor = true;
                this.rolMatriculacion = true;
                break;
            case 5:
                this.rolMatriculacion = true;
                this.secretariaAcademica = true;
                break;
            case 6:
                this.rolMatriculacion = true;
                this.estudiante = true;
                break;
        }
    }

    eventCalled() {
        this.isActive = !this.isActive;
    }
    addExpandClass(element: any) {
        if (element === this.showMenu) {
            this.showMenu = '0';
        } else {
            this.showMenu = element;
        }
    }
}
