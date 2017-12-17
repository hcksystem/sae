import { DatosCupo } from './../../entidades/especifico/Datos-Cupo';
import { DatosInstituto } from './../../entidades/especifico/Datos-Instituto';
import { PeriodoLectivoActual } from './../../entidades/especifico/Periodo-Lectivo-Actual';
import { Asignatura } from './../../entidades/CRUD/Asignatura';

import { Injectable } from '@angular/core';
import { Headers, Http } from '@angular/http';
import { environment } from './../../../environments/environment';

import 'rxjs/add/operator/toPromise';
import { PersonaCombo } from 'app/entidades/especifico/PersonaCombo';

@Injectable()

export class MatriculacionService {
   private headers = new Headers({ 'Content-Type': 'application/json', 'Access-Control-Allow-Origin': '*' });
   private urlBase = environment.apiUrl;

   constructor(private http: Http) {
   }

   getPersonasMatriculadas(): Promise<PersonaCombo[]> {
        const url = `${this.urlBase + 'estudiantes_matriculados/consultar'}`;
        return this.http.get(url)
        .toPromise()
        .then(response => {
            const toReturn = response.json() as PersonaCombo[];
            return toReturn;
        })
        .catch(this.handleError);
   }

   getDatosCupo(idPersona: number): Promise<DatosCupo> {
      const url = `${this.urlBase + 'datos_cupo/consultar?idPersona=' + idPersona.toString()}`;
      return this.http.get(url)
      .toPromise()
      .then(response => {
          const toReturn = (response.json() as DatosCupo[])[0];
          return toReturn;
      })
      .catch(this.handleError);
   }

   getDatosInstituto(idCarrera: number): Promise<DatosInstituto> {
      const url = `${this.urlBase + 'datos_instituto/consultar?idCarrera=' + idCarrera.toString()}`;
      return this.http.get(url)
      .toPromise()
      .then(response => {
          const toReturn = (response.json() as DatosInstituto[])[0];
          return toReturn;
      })
      .catch(this.handleError);
   }

   getPeriodoLectivoActual(): Promise<PeriodoLectivoActual> {
      const url = `${this.urlBase + 'periodo_lectivo_actual/consultar'}`;
      return this.http.get(url)
      .toPromise()
      .then(response => {
          const toReturn = (response.json() as PeriodoLectivoActual[])[0];
          return toReturn;
      })
      .catch(this.handleError);
   }

   getAsignaturasMatriculablesPrimerNivel(idCarrera: number): Promise<Asignatura[]> {
      const url = `${this.urlBase + 'asignaturas_matriculables_primer_nivel/consultar?idCarrera=' + idCarrera.toString()}`;
      return this.http.get(url)
      .toPromise()
      .then(response => {
          const toReturn = response.json() as Asignatura[];
          return toReturn;
      })
      .catch(this.handleError);
   }

   baseUrl(): string {
       return this.urlBase;
   }

   handleError(error: any): Promise<any> {
      console.error('An error occurred', error); // for demo purposes only
      return Promise.reject(error.message || error);
   }
}
