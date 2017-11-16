import { Injectable } from '@angular/core';
import { Headers, Http } from '@angular/http';

import 'rxjs/add/operator/toPromise';

import { Genero } from '../entidades/Genero';

@Injectable()
export class GeneroService {

    private headers = new Headers({ 'Content-Type': 'application/jsonp', 'Access-Control-Allow-Origin': '*' });
    // private urlBase = 'http://172.16.11.70/sae/server/genero/';
    private urlBase = 'http://localhost:62858/api/Values';

    constructor(private http: Http) {
    }

    baseUrl(): string {
        return this.urlBase;
    }

    getAll(): Promise<Genero[]> {
        return this.http.get(this.urlBase)
            .toPromise()
            .then(response =>
                response.json() as Genero[])
            .catch(this.handleError);
    }

    getPagina(pagina: number, tamanoPagina: number): Promise<Genero[]> {
        return this.http.get(this.urlBase + '?pagina=' + pagina + '&tamanoPagina=' + tamanoPagina)
            .toPromise()
            .then(response =>
                response.json() as Genero[])
            .catch(this.handleError);
    }

    get(id: number): Promise<Genero> {
        const url = `${this.urlBase}/${id}`;
        return this.http.get(url)
            .toPromise()
            .then(response =>
                response.json() as Genero)
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

    create(entidadTransporte: Genero): Promise<Genero> {
        return this.http
            .post(this.urlBase, JSON.stringify(entidadTransporte), { headers: this.headers })
            .toPromise()
            .then(res =>
                res.json() as Genero)
            .catch(this.handleError);
    }

    update(entidadTransporte: Genero): Promise<Genero> {
        const url = `${this.urlBase}/${entidadTransporte.id}`;
        return this.http
            .put(url, JSON.stringify(entidadTransporte), { headers: this.headers })
            .toPromise()
            .then(res =>
                res.json() as Genero)
            .catch(this.handleError);
    }

    handleError(error: any): Promise<any> {
        console.error('An error occurred', error); // for demo purposes only
        return Promise.reject(error.message || error);
    }
}
