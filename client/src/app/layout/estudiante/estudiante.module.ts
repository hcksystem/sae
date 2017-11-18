import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { CommonModule } from '@angular/common';

import { EstudianteRoutingModule } from './estudiante-routing.module';
import { EstudianteComponent } from './estudiante.component';
import { EstudianteService } from 'app/layout/estudiante/estudiante.service';

@NgModule({
   imports: [
      CommonModule,
      FormsModule,
      EstudianteRoutingModule
   ],
   providers: [EstudianteService],
   declarations: [EstudianteComponent],
})
export class EstudianteModule { }
