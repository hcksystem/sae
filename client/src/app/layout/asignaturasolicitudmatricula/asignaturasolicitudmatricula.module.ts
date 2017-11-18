import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { CommonModule } from '@angular/common';

import { AsignaturaSolicitudMatriculaRoutingModule } from './asignaturasolicitudmatricula-routing.module';
import { AsignaturaSolicitudMatriculaComponent } from './asignaturasolicitudmatricula.component';
import { AsignaturaSolicitudMatriculaService } from 'app/layout/asignaturasolicitudmatricula/asignaturasolicitudmatricula.service';

@NgModule({
   imports: [
      CommonModule,
      FormsModule,
      AsignaturaSolicitudMatriculaRoutingModule
   ],
   providers: [AsignaturaSolicitudMatriculaService],
   declarations: [AsignaturaSolicitudMatriculaComponent],
})
export class AsignaturaSolicitudMatriculaModule { }
