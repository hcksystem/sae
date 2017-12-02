import { Component } from '@angular/core';
import { TranslateService } from '@ngx-translate/core';
// CATALOGO ENTIDADES
import { TipoSangre } from './entidades/CRUD/TipoSangre';
import { EstadoCivil } from './entidades/CRUD/EstadoCivil';
import { Carrera } from './entidades/CRUD/Carrera';
import { Ubicacion } from './entidades/CRUD/Ubicacion';
import { Genero } from 'app/entidades/CRUD/Genero';
import { Etnia } from 'app/entidades/CRUD/Etnia';
import { TipoIngresos } from 'app/entidades/CRUD/TipoIngresos';
// CATALOGO SERVICIOS
import { TipoSangreService } from './CRUD/tiposangre/tiposangre.service';
import { EstadoCivilService } from './CRUD/estadocivil/estadocivil.service';
import { CarreraService } from './CRUD/carrera/carrera.service';
import { UbicacionService } from './CRUD/ubicacion/ubicacion.service';
import { GeneroService } from './CRUD/genero/genero.service';
import { EtniaService } from './CRUD/etnia/etnia.service';
import { TipoIngresosService } from './CRUD/tipoingresos/tipoingresos.service';


@Component({
    selector: 'app-root',
    templateUrl: './app.component.html',
    styleUrls: ['./app.component.scss']
})
export class AppComponent {
    generos: Genero[];
    ubicaciones: Ubicacion[];
    etnias: Etnia[];
    carreras: Carrera[];
    estadosCiviles: EstadoCivil[];
    tiposIngresos: TipoIngresos[];
    tiposSangre: TipoSangre[];
    constructor(private translate: TranslateService) {
        translate.addLangs(['en', 'fr', 'ur', 'es', 'it', 'fa']);
        translate.setDefaultLang('en');
        const browserLang = translate.getBrowserLang();
        translate.use(browserLang.match(/en|fr|ur|es|it|fa/) ? browserLang : 'en');
    }

    obtenerGeneros(): void {

    }
}
