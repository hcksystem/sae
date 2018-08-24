import { LoginResult } from './../../../entidades/especifico/Login-Result';
import { Component, OnInit, ViewContainerRef } from '@angular/core';
import { ElementRef, Renderer2, ViewChild } from '@angular/core';
import { ToastsManager } from 'ng2-toastr/ng2-toastr';
import { Persona } from 'app/entidades/CRUD/Persona';
import { MatriculacionService } from 'app/layout/matriculacion/matriculacion.service';
import { DatosInstituto } from 'app/entidades/especifico/Datos-Instituto';
import { RolSecundario } from 'app/entidades/CRUD/RolSecundario';
import { Router } from '@angular/router';
import { DatosCupo } from 'app/entidades/especifico/Datos-Cupo';
import { TipoSangreService } from '../../../CRUD/tiposangre/tiposangre.service';
import { UbicacionService } from '../../../CRUD/ubicacion/ubicacion.service';
import { Carrera } from 'app/entidades/CRUD/Carrera';
import { CarreraService } from 'app/CRUD/carrera/carrera.service';
import { TipoIngresosService } from 'app/CRUD/tipoingresos/tipoingresos.service';
import * as jsPDF from 'jspdf';
import * as html2canvas from 'html2canvas';

@Component({
    selector: 'app-formulario-datos',
    templateUrl: './formulario-datos.component.html',
    styleUrls: ['./formulario-datos.component.scss']
})
export class FormularioDatosComponent implements OnInit {
    @ViewChild('encabezadoFormularioDatos') encabezadoFormularioDatos: ElementRef;
    @ViewChild('cuerpoFormularioDatosPG1') cuerpoFormularioDatosPG1: ElementRef;
    @ViewChild('cuerpoFormularioDatosPG2') cuerpoFormularioDatosPG2: ElementRef;
    @ViewChild('pieFormularioDatos') pieFormularioDatos: ElementRef;
    busy: Promise<any>;
    personaLogeada: Persona;
    rol: number;
    datosInstituto: DatosInstituto;
    logo: String;
    barcode: String;
    fechaActual: Date;
    tipoSangre: String;
    rolesSecundarios: RolSecundario[];
    datosCupo: DatosCupo;
    tipoIdentificacion: number;
    paisNacimiento: String;
    provinciaNacimiento: String;
    cantonNacimiento: String;
    paisDomicilio: String;
    ingresos: String;
    provinciaDomicilio: String;
    cantonDomicilio: String;
    carrera: Carrera;

    constructor(public toastr: ToastsManager, vcr: ViewContainerRef,
        private matriculacionDataService: MatriculacionService,
        private tipoSangreDataService: TipoSangreService,
        private ubicacionDataService: UbicacionService,
        private carreraDataService: CarreraService,
        private ingresosDataService: TipoIngresosService,
        private router: Router,
        private rd: Renderer2) {
            this.toastr.setRootViewContainerRef(vcr);
            this.carrera = new Carrera();
            this.datosCupo = new DatosCupo();
            this.datosInstituto = new DatosInstituto();
    }

    ngOnInit() {
        const logedResult = JSON.parse(localStorage.getItem('logedResult')) as LoginResult;
        this.personaLogeada = logedResult.persona;
        this.rol = logedResult.idRol;
        this.rolesSecundarios = JSON.parse(localStorage.getItem('rolesSecundarios')) as RolSecundario[];
        let autorizado = false;
        this.rolesSecundarios.forEach(rol => {
            if ( rol.idRol == 2 || rol.idRol == 6 ) {
                autorizado = true;
            }
        });
        if ( this.rol == 2 || this.rol == 6 ) {
            autorizado = true;
        }
        if (!autorizado) {
            this.router.navigate(['/login']);
        }
        this.datosInstituto = new DatosInstituto();
        this.fechaActual = new Date();
        this.datosCupo = new DatosCupo();
        this.getDatosCupo(this.personaLogeada.id);
        this.tipoIdentificacion = 1
        if (this.personaLogeada.identificacion.length !== 10) {
            this.tipoIdentificacion = 2
        }
        this.getTipoSangre();
        this.getDatosNacimiento();
        this.getIngresos();
        this.getDatosResidencia();
    }

