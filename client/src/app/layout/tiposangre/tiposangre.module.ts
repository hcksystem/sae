import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { CommonModule } from '@angular/common';

import { TipoSangreRoutingModule } from './tiposangre-routing.module';
import { TipoSangreComponent } from './tiposangre.component';
import { TipoSangreService } from 'app/layout/tiposangre/tiposangre.service';

@NgModule({
   imports: [
      CommonModule,
      FormsModule,
      TipoSangreRoutingModule
   ],
   providers: [TipoSangreService],
   declarations: [TipoSangreComponent],
})
export class TipoSangreModule { }
