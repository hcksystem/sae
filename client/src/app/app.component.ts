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
    busy: Promise<any>;
    generos: Genero[];
    ubicaciones: Ubicacion[];
    etnias: Etnia[];
    carreras: Carrera[];
    estadosCiviles: EstadoCivil[];
    tiposIngresos: TipoIngresos[];
    tiposSangre: TipoSangre[];

    constructor(private translate: TranslateService, private tipoSangreDataService: TipoSangreService, private estadoCivilDataService: EstadoCivilService, private carreraDataService: CarreraService, private ubicacionDataService: UbicacionService, private generoDataService: GeneroService, private etniaDataService: EtniaService, private tipoIngresosDataService: TipoIngresosService) {
        translate.addLangs(['en', 'fr', 'ur', 'es', 'it', 'fa']);
        translate.setDefaultLang('en');
        const browserLang = translate.getBrowserLang();
        translate.use(browserLang.match(/en|fr|ur|es|it|fa/) ? browserLang : 'en');
    }
    
    obtenerTiposSangre(sobreescribir:boolean): TipoSangre[] {
        if(sobreescribir){
            this.busy = this.tipoSangreDataService
            .getAll()
            .then(entidadesRecuperadas => {
                this.tiposSangre = entidadesRecuperadas
            })
            .catch(error => {
                
            });
        }else{
            if(this.tiposSangre.length==0){
                this.busy = this.tipoSangreDataService
                .getAll()
                .then(entidadesRecuperadas => {
                    this.tiposSangre = entidadesRecuperadas
                })
                .catch(error => {
                    
                });
            }
        }
        return this.tiposSangre;
    }
    
    obtenerEstadosCivil(sobreescribir:boolean): EstadoCivil[] {
        if(sobreescribir){
            this.busy = this.estadoCivilDataService
            .getAll()
            .then(entidadesRecuperadas => {
                this.estadosCiviles = entidadesRecuperadas
            })
            .catch(error => {
                
            });
        }else{
            if(this.estadosCiviles.length==0){
                this.busy = this.estadoCivilDataService
                .getAll()
                .then(entidadesRecuperadas => {
                    this.estadosCiviles = entidadesRecuperadas
                })
                .catch(error => {
                    
                });
            }
        }
        return this.estadosCiviles;
    }
    
    obtenerCarreras(sobreescribir:boolean): Carrera[] {
        if(sobreescribir){
            this.busy = this.carreraDataService
            .getAll()
            .then(entidadesRecuperadas => {
                this.carreras = entidadesRecuperadas
            })
            .catch(error => {
                
            });
        }else{
            if(this.carreras.length==0){
                this.busy = this.carreraDataService
                .getAll()
                .then(entidadesRecuperadas => {
                    this.carreras = entidadesRecuperadas
                })
                .catch(error => {
                    
                });
            }
        }
        return this.carreras;
    }
    
    obtenerUbicaciones(sobreescribir:boolean): Ubicacion[] {
        if(sobreescribir){
            this.busy = this.ubicacionDataService
            .getAll()
            .then(entidadesRecuperadas => {
                this.ubicaciones = entidadesRecuperadas
            })
            .catch(error => {
                
            });
        }else{
            if(this.ubicaciones.length==0){
                this.busy = this.ubicacionDataService
                .getAll()
                .then(entidadesRecuperadas => {
                    this.ubicaciones = entidadesRecuperadas
                })
                .catch(error => {
                    
                });
            }
        }
        return this.ubicaciones;
    }

    obtenerGeneros(sobreescribir:boolean): Genero[] {
        if(sobreescribir){
            this.busy = this.generoDataService
            .getAll()
            .then(entidadesRecuperadas => {
               this.generos = entidadesRecuperadas
            })
            .catch(error => {
               
            });
        }else{
            if(this.generos.length==0){
                this.busy = this.generoDataService
                .getAll()
                .then(entidadesRecuperadas => {
                   this.generos = entidadesRecuperadas
                })
                .catch(error => {
                   
                });
            }
        }
        return this.generos;
    }

    obtenerEtnias(sobreescribir:boolean): Etnia[] {
        if(sobreescribir){
            this.busy = this.etniaDataService
            .getAll()
            .then(entidadesRecuperadas => {
            this.etnias = entidadesRecuperadas
            })
            .catch(error => {
            
            });
        }else{
            if(this.etnias.length==0){
                this.busy = this.etniaDataService
                .getAll()
                .then(entidadesRecuperadas => {
                this.etnias = entidadesRecuperadas
                })
                .catch(error => {
                
                });
            }
        }
        return this.etnias;
    }
    
    obtenerTipoIngresos(sobreescribir:boolean): TipoIngresos[] {
        if(sobreescribir){
            this.busy = this.tipoIngresosDataService
            .getAll()
            .then(entidadesRecuperadas => {
            this.tiposIngresos = entidadesRecuperadas
            })
            .catch(error => {
            
            });
        }else{
            if(this.tiposIngresos.length==0){
                this.busy = this.tipoIngresosDataService
                .getAll()
                .then(entidadesRecuperadas => {
                this.tiposIngresos = entidadesRecuperadas
                })
                .catch(error => {
                
                });
            }
        }
        return this.tiposIngresos;
    }
}