    getDatosNacimiento(): void {
        this.busy = this.ubicacionDataService
            .getFiltrado(
                'codigo',
                'coincide',
                this.personaLogeada.idUbicacionNacimientoPais.toString()
            )
            .then(respuesta => {
                this.paisNacimiento = respuesta[0].descripcion;
            })
            .catch(error => {});
        this.busy = this.ubicacionDataService
            .getFiltrado(
                'codigo',
                'coincide',
                this.personaLogeada.idUbicacionNacimientoProvincia.toString()
            )
            .then(respuesta => {
                this.provinciaNacimiento = respuesta[0].descripcion;
            })
            .catch(error => {});
        this.busy = this.ubicacionDataService
            .getFiltrado(
                'codigo',
                'coincide',
                this.personaLogeada.idUbicacionNacimientoCanton.toString()
            )
            .then(respuesta => {
                this.cantonNacimiento = respuesta[0].descripcion;
            })
            .catch(error => {});
    }

    getDatosResidencia(): void {
        this.busy = this.ubicacionDataService
            .getFiltrado(
                'codigo',
                'coincide',
                this.personaLogeada.idUbicacionDomicilioPais.toString()
            )
            .then(respuesta => {
                this.paisDomicilio = respuesta[0].descripcion;
            })
            .catch(error => {});
        this.busy = this.ubicacionDataService
            .getFiltrado(
                'codigo',
                'coincide',
                this.personaLogeada.idUbicacionDomicilioProvincia.toString()
            )
            .then(respuesta => {
                this.provinciaDomicilio = respuesta[0].descripcion;
            })
            .catch(error => {});
        this.busy = this.ubicacionDataService
            .getFiltrado(
                'codigo',
                'coincide',
                this.personaLogeada.idUbicacionDomicilioCanton.toString()
            )
            .then(respuesta => {
                this.cantonDomicilio = respuesta[0].descripcion;
            })
            .catch(error => {});
    }

    getTipoSangre(): void {
        this.busy = this.tipoSangreDataService
        .getFiltrado(
            'id',
            'coincide',
            this.personaLogeada.idTipoSangre.toString()
        )
        .then(respuesta => {
            this.tipoSangre = respuesta[0].descripcion;
        })
        .catch(error => {});
    }

    getDatosInstituto(idCarrera: number): void {
        this.busy = this.matriculacionDataService.getDatosInstituto(idCarrera)
        .then(respuesta => {
            this.datosInstituto = respuesta;
            this.logo = 'assets/images/logos/' + this.datosInstituto.nombre + '.png';
        })
        .catch(error => {

        });
    }

    getIngresos(): void {
        this.busy = this.ingresosDataService
            .getFiltrado(
                'id',
                'coincide',
                this.personaLogeada.idIngresos.toString()
            )
            .then(respuesta => {
                this.ingresos = respuesta[0].descripcion;
            })
            .catch(error => {});
    }
    getDatosCupo(idPersona: number): void {
        this.busy = this.matriculacionDataService.getDatosCupo(idPersona)
        .then(respuesta => {
            this.datosCupo = respuesta;
            this.getDatosInstituto(this.datosCupo.idCarrera);
            this.getCarrera(this.datosCupo.idCarrera);
            const meses = ['ENE', 'FEB', 'MAR', 'ABR', 'MAY', 'JUN', 'JUL', 'AGO', 'SEP', 'OCT', 'NOV', 'DIC'];
            this.barcode = this.fechaActual.getFullYear().toString() + '-' + meses[this.fechaActual.getMonth()] + '-' + this.datosCupo.siglasCarrera + '-' + this.datosCupo.identificacion;
        })
        .catch(error => {

        });
    }

    getCarrera(idCarrera: number): void {
        console.log(this.datosCupo);
        this.busy = this.carreraDataService.get(idCarrera)
        .then(respuesta => {
            if ( JSON.stringify(respuesta) == 'false' ) {
                return;
            }
            this.carrera = respuesta;
        })
        .catch(error => {

        });
    }
}
