import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { CommonModule } from '@angular/common';

import { AsignacionAsignaturasCupoRoutingModule } from './asignacion-asignaturas-cupo-routing.module';
import { AsignacionAsignaturasCupoComponent } from './asignacion-asignaturas-cupo.component';
import { AsignacionAsignaturasCupoService } from './asignacion-asignaturas-cupo.service';
import { RolSecundarioService } from 'app/CRUD/rolsecundario/rolsecundario.service';
import { MatriculacionService } from 'app/layout/matriculacion/matriculacion.service';
import { RolesService } from 'app/CRUD/roles/roles.service';

@NgModule({
   imports: [
      CommonModule,
      FormsModule,
      AsignacionAsignaturasCupoRoutingModule
   ],
   providers: [AsignacionAsignaturasCupoService,
    RolSecundarioService,
    RolesService,
    MatriculacionService],
   declarations: [AsignacionAsignaturasCupoComponent],
})
export class AsignacionAsignaturasCupoModule { }
