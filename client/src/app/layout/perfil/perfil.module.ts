import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { CommonModule } from '@angular/common';

import { PerfilRoutingModule } from './perfil-routing.module';
import { PerfilComponent } from './perfil.component';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    PerfilRoutingModule
  ],
  declarations: [PerfilComponent]
})
export class PerfilModule { }