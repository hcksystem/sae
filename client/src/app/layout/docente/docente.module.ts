import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { CommonModule } from '@angular/common';

import { DocenteRoutingModule } from './docente-routing.module';
import { DocenteComponent } from './docente.component';
import { DocenteService } from 'app/layout/docente/docente.service';

@NgModule({
   imports: [
      CommonModule,
      FormsModule,
      DocenteRoutingModule
   ],
   providers: [DocenteService],
   declarations: [DocenteComponent],
})
export class DocenteModule { }
