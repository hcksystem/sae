import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { CommonModule } from '@angular/common';

import { TipoAulaRoutingModule } from './tipoaula-routing.module';
import { TipoAulaComponent } from './tipoaula.component';
import { TipoAulaService } from 'app/layout/tipoaula/tipoaula.service';

@NgModule({
   imports: [
      CommonModule,
      FormsModule,
      TipoAulaRoutingModule
   ],
   providers: [TipoAulaService],
   declarations: [TipoAulaComponent],
})
export class TipoAulaModule { }
