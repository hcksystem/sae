import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { GeneroRoutingModule } from './genero-routing.module';
import { GeneroComponent } from './genero.component';
import { GeneroService } from 'app/layout/genero/genero.service';

@NgModule({
  imports: [
    CommonModule,
    GeneroRoutingModule
  ],
  providers: [GeneroService],
  declarations: [GeneroComponent]
})
export class GeneroModule { }
