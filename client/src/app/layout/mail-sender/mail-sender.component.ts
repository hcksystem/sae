import { Component, OnInit } from '@angular/core';
import { MailData } from 'app/entidades/especifico/MailData';
import { MailSenderService } from './mail-sender.service';

@Component({
    selector: 'app-mail-sender',
    templateUrl: './mail-sender.component.html',
    styleUrls: ['./mail-sender.component.scss']
})
export class MailSenderComponent implements OnInit {
    busy: Promise<any>;
    mailData: MailData;
    constructor(private mailSenderDataService: MailSenderService) {
    }

    ngOnInit() {
        this.mailData = new MailData();
    }

    sendMails() {
        this.busy = this.mailSenderDataService.sendMail(this.mailData)
        .then(respuesta => {
            alert(respuesta);
        })
        .catch(error => {

        });
    }
}
