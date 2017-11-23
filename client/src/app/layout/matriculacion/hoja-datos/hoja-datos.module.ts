import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { HojaDatosRoutingModule } from './hoja-datos-routing.module';
import { HojaDatosComponent } from './hoja-datos.component';

@NgModule({
  imports: [
    CommonModule,
    HojaDatosRoutingModule
  ],
  declarations: [HojaDatosComponent]
})
export class HojaDatosModule { }
