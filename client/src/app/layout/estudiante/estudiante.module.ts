import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { EstudianteRoutingModule } from './estudiante-routing.module';
import { EstudianteComponent } from './estudiante.component';
import { EstudianteService } from './estudiante.service';

@NgModule({
    imports: [
        CommonModule,
        EstudianteRoutingModule
    ],
    providers: [EstudianteService],
    declarations: [EstudianteComponent]
})
export class EstudianteModule { }
