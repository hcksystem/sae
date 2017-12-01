import { Component, OnInit } from '@angular/core';
import { LoginResult } from 'app/entidades/especifico/Login-Result';
import { Persona } from 'app/entidades/CRUD/Persona';

@Component({
    selector: 'app-hoja-datos',
    templateUrl: './hoja-datos.component.html',
    styleUrls: ['./hoja-datos.component.scss']
})
export class HojaDatosComponent implements OnInit {
    personaLogeada: Persona;
    constructor() {
    }

    ngOnInit() {
        let logedResult = JSON.parse(localStorage.getItem('logedResult')) as LoginResult;
        this.personaLogeada = logedResult.persona;
    }
}
