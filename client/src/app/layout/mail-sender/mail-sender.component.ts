import { Component, OnInit } from '@angular/core';
import { MailData } from 'app/entidades/especifico/MailData';
import { MailSenderService } from './mail-sender.service';
import { DestinoMail } from 'app/entidades/especifico/DestinoMail';

@Component({
    selector: 'app-mail-sender',
    templateUrl: './mail-sender.component.html',
    styleUrls: ['./mail-sender.component.scss']
})
export class MailSenderComponent implements OnInit {
    busy: Promise<any>;
    mailData: MailData;
    progresoPorcentaje: number;
    mensajesEnviados: number;
    total: number;
    tickTime: number
    tiempoRequerido: string;
    mensajeBarra: string;
    enviando: boolean;
    posiblesDestinos: DestinoMail[];
    destinos: DestinoMail[];
    constructor(private mailSenderDataService: MailSenderService) {
    }

    ngOnInit() {
        this.mailData = new MailData();
        this.progresoPorcentaje = 0;
        this.mensajesEnviados = 0;
        this.total = 0;
        this.tiempoRequerido = '';
        this.mensajeBarra = '';
        this.enviando = false;
    }

    enviarEmail() {
        this.busy = this.mailSenderDataService.sendMail(this.mailData)
        .then(respuesta => {

        })
        .catch(error => {

        });
    }

    sendMails() {
        if ( !this.enviando ) {
            this.total = 11;
            if ( this.total >= 400 ) {
                this.tickTime = 8000;
            } else {
                this.tickTime = 4000;
            }
            this.mensajesEnviados = 0;
            this.enviando = true;
            this.iniciarEnvio();
        }
    }

    setProgressBar() {
        this.progresoPorcentaje = (this.mensajesEnviados / this.total) * 100;
        this.mensajeBarra = 'Enviados ' + this.mensajesEnviados + ' de ' + this.total;
    }

    setTiempoRequerido() {
        const totalSegundos = (this.total - this.mensajesEnviados) * (this.tickTime / 1000);
        let horas = 0;
        let minutos = 0;
        let segundos = 0;
        if ( totalSegundos > 3600) {
            horas = Math.round(totalSegundos / 3600);
        } else {
            horas = 0;
        }
        if ( totalSegundos > 60 ) {
            minutos = Math.round(((totalSegundos / 3600 - horas) * 3600) / 60);
        } else {
            minutos = 0;
        }
        segundos = totalSegundos - ((horas * 3600) + (minutos * 60));
        this.tiempoRequerido = 'Tiempo Requerido: ' + horas + 'H ' + minutos + 'm ' + segundos + 's';
    }

    iniciarEnvio() {
        this.setTiempoRequerido();
        this.setProgressBar();
        if ( this.mensajesEnviados < this.total ) {
            setTimeout(() => {
                this.mensajesEnviados++;
                this.setProgressBar();
                this.setTiempoRequerido();
                this.enviarEmail();
                this.iniciarEnvio();
            }, this.tickTime);
        } else {
            this.tiempoRequerido = 'Tarea Finalizada Satisfactoriamente';
            this.enviando = false;
        }
    }
}
