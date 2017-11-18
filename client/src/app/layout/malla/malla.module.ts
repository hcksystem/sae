import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { CommonModule } from '@angular/common';

import { MallaRoutingModule } from './malla-routing.module';
import { MallaComponent } from './malla.component';
import { MallaService } from 'app/layout/malla/malla.service';

@NgModule({
   imports: [
      CommonModule,
      FormsModule,
      MallaRoutingModule
   ],
   providers: [MallaService],
   declarations: [MallaComponent],
})
export class MallaModule { }
