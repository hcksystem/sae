import { Component, OnInit, ViewContainerRef} from '@angular/core';
import { ToastsManager } from 'ng2-toastr/ng2-toastr';
import { MailData } from 'app/entidades/especifico/MailData';
import { MailSenderService } from './mail-sender.service';
import { DestinoMail } from 'app/entidades/especifico/DestinoMail';
import { Carrera } from 'app/entidades/CRUD/Carrera';
import { CarreraService } from 'app/CRUD/carrera/carrera.service';

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
    carreras: Carrera[];
    carreraSeleccionadaCombo: number;
    nivelSeleccionadoCombo: number;
    enviosRealizados: number;
    estadoSeleccionadoCombo: number;
    Comodines = [
        '#nombre1',
        '#nombre2',
        '#apellido1',
        '#apellido2',
        '#carrera',
        '#coordinadorCarrera',
        '#identificacion',
        '#instituto',
        '#nivel',
        '#telefonoCelular',
        '#telefonoDomicilio',
        '<img src="url">',
        '<h1></h1>',
        '<strong></strong>'];
    constructor(public toastr: ToastsManager,
        vcr: ViewContainerRef,
        private mailSenderDataService: MailSenderService,
        private carreraDataService: CarreraService) {
        this.toastr.setRootViewContainerRef(vcr);
    }

    ngOnInit() {
        this.refresh();
    }

    refresh() {
        this.mailData = new MailData();
        this.mailData.Mensaje = '';
        this.progresoPorcentaje = 0;
        this.mensajesEnviados = 0;
        this.tiempoRequerido = '';
        this.mensajeBarra = '';
        this.enviando = false;
        this.carreraSeleccionadaCombo = 0;
        this.nivelSeleccionadoCombo = 0;
        this.estadoSeleccionadoCombo = 0;
        this.getCarreras();
    }

    filtroSeleccionado() {
        this.getDestinatarios();
    }

    getDestinatarios() {
        this.busy = this.mailSenderDataService.getDestinatarios(this.nivelSeleccionadoCombo, this.carreraSeleccionadaCombo, this.estadoSeleccionadoCombo)
        .then(respuesta => {
            if ( JSON.stringify(respuesta) == 'false') {
                this.destinos = [];
                this.total = 0;
                return;
            }
            this.destinos = respuesta;
            this.total = this.destinos.length;
        })
        .catch(error => {

        });
    }

    getCarreras() {
        this.busy = this.carreraDataService.getAll()
        .then(respuesta => {
            this.carreras = respuesta;
            this.cuentaMensajesEnviados();
            this.filtroSeleccionado();
        })
        .catch(error => {

        });
    }

    cambioCuerpo() {
        document.getElementById('previewBody').innerHTML = this.buildMessageBody(this.destinos[0]);
    }

    cuentaEnvios(mensajesPorEnviar: number) {
        this.busy = this.mailSenderDataService.cuentaEnvios()
        .then(respuesta => {
            if ( ((respuesta * 1) + (mensajesPorEnviar * 1)) <= 499 ) {
                this.iniciarEnvio();
            } else {
                this.toastr.warning('El límite diario es de 500 correos electrónicos.', 'Error de envío');
                this.mensajesEnviados = 0;
                this.enviando = false;
            }
        })
        .catch(error => {

        });
    }

    cuentaMensajesEnviados() {
        this.busy = this.mailSenderDataService.cuentaEnvios()
        .then(respuesta => {
            this.enviosRealizados = respuesta;
        })
        .catch(error => {

        });
    }

    insertarComodin(comodin: string) {
        this.mailData.Mensaje += comodin;
    }

    buildMailData(cuenta: number) {
        const destino = this.destinos[cuenta - 1];
        this.mailData.ToEmail = destino.correoElectronico;
        this.mailData.ToAlias = destino.nombre1 + ' ' + destino.nombre2 + ' ' + destino.apellido1 + ' ' + destino.apellido2;
        this.mailData.Mensaje = this.buildMessageBody(destino);
        this.enviarEmail();
    }

    buildMessageBody(destino: DestinoMail) {
        let messageBody = this.mailData.Mensaje;
        messageBody = messageBody.replace('#nombre1', destino.nombre1);
        messageBody = messageBody.replace('#nombre2', destino.nombre2);
        messageBody = messageBody.replace('#apellido1', destino.apellido1);
        messageBody = messageBody.replace('#apellido2', destino.apellido2);
        messageBody = messageBody.replace('#carrera', destino.carrera);
        messageBody = messageBody.replace('#coordinadorCarrera', destino.coordinadorCarrera);
        messageBody = messageBody.replace('#identificacion', destino.identificacion);
        messageBody = messageBody.replace('#instituto', destino.instituto);
        const niveles = ['Primer Nivel', 'Segundo Nivel', 'Tercer Nivel', 'Cuarto Nivel', 'Quinto Nivel', 'Sexto Nivel'];
        messageBody = messageBody.replace('#nivel', niveles[destino.nivel - 1]);
        messageBody = messageBody.replace('#telefonoCelular', destino.telefonoCelular);
        messageBody = messageBody.replace('#telefonoDomicilio', destino.telefonoDomicilio);
        return messageBody;
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
            if ( this.total >= 100 ) {
                this.tickTime = 4000;
            } else {
                this.tickTime = 2000;
            }
            this.mensajesEnviados = 0;
            this.enviando = true;
            this.cuentaEnvios(this.total);
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
                this.buildMailData(this.mensajesEnviados);
                this.iniciarEnvio();
            }, this.tickTime);
        } else {
            this.tiempoRequerido = 'Tarea Finalizada Satisfactoriamente';
            this.enviando = false;
        }
    }
}
