import { Component, OnInit, ViewContainerRef } from '@angular/core';
import { ToastsManager } from 'ng2-toastr/ng2-toastr';
import { LoginResult } from 'app/entidades/especifico/Login-Result';
import { Persona } from 'app/entidades/CRUD/Persona';
import { DatosCupo } from 'app/entidades/especifico/Datos-Cupo';
import { DatosInstituto } from 'app/entidades/especifico/Datos-Instituto';
import { Asignatura } from 'app/entidades/CRUD/Asignatura';
import { PeriodoLectivoActual } from 'app/entidades/especifico/Periodo-Lectivo-Actual';
import { SolicitudMatricula } from 'app/entidades/CRUD/SolicitudMatricula';
import { GeneroService } from 'app/CRUD/genero/genero.service';
import { EtniaService } from 'app/CRUD/etnia/etnia.service';
import { TipoIngresosService } from 'app/CRUD/tipoingresos/tipoingresos.service';
import { OcupacionService } from 'app/CRUD/ocupacion/ocupacion.service';
import { TipoDiscapacidadService } from '../../../CRUD/tipodiscapacidad/tipodiscapacidad.service';
import { TipoSangreService } from '../../../CRUD/tiposangre/tiposangre.service';
import { EstadoCivilService } from '../../../CRUD/estadocivil/estadocivil.service';
import { TituloService } from 'app/CRUD/titulo/titulo.service';
import { EstudianteService } from 'app/CRUD/estudiante/estudiante.service';
import { TipoInstitucionProcedenciaService } from 'app/CRUD/tipoinstitucionprocedencia/tipoinstitucionprocedencia.service';
import { NivelTituloService } from '../../../CRUD/niveltitulo/niveltitulo.service';
import { UbicacionService } from '../../../CRUD/ubicacion/ubicacion.service';
import { MatriculacionService } from 'app/layout/matriculacion/matriculacion.service';
import { SolicitudMatriculaService } from 'app/CRUD/solicitudmatricula/solicitudmatricula.service';
import { AsignaturaSolicitudMatricula } from 'app/entidades/CRUD/AsignaturaSolicitudMatricula';
import { AsignaturaSolicitudMatriculaService } from 'app/CRUD/asignaturasolicitudmatricula/asignaturasolicitudmatricula.service';
import { PersonaService } from 'app/CRUD/persona/persona.service';

@Component({
    selector: 'app-tutor',
    templateUrl: './tutor.component.html',
    styleUrls: ['./tutor.component.scss']
})
export class TutorComponent implements OnInit {
    busy: Promise<any>;
    personaLogeada: Persona;
    rol: number;
    datosCupo: DatosCupo;
    datosInstituto: DatosInstituto;
    asignaturasMatriculables: Asignatura[];
    periodoLectivoActual: PeriodoLectivoActual;
    logo: String;
    fechaActual: Date;
    barcode: String;
    solicitudMatriculaSeleccionada: SolicitudMatricula;
    solicitudMatricula: SolicitudMatricula;
    genero: string;
    estadoCivil: string;
    etnia: string;
    tipoSangre: string;
    ingresos: string;
    ocupacion: string;
    tipoDiscapacidad: string;
    paisDomicilio: string;
    provinciaDomicilio: string;
    cantonDomicilio: string;
    parroquiaDomicilio: string;
    paisNacimiento: string;
    provinciaNacimiento: string;
    cantonNacimiento: string;
    parroquiaNacimiento: string;
    paisOrigenPadre: string;
    nivelEstudioPadre: string;
    paisOrigenMadre: string;
    nivelEstudioMadre: string;
    idTipoInstitucionProcedencia: number;
    tipoInstitucionProcedencia: string;
    tituloBachiller: string;
    notaPostulacion: number;
    solicitudesMatriculas: SolicitudMatricula[];
    aspirante: Persona;
    constructor(
        public toastr: ToastsManager, vcr: ViewContainerRef,
        private personaDataService: PersonaService,
        private matriculacionDataService: MatriculacionService,
        private solicitudMatriculaDataService: SolicitudMatriculaService,
        private asignaturaSolicitudMatriculaDataService: AsignaturaSolicitudMatriculaService,
        private generoDataService: GeneroService,
        private estadoCivilDataService: EstadoCivilService,
        private etniaDataService: EtniaService,
        private tipoSangreDataService: TipoSangreService,
        private ingresosDataService: TipoIngresosService,
        private ocupacionDataService: OcupacionService,
        private tipoDiscapacidadDataService: TipoDiscapacidadService,
        private ubicacionDataService: UbicacionService,
        private nivelTituloDataService: NivelTituloService,
        private estudianteDataService: EstudianteService,
        private tipoInstitucionProcedenciaService: TipoInstitucionProcedenciaService) {
            this.toastr.setRootViewContainerRef(vcr);
    }

