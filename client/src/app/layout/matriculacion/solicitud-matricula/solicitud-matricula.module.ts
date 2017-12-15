import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { SolicitudMatriculaRoutingModule } from './solicitud-matricula-routing.module';
import { SolicitudMatriculaComponent } from './solicitud-matricula.component';

import { MatriculacionService } from './../matriculacion.service';
import { PersonaService } from 'app/CRUD/persona/persona.service';

@NgModule({
  imports: [
    CommonModule,
    SolicitudMatriculaRoutingModule
  ],
  providers: [MatriculacionService, PersonaService],
  declarations: [SolicitudMatriculaComponent]
})
export class SolicitudMatriculaModule { }
