import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { SolicitudMatriculaRoutingModule } from './solicitud-matricula-routing.module';
import { SolicitudMatriculaComponent } from './solicitud-matricula.component';

@NgModule({
  imports: [
    CommonModule,
    SolicitudMatriculaRoutingModule
  ],
  declarations: [SolicitudMatriculaComponent]
})
export class SolicitudMatriculaModule { }
