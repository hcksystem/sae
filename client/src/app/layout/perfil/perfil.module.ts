import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { CommonModule } from '@angular/common';

import { PerfilRoutingModule } from './perfil-routing.module';
import { PerfilComponent } from './perfil.component';


import { GeneroService } from 'app/CRUD/genero/genero.service';
import { EtniaService } from 'app/CRUD/etnia/etnia.service';
import { TipoIngresosService } from 'app/CRUD/tipoingresos/tipoingresos.service';
import { OcupacionService } from 'app/CRUD/ocupacion/ocupacion.service';
import { TipoDiscapacidadService } from 'app/CRUD/tipodiscapacidad/tipodiscapacidad.service';
import { TipoSangreService } from 'app/CRUD/tiposangre/tiposangre.service';
import { EstadoCivilService } from 'app/CRUD/estadocivil/estadocivil.service';
import { TituloService } from 'app/CRUD/titulo/titulo.service';
import { EstudianteService } from 'app/CRUD/estudiante/estudiante.service';
import { TipoInstitucionProcedenciaService } from 'app/CRUD/tipoinstitucionprocedencia/tipoinstitucionprocedencia.service';
import { NivelTituloService } from 'app/CRUD/niveltitulo/niveltitulo.service';
import { UbicacionService } from 'app/CRUD/ubicacion/ubicacion.service';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    PerfilRoutingModule
  ],
  providers: [GeneroService, EtniaService, TipoIngresosService, OcupacionService, TipoDiscapacidadService, TipoSangreService, EstadoCivilService, TituloService, EstudianteService, TipoInstitucionProcedenciaService, NivelTituloService, UbicacionService],
  declarations: [PerfilComponent]
})
export class PerfilModule { }