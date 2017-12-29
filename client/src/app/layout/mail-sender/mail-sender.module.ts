import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';

import { MailSenderRoutingModule } from './mail-sender-routing.module';
import { MailSenderComponent } from './mail-sender.component';
@NgModule({
  imports: [
    CommonModule,
    MailSenderRoutingModule,
    NgbModule,
    FormsModule
  ],
  declarations: [MailSenderComponent]
})
export class MailSenderModule { }
