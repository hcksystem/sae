import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { SolicitudMatriculaRoutingModule } from './solicitud-matricula-routing.module';
import { SolicitudMatriculaComponent } from './solicitud-matricula.component';
import { NgxBarcodeModule } from 'ngx-barcode';
import { MatriculacionService } from './../matriculacion.service';
import { PersonaService } from 'app/CRUD/persona/persona.service';
import { SolicitudMatriculaService } from 'app/CRUD/solicitudmatricula/solicitudmatricula.service';

@NgModule({
  imports: [
    CommonModule,
    SolicitudMatriculaRoutingModule,
    NgxBarcodeModule
  ],
  providers: [MatriculacionService,
    PersonaService,
    SolicitudMatriculaService],
  declarations: [SolicitudMatriculaComponent]
})
export class SolicitudMatriculaModule { }
