import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { CommonModule } from '@angular/common';

import { AsistenciaCursoRoutingModule } from './asistencia-curso-routing.module';
import { AsistenciaCursoComponent } from './asistencia-curso.component';
import { CuentaLocalService } from '../cuentalocal/cuentalocal.service';
import { AsignaturaExtendedService } from '../../data-services/asignatura-extended.service';

@NgModule({
   imports: [
      CommonModule,
      FormsModule,
      AsistenciaCursoRoutingModule
   ],
   providers: [CuentaLocalService, AsignaturaExtendedService],
   declarations: [AsistenciaCursoComponent],
})
export class AsistenciaCursoModule { }
