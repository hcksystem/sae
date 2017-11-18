import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { CommonModule } from '@angular/common';

import { MotivoSalidaRoutingModule } from './motivosalida-routing.module';
import { MotivoSalidaComponent } from './motivosalida.component';
import { MotivoSalidaService } from 'app/layout/motivosalida/motivosalida.service';

@NgModule({
   imports: [
      CommonModule,
      FormsModule,
      MotivoSalidaRoutingModule
   ],
   providers: [MotivoSalidaService],
   declarations: [MotivoSalidaComponent],
})
export class MotivoSalidaModule { }
