import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { PostulanteRoutingModule } from './postulante-routing.module';
import { PostulanteComponent } from './postulante.component';

@NgModule({
  imports: [
    CommonModule,
    PostulanteRoutingModule
  ],
  declarations: [PostulanteComponent]
})
export class PostulanteModule { }
