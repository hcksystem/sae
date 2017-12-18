import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { CommonModule } from '@angular/common';

import { AsignacionRolesRoutingModule } from './asignacion-roles-routing.module';
import { AsignacionRolesComponent } from './asignacion-roles.component';
import { AsignacionRolesService } from './asignacion-roles.service';
import { RolSecundarioService } from 'app/CRUD/rolsecundario/rolsecundario.service';

@NgModule({
   imports: [
      CommonModule,
      FormsModule,
      AsignacionRolesRoutingModule
   ],
   providers: [AsignacionRolesService,
    RolSecundarioService],
   declarations: [AsignacionRolesComponent],
})
export class AsignacionRolesModule { }
