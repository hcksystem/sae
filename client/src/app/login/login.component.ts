import { Persona } from '../entidades/CRUD/Persona';
import { Component, OnInit, ViewContainerRef } from '@angular/core';
import { Router } from '@angular/router';
import { routerTransition } from '../router.animations';
import { LoginRequest } from '../entidades/especifico/Login-Request';
import { LoginResult } from '../entidades/especifico/Login-Result';
import { LoginService } from './login.service';

import 'rxjs/add/operator/toPromise';
import { ToastsManager } from 'ng2-toastr/ng2-toastr';
import { Message } from '@angular/compiler/src/i18n/i18n_ast';
import { stringify } from 'querystring';

@Component({
    selector: 'app-login',
    templateUrl: './login.component.html',
    styleUrls: ['./login.component.scss'],
    animations: [routerTransition()]
})
export class LoginComponent implements OnInit {

    busy: Promise<any>;
    loginEntidad: LoginRequest;
    
    constructor(public router: Router, vcr: ViewContainerRef, public toastr: ToastsManager, private dataService: LoginService) {
        this.toastr.setRootViewContainerRef(vcr);
    }

    ngOnInit() {
        this.loginEntidad = this.crearEntidad();
    }

    crearEntidad(): LoginRequest {
        const loginEntidad = new LoginRequest();
        loginEntidad.email = "";
        loginEntidad.clave = "";
        return loginEntidad;
    }

    onLoggedin() {
        // this._userService.signIn();
        this.login(this.loginEntidad);
    }

    login(datosLogin: LoginRequest): void {
        this.busy = this.dataService.cuenta(datosLogin)
        .then(respuesta => {
            if(respuesta.idRol===0){
                this.toastr.warning('Credenciales Incorrectos', 'Autenticar');     
                localStorage.setItem('isLoggedin', 'false');
                this.router.navigate(['/login']);
            }else{
                localStorage.setItem('isLoggedin', 'true');
                localStorage.setItem('logedResult', JSON.stringify(respuesta));
                this.router.navigate(['/yavirac']);
            }
        })
        .catch(error => {
           this.toastr.warning('Ocurrió un error', 'Autenticar');
        });
    }
}
