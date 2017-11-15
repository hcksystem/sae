import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { GeneroRoutingModule } from './genero-routing.module';
import { GeneroComponent } from './genero.component';

@NgModule({
  imports: [
    CommonModule,
    GeneroRoutingModule
  ],
  declarations: [GeneroComponent]
})
export class GeneroModule { }
