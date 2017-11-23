import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { CertificadoMatriculaRoutingModule } from './certificado-matricula-routing.module';
import { CertificadoMatriculaComponent } from './certificado-matricula.component';

@NgModule({
  imports: [
    CommonModule,
    CertificadoMatriculaRoutingModule
  ],
  declarations: [CertificadoMatriculaComponent]
})
export class CertificadoMatriculaModule { }
