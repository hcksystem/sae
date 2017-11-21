import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { CommonModule } from '@angular/common';

import { TutorCarreraRoutingModule } from './tutorcarrera-routing.module';
import { TutorCarreraComponent } from './tutorcarrera.component';
import { TutorCarreraService } from './tutorcarrera.service';

@NgModule({
   imports: [
      CommonModule,
      FormsModule,
      TutorCarreraRoutingModule
   ],
   providers: [TutorCarreraService],
   declarations: [TutorCarreraComponent],
})
export class TutorCarreraModule { }
