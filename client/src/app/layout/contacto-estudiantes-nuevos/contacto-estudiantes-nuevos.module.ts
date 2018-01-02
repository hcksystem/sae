import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';

import { ContactoEstudiantesNuevosRoutingModule } from './contacto-estudiantes-nuevos-routing.module';
import { ContactoEstudiantesNuevosComponent } from './contacto-estudiantes-nuevos.component';
import { ContactoEstudiantesNuevosService } from 'app/layout/contacto-estudiantes-nuevos/contacto-estudiantes-nuevos.service';
@NgModule({
  imports: [
    CommonModule,
    ContactoEstudiantesNuevosRoutingModule,
    NgbModule,
    FormsModule
  ],
  providers: [ContactoEstudiantesNuevosService],
  declarations: [ContactoEstudiantesNuevosComponent]
})
export class ContactoEstudiantesNuevosModule { }
