import { Injectable } from '@angular/core';
import { Headers, Http } from '@angular/http';

import 'rxjs/add/operator/toPromise';

import { Estudiante } from './estudiante';

@Injectable()
export class EstudianteService {

    private headers = new Headers({ 'Content-Type': 'application/jsonp', 'Access-Control-Allow-Origin': '*' });
    private urlBase = 'http://localhost:62858/Api/values'; // '../api/estudiante';  // URL to web api

    constructor(private http: Http) {
    }

    baseUrl(): string {
        return this.urlBase;
    }

    getAll(): Promise<Estudiante[]> {
        return this.http.get(this.urlBase)
            .toPromise()
            .then(response =>
                response.json() as Estudiante[])
            .catch(this.handleError);
    }

    get(id: number): Promise<Estudiante> {
        const url = `${this.urlBase}/${id}`;
        return this.http.get(url)
            .toPromise()
            .then(response =>
                response.json() as Estudiante)
            .catch(this.handleError);
    }

    remove(id: number): Promise<boolean> {
        const url = `${this.urlBase}/${id}`;
        return this.http.delete(url, { headers: this.headers })
            .toPromise()
            .then(response =>
                response.json() as boolean)
            .catch(this.handleError);
    }

    create(entidadTransporte: Estudiante): Promise<Estudiante> {
        return this.http
            .post(this.urlBase, JSON.stringify(entidadTransporte), { headers: this.headers })
            .toPromise()
            .then(res =>
                res.json() as Estudiante)
            .catch(this.handleError);
    }

    update(entidadTransporte: Estudiante): Promise<Estudiante> {
        const url = `${this.urlBase}/${entidadTransporte.EstudianteId}`;
        return this.http
            .put(url, JSON.stringify(entidadTransporte), { headers: this.headers })
            .toPromise()
            .then(res =>
                res.json() as Estudiante)
            .catch(this.handleError);
    }

    handleError(error: any): Promise<any> {
        console.error('An error occurred', error); // for demo purposes only
        return Promise.reject(error.message || error);
    }
}
