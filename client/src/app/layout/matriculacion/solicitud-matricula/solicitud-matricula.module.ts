import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { SolicitudMatriculaRoutingModule } from './solicitud-matricula-routing.module';
import { SolicitudMatriculaComponent } from './solicitud-matricula.component';

import { PersonaService } from 'app/CRUD/persona/persona.service';
import { GeneroService } from 'app/CRUD/genero/genero.service';
import { EstudianteService } from 'app/CRUD/estudiante/estudiante.service';

@NgModule({
  imports: [
    CommonModule,
    SolicitudMatriculaRoutingModule
  ],
  providers: [PersonaService, GeneroService, EstudianteService],
  declarations: [SolicitudMatriculaComponent]
})
export class SolicitudMatriculaModule { }
