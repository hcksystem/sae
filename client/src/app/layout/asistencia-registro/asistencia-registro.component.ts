import { Component, OnInit, ViewContainerRef } from '@angular/core';
import { ToastsManager } from 'ng2-toastr/ng2-toastr';
import { AsistenciaRegistro } from '../entidades/Asistencia-Registro';
import { AsignaturaDocente } from '../entidades/Asignatura-Docente';
import { AsistenciaRegistroService } from './asistencia-registro.service';
import { AsignaturaService } from '../asignatura/asignatura.service';

import 'rxjs/add/operator/toPromise';
import { Message } from '@angular/compiler/src/i18n/i18n_ast';
import { CabeceraMes } from 'app/layout/asistencia-registro/cabecera-mes';

@Component({
    selector: 'app-asistencia-registro',
    templateUrl: './asistencia-registro.component.html',
    styleUrls: ['./asistencia-registro.component.scss']
})

export class AsistenciaRegistroComponent implements OnInit {
    busy: Promise<any>;
    asistencias: AsistenciaRegistro[];
    idMatriculaAsignatura: number;
    asignaturas: AsignaturaDocente[];
    asignaturaActual: AsignaturaDocente;
    idDocente: number;
    cabecerasMes: CabeceraMes[];

    constructor(public toastr: ToastsManager, vcr: ViewContainerRef
        , private dataService: AsistenciaRegistroService
        , private dataServiceAsignatura: AsignaturaService) {
        this.toastr.setRootViewContainerRef(vcr);
    }

    nombreMes(fecha: Date): string {
        switch (fecha.getMonth()) {
            case 0: return 'Enero';
            case 1: return 'Febrero';
            case 2: return 'Marzo';
            case 3: return 'Abril';
            case 4: return 'Mayo';
            case 5: return 'Junio';
            case 6: return 'Julio';
            case 7: return 'Agosto';
            case 8: return 'Septiembre';
            case 9: return 'Octubre';
            case 10: return 'Noviembre';
            case 11: return 'Diciembre';
        }
    }

    calcularCabecerasMes(asistencias: AsistenciaRegistro[]): void {
        if (asistencias.length > 0) {
            asistencias[0].asistencias.forEach(function (value) {
                if (this.cabecerasMes.length > 0) {
                    const indice = this.cabecerasMes.forEach(function (item, index) {
                        if (item.nombreMes === this.nombreMes(value.fecha)) {
                            return index;
                        }
                        return -1;
                    });

                    if (indice >= 0) {
                        this.cabecerasMes[indice].numeroColumnas++;
                    } else {
                        const cabeceraMes = new CabeceraMes();
                        cabeceraMes.nombreMes = this.nombreMes(value.fecha);
                        cabeceraMes.numeroColumnas = 1;
                        this.cabecerasMes.push(cabeceraMes);
                    }
                } else {
                    const cabeceraMes = new CabeceraMes();
                    cabeceraMes.nombreMes = this.nombreMes(value.fecha);
                    cabeceraMes.numeroColumnas = 1;
                    this.cabecerasMes.push(cabeceraMes);
                }
            });
        };
    }

    onChangeAsignatura(asignatura: AsignaturaDocente): void {
        this.encerarAsistencias();
    }

    leerDocente(): void {
        this.idDocente = 1; // TODO GE : leer el id de docente de la cuenta actual
        this.getAsignaturas(this.idDocente);
        this.encerarAsistencias();
    }

    encerarAsistencias(): void {
        this.asistencias = new AsistenciaRegistro[0];
    }

    onSelectAsignatura(): void {
        this.encerarAsistencias();
        this.getAll(this.idMatriculaAsignatura);
    }

    getAsignaturas(idDocente: number): void {
        this.busy = this.dataServiceAsignatura
            .getAsignaturas(idDocente)
            .then(entidadesRecuperadas => {
                this.asignaturas = entidadesRecuperadas
                if (entidadesRecuperadas == null || entidadesRecuperadas.length === 0) {
                    this.toastr.success('¡El docente no tiene asignaturas!', 'Consulta');
                }
            })
            .catch(error => {
                this.toastr.warning('Se produjo un error al consultar las asignaturas del docente', 'Consulta');
            });

    }

    getAll(idMatriculaAsignatura: number): void {
        this.busy = this.dataService
            .getAll(idMatriculaAsignatura)
            .then(entidadesRecuperadas => {
                this.calcularCabecerasMes(entidadesRecuperadas);
                this.asistencias = entidadesRecuperadas
                if (entidadesRecuperadas == null || entidadesRecuperadas.length === 0) {
                    this.toastr.success('¡No hay datos!', 'Consulta');
                } else {
                    this.toastr.success('La consulta fue exitosa', 'Consulta');
                }
            })
            .catch(error => {
                this.toastr.success('Se produjo un error', 'Consulta');
            });
    }

    update(entidadParaActualizar: AsistenciaRegistro[]): void {
        this.busy = this.dataService.update(entidadParaActualizar)
            .then(respuesta => {
                if (respuesta) {
                    this.toastr.success('La actualización fue exitosa', 'Actualización');
                } else {
                    this.toastr.warning('Se produjo un error', 'Actualización');
                }
                this.refresh();
            })
            .catch(error => {
                this.toastr.warning('Se produjo un error', 'Actualización');
            });
    }

    refresh(): void {
        this.leerDocente();
    }

    ngOnInit() {
        this.refresh();
    }
}