    ngOnInit() {
        const logedResult = JSON.parse(localStorage.getItem('logedResult')) as LoginResult;
        this.personaLogeada = logedResult.persona;
        this.rol = logedResult.idRol;
        this.aspirante = new Persona();
        this.datosCupo = new DatosCupo();
        this.datosInstituto = new DatosInstituto();
        this.periodoLectivoActual = new PeriodoLectivoActual();
        this.fechaActual = new Date();
        this.solicitudMatricula = new SolicitudMatricula();
        this.getSolicitudesMatriculas();
        this.getPeriodoLectivoActual();
    }

    onSelect(entidadActual: SolicitudMatricula): void {
        this.solicitudMatriculaSeleccionada = entidadActual;
        this.getPersona(this.solicitudMatriculaSeleccionada.idPersona);
    }

    estaSeleccionado(porVerificar): boolean {
        if (this.solicitudMatriculaSeleccionada == null) {
        return false;
        }
        return porVerificar.id === this.solicitudMatriculaSeleccionada.id;
    }

    getSolicitudesMatriculas(): void {
        this.busy = this.solicitudMatriculaDataService.getFiltrado('idEstadoSolicitud', 'coincide', '1')
        .then(respuesta => {
            this.solicitudesMatriculas = respuesta
        })
        .catch(error => {

        });
    }

    getPersona(idPersona: number): void {
        this.busy = this.personaDataService.get(idPersona)
        .then(respuesta => {
            this.aspirante = respuesta;
            this.getHojaDatos(this.aspirante);
            this.getDatosCupo(this.aspirante.id);
        })
        .catch(error => {

        });
    }

    getHojaDatos(aspirate: Persona): void {
        this.busy = this.generoDataService.getFiltrado('id', 'coincide', aspirate.idGenero.toString())
        .then(respuesta => {
            this.genero = respuesta[0].descripcion;
        })
        .catch(error => {

        });
        this.busy = this.estadoCivilDataService.getFiltrado('id', 'coincide', aspirate.idEstadoCivil.toString())
        .then(respuesta => {
            this.estadoCivil = respuesta[0].descripcion;
        })
        .catch(error => {

        });
        this.busy = this.etniaDataService.getFiltrado('id', 'coincide', aspirate.idEtnia.toString())
        .then(respuesta => {
            this.etnia = respuesta[0].descripcion;
        })
        .catch(error => {

        });
        this.busy = this.tipoSangreDataService.getFiltrado('id', 'coincide', aspirate.idTipoSangre.toString())
        .then(respuesta => {
            this.tipoSangre = respuesta[0].descripcion;
        })
        .catch(error => {

        });
        this.busy = this.ingresosDataService.getFiltrado('id', 'coincide', aspirate.idIngresos.toString())
        .then(respuesta => {
            this.ingresos = respuesta[0].descripcion;
        })
        .catch(error => {

        });
        this.busy = this.ocupacionDataService.getFiltrado('id', 'coincide', aspirate.idOcupacion.toString())
        .then(respuesta => {
            this.ocupacion = respuesta[0].descripcion;
        })
        .catch(error => {

        });
        this.busy = this.tipoDiscapacidadDataService.getFiltrado('id', 'coincide', aspirate.idTipoDiscapacidad.toString())
        .then(respuesta => {
            this.tipoDiscapacidad = respuesta[0].descripcion;
        })
        .catch(error => {

        });
        this.busy = this.ubicacionDataService.getFiltrado('codigo', 'coincide', aspirate.idUbicacionDomicilioPais.toString())
        .then(respuesta => {
            this.paisDomicilio = respuesta[0].descripcion;
        })
        .catch(error => {

        });
        this.busy = this.ubicacionDataService.getFiltrado('codigo', 'coincide', aspirate.idUbicacionDomicilioProvincia.toString())
        .then(respuesta => {
            this.provinciaDomicilio = respuesta[0].descripcion;
        })
        .catch(error => {

        });
        this.busy = this.ubicacionDataService.getFiltrado('codigo', 'coincide', aspirate.idUbicacionDomicilioCanton.toString())
        .then(respuesta => {
            this.cantonDomicilio = respuesta[0].descripcion;
        })
        .catch(error => {

        });
        this.busy = this.ubicacionDataService.getFiltrado('codigo', 'coincide', aspirate.idUbicacionDomicilioParroquia.toString())
        .then(respuesta => {
            this.parroquiaDomicilio = respuesta[0].descripcion;
        })
        .catch(error => {

        });
        this.busy = this.ubicacionDataService.getFiltrado('codigo', 'coincide', aspirate.idUbicacionNacimientoPais.toString())
        .then(respuesta => {
            this.paisNacimiento = respuesta[0].descripcion;
        })
        .catch(error => {

        });
        this.busy = this.ubicacionDataService.getFiltrado('codigo', 'coincide', aspirate.idUbicacionNacimientoProvincia.toString())
        .then(respuesta => {
            this.provinciaNacimiento = respuesta[0].descripcion;
        })
        .catch(error => {

        });
        this.busy = this.ubicacionDataService.getFiltrado('codigo', 'coincide', aspirate.idUbicacionNacimientoCanton.toString())
        .then(respuesta => {
            this.cantonNacimiento = respuesta[0].descripcion;
        })
        .catch(error => {

        });
        this.busy = this.ubicacionDataService.getFiltrado('codigo', 'coincide', aspirate.idUbicacionNacimientoParroquia.toString())
        .then(respuesta => {
            this.parroquiaNacimiento = respuesta[0].descripcion;
        })
        .catch(error => {

        });
        this.busy = this.ubicacionDataService.getFiltrado('codigo', 'coincide', aspirate.paisOrigenPadre.toString())
        .then(respuesta => {
            this.paisOrigenPadre = respuesta[0].descripcion;
        })
        .catch(error => {

        });
        this.busy = this.ubicacionDataService.getFiltrado('codigo', 'coincide', aspirate.paisOrigenMadre.toString())
        .then(respuesta => {
            this.paisOrigenMadre = respuesta[0].descripcion;
        })
        .catch(error => {

        });
        this.busy = this.nivelTituloDataService.getFiltrado('id', 'coincide', aspirate.idNivelEstudioPadre.toString())
        .then(respuesta => {
            this.nivelEstudioPadre = respuesta[0].descripcion;
        })
        .catch(error => {

        });
        this.busy = this.nivelTituloDataService.getFiltrado('id', 'coincide', aspirate.idNivelEstudioMadre.toString())
        .then(respuesta => {
            this.nivelEstudioMadre = respuesta[0].descripcion;
        })
        .catch(error => {

        });
        this.busy = this.estudianteDataService.getFiltrado('idPersona', 'coincide', aspirate.id.toString())
        .then(respuesta => {
            this.idTipoInstitucionProcedencia = respuesta[0].idTipoInstitucionProcedencia;
            this.tituloBachiller = respuesta[0].tituloBachiller;
            this.notaPostulacion = respuesta[0].notaPostulacion;
            this.busy = this.tipoInstitucionProcedenciaService.getFiltrado('id', 'coincide', this.idTipoInstitucionProcedencia.toString())
            .then(respuesta => {
                this.tipoInstitucionProcedencia = respuesta[0].descripcion;
            })
            .catch(error => {

            });
        })
        .catch(error => {
            // ERROR
        });
    }

