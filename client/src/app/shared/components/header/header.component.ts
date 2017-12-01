import { UsePipeTransformInterfaceRule } from 'codelyzer';
import { Component, OnInit } from '@angular/core';
import { Router, NavigationEnd } from '@angular/router';
import { TranslateService } from '@ngx-translate/core';
import { LoginResult } from 'app/entidades/especifico/Login-Result';
import { stringify } from '@angular/core/src/util';
import { PersonaService } from 'app/CRUD/persona/persona.service';
import { Persona } from 'app/entidades/CRUD/Persona';

@Component({
    selector: 'app-header',
    templateUrl: './header.component.html',
    styleUrls: ['./header.component.scss']
})
export class HeaderComponent implements OnInit {

    pushRightClass: string = 'push-right';
    username: string;

    constructor(private translate: TranslateService, public router: Router, private personaService: PersonaService) {
        this.router.events.subscribe((val) => {
            if (val instanceof NavigationEnd && window.innerWidth <= 992 && this.isToggled()) {
                this.toggleSidebar();
            }
        });
    }

    ngOnInit() {
        let respuesta = localStorage.getItem('logedResult');
        let personaLogeada = new Persona();
        personaLogeada = JSON.parse(respuesta).Persona as Persona;
        this.username = personaLogeada.nombre1 + ' ' + personaLogeada.nombre2 + ' ' + personaLogeada.apellido1 + ' ' + personaLogeada.apellido2;
    }

    isToggled(): boolean {
        const dom: Element = document.querySelector('body');
        return dom.classList.contains(this.pushRightClass);
    }

    toggleSidebar() {
        const dom: any = document.querySelector('body');
        dom.classList.toggle(this.pushRightClass);
    }

    rltAndLtr() {
        const dom: any = document.querySelector('body');
        dom.classList.toggle('rtl');
    }

    onLoggedout() {
        localStorage.removeItem('isLoggedin');
    }

    changeLang(language: string) {
        this.translate.use(language);
    }
}
