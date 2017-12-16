import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { NgxBarcodeModule } from 'ngx-barcode';
import { CertificadoMatriculaRoutingModule } from './certificado-matricula-routing.module';
import { CertificadoMatriculaComponent } from './certificado-matricula.component';
import { MatriculacionService } from 'app/layout/matriculacion/matriculacion.service';
import { PersonaService } from 'app/CRUD/persona/persona.service';
import { SolicitudMatriculaService } from 'app/CRUD/solicitudmatricula/solicitudmatricula.service';
import { AsignaturaSolicitudMatriculaService } from 'app/CRUD/asignaturasolicitudmatricula/asignaturasolicitudmatricula.service';
import { PeriodoLectivoService } from 'app/CRUD/periodolectivo/periodolectivo.service';
import { AsignaturaService } from 'app/CRUD/asignatura/asignatura.service';

@NgModule({
  imports: [
    CommonModule,
    NgxBarcodeModule,
    CertificadoMatriculaRoutingModule
  ],
  providers: [MatriculacionService,
    SolicitudMatriculaService,
    PeriodoLectivoService,
    AsignaturaService,
    AsignaturaSolicitudMatriculaService
  ],
  declarations: [CertificadoMatriculaComponent]
})
export class CertificadoMatriculaModule { }
