import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { SecretariaAcademicaRoutingModule } from './secretaria-academica-routing.module';
import { SecretariaAcademicaComponent } from './secretaria-academica.component';

@NgModule({
  imports: [
    CommonModule,
    SecretariaAcademicaRoutingModule
  ],
  declarations: [SecretariaAcademicaComponent]
})
export class SecretariaAcademicaModule { }
