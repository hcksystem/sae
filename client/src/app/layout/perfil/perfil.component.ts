import { LoginResult } from '../../entidades/especifico/Login-Result';
import { Component, OnInit } from '@angular/core';
import { Persona } from 'app/entidades/CRUD/Persona';

@Component({
    selector: 'app-perfil',
    templateUrl: './perfil.component.html',
    styleUrls: ['./perfil.component.scss']
})
export class PerfilComponent implements OnInit {
    personaLogeada: Persona;
    constructor() {
    }

    ngOnInit() {
        let logedResult = JSON.parse(localStorage.getItem('logedResult')) as LoginResult;
        this.personaLogeada = logedResult.persona;
    }
}
