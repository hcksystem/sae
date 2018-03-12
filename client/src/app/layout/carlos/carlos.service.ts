import { ListaEstudiante } from './../../entidades/especifico/Lista-Estudiante';
import { Injectable } from '@angular/core';
import { Headers, Http } from '@angular/http';
import { environment } from './../../../environments/environment';
import 'rxjs/add/operator/toPromise';

@Injectable()
export class CarlosService {
   private headers = new Headers({ 'Content-Type': 'application/json', 'Access-Control-Allow-Origin': '*' });
   private urlBase = environment.apiUrl;

   constructor(private http: Http) {

   }

   leerLista(idCarrera: number): Promise<ListaEstudiante[]> {
      const url = `${this.urlBase + 'lista_estudiante/leer_lista?idCarrera=' + idCarrera.toString()}`;
      return this.http.get(url)
      .toPromise()
      .then(response => {
          const toReturn = response.json() as ListaEstudiante[];
          return toReturn;
      })
      .catch(this.handleError);
   }
   
   handleError(error: any): Promise<any> {
      console.error('An error occurred', error); // for demo purposes only
      return Promise.reject(error.message || error);
   }
}