    getAsignaturasMatriculables(idCarrera: number, idNivel: number): void {
        if ( idNivel === 1 ) {
            this.busy = this.matriculacionDataService.getAsignaturasMatriculablesPrimerNivel(idCarrera)
            .then(respuesta => {
                this.asignaturasMatriculables = respuesta;
            })
            .catch(error => {

            });
        }
    }

    getDatosInstituto(idCarrera: number): void {
        this.busy = this.matriculacionDataService.getDatosInstituto(idCarrera)
        .then(respuesta => {
            this.datosInstituto = respuesta;
            this.logo = './../../../../assets/images/logos/' + this.datosInstituto.nombre + '.png';
        })
        .catch(error => {

        });
    }

    getPeriodoLectivoActual(): void {
        this.busy = this.matriculacionDataService.getPeriodoLectivoActual()
        .then(respuesta => {
            this.periodoLectivoActual = respuesta;
        })
        .catch(error => {

        });
    }

    getDatosCupo(idPersona: number): void {
        this.busy = this.matriculacionDataService.getDatosCupo(idPersona)
        .then(respuesta => {
            this.datosCupo = respuesta;
            this.getDatosInstituto(this.datosCupo.idCarrera);
            this.getAsignaturasMatriculables(this.datosCupo.idCarrera, 1);
            const meses = ['ENE', 'FEB', 'MAR', 'ABR', 'MAY', 'JUN', 'JUL', 'AGO', 'SEP', 'OCT', 'NOV', 'DIC'];
            this.barcode = this.fechaActual.getFullYear().toString() + '-' + meses[this.fechaActual.getMonth()] + '-' + this.datosCupo.siglasCarrera + '-' + this.datosCupo.identificacion;
        })
        .catch(error => {

        });
    }

    aceptar(): void {

    }
}
